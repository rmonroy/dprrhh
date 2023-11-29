<?php 

class Database{
    //public $nombre="carlos";
    private static $host="127.0.0.1";
    private static $db='rrhh_bd';
    private static $udb='root';
    private static $pdb='';

    private static function connectOn(){
        //construimos cadena de conexion con servidor y base de datos a acceder
        $cadena = 'mysql:host='.self::$host.';dbname='. self::$db;
        //creamos objeto de conexion
        $cnx = new PDO($cadena, self::$udb, self::$pdb);
        
        return $cnx;
    }

    public static function userValidate($u, $p){
        //contruir la consulta a la bd
        
        $state="";
        if($u=="utec" && $p=="1234"){
            $state=true;
        } else {
            $state=false;
        }

        return $state;
    }

    /*
    //$conn=prepare($sql);    $conn->prepare($sql)->execute($data)
    */

    public static function adicionarUsuarios($data){
        $estado;
        $sql="INSERT INTO `usuarios`(`usuario`, `clave`, `nombre`, `correo`, `rol`, `estado`) VALUES (:usuario, :clave, :nombre, :correo, 2, 1)";

        try {
            //recibir objeto para acceder a servidor de bd
            $conn = self::connectOn();
            //preparar la consulta
            $step = $conn->prepare($sql);
            //ejecutar la consulta
            $step->execute($data);
            //si llega hasta esta linea es porque no hubo errores
            $estado=true;
        } catch (exception $ex){
            $estado=false;
        }
        return $estado;
    }

    public static function listarUsuarios(){
        $datos;
        //crear consulta
        $sql="SELECT * FROM `usuarios`";
        //recibir conexion
        $conexion = self::connectOn();
        //preparar la consulta
        $accion=$conexion->prepare($sql);
        //conyrol de errores
        try{
            //ejecutar la consulta
            $accion->execute();
            //trasladar el resultado a una variable (coleccion/array)
            $datos = $accion->fetchAll(PDO::FETCH_ASSOC);
        } catch (exception $ex) {
            $datos=1;
        }
        //retornando el resultado
        return $datos;
    }





}

//$objnombre = new Database;

//echo $objnombre->$nombre;

?>