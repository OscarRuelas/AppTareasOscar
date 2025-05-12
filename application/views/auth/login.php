<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $errors = $this->session->flashdata('errors'); ?>
<?php if(isset($errors)): ?>
    <?php foreach($errors as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<div class="card">
            <h5 class="card-header text-center">Inicio de sesión</h5>
            <div class="card-body p-4">
                <form action="<?php echo base_url('Auth/login'); ?>" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingUsuario" name="usuario" placeholder="JohnDoe" required>
                        <label for="floatingUsuario"><i class="fas fa-user me-2"></i>Usuario</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingContra" name="contra" placeholder="Contraseña" required>
                        <label for="floatingContra"><i class="fas fa-lock me-2"></i>Contraseña</label>
                    </div>
                    
                    <div class="botonesAccion">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i>Ingresar
                        </button>
                        <a href="<?php echo base_url('Auth/register_form'); ?>" class="btn btn-secondary">
                            <i class="fas fa-user-plus me-2"></i>Registrar
                        </a>
                    </div>
                </form>
            </div>
        </div>

<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            max-width: 450px;
            width: 100%;
            padding: 15px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border: none;
        }
        .card-header {
            background-color: #4e73df;
            color: white;
            border-radius: 10px 10px 0 0 !important;
            padding: 1rem;
            font-weight: 600;
        }
        .form-floating label {
            color: #6c757d;
        }
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
        .botonesAccion {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            width: 48%;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }
        .btn-secondary {
            background-color: #858796;
            border-color: #858796;
            width: 48%;
        }
        .btn-secondary:hover {
            background-color: #717384;
            border-color: #717384;
        }
        .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
        }
        .password-input {
            border-left: none;
        }
    </style>