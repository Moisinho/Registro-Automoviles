<?php
// Inicializa $autos como un array vacío si no está definido
if (!isset($autos)) {
    $autos = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Automóviles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-[100vh] font-serif justify-center items-center bg-[#6A62D2] mx-16">
<div class="flex flex-col bg-white p-4 w-full h-[85vh] rounded-md text-center">
    <h2 class="text-2xl font-bold mb-4">Buscar Automóviles</h2>
    <form class="flex justify-center mb-6" action="../backend/procesar_busqueda.php" method="post">
        <div class="flex items-center bg-[#E5E8ED] w-1/3">
            <img class="pl-1 w-7 h-7" src="/img/Search_alt.png" alt="Lupita">
            <input class="py-1 pl-2 pr-2 bg-[#E5E8ED] outline-none w-full" type="text" id="buscar" name="input" placeholder="Ingrese un dato">
        </div>
        <input class="bg-[#6A62D2] text-white rounded-lg ml-4 py-2 px-4 hover:cursor-pointer hover:bg-[#5852A7]" type="submit" value="Buscar">
    </form>
    <div class="overflow-y-auto">
        <table class="w-full">
            <thead class="bg-[#6A62D2] text-white">
                <tr>
                    <th class="rounded-tl-lg">Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Color</th>
                    <th>Número de Motor</th>
                    <th>Número de Chasis</th>
                    <th class="rounded-tr-lg">Tipo de Vehiculo</th>
                </tr>
            </thead>
            <tbody class="">
                <?php if (!empty($autos)): ?>
                    <?php foreach ($autos as $auto): ?>
                        <tr>
                            <td class="border border-[#6A62D2]"><?php echo htmlspecialchars($auto['placa']); ?></td>
                            <td class="border border-r border-[#6A62D2]"><?php echo htmlspecialchars($auto['marca']); ?></td>
                            <td class="border border-r border-[#6A62D2]"><?php echo htmlspecialchars($auto['modelo']); ?></td>
                            <td class="border border-r border-[#6A62D2]"><?php echo htmlspecialchars($auto['anio']); ?></td>
                            <td class="border border-r border-[#6A62D2]"><?php echo htmlspecialchars($auto['color']); ?></td>
                            <td class="border border-r border-[#6A62D2]"><?php echo htmlspecialchars($auto['numero_motor']); ?></td>
                            <td class="border border-r border-[#6A62D2]"><?php echo htmlspecialchars($auto['numero_chasis']); ?></td>
                            <td class="border border-r border-[#6A62D2]"><?php echo htmlspecialchars($auto['tipo_vehiculo']); ?></td>                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No se encontraron resultados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
