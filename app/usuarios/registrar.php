<?php
require_once('../../conf/config.php');
require_once('../../conf/db.php');

session_start();
$nom="";

if(!isset($_SESSION['UsNm'])) {
    $urlDir = 'Location: ' . Base::url() . 'login.php';
    header($urlDir);
} else {
    if($_SESSION['UsRol']!=1) {
        $urlDir = 'Location: ../../index.php';
        header($urlDir);
    } else {
        $nom = $_SESSION['UsNm'];
    }
}

require('../template/header.php');
require('../template/menu.php');
?>

<div class="container-md mt-3">
    <div class="row">
        <div class="col">
            <h1>Agregar nuevo usuario</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6">
            <form method="post" action="registrar.php">
                <div class="input-group p-3">
                    <span class="input-group-text">Usuario:</span>
                    <input type="text" class="form-control" name="txusr" placeholder="Ej. jperez7" required>
                </div>
                <div class="input-group p-3">
                    <span class="input-group-text">Contraseña:</span>
                    <input type="password" class="form-control" name="txpsw1" placeholder="*********" required>
                </div>
                <div class="input-group p-3">
                    <span class="input-group-text">Confirmar contraseña:</span>
                    <input type="password" class="form-control" name="txpsw2" placeholder="*********" required>
                </div>
                <div class="input-group p-3">
                    <span class="input-group-text">Nombre:</span>
                    <input type="text" class="form-control" name="txnmb" placeholder="Ej. Juan Pérez" required>
                </div>
                <div class="input-group p-3">
                    <span class="input-group-text">Correo:</span>
                    <input type="text" class="form-control" name="txmail" placeholder="Ej. jperez7@mail.es" required>
                </div>

                <?php
                    //validar accion post del formulario
                    if(isset($_POST['bn-registrar'])){
                        $usr=$_POST['txusr'];
                        $psw=$_POST['txpsw1'];
                        $psc=$_POST['txpsw2'];
                        $nmb=$_POST['txnmb'];
                        $cor=$_POST['txmail'];

                        if($psw!=$psc){
                            echo '<div class="d-grid mt-3 mb-3">';
                            echo '      <div class="alert alert-danger">Las contraseñas no coinciden</div>';
                            echo '</div>';
                        } else {
                            //:usuario, :clave, :nombre, :correo,
                            $data = [
                                'usuario'=>$usr,
                                'clave'=>$psw,
                                'nombre'=>$nmb,
                                'correo'=>$cor,
                            ];
                            if(Database::adicionarUsuarios($data)){
                                header('location:usuarios.php');
                            } else {
                                echo '<div class="d-grid mt-3 mb-3">';
                                echo '      <div class="alert alert-danger">No se pudo completar el registro</div>';
                                echo '</div>';
                            }
                        }

                    }
                ?>
                <div class="d-grid mt-5">
                    <button type="submit" name="bn-registrar" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
        
    </div>
</div>

<?php require('../template/footer.php'); ?>