<form action="<?php echo base_url('tareas/insert'); ?>" method="POST">
    <select class="form-select" name="idusuario" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingTitulo" name="titulo" placeholder="Tarea 1">
        <label for="floatingTitulo">Titulo</label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingFecha" name="fecha" placeholder="YYY-MM-DD">
        <label for="floatingFecha">fecha</label>
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextareaDescripcion" name="descripcion" style="height: 10rem"></textarea>
        <label for="floatingTextareaDescripcion">Comments</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingEstatusDisabled" name="estatus" placeholder="Asignado" value="A">
        <label for="floatingEstatusDisabled">Estatus</label>
    </div>
    <div class="botonesAccion">
        <button type="submit" class="btn btn-outline-success">Guardar</button>
        <a href="<?php echo base_url('tareas'); ?>" class="btn btn-outline-danger">Cancelar</a>
    </div>
</form>