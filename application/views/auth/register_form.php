<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $errors = $this->session->flashdata('errors'); ?>
<?php $success = $this->session->flashdata('success'); ?>
<?php if(isset($success)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $success; ?>
    </div>
<?php endif; ?>
<?php if(isset($errors)): ?>
    <?php foreach($errors as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<div class="registro-container">
    <div class="card">
        <h5 class="card-header text-center">Registro de Usuario</h5>
        <div class="card-body p-4">
            <form action="<?php echo base_url('Auth/register'); ?>" method="POST">
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
                    <input type="password" class="form-control" id="floatingFecha" name="contra" placeholder="123">
                    <label for="floatingFecha">Contraseña</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingFecha" name="correo" placeholder="correo@correo.com">
                    <label for="floatingFecha">Correo</label>
                </div>
                <div class="botonesAccion">
                    <button type="submit" class="btn btn-outline-success">Guardar</button>
                    <a href="<?php echo base_url('Auth/login_form'); ?>" class="btn btn-outline-danger">Regresar</a>
                </div>
            </form>
        </div>
    </div>    
</div>

<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px 0;
        }
        .registro-container {
            max-width: 500px;
            width: 100%;
            padding: 15px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border: none;
        }
        .card-header {
            background-color: #28a745;
            color: white;
            border-radius: 10px 10px 0 0 !important;
            padding: 1rem;
            font-weight: 600;
        }
        .form-floating {
            margin-bottom: 1rem;
        }
        .form-floating label {
            color: #6c757d;
        }
        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
        }
        .botonesAccion {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
        }
        .btn-outline-success {
            width: 48%;
        }
        .btn-outline-success:hover {
            background-color: #28a745;
            color: white;
        }
        .btn-outline-danger {
            width: 48%;
        }
        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }
        .form-text {
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>