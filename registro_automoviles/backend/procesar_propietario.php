<?php

include '../includes/Database.php';
include '../includes/Propietario.php';
include '../includes/Propietario_Automoviles.php';

// Crear una instancia de la clase Database y obtener la conexión
$database = new Database();
$db = $database->getConnection();

$propietario = new Propietario($db);
$propietario_automoviles = new Propietario_Automoviles($db);


$propietario->cedula = $_POST['cedula'];
$propietario->nombre = $_POST['nombre'];
$propietario->apellido = $_POST['apellido'];
$propietario->telefono = $_POST['telefono'];
$propietario->entidad = $_POST['entidad'];
$propietario->placa = $_POST['placa'];

//Datos para la tabla propietario_automoviles
$propietario_automoviles->cedula = $propietario->cedula;
$propietario_automoviles->placa = $propietario->placa;
$propietario_automoviles->fecha = $_POST['fecha'];


$query = "SELECT COUNT(*) FROM propietario WHERE cedula = :cedula";
$stmt = $db->prepare($query);
$stmt->bindParam(":cedula", $propietario->cedula);
$stmt->execute();
$count = $stmt->fetchColumn();

if ($count > 0) {
    // Si el propietario ya existe, proceder directamente a registrar el automóvil
    if ($propietario_automoviles->registrar()) {
        echo "Registro completado exitosamente";
    } else {
        echo "Error al registrar el registro del automóvil.";
    }
} else {
    // Si el propietario no existe, proceder a registrarlo
    if ($propietario->registrar()) {
        if ($propietario_automoviles->registrar()) {
            echo "Registro completado exitosamente";
        } else {
            echo "Error al registrar el registro del automóvil.";
        }
    } else {
        echo "Error al registrar al propietario.";
    }
}
?>
