<?php
require_once('../../conf/config.php');
require_once('../../conf/db.php');

require('../template/header.php');
?>
<style type="text/css">
    body{ background-color: darkgrey; }
</style>

<div class="container-flex">
    <!-- inicio bloque login -->
    <!-- contenedor Login-->
    <div class="container w-75 mt-4 rounded shadow" style="background-color: #ffff;">
        <div class="row align-items-stretch">
            <div class="col bg-primary p-0 d-none d-lg-block col-lg-12 col-xl-6">
                <img src="<?php Base::imageRender('personal2.png'); ?>" height="100%" width="100%" alt="">
            </div>
            <div class="col p-5 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                <div class="text-center"><img src="<?php Base::imageRender('logoRH.png'); ?>" width="70px" alt="Logo Zapatito"></div>

                <h2 class="fw-bold text-center py-2">Iniciar Sesión</h2>

                <form action="login.php" method="post">
                    <div class="mb-4">
                        <div class="form-group">
                            <label for="txUser" class="form-label">Usuario: </label>
                            <input type="text" class="form-control" name="txUser" id="txUser" placeholder="Usuario" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-group">
                            <label for="txPassword" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" name="txPassword" id="txPassword" placeholder="***********" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-group">
                            <input type="checkbox" name="ckConnect" id="ckConnect" class="form-check-input">
                            <label for="Connect" class="form-check-label"> Mantenerme conectado</label>
                        </div>
                    </div>
                        <?php
                          if(isset($_POST['bn-login'])){

                            $us = $_POST['txUser'];
                            $ps = $_POST['txPassword'];

                            //llamar un metodo que autentique mi usuario 

                            if(Database::userValidate($us, $ps)){
                                //esto es de muestra
                                header('location:../../index.php');

                                //validar que el campo de texto no venga vacio
                            } else {
                                echo '<div class="d-grid">';
                                echo '<div class="alert alert-danger">usuario incorrecto</div>';
                                echo '</div>';
                            }

                          }                          

                        ?>
                    <div class="d-grid">
                        <button type="submit" name="bn-login" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                    <div class="my-3 text-center">
                        <span>¿No tienes cuenta? <a href="#">Regístrate</a></span>
                        <br>
                        <span><a href="#">Recupérar contraseña</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- final bloque login -->
</div>

<?php require('../template/footer.php'); ?>
