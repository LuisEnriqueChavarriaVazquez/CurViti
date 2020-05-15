<?php

class objetoConexionBaseDatos{

    private const $nombreServidor="localhost";
    private const $nombreUsuario="root";
    private const $passwordDB="ramv1357";
    private const $nombreDB="Curvity";
    private $conector=null;

    public function __construct(){
        $conexionResutado=false;
        $this->conector = mysqli_connect($this->nombreServidor, $this->nombreUsuario, $this->passwordDB);
        if ( $this->conector) {
          $conexionResutado=true;
        }else{
          $conexionResutado=false;
        }
    }

    public function comprobarConexion(){
        $conexionResutado=false;
        if ( $this->conector) {
            $conexionResutado=true;
          }else{
            $conexionResutado=false;
          }

    }
   
   public function validarTextoNormal ($StringEntrada){
      if(empty($StringEntrada) || trim($StringEntrada)== ""){
         return False;
      }else{
         return True;
      }

  public function validarMail ($StringEntrada){
    if(empty($StringEntrada) || trim($StringEntrada)== ""){
       return False;
    }elseif(!filter_var($StringEntrada, FILTER_VALIDATE_EMAIL)){
       return False;
    }else{
       return True;
    }


    function validarNumeroEntero ($StringEntrada){
      if(empty($StringEntrada) || trim($StringEntrada)== ""){
         return False;
      }elseif(!preg_match("/^[0-9]+$/",$StringEntrada)){
         return False;
      }else{
         return True;
      }
   }

   public function validarNumeroFlotante ($StringEntrada){
    if(empty($StringEntrada) || trim($StringEntrada)== ""){
       return False;
    }elseif(!preg_match("/^[0-9]+(.([0-9]+))?$/",$StringEntrada)){
       return False;
    }else{
       return True;
    }
 }

   public  function validarImagen($ImagenEntrada){
    $allowed_extensions = array("jpg","jpeg","png");
    $listaValores=explode('.',$ImagenEntrada);
    if( in_array($listaValores[count($listaValores)-1],$allowed_extensions)){
       return True;
    }else{
       return False;
    }
   }
    

}


?>