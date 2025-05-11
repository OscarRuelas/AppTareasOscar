<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h1 class="text-center"><?php echo $title; ?></h1>
<div class="table-responsive px-5">
    <table class="table  table-striped-columns">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Estatus</th>
                <th scope="col">Fecha</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $tarea->id; ?></td>
                <td><?php echo $tarea->titulo; ?></td>
                <td><?php echo $tarea->descripcion; ?></td>
                <td><?php echo $tarea->estatus; ?></td>
                <td><?php echo $tarea->fecha; ?></td>
                <td>
                    <a type="button" class="btn btn-outline-warning" href="<?php echo base_url('tareas/edit/') . $tarea->id; ?>">Editar</a>
                    <form action="<?php echo base_url('tareas/delete/') . $tarea->id; ?>" method="POST">
                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>