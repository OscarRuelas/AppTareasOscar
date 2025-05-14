<form action="<?php echo base_url('tareas/update/') . $tarea->id; ?>" method="POST">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingUsuariosDisabled" name="idusario" placeholder="usuario" value="<?php echo $usuario ?>" disabled >
        <label for="floatingUsuariosDisabled">usuario</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingTitulo" name="titulo" placeholder="Tarea 1" value="<?php echo $tarea->titulo ?>">
        <label for="floatingTitulo">Titulo</label>
    </div>
    <div class="form-floating">
        <input type="date" class="form-control" id="floatingFecha" name="fecha" placeholder="YYY-MM-DD" value="<?php echo $tarea->fecha ?>">
        <label for="floatingFecha">fecha</label>
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextareaDescripcion" name="descripcion" style="height: 10rem" ><?php echo $tarea->descripcion ?></textarea>
        <label for="floatingTextareaDescripcion">Comments</label>
    </div>
    <select class="form-select" name="estatus" aria-label="Default select example">
        <?php if(!empty($estatus)): ?>
                <?php foreach ($estatus as $item): ?>
                        <option value="<?php echo $item->id; ?>"><?php echo $item->estatus; ?></option>
                <?php endforeach; ?>
                <?php else: ?>
                        <option>No se encontraron estatus disponibles</option>
                <?php endif; ?>
    </select>
    <div class="botonesAccion">
        <button type="submit" class="btn btn-outline-success">Guardar cambios</button>
        <a href="<?php echo base_url('tareas'); ?>" class="btn btn-outline-danger">Cancelar</a>
    </div>
</form>