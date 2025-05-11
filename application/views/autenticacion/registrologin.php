<form action="<?php echo base_url('tareas/insert'); ?>" method="POST">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingTitulo" name="usuario" placeholder="JohnDoe">
        <label for="floatingTitulo">Usuario</label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingFecha" name="nombre" placeholder="John Doe">
        <label for="floatingFecha">Nombre</label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingFecha" name="app" placeholder="Adan">
        <label for="floatingFecha">Apellido Paterno</label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingFecha" name="apm" placeholder="Mingame">
        <label for="floatingFecha">Apellido Materno</label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingFecha" name="contra" placeholder="123">
        <label for="floatingFecha">Contraseña</label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingFecha" name="correo" placeholder="correo@correo.com">
        <label for="floatingFecha">Correo</label>
    </div>
    <div class="botonesAccion">
        <button type="submit" class="btn btn-outline-success">Guardar</button>
        <a href="<?php echo base_url('tareas'); ?>" class="btn btn-outline-danger">Cancelar</a>
    </div>
</form>