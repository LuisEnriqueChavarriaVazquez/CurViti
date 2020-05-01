<?php
   $dirArchivoAsp=$_POST["archivoDir_aspirante"];
   $habiliAsp=$_POST["habilidades_aspirante"];
   $expAsp=$_POST["experiencia_laboral"];
   $nomIdi1Asp=$_POST["idioma_dominado_uno"];
   $porIdi1Asp=$_POST["porcenta_idioma_uno"];
   $nomIdi2Asp=$_POST["idioma_dominado_dos"];
   $porIdi2Asp=$_POST["porcenta_idioma_dos"];
   $nomIdi3Asp=$_POST["idioma_dominado_tres"];
   $porIdi3Asp=$_POST["porcenta_idioma_tres"];
   $sueldoAsp=$_POST["sueldo_ideal"];
   $contadorEleConfimados=0;
   
   function validacionNormal ($StringEntrada){
      if(empty($StringEntrada) || trim($StringEntrada)== ""){
         return False;
      }else{
         return True;
      }
   }

   function validarPorcentaje($StringEntrada){
        if(!preg_match('/[0-9]+(.([0-9]+))?/',$StringEntrada)){
            return False;
        }else{
           $valorNumerico=(float) $StringEntrada;
           if($valorNumerico > 0 && $valorNumerico<101){
              return True;
           }else{
              return False;
           }
        }
   }

   if(!validacionNormal($dirArchivoAsp)){
      $dirArchivo_error="direccion archivo invalido";
  }else{
     $contadorEleConfimados++;
  }

  if(!validacionNormal($habiliAsp)){
   $habilidades_error="Llene el apartado de habilidades";
   }else{
   $contadorEleConfimados++;
   }

   if(!validacionNormal($expAsp)){
      $experiencia_error="Llene el apartado de experiencia";
      }else{
      $contadorEleConfimados++;
      }

       if(!validacionNormal($nomIdi1Asp)){
            if(validacionNormal($porIdi1Asp)){
               $idioma1nombre_error="Escriba un idioma valido";
               $idioma1por_error="Llene el apartado anterior";
               if(!validarPorcentaje($porIdi1Asp)){
                  $idioma1por_error="Escriba un porcentaje valido";
               }
            }else{
               $contadorEleConfimados++;
            }
         }else{
            if(validacionNormal($porIdi1Asp)){
               if(!validarPorcentaje($porIdi1Asp)){
                  $idioma1nombre_error="Llene el apartado siguiente";
                  $idioma1por_error="Escriba un porcentaje valido";
               }else{
                 $contadorEleConfimados++;
               }
            }else{
               $idioma1nombre_error="Llene el apartado siguiente";
               $idioma1por_error="Escriba un porcentaje";
            }
         }


  include("signUpAspirante2.php");
?>