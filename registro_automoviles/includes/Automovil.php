<?php
class Automovil {
    private $conn; // Conexión a la base de datos
    private $table_name = "automoviles"; // Nombre de la tabla

    // Propiedades de la clase
    public $placa;
    public $marca;
    public $modelo;
    public $anio;
    public $color;
    public $tipo_vehiculo;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para registrar un nuevo automóvil
    public function registrar() {
        // Query para insertar un nuevo automóvil
        $query = "INSERT INTO " . $this->table_name . " (placa, marca, modelo, anio, color, tipo_vehiculo) VALUES (:placa, :marca, :modelo, :anio, :color, :tipo_vehiculo)";

        // Preparar la declaración
        $stmt = $this->conn->prepare($query);

        // Limpiar los datos para evitar inyección SQL
        $this->placa = htmlspecialchars(strip_tags($this->placa));
        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->anio = htmlspecialchars(strip_tags($this->anio));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->tipo_vehiculo = htmlspecialchars(strip_tags($this->tipo_vehiculo));

        // Enlazar los parámetros
        $stmt->bindParam(":placa", $this->placa);
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":anio", $this->anio);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":tipo_vehiculo", $this->tipo_vehiculo);

        // Ejecutar la declaración
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function buscar_automoviles($input) {
        // Llamar al procedimiento almacenado
        $query = "CALL BuscarAutomoviles(?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $input, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function eliminar_automoviles($placa) {
        $query = "DELETE FROM automoviles WHERE placa = :placa";
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(":placa", $placa, PDO::PARAM_INT);
    
        // Ejecutar la declaración
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; }
    }

    public function validar_automovil($placa) {
        $query = "SELECT * FROM automoviles WHERE placa = :placa";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':placa', $placa, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Devolver los datos del automóvil
        } else {
            return false;
        }
    }

    public function actualizar_automovil() {
        $query = "UPDATE automoviles 
                  SET marca = :marca, 
                      modelo = :modelo, 
                      anio = :anio, 
                      color = :color, 
                      tipo_vehiculo = :tipo_vehiculo
                  WHERE placa = :placa";
        
        $stmt = $this->conn->prepare($query);

        $this->placa = htmlspecialchars(strip_tags($this->placa));
        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->anio = htmlspecialchars(strip_tags($this->anio));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->tipo_vehiculo = htmlspecialchars(strip_tags($this->tipo_vehiculo));

        
        $stmt->bindParam(':placa', $this->placa, PDO::PARAM_STR);
        $stmt->bindParam(':marca', $this->marca, PDO::PARAM_STR);
        $stmt->bindParam(':modelo', $this->modelo, PDO::PARAM_STR);
        $stmt->bindParam(':anio', $this->anio, PDO::PARAM_INT);
        $stmt->bindParam(':color', $this->color, PDO::PARAM_STR);
        $stmt->bindParam(':tipo_vehiculo', $this->tipo_vehiculo, PDO::PARAM_STR);

        
        return $stmt->execute();
    }
    
    
}
?>
