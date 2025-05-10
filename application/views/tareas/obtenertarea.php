<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">
    <title>Document</title>
</head>
<body>
    <?php if ($tarea): ?>
        <p>ID: <?php echo $tarea->id; ?></p>
        <p>Título: <?php echo $tarea->titulo; ?></p>
        <p>Descripción: <?php echo $tarea->descripcion; ?></p>
        <?php else: ?>
        <p>No se encontró la tarea.</p>
    <?php endif; ?>
</body>
</html>