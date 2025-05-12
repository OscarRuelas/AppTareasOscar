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
            
                <div class="form-floating mb-3 my-3 d-flex">
                    <input type="search" class="form-control" id="floatingBuscar" placeholder="titulo 1" name="buscar">
                    <label for="floatingBuscar">Buscar tareas</label>
                    <button onclick="buscar()">Buscar</button>
                </div>
            <?php if(!empty($tareas)): ?>
                <?php foreach ($tareas as $tarea): ?>
                    <tr>
                        <th scope="row"><?php echo $tarea->id; ?></th>
                        <td><?php echo $tarea->titulo; ?></td>
                        <td><?php echo $tarea->fecha; ?></td>
                        <td class="d-flex gap-2">
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

<script>
    
    // $(document).ready(function(){
        function buscar(){
            console.log($("#floatingBuscar").val());
            $.ajax({
                url: `http://localhost/AppTareasOscar/tareas/buscar/${$("#floatingBuscar").val()}`, // La URL a la que se enviará la petición
                method: 'GET',        // El método HTTP (GET, POST, PUT, DELETE, etc.)
                dataType: 'json',     // El tipo de dato esperado en la respuesta ('html', 'xml', 'json', 'text', 'script')
                success: function(data) {
                    // Esta función se ejecuta si la petición es exitosa
                    console.log('Éxito:', data);
                    // Aquí puedes manipular la respuesta del servidor
                },
                error: function(xhr, status, error) {
                    // Esta función se ejecuta si hay un error en la petición
                    console.error('Error:', status, error);
                    // Aquí puedes manejar el error
                },
                complete: function(xhr, status) {
                    // Esta función se ejecuta siempre, independientemente del éxito o el error
                    console.log('Completado:', status);
                }
            });
        }
    // });
</script>