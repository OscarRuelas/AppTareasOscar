<form action="<?php echo base_url('tareas/insert'); ?>" method="POST">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingUsuario" name="idusuario" placeholder="usuario" value="<?php echo $usuario ?>" disabled require>
        <label for="floatingidusuario">Usuario</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingTitulo" name="titulo" placeholder="Tarea 1" require>
        <label for="floatingTitulo">Titulo</label>
    </div>
    <div class="form-floating">
        <input type="date" class="form-control" id="floatingFecha" name="fecha" placeholder="YYY-MM-DD" value="<?php echo date('Y-m-d'); ?>" require>
        <label for="floatingFecha">fecha</label>
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextareaDescripcion" name="descripcion" style="height: 10rem" require></textarea>
        <label for="floatingTextareaDescripcion">Comments</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingEstatusDisabled" name="estatus" placeholder="Asignado" value="<?php echo $estatus->descripcion ?>" disabled require>
        <label for="floatingEstatusDisabled">Estatus</label>
    </div>
    <div class="botonesAccion">
        <button type="submit" class="btn btn-outline-success">Guardar</button>
        <a href="<?php echo base_url('tareas'); ?>" class="btn btn-outline-danger">Cancelar</a>
    </div>
</form>