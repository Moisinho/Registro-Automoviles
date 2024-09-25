<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Automóviles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-[100vh] font-serif justify-center items-center bg-[#6A62D2]">
    <div class="flex flex-col bg-white p-4 w-[75vh] h-[65vh] rounded-md text-center justify-center">
        <h2 class="text-2xl font-bold mb-12">Eliminar Automóvil</h2>
        <form action="../backend/procesar_eliminacion.php" method="post">
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="placa">Escriba la placa del Automóvil que desea eliminar:</label>
                <input class="bg-[#E5E8ED] p-2 w-full h-auto mb-16" placeholder="Ingrese una placa" type="number" id="placa" name="placa" required><br>
            </div>
            <div class="mx-32">
                <input class="bg-[#6A62D2] text-white p-2 w-full hover:cursor-pointer hover:bg-[#5852A7]" type="submit" value="Eliminar">
            </div>  
        </form>
    </div>
</body>
</html>