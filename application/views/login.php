
<div class="panel panel-default text-center">
    <div class="panel-heading h3 row">Bienvenido a E-Tickets</div>
    <div class='container'>
        <div class='row'>
            <div class='col-md-6'>
                <div class="panel-body">
                    <h2>¿Eres nuevo? Regístrate</h2>
                    <form class="form-horizontal" role="form" action="validation.php" method="post" name="form">
                        <div class="form-group">
                            <label for="username" class="col-sm-4 control-label">Nombre</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-4 control-label">Apellido</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-4 control-label">Correo electrónico</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-4 control-label">Nombre de usuario</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-4 control-label">Contraseña</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-4 control-label">Confirmar contraseña</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-7">
                                <button type="submit" class="btn btn-success">Registrarse</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class='col-md-6'>
                <div class="panel-body">
                    <h2>Inicio de sesión</h2>
                    <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>login/validate" method="post" name="form">
                        <div class="form-group">
                            <label for="user" class="col-sm-4 control-label">Nombre de usuario</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-4 control-label">Contraseña</label>
                            <div class="col-sm-4">
                                <input type="pass" class="form-control" id="pass" name="pass" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-7">
                                <button type="submit" class="btn btn-success">Iniciar sesión</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>