<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Automóviles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<body class="flex h-[100vh] font-serif justify-center items-center bg-[#6A62D2]">
    <div class="flex flex-col bg-white p-4 w-[75vh] h-[85vh] rounded-md text-center">
        <h2 class="text-2xl font-bold mb-4">Actualizar Automóvil</h2>
        <form action="../backend/procesar_actualizacion.php" method="post">
        <input class="bg-[#E5E8ED] p-2 w-full h-auto mb-2" placeholder="Ingrese una marca" type="hidden" id="id" name="id" value='<?php echo $resultado['id']; ?>' >
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="marca">Marca:</label>
                <input class="bg-[#E5E8ED] p-2 w-full h-auto mb-2" placeholder="Ingrese una marca" type="text" id="marca" name="marca" value='<?php echo $resultado['marca']; ?>' required><br>
            </div>
            <div class="mx-16">
                <label class="mb-2 block text-left text-md font-bold" for="modelo">Modelo:</label>
                <input class="bg-[#E5E8ED] p-2 w-full mb-2" placeholder="Ingrese un modelo" type="text" id="modelo" name="modelo" value='<?php echo $resultado['modelo']; ?>' required><br>
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
                <label class="mb-2 block text-left text-md font-bold" for="placa">Placa:</label>
                <input class="bg-[#E5E8ED] p-2 w-full mb-6" placeholder="Ingrese una placa" type="text" id="placa" name="placa" value='<?php echo $resultado['placa']; ?>' required><br>
            </div>
            <div class="mx-32">
                <input class="bg-[#6A62D2] text-white p-2 w-full hover:cursor-pointer hover:bg-[#5852A7]" name="actualizar" type="submit" value="Actualizar">
            </div>  
        </form>
    </div>
</body>
</html>