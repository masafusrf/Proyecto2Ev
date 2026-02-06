<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir forma de vida</title>
</head>
<body>

    <h1>Registra una nueva forma de vida</h1>

    <form action="index.php?accion=crear" method="post">
        <input type="hidden" name="tipo" value="vida">

        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="origen">Planeta de origen</label><br>
        <input type="text" name="origen" id="origen" required><br>

        <label for="estabilidad">Nivel de estabilidad</label><br>
        <input type="number" min="1" max="10" name="estabilidad" id="estabilidad" required><br>

        <label for="dieta">Tipo de dieta</label><br>
        <select name="dieta" id="dieta" required>
            <option value="">-- Selecciona una dieta --</option>
            <option value="Carbono">Carbono</option>
            <option value="Silício">Silício</option>
            <option value="Energía">Energía</option>
        </select>

        <input type="submit" value="Guardar">
    </form>
    
</body>
</html>