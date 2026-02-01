<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir mineral</title>
</head>
<body>

    <h1>Registra un nuevo mineral raro</h1>

    <form action="index.php?accion=crear" method="post">
        <input type="hidden" name="tipo" value="mineral">

        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="origen">Planeta de origen</label><br>
        <input type="text" name="origen" id="origen" required><br>

        <label for="estabilidad">Nivel de estabilidad</label><br>
        <input type="number" name="estabilidad" id="estabilidad" required><br>

        <label for="dureza">Dureza</label><br>
        <input type="number" name="dureza" id="dureza" required><br>

        <input type="submit" value="Guardar">

    </form>
    
</body>
</html>