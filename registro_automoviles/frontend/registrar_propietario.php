<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro del Propietario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-[100vh] font-serif justify-center items-center bg-[#6A62D2]">
    <div class="flex flex-col bg-white p-4 w-[75vh] h-[60vh] rounded-md text-center overflow-y-auto">
        <h2 class="text-2xl font-bold mb-4">Datos del Propietario</h2>
        <form action="../backend/procesar_propietario.php" method="post">
            <input type="hidden" id="placa" name="placa" value="<?php echo htmlspecialchars($_GET['placa']); ?>"> <!-- Obtener la placa de la URL -->
            <input type="hidden" id="fecha" name="fecha" value="<?php echo date('Y-m-d H:i:s'); ?>"> <!-- Obtener la fecha -->
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="cedula">Cédula:</label>
                <input class="bg-[#E5E8ED] p-2 w-full mb-2" placeholder="Ingrese su cédula" type="text" id="cedula" name="cedula" required><br>
            </div>
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="nombre">Nombre:</label>
                <input class="bg-[#E5E8ED] p-2 w-full mb-2" placeholder="Ingrese su nombre" type="text" id="nombre" name="nombre" required><br>
            </div>
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="apellido">Apellido:</label>
                <input class="bg-[#E5E8ED] p-2 w-full mb-2" placeholder="Ingrese su apellido" type="text" id="apellido" name="apellido" required><br>
            </div>
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="telefono">Teléfono:</label>
                <input class="bg-[#E5E8ED] p-2 w-full mb-2" placeholder="Ingrese su teléfono" type="text" id="telefono" name="telefono" required><br>
            </div>
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="entidad">Entidad:</label>
                <select class="bg-[#E5E8ED] p-2 w-full mb-6" name="entidad" id="entidad">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="Persona Natural">Persona Natural</option>
                    <option value="Persona Jurídica">Persona Jurídica</option>
                </select>
            </div>
            <div class="mx-32">
                <input class="bg-[#6A62D2] text-white p-2 w-full hover:cursor-pointer hover:bg-[#5852A7]" type="submit" value="Registrarse">
            </div>  
        </form>
    </div>
</body>
</html>
