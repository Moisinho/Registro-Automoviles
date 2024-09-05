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
</head>
<body>
    <h2>Buscar Automóviles</h2>
    <form action="../backend/procesar_busqueda.php" method="post">
        <label for="buscar">Buscar:</label>
        <input type="text" id="buscar" name="input" placeholder="Marca, modelo, año, color, etc.">
        <input type="submit" value="Buscar">
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($autos)): ?>
                <?php foreach ($autos as $auto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($auto['id']); ?></td>
                        <td><?php echo htmlspecialchars($auto['marca']); ?></td>
                        <td><?php echo htmlspecialchars($auto['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($auto['anio']); ?></td>
                        <td><?php echo htmlspecialchars($auto['color']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No se encontraron resultados</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
