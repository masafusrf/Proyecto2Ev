<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mineral raro</title>
</head>
<body>

    <table>

        <tr>
            <td>
                <!-- Botón Editar -->
                <form method="POST" action="index.php?accion=editar&id=<?= $entidad->getId() ?>">
                    <input type="hidden" name="id" value="<?= $entidad->getId() ?>">

                    Nombre: <input type="text" name="nombre" value="<?= $entidad->getNombre() ?>" required><br>

                    Planeta de origen: <input type="text" name="origen" value="<?= $entidad->getPlaneta() ?>" required><br>

                    Estabilidad: <input type="number" name="estabilidad" value="<?= $entidad->getEstabilidad() ?>" required><br>

                    Dureza: <input type="number" name="dureza" value="<?= $entidad->getDureza() ?>" required><br>

                    <button type="submit">Modificar</button>
                </form>
            </td>
        </tr>

    </table>
    
</body>
</html>