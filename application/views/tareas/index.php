<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="table-responsive px-5">
    <table id="tabla" class="table  table-striped-columns">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Fecha de Actividad</th>
                <th scope="col">Detalles</th>
            </tr>
        </thead>
        <div class="form-floating mb-3 my-3 d-flex">
            <input type="search" class="form-control" id="floatingBuscar" placeholder="titulo 1" name="buscar">
            <label for="floatingBuscar">Buscar tareas</label>
            <button type="button" class="btn btn-primary" onclick="buscar()">Buscar</button>
        </div>
        <tbody>
            
            <?php if(!empty($tareas)): ?>
                <?php foreach ($tareas as $tarea): ?>
                    <tr id="resultadoBusqueda">
                        <th scope="row"><?php echo $tarea->id; ?></th>
                        <td id="titulo"><?php echo $tarea->titulo; ?></td>
                        <td id="fecha"><?php echo $tarea->fecha; ?></td>
                        <td class="d-flex gap-2">
                            <a type="button" class="btn btn-primary" href="<?php echo base_url('tareas/show/') . $tarea->id; ?>">Mostrar</a>
                            <a type="button" class="btn btn-warning" href="<?php echo base_url('tareas/edit/') . $tarea->id; ?>">Editar</a>
                            <form action="<?php echo base_url('tareas/delete/') . $tarea->id; ?>" method="POST">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
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
                    $("#tabla>tbody").empty();
                    if(data && data.length > 0){

                        // Esta función se ejecuta si la petición es exitosa
                        $.each(data, function(i, item){
                            var row = "<tr>" +
                                        "<td>" + item.id + "</td>" +
                                        "<td>" + item.titulo + "</td>" +
                                        "<td>" + item.fecha + "</td>" +
                                        '<td class="d-flex gap-2">' + '<a type="button" class="btn btn-primary" href="<?php echo base_url('tareas/show/') . $tarea->id; ?>">' + "Mostrar" + "</a>" + 
                                                '<a type="button" class="btn btn-warning" href="<?php echo base_url('tareas/edit/') . $tarea->id; ?>">' + "Editar" + "</a>" + 
                                                '<form action="<?php echo base_url('tareas/delete/') . $tarea->id; ?>" method="POST">' +
                                                '<button type="submit" class="btn btn-danger">' + "Eliminar" + "</button>" +
                                                "</form>"
                                        "</td>" +
                                    "<tr>";
                            $("#tabla>tbody").append(row);

                        });
                    }else {
                        var row = "<tr>" +
                                    '<td colspan="4" class="text-center fs-5">' + "No se encontraron tareas registradas" + "</td>" +
                                  "</tr>";
                        $("#tabla>tbody").append(row);
                    }
                    // Aquí puedes manipular la respuesta del servidor
                },
                error: function(xhr, status, error) {
                    // Esta función se ejecuta si hay un error en la petición
                    console.error('Error:', status, error);
                    $("#tabla>tbody").empty(); 
                    var row =  '<?php if(!empty($tareas)): ?>' +
                                    '<?php foreach ($tareas as $tarea): ?>' +
                                        '<tr id="resultadoBusqueda">' +
                                            '<th scope="row"><?php echo $tarea->id; ?></th>' +
                                            '<td id="titulo"><?php echo $tarea->titulo; ?></td>' +
                                            '<td id="fecha"><?php echo $tarea->fecha; ?></td>' +
                                            '<td class="d-flex gap-2">' +
                                                '<a type="button" class="btn btn-primary" href="<?php echo base_url('tareas/show/') . $tarea->id; ?>">Mostrar</a>' +
                                                '<a type="button" class="btn btn-warning" href="<?php echo base_url('tareas/edit/') . $tarea->id; ?>">Editar</a>' +
                                                '<form action="<?php echo base_url('tareas/delete/') . $tarea->id; ?>" method="POST">' +
                                                    '<button type="submit" class="btn btn-danger">Eliminar</button>' +
                                                '</form>' +
                                            '</td>' +
                                        '</tr>' +
                                    '<?php endforeach; ?>' +
                                '<?php else: ?>' +
                                    '<tr>' +
                                        '<td colspan="4" class="text-center fs-5">No se encontraron tareas registradas</td>' +
                                    '</tr>' +
                                '<?php endif; ?>';
                    $("#tabla>tbody").append(row);
                    // Aquí puedes manejar el error
                },
                complete: function(xhr, status) {
                    // Esta función se ejecuta siempre, independientemente del éxito o el error
                    console.log('Completado:', status);
                    // Esta función se ejecuta si la petición es exitosa
                }
            });
        }
    // });
</script>