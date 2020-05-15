<?php

   class Empresa extends  objetoConexionBaseDatos{
       public $nombre;
       public $razonSocial;
       public $direccion;
       public $tipo;
       public $telefono;
       public $direccionWeb;
       public $facebookEmpresa;
       public $skypeEmpresa;
       public $twitterEmpresa;

       public function __construct($nombreEntrada,$razonSocialEntrada,$direccionEntrada,$tipoEntrada,$telefonoEntrada,$direccionWebEntrada,$facebokEmpresaEntrada,$skypeEmpresaEntrada,$twitterEmpresaEntrada){
            $this->nombre=$nombreEntrada;
            $this->razonSocial=$razonSocialEntrada;
            $this->direccion=$direccionEntrada;
            $this->tipo=$tipoEntrada;
            $this->telefono=$telefonoEntrada;
            $this->direccionWeb=$direccionEntrada;
            $this->facebookEmpresa=$facebokEmpresaEntrada;
            $this->skypeEmpresa=$skypeEmpresaEntrada;
            $this->twitterEmpresa=$skypeEmpresaEntrada;
       }

       public function setNombre($StringEntrada){
             $this->nombre=$StringEntrada;
       }

       public function getNombre(){
           return $this->nombre;
       }

       public function setRazonSocial($StringEntrada){
        $this->razonSocial=$StringEntrada;
      }    

        public function getRazonSocial(){
        return $this->razonSocial;
       }
       
       public function setRazonSocial($StringEntrada){
        $this->razonSocial=$StringEntrada;
      }    

        public function getRazonSocial(){
        return $this->razonSocial;
       }

       public function setDireccion($StringEntrada){
        $this->direccion=$StringEntrada;
      }    

        public function getDireccion(){
          return $this->direccion;
       }

       public function setTipo($StringEntrada){
        $this->tipo=$StringEntrada;
      }    

        public function getTipo(){
         return $this->tipo;
       }

       public function setTelefono($StringEntrada){
           $this->telefono=$StringEntrada;
       }

       public function getTelefono(){
           return $this->telefono;
       }

       public function setDireccionWeb($StringEntrada)){
           $this->direccionWeb=$StringEntrada;
       }
       
       public function getDireccionWeb(){
           return $this->direccionWeb;
       }

       public function setFacebookEmpresa($StringEntrada){
           $this->facebookEmpresa=$StringEntrada;
       }

       public function getFacebooKEmpresa(){
           return $this->facebookEmpresa;
       }

       public function setSkypeEmpresa($StrinEntrada){
           $this->skypeEmpresa=$StrinEntrada;
       }

       public function getSkypeEmpresa(){
           return $this->skypeEmpresa;
       }
       
       public function setTwitterEmpresa($StringEntrada){
           $this->twitterEmpresa;
       }

       
   }

?>