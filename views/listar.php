<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Criaturas</title>
</head>
<body>


<?php if (!empty($_SESSION['mensaje'])): ?>
    <p style="background:#eef;padding:10px;">
        <?= $_SESSION['mensaje'] ?>
    </p>
    <?php unset($_SESSION['mensaje']); ?>
<?php endif; ?>

<h1>Listado de Entidades estelares</h1>

<a href="index.php?accion=crear&tipo=vida">Añadir forma de vida</a>
<a href="index.php?accion=crear&tipo=mineral">Añadir mineral raro</a>
<a href="index.php?accion=crear&tipo=artefacto">Añadir artefacto antiguo</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Planeta de origen</th>
        <th>Estabilidad</th>

        <th>Antiguedad</th>
        <th>Dureza</th>
        <th>Dieta</th>
        <th>Acciones</th>
    </tr>

    <?php if(!empty($entidades)): ?>
        <?php foreach ($entidades as $e): ?>
        <tr>
            <td><?= $e->getId() ?></td>
            <td><?= $e->getNombre() ?></td>
            <td><?= $e->getPlaneta() ?></td>
            <td style="<?= ($e->getEstabilidad() < 3) ? 'background-color: red; color: white;' : '' ?>">
                <?= $e->getEstabilidad() ?>
            </td>

            <td><?= ($e instanceof ArtefactoAntiguo) ? $e->getAntiguedad() : 'X' ?></td>
            <td><?= ($e instanceof MineralRaro) ? $e->getDureza() : 'X' ?></td>
            <td><?= ($e instanceof FormadeVida) ? $e->getDieta() : 'X' ?></td>
            <td>
                <a href="index.php?accion=editar&id=<?= $e->getId() ?>">Editar</a>
                <a href="index.php?accion=eliminar&id=<?= $e->getId() ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="8">No hay ninguna entidad estelar todavía.</td>
        </tr>
    <?php endif; ?>
</table>

<?php if ($totalPags > 1): ?>
    <div>
        <p>Páginas:</p>
        <?php for($i = 1; $i <= $totalPags; $i++): ?>
            <?php if ($i == $paginaActual): ?>
                <strong><?= $i ?></strong>
            <?php else: ?>
                <a href="index.php?accion=index&p=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
<?php endif; ?>


</body>
</html>
