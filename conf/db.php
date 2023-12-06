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
                
        $states=0;
        //usamos funcion para traer la lista de usuarios
        $objusr = self::getUser($u, $p);
        //1 - usuario y passw correctos y es activo estado
        //2 - usuario y passw correctos y es inactivo estado
        //3 - usuario correctos y pssw incorrecto
        //0 - usuario no existe

        foreach ( $objusr as $datos) {
            if($datos['usuario'] == $u) {
                if($datos['clave'] == $p) {
                    if($datos['estado'] == 1){
                        $states=1;
                        
                    } else {
                        $states=2;
                        
                    }

                } else {
                    $states=3;
                }
            }
        }
        return $states;
    }

    public static function getUser($u, $p){
        $datos;
        //crear consulta
        $sql="SELECT * FROM `usuarios` WHERE `usuario`= :usr and `clave`=:psw";
        //recibir conexion
        $conexion = self::connectOn();
        //preparar la consulta
        $accion=$conexion->prepare($sql);
        //asignar parametros individuales BindParam
        $accion->bindParam(':usr', $u);
        $accion->bindParam(':psw', $p);
        //control de errores
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