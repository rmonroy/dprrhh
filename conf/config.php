<?php
// Logica Carlos Monroy
/*
Advertencia: los conceptos vertidos en este archivo 
responsabilidad de quien los define y de quien los copia.
No nos hacemos responbles de cualquie susceptibilidad 
al codigo abierto

*/

//clase de acceso publico
class Base{
    private static $host='http://localhost';
    private static $proy='dprrhh';
    private static $port='';
    private static $urlBase;
    private static $file='assets';

    //set a $urlBase **
    private static function defineURL(){
        self::$urlBase = self::$host;
        if(self::$port != ""){
            self::$urlBase .= ":" . self::$port;
        }
        self::$urlBase .= "/" . self::$proy . "/";
        //contruida la url base la retornamos para ser usada
        return self::$urlBase;
    }
        
    //funcion para construir url base de todo el proyecto
    public static function url(){ 
        self::$urlBase = self::defineURL();
        echo self::$urlBase;
    }

    //funcion para llamar estilos
    public static function styleRender($objFile){
        self::$urlBase = self::defineURL();
        echo self::$urlBase . self::$file . "/css/" . $objFile;
    }

    //funcion para llamar scripts
    public static function scriptRender($objFile){
        self::$urlBase = self::defineURL();
        echo self::$urlBase . self::$file . "/js/" . $objFile;
    }

    //funcion para llamar imagenes
    public static function imageRender($objFile){
        self::$urlBase = self::defineURL();
        echo self::$urlBase . self::$file . "/imgs/" . $objFile;
    }

}

?>