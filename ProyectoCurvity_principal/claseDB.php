<?php
class objetoConexionBaseDatos {
    public $nombreServer="localhost";
    public $nombreUsuario="root";
    public $passwordDB="ramv1357";
    public $nombreDB="Curvity";
    public $conector=null;
     
    public function __construct(){
         try{
            $this->conector = new mysqli($this->nombreServer,$this->nombreUsuario,$this->passwordDB,$this->nombreDB);
            return true;
         }catch(Exception $e){
            return false;
         }
    }

    public function comprobarConexion(){
        $conexionResutado=false;
        if($this->conector->connect_error) {
         $conexionResutado=false;
       }else{
         $conexionResutado=true;
       }
     return $conexionResutado;
    }
   
   public function validarTextoNormal ($StringEntrada){
      if(empty($StringEntrada) || trim($StringEntrada)== ""){
         return False;
      }else{
         return True;
      }
   }

  public function validarMail ($StringEntrada){
    if(empty($StringEntrada) || trim($StringEntrada)== ""){
       return False;
    }elseif(!filter_var($StringEntrada, FILTER_VALIDATE_EMAIL)){
       return False;
    }else{
       return True;
    }
   }


   public function validarNumeroEntero ($StringEntrada){
      if(empty($StringEntrada) || trim($StringEntrada)== ""){
         return False;
      }elseif(!preg_match("/^[0-9]+$/",$StringEntrada)){
         return False;
      }else{
         return True;
      }
   }

  public  function validarNumeroFlotante ($StringEntrada){
    if(empty($StringEntrada) || trim($StringEntrada)== ""){
       return False;
    }elseif(!preg_match("/^[0-9]+(.([0-9]+))?$/",$StringEntrada)){
       return False;
    }else{
       return True;
    }
 }

 public function validarImagen($ImagenEntrada){
    $allowed_extensions = array("jpg","jpeg","png");
    $listaValores=explode('.',$ImagenEntrada);
    if( in_array($listaValores[count($listaValores)-1],$allowed_extensions)){
       return True;
    }else{
       return False;
    }
   }

   public function elementoRepetido($NombreTabla,$NombreAtributo,$NombreElemento){
      $sqlSentence="select * from ".$NombreTabla. " where ".$NombreAtributo."=".$NombreElemento;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         return true;
      }else{
         return false;
      }
   }
    
}
?>