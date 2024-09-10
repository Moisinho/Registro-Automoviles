<?php
// Incluir archivos de conexión y clase Automovil
include '../includes/Database.php';
include '../includes/Automovil.php';

// Crear una instancia de la clase Database y obtener la conexión
$database = new Database();
$db = $database->getConnection();

// Crear una instancia de la clase Automovil
$automovil = new Automovil($db);

// Obtener los datos del formulario
$automovil->id = $_POST['id'];

$resultado = $automovil->validar_automovil($automovil->id);

if ($resultado) {

    if ($automovil->eliminar_automoviles($automovil->id)) {
        echo "Automóvil eliminado exitosamente.";
    } 
    else {
        echo "Error al eliminar el automóvil.";
    }

} else {
    echo "No se encontró un automóvil con el ID proporcionado.";
}

?>
