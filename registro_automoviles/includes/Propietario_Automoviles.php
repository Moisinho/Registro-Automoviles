<?php
class Propietario_Automoviles {
    private $conn; // Conexión a la base de datos
    private $table_name = "propietario_automoviles"; // Nombre de la tabla

    // Propiedades de la clase
    public $placa;
    public $cedula;
    public $fecha;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para registrar un nuevo automóvil
    public function registrar() {
        // Query para insertar un nuevo automóvil
        $query = "INSERT INTO " . $this->table_name . " (placa, cedula, fecha) VALUES (:placa, :cedula, :fecha)";

        // Preparar la declaración
        $stmt = $this->conn->prepare($query);

        // Limpiar los datos para evitar inyección SQL
        $this->placa = htmlspecialchars(strip_tags($this->placa));
        $this->cedula = htmlspecialchars(strip_tags($this->cedula));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));

        // Enlazar los parámetros
        $stmt->bindParam(":cedula", $this->cedula);
        $stmt->bindParam(":placa", $this->placa);
        $stmt->bindParam(":fecha", $this->fecha);

        // Ejecutar la declaración
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}
?>
