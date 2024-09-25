<?php
// Incluir archivos de conexión y clase Automovil
include '../includes/Database.php';
include '../includes/Automovil.php';

// Crear una instancia de la clase Database y obtener la conexión
$database = new Database();
$db = $database->getConnection();

// Crear una instancia de la clase Automovil
$automovil = new Automovil($db);

// Procesar la solicitud dependiendo de qué formulario se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['buscar_placa'])) {
        // Buscar automóvil
        $placa = isset($_POST['placa']) ? filter_var($_POST['placa'], FILTER_SANITIZE_NUMBER_INT) : null;

        if ($placa && is_numeric($placa)) {
            $resultado = $automovil->validar_automovil($placa);

            if ($resultado) {
                
                include '../frontend/form_actualizar.php';
   
            } else {
                echo "No se encontró un automóvil con el ID proporcionado.";
            }
        } else {
            echo "ID inválido.";
        }
    } elseif (isset($_POST['actualizar'])) {
        // Actualizar automóvil
        $automovil->placa = $_POST['placa'];
        $automovil->modelo = $_POST['modelo'];
        $automovil->marca = $_POST['marca'];
        $automovil->anio = $_POST['anio'];
        $automovil->color = $_POST['color'];
        $automovil->motor = $_POST['motor'];
        $automovil->chasis = $_POST['chasis'];
        $automovil->tipo_vehiculo = $_POST['tipo_vehiculo'];


        if ($automovil->actualizar_automovil()) {
            echo "Automóvil actualizado exitosamente.";
        } else {
            echo "Error al actualizar el automóvil.";
        }
    }
} else {
    // Mostrar formulario de búsqueda
    echo "
    <form action='procesar_actualizacion.php' method='post'>
        <div class='mx-16'>
            <label class='mb-2 block text-left text-md font-bold' for='placa'>Escriba la placa del Automóvil que desea actualizar:</label>
            <input class='bg-[#E5E8ED] p-2 w-full h-auto mb-16' placeholder='Ingrese una placa' type='number' id='placa' name='placa' required><br>
        </div>
        <div class='mx-32'>
            <input class='bg-[#6A62D2] text-white p-2 w-full hover:cursor-pointer hover:bg-[#5852A7]' type='submit' name='buscar_placa' value='Buscar'>
        </div>  
    </form>
    ";
}
?>
