<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Automóviles</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-[100vh] font-serif justify-center items-center">
    <div class="flex flex-col bg-[#C2EEF9] w-[75vh] h-[80vh] rounded-md text-center">
        <h1 class="text-xl font-bold p-6 mb-16">Bienvenido al Sistema de Gestión de Automóviles</h1>
    
        <div class="flex flex-col items-center">
            <a href="./frontend/registrar_automovil.php" class="w-96 mb-32">
                <button class="w-full bg-[#014286] text-white rounded-lg p-4 hover:bg-[#063A5A]">
                    Registrar un nuevo automóvil
                </button>
            </a>
            <a href="./frontend/buscar_automovil.php" class="w-96">
                <button class="w-full bg-[#014286] text-white rounded-lg p-4 hover:bg-[#063A5A]">
                    Buscar un automóvil
                </button>
            </a>
        </div>
    </div>
</body>
</html>
