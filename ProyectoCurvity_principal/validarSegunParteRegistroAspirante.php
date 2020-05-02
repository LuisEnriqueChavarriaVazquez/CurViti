<?php
   if(!isset($_SESSION)){
      session_start();
   }
  
   $habiliAsp=$_POST["habilidades_aspirante"];
   $expAsp=$_POST["experiencia_laboral"];
   $nomIdi1Asp=$_POST["idioma_dominado_uno"];
   $porIdi1Asp=$_POST["porcenta_idioma_uno"];
   $nomIdi2Asp=$_POST["idioma_dominado_dos"];
   $porIdi2Asp=$_POST["porcenta_idioma_dos"];
   $nomIdi3Asp=$_POST["idioma_dominado_tres"];
   $porIdi3Asp=$_POST["porcenta_idioma_tres"];
   $sueldoAsp=$_POST["sueldo_ideal"];
   $nombreImagenPerfilAsp=$_FILES["archivo_aspirante"]["name"];
   $contadorEleConfimados=0;
   $idioma1Opc=False;
   $idioma2Opc=False;
   $idioma3Opc=False;
  
   

  function validacionImagen($ImagenEntrada){
   $allowed_extensions = array("jpg","jpeg","png");
   $listaValores=explode('.',$ImagenEntrada);
   if( in_array($listaValores[count($listaValores)-1],$allowed_extensions)){
      return True;
   }else{
      return False;
   }
  }

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

   if(!validacionImagen($nombreImagenPerfilAsp)){
      $dirArchivo_error="Seleccione una imagen";
   }else{
     $contadorEleConfimados++;
  }
 validacionImagen($nombreImagenPerfilAsp);

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
          $sueldo_error="De un suledo real";
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
               $idioma1Opc=False;
            }
         }else{
            if(validacionNormal($porIdi1Asp)){
               if(!validarPorcentaje($porIdi1Asp)){
                  $idioma1nombre_error="Llene el apartado siguiente";
                  $idioma1por_error="Escriba un porcentaje valido";
               }else{
                  $idioma1Opc=True;
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
            $idioma2Opc=False;
         }
      }else{
         if(validacionNormal($porIdi2Asp)){
            if(!validarPorcentaje($porIdi2Asp)){
               $idioma2nombre_error="Llene el apartado siguiente";
               $idioma2por_error="Escriba un porcentaje valido";
            }else{
               $idioma2Opc=True;
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
            $idioma3Opc=False;
         }
      }else{
         if(validacionNormal($porIdi3Asp)){
            if(!validarPorcentaje($porIdi3Asp)){
               $idioma3nombre_error="Llene el apartado siguiente";
               $idioma3por_error="Escriba un porcentaje valido";
            }else{
               $idioma3Opc=True;
            }
         }else{
            $idioma3nombre_error="Llene el apartado siguiente";
            $idioma3por_error="Escriba un porcentaje";
         }
      }
   
   
      
   if($contadorEleConfimados=4){
      $servername = "localhost";
      $username = "root";
      $password = "ramv1357";
      $dbname = "Curvity";

      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }else{
         $sql = "insert into Aspirante (IDAspirante,Nombre)
         values ('1','".$_SESSION["nombreAs"]."')";
   
         if ($conn->query($sql) === TRUE) {
            include("finalizarProcesoSignUp.php");
         } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
         }
      }

   }else{
      include("signUpAspirante2.php");
   }

?>