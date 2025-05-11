<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="table-responsive px-5">
    <table class="table  table-striped-columns">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Fecha de Actividad</th>
                <th scope="col">Detalles</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($tareas)): ?>
                <?php foreach ($tareas as $tarea): ?>
                    <tr>
                        <th scope="row"><?php echo $tarea->id; ?></th>
                        <td><?php echo $tarea->titulo; ?></td>
                        <td><?php echo $tarea->fecha; ?></td>
                        <td>
                            <a type="button" class="btn btn-outline-primary" href="<?php echo base_url('tareas/show/') . $tarea->id; ?>">Mostrar</a>
                            <a type="button" class="btn btn-outline-warning" href="<?php echo base_url('tareas/edit/') . $tarea->id; ?>">Editar</a>
                            <form action="<?php echo base_url('tareas/delete/') . $tarea->id; ?>" method="POST">
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center fs-5">No se encontraron tareas registradas</td>
                    </tr>
                <?php endif; ?>
        </tbody>
    </table>
</div>