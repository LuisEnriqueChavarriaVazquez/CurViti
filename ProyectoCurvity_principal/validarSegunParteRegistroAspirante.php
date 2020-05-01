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
      if(empty($StringEntrada) || $StringEntrada==''){
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

   function validacionSueldo ($StringEntrada){
      if(empty($StringEntrada) || trim($StringEntrada)== ""){
         return False;
      }elseif(!preg_match("/[0-9]+(.([0-9]+))?/",$StringEntrada)){
         return False;
      }else{
         return True;
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


       if(!validacionSueldo($sueldoAsp)){
          $$sueldo_error="De un suledo real";
       }else{
         $contadorEleConfimados++;
       }

        #Validacion idioma 1
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

       #Validacion idioma 2
       if(!validacionNormal($nomIdi2Asp)){
         if(validacionNormal($porIdi2Asp)){
            $idioma2nombre_error="Escriba un idioma valido";
            $idioma2por_error="Llene el apartado anterior";
            if(!validarPorcentaje($porIdi2Asp)){
               $idioma2por_error="Escriba un porcentaje valido";
            }
         }else{
            $contadorEleConfimados++;
         }
      }else{
         if(validacionNormal($porIdi2Asp)){
            if(!validarPorcentaje($porIdi2Asp)){
               $idioma2nombre_error="Llene el apartado siguiente";
               $idioma2por_error="Escriba un porcentaje valido";
            }else{
              $contadorEleConfimados++;
            }
         }else{
            $idioma2nombre_error="Llene el apartado siguiente";
            $idioma2por_error="Escriba un porcentaje";
         }
      }

       #Validacion idioma 3
       if(!validacionNormal($nomIdi3Asp)){
         if(validacionNormal($porIdi3Asp)){
            $idioma3nombre_error="Escriba un idioma valido";
            $idioma3por_error="Llene el apartado anterior";
            if(!validarPorcentaje($porIdi3Asp)){
               $idioma3por_error="Escriba un porcentaje valido";
            }
         }else{
            $contadorEleConfimados++;
         }
      }else{
         if(validacionNormal($porIdi3Asp)){
            if(!validarPorcentaje($porIdi3Asp)){
               $idioma3nombre_error="Llene el apartado siguiente";
               $idioma3por_error="Escriba un porcentaje valido";
            }else{
              $contadorEleConfimados++;
            }
         }else{
            $idioma3nombre_error="Llene el apartado siguiente";
            $idioma3por_error="Escriba un porcentaje";
         }
      }


   if($contadorEleConfimados>=4){
      
   }


  include("signUpAspirante2.php");
?>