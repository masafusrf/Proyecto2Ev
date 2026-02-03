<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Forma de Vida</title>
</head>
<body>

    <table>

        <tr>
            <td>
                <!-- Botón Editar -->
                <form method="POST" action="index.php?accion=editar&id=<?= $entidad->getId() ?>">
                    <input type="hidden" name="id" value="<?= $entidad->getId() ?>">

                    Nombre: <input type="text" name="nombre" value="<?= $entidad->getNombre() ?>" required><br>

                    Planeta de origen: <input type="text" name="planeta" value="<?= $entidad->getPlaneta() ?>" required><br>

                    Estabilidad: <input type="number" name="estabilidad" value="<?= $entidad->getEstabilidad() ?>" required><br>

                    Antigüedad: <input type="number" name="antiguedad" value="<?= $entidad->getAntiguedad() ?>" required><br>

                    Tipo de dieta:
                    <select name="peligrosidad" required>
                        <option value="Carbono" <?= $entidad->getDieta() === 'Carbono' ? 'selected' : '' ?>>Carbono</option>
                        <option value="Silício" <?= $entidad->getDieta() === 'Silício' ? 'selected' : '' ?>>Silício</option>
                        <option value="Energía" <?= $entidad->getDieta() === 'Energía' ? 'selected' : '' ?>>Energía</option>
                    </select><br>

                    <button type="submit">Modificar</button>
                </form>
            </td>
        </tr>

    </table>
    
</body>
</html>