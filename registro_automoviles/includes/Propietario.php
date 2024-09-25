<?php
class Propietario {
    private $conn; // Conexión a la base de datos
    private $table_name = "propietario"; // Nombre de la tabla

    // Propiedades de la clase
    public $cedula;
    public $nombre;
    public $apellido;
    public $telefono;
    public $entidad;
    public $placa;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para registrar un nuevo automóvil
    public function registrar() {
        // Query para insertar un nuevo automóvil
        $query = "INSERT INTO " . $this->table_name . " (cedula, nombre, apellido, telefono, entidad) VALUES (:cedula, :nombre, :apellido, :telefono, :entidad)";

        // Preparar la declaración
        $stmt = $this->conn->prepare($query);

        // Limpiar los datos para evitar inyección SQL
        $this->cedula = htmlspecialchars(strip_tags($this->cedula));
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->entidad = htmlspecialchars(strip_tags($this->entidad));

        // Enlazar los parámetros
        $stmt->bindParam(":cedula", $this->cedula);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":entidad", $this->entidad);

        // Ejecutar la declaración
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}
?>
