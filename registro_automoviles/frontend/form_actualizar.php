<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Automóviles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<body class="flex h-[100vh] font-serif justify-center items-center bg-[#6A62D2]">
    <div class="flex flex-col bg-white p-4 w-[75vh] h-[85vh] rounded-md text-center">
        <h2 class="text-2xl font-bold mb-4">Actualizar Automóvil</h2>
        <form action="../backend/procesar_actualizacion.php" method="post">
        <input class="bg-[#E5E8ED] p-2 w-full h-auto mb-2" placeholder="Ingrese una placa" type="hidden" id="placa" name="placa" value='<?php echo $resultado['placa']; ?>' >
        <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="marca">Marca:</label>
                <select class="bg-[#E5E8ED] p-2 w-full mb-2" name="marca" id="marca" required>
                    <option value="" disabled selected>Seleccione una marca</option>
                    <?php
                        require_once '../includes/Database.php'; // Incluir la conexión a la base de datos

                        // Crear una instancia de la clase Database y obtener la conexión
                        $database = new Database();
                        $conn = $database->getConnection();

                        // Consulta para obtener todas las marcas
                        $stmt = $conn->prepare("SELECT DISTINCT marca FROM automoviles");
                        $stmt->execute();

                        // Generar las opciones del combobox de marcas
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . htmlspecialchars($row['marca']) . "'>" . htmlspecialchars($row['marca']) . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="modelo">Modelo:</label>
                <select class="bg-[#E5E8ED] p-2 w-full mb-2" name="modelo" id="modelo">
                    <option value="" disabled selected>Seleccione un modelo</option>
                </select>
            </div>
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="anio">Año:</label>
                <input class="bg-[#E5E8ED] p-2 w-full mb-2" placeholder="Ingrese un año" type="text" id="anio" name="anio" value='<?php echo $resultado['anio']; ?>' required><br>
            </div>
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="color">Color:</label>
                <input class="bg-[#E5E8ED] p-2 w-full mb-2" placeholder="Ingrese un color" type="text" id="color" name="color" value='<?php echo $resultado['color']; ?>' required><br>
            </div>
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="motor">Número de Motor:</label>
                <input class="bg-[#E5E8ED] p-2 w-full mb-4" placeholder="Ingrese un motor" type="text" id="motor" name="motor" required><br>
            </div>
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="chasis">Número de Chasis:</label>
                <input class="bg-[#E5E8ED] p-2 w-full mb-4" placeholder="Ingrese un chasis" type="text" id="chasis" name="chasis" required><br>
            </div>
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="tipo_vehiculo">Tipo de Vehiculo:</label>
                <select class="bg-[#E5E8ED] p-2 w-full mb-6" name="tipo_vehiculo" id="tipo_vehiculo">
                    <option value="" disabled selected>Seleccione un tipo de vehiculo</option>
                </select>
            </div>
            <div class="mx-32">
                <input class="bg-[#6A62D2] text-white p-2 w-full hover:cursor-pointer hover:bg-[#5852A7]" id="actualizar" name="actualizar" type="submit" value="Actualizar">
            </div>  
        </form>
    </div>
    <script>
    $(document).ready(function() {
        $('#marca').change(function() {
            console.log('Marca seleccionada:', $(this).val()); // Añade esto
            var dato_marca = $(this).val();

            if (dato_marca) {
                $.ajax({
                    type: 'POST',
                    url: '../backend/obtener_modelo.php', // URL del archivo PHP que manejará la solicitud
                    data: { marca: dato_marca }, // Enviar la marca seleccionada al servidor
                    success: function(html) {
                        $('#modelo').html(html); // Actualizar el select con los modelos recibidos
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al obtener los modelos:', error);
                    }
                });
            } else {
                $('#modelo').html('<option value="">Seleccione un modelo</option>');
            }
        });

        $('#modelo').change(function() {
            console.log('Modelo seleccionado:', $(this).val()); // Añade esto
            var dato_modelo = $(this).val();

            if (dato_modelo) {
                $.ajax({
                    type: 'POST',
                    url: '../backend/obtener_tipo.php', // URL del archivo PHP que manejará la solicitud
                    data: { modelo: dato_modelo }, // Enviar la marca seleccionada al servidor
                    success: function(html) {
                        $('#tipo_vehiculo').html(html); // Actualizar el select con los modelos recibidos
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al obtener los modelos:', error);
                    }
                });
            } else {
                $('#tipo_vehiculo').html('<option value="">Seleccione un tipo de vehiculo</option>');
            }
        });
    });
    </script>
</body>
</html>