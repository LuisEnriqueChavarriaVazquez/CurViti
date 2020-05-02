<?php 
  class Aspirante {
      
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $fechaNac;
    public $resumenExperienciasLaborales;
    public $sueldoDeseado;
    public $direccion;
    public $nivelAcademico;
    public $escuela;
    public $resumenHabilidades;
    public $correoElectronico;
    public $telefono;
    public $listaRedes;
    public $listaIdiomas;
   

    function __construct($nombreEntrada,$apellidoPaternoEntrada,$apellidoMaternoEntrada,$fechaNacEntrada,$resumenExperienciasLaboralesEntrada,$sueldoEntrada,$direccionEntrada,$nivelAcademicoEntrada,$escuelaEntrada,$resumenHabEntrada,$correoEntrada,$telefonoEntrada,$listaIdiomasEntrada,$listaRedesEntrada) {
       $this->nombre=$nombreEntrada;
       $this->apellidoPaterno=$apellidoPaternoEntrada;
       $this->apellidoMaterno=$apellidoMaternoEntrada;
       $this->resumenExperienciasLaborales=$resumenExperienciasLaboralesEntrada;
       $this->sueldoDeseado=$sueldoEntrada;
       $this->direccion=$direccionEntrada;
       $this->nivelAcademico=$nivelAcademicoEntrada;
       $this->escuela=$escuelaEntrada;
       $this->resumenHabilidades=$resumenHabEntrada;
       $this->correoElectronico=$correoEntrada;
       $this->telefono=$telefonoEntrada;
       $this->listaRedes=$listaRedesEntrada;
       $this->listaIdiomas=$listaIdiomasEntrada;
    }

    function obtenerVocalCercana($StringEntrada){
     $novocales=array("b","c","d","f","g","h","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z","B","C","D","F","G","H","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z");
     $stringReducido=str_replace($novocales, "", $StringEntrada);
     $vocalRetorno=substr($stringReducido,0);
     return $vocalRetorno;
    }

    function generarIdentificador(){
        $Identificador="";
        $Identificador=$Identificador.substr($this->apellidoPaterno,0);
        $Identificador=$Identificador.obtenerVocalCercana($this->apellidoPaterno);
        $Identificador=$Identificador.substr($this->apellidoMaterno,0).substr($this->nombre,0);
        $DescomposicionFecha=explode(',',$this->fechaNac);
        $yearNac=$DescomposicionFecha[1];
        $Identificador=$Identificador.substr($yearNac,-2);
        $Identificador=$Identificador.substr($this->nivelAcademico,2);
    }


  }

?>