<?php
require_once('../../conf/config.php');
require_once('../../conf/db.php');

//validar sesion de servidor en esta pagina
//acceder a las sesiones del servidor
session_start();
$nom="";
//validar si no existe la sesion regresar a login
if(!isset($_SESSION['UsNm'])) {
    $urlDir = 'Location: ' . Base::url() . 'login.php';
    header($urlDir);
} else {
    //validar si el rol no es 1 regresar a index
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

<div class="container-md text-center p3 m3">
    <div class="container-sm">
        <div class="row p-3">
            <div class="col">
                <h1>Lista de usuarios</h1>
            </div>
        </div>
        <div class="row mt-2 mb-5">
            <div class="col">
                <a href="<?php echo Base::url(); ?>app/usuarios/registrar.php">
                    <button class="btn btn-success">  Agregar usuario  </button>
                </a>
            </div>
        </div>
        <div class="row py-3">
            <div class="col">
                <div class="input-group mb-3">                    
                    <input type="text" class="form-control" placeholder="Nombre de usuarios">
                    <button class="btn btn-success" name="btn-buscar" type="submit">Buscar</button>
                </div>
            </div>
        </div>
        <div class="row p-3 text-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>usuario</th>
                        <th>correo</th>
                        <th>estado</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        //try para imprimir cada usurio registrado
                        try{
                            $data = Database::listarUsuarios();
                            if($data!=1){

                                foreach ($data as $user){
                                //imprimir filas de datos
                                    echo '<tr>';
                                    echo '   <td>' . $user['usuario'] . '</td>';
                                    echo '   <td>' . $user['correo'] . '</td>';
                                    if($user['estado']==1){
                                        echo '<td><span class="text-success">Activo</span></td>';
                                    } else {
                                        echo '<td><span class="text-danger">Inactivo</span></td>';
                                    }
                                    
                                    echo '   <td> <a href="">editar</a> | <a href="">detalles</a></td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr> <td colspan="4"> No existen datos para mostrar </td>  </tr>';
                            }
                        } catch (exception $ex){
                            echo '<tr> <td colspan="4">Operacion no valida, intente mas tarde </td>  </tr>';
                        }

                    ?>                   
                    
                </tbody>
            </table>
        </div>
    </div>

</div>


<?php require('../template/footer.php'); ?>