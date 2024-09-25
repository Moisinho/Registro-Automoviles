<?php
require_once '../includes/Database.php'; // Incluir la conexión a la base de datos

// Crear una instancia de la clase Database y obtener la conexión
$database = new Database();
$conn = $database->getConnection();

if (isset($_POST['modelo'])) {
    $dato_modelo = $_POST['modelo'];

    // Consulta para obtener los modelos basados en la marca seleccionada
    $stmt = $conn->prepare("SELECT DISTINCT tipo_vehiculo FROM automoviles WHERE modelo = ?");
    $stmt->execute([$dato_modelo]);

    // Verificar si hay modelos encontrados
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Seleccione un tipo de vehiculo</option>'; // Opción predeterminada
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . htmlspecialchars($row['tipo_vehiculo']) . '">' . htmlspecialchars($row['tipo_vehiculo']) . '</option>';
        }
    } else {
        echo '<option value="">No hay modelos disponibles</option>';
    }
}
?>
