<?php
// Incluir archivos de conexión y clase Automovil
include '../includes/Database.php';
include '../includes/Automovil.php';

// Crear una instancia de la clase Database y obtener la conexión
$database = new Database();
$db = $database->getConnection();

// Crear una instancia de la clase Automovil
$automovil = new Automovil($db);

// Obtener el valor del input de búsqueda (vacío si no hay búsqueda)
$input = isset($_POST['input']) ? $_POST['input'] : '';

// Buscar los automóviles según la entrada
$autos = $automovil->buscar_automoviles($input);

// Incluye el archivo HTML donde se mostrarán los resultados
include '../frontend/buscar_automovil.php';
?>
