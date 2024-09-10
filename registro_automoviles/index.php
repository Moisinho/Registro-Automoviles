<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Automóviles</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-[100vh] font-serif justify-center items-center bg-[#6A62D2]">
    <div class="flex flex-col bg-white w-[75vh] h-[80vh] rounded-md text-center">
        <h1 class="text-2xl font-bold p-6 mb-6">Bienvenido al Sistema de Gestión de Automóviles</h1>
    
        <div class="flex flex-col items-center">
            <a href="./frontend/registrar_automovil.php" class="w-96 mb-8">
                <button class="w-full bg-[#6A62D2] text-white p-4 hover:bg-[#5852A7]">
                    Registrar un nuevo automóvil
                </button>
            </a>
            <a href="./frontend/buscar_automovil.php" class="w-96 mb-8">
                <button class="w-full bg-[#6A62D2] text-white p-4 hover:bg-[#5852A7]">
                    Buscar un automóvil
                </button>
            </a>
            <a href="./frontend/eliminar_automovil.php" class="w-96 mb-8">
                <button class="w-full bg-[#6A62D2] text-white p-4 hover:bg-[#5852A7]">
                    Eliminar un automóvil
                </button>
            </a>
            <a href="./frontend/actualizar_automovil.php" class="w-96 mb-8">
                <button class="w-full bg-[#6A62D2] text-white p-4 hover:bg-[#5852A7]">
                    Actualizar un automóvil
                </button>
            </a>
        </div>
    </div>
</body>
</html>
