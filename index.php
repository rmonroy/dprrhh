<?php
session_start();
require_once('conf/config.php');
$nom="";

if(!isset($_SESSION['UsNm'])) {
    $urlDir = 'Location: ' . Base::url() . 'app/usuarios/login.php';
    header($urlDir);
} else {
    $nom = $_SESSION['UsNm'];
}

require('app/template/header.php');

require('app/template/menu.php')

?>

 <!-- inicio contenido dinamico de cada página -->
 <div class="container-lg">

<div class="row py-3">
    <div class="col-md-8">
        <div>
            <h1><?php echo $nom; ?>,  Pantalla inicial SYSRRHH</h1>
        </div>
    </div>
    <div class="col-md-4">
        <div><span><b>08</b> Empleados</span></div>
        <div><span><b>03</b> Jefes</span></div>
        <div><span><b>04</b> Áreas</span></div>
    </div>
</div>


 <!-- Inicio fila 2 (controlado por class ROW)-->
<div class="row py-3"> 
    <!-- inicio boton image 1 -->
        <div class="col-lg-3">
            <div>
                <a href="index.html">
                    <img class="img-thumbnail" src="<?php Base::imageRender('personal1.png') ?>" alt="Personal">
                </a>
            </div>
            <span><b>Talento Humano</b></span>
        </div>
        <!-- cierre boton image 1 -->
        <!-- inicio boton image 2 -->
        <div class="col-lg-3">
            <div><a href="formulario.html">
                    <img class="img-thumbnail" src="<?php Base::imageRender('personal1.png') ?>" alt="Jefaturas">
                </a>
            </div>
            <span><b>Jefaturas</b></span>
        </div>
        <!-- cierre boton image 2 -->
        <!-- inicio boton image 3 -->
        <div class="col-lg-3">
            <div>
                <a href="index.html">
                    <img class="img-thumbnail" src="<?php Base::imageRender('personal1.png') ?>" alt="Departamentos">
                </a>
            </div>
            <span><b>Áreas</b></span>
        </div>
        <!-- cierre boton image 3 -->
        <!-- inicio boton image 4 -->
        <div class="col-lg-3">
            <div>
                <a href="index.html">
                    <img class="img-thumbnail" src="<?php Base::imageRender('personal1.png') ?>" alt="Funciones">
                </a>
            </div>
            <span><b>Asignación puesto</b></span>
        </div>
        <!-- cierre boton image 4 -->
    </div>
    <!-- Cierre fila 2 (controlado por class ROW)-->
</div>
<!-- cierre contenido dinamico de cada página -->

<?php require('app/template/footer.php'); ?>
