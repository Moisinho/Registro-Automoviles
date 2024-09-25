<?php
require_once '../includes/Database.php'; // Incluir la conexión a la base de datos

// Crear una instancia de la clase Database y obtener la conexión
$database = new Database();
$conn = $database->getConnection();

if (isset($_POST['marca'])) {
    $dato_marca = $_POST['marca'];

    // Consulta para obtener los modelos basados en la marca seleccionada
    $stmt = $conn->prepare("SELECT DISTINCT modelo FROM automoviles WHERE marca = ?");
    $stmt->execute([$dato_marca]);

    // Verificar si hay modelos encontrados
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Seleccione un modelo</option>'; // Opción predeterminada
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . htmlspecialchars($row['modelo']) . '">' . htmlspecialchars($row['modelo']) . '</option>';
        }
    } else {
        echo '<option value="">No hay modelos disponibles</option>';
    }
}
?>
