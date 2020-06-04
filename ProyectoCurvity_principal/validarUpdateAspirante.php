<?php
   require('claseAspirante.php');
   include_once 'includes/user.php';
   include_once 'includes/user_session.php';
   include 'includes/Conexion.php';

   $userSession = new UserSession();
   $user = new User();

   $nombreAs=$_POST["nombre_aspirante"];
   $apelPatAs=$_POST["apellido_paterno"];
   $apelMatAs=$_POST["apellido_materno"];
   $mailAs=$_POST["mail"];
   $passwordAs=$_POST["password"];
   $fechaNacAs=$_POST["fecha_nac"];
   $escuelaAs=$_POST["alama_mater"];
   $nivelAcAs=$_POST["nivel_acad"];
   $direccionAs=$_POST["direccion_aspirante"];
   $facebookAs=$_POST["facebook"];
   $skypeAs=$_POST["skype"];
   $twitterAs=$_POST["twitter"];
   $habiliAsp=$_POST["habilidades_aspirante"];
   $expAsp=$_POST["experiencia_laboral"];
   $cantidadIdiomasAsp=$_POST["cantidad_de_idiomas"];
   $idiomasEspAsp=$_POST["idiomas_domina"];
   $sueldoAsp=$_POST["sueldo_ideal"];
   //$nombreImagenPerfilAsp=$_FILES["archivo_aspirante"]["name"];
   $contadorEleConfimados=0;
  
 function validacionNormal ($StringEntrada){
   if(empty($StringEntrada) || trim($StringEntrada)== ""){
      return False;
   }else{
      return True;
   }
}
function validacionImagen($ImagenEntrada){
    $allowed_extensions = array("jpg","jpeg","png");
    $listaValores=explode('.',$ImagenEntrada);
    if( in_array($listaValores[count($listaValores)-1],$allowed_extensions)){
       return True;
    }else{
       return False;
    }
   }
 
 
    function validacionNumeroEntero ($StringEntrada){
       if(trim($StringEntrada)== ""){
          return False;
       }elseif(!preg_match("/^[0-9]+$/",$StringEntrada)){
          return False;
       }else{
          return True;
       }
    }
 
 
    function validacionSueldo ($StringEntrada){
       if(empty($StringEntrada) || trim($StringEntrada)== ""){
          return False;
       }elseif(!preg_match("/^[0-9]+(.([0-9]+))?$/",$StringEntrada)){
          return False;
       }else{
          return True;
       }
    }
 
   /* if(!validacionImagen($nombreImagenPerfilAsp)){
       $dirArchivo_error="Seleccione una imagen";
    }else{
      $contadorEleConfimados++;
   }*/
 
 
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
 
      if(!validacionNumeroEntero($cantidadIdiomasAsp)){
       $cantidadIdiomas_error="Escriba un numero valido";
      }else{
       $contadorEleConfimados++;
      }
 
      if(!validacionNormal($idiomasEspAsp)){
       $idiomasEsp_error="Llene el apartado";
       }else{
       $contadorEleConfimados++;
       }
 
        if(!validacionSueldo($sueldoAsp)){
           $sueldo_error="De un sueldo real";
        }else{
          $contadorEleConfimados++;
        }   
 

function validacionMail ($StringEntrada){
   if(empty($StringEntrada) || trim($StringEntrada)== ""){
      return False;
   }elseif(!filter_var($StringEntrada, FILTER_VALIDATE_EMAIL)){
      return False;
   }else{
      return True;
   }
}

function validacionTel ($StringEntrada){
   if(empty($StringEntrada) || trim($StringEntrada)== ""){
      return False;
   }elseif(!preg_match("/^[0-9]+$/",$StringEntrada)){
      return False;
   }else{
      return True;
   }
}


   if(!validacionNormal($nombreAs)){
       $Nombre_error="Nombre invalido";
   }else{
      $contadorEleConfimados++;
   }

   if(!validacionNormal($apelPatAs)){
      $apPaterno_error="Apellido Paterno invalido";  
  }else{
   $contadorEleConfimados++;
  }

  if(!validacionNormal($apelMatAs)){
      $apMaterno_error="Apellido Materno invalido";
  }else{
   $contadorEleConfimados++;
  }

  if(!validacionNormal($mailAs)){
   $mail_error="Correo invalido";
}else{
   $contadorEleConfimados++;
}

if(!validacionNormal($passwordAs)){
   $password_error="Password invalida";
}else{
   $contadorEleConfimados++;
}

if(!validacionNormal($fechaNacAs)){
   $fecha_error="Fecha nacimiento invalida";
}else{
   $contadorEleConfimados++;
}


if(!validacionNormal($escuelaAs)){
   $escuela_error="Escuela invalida";
}else{
   $contadorEleConfimados++;
}

if(!validacionNormal($nivelAcAs)){
   $nivelAcad_error="Nivel Acad&eacute;mico invalido";
}else{
   $contadorEleConfimados++;
}

if(!validacionNormal($direccionAs)){
   $direccion_error="Diecci&oacute;n invalida ";
}else{
   $contadorEleConfimados++;
}

/*if(!validacionTel($telAs)){
   $tel_error="Tel&eacute;fono invalido";
}else{
   $contadorEleConfimados++;
}*/

   if($contadorEleConfimados==14){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Curvity";

      $_SESSION["nombreAs"]=$nombreAs;
      $_SESSION["apPatAs"]=$apelPatAs;
      $_SESSION["apMatAs"]=$apelMatAs;
      $_SESSION["mailAs"]=$mailAs;
      $_SESSION["passwordAs"]=$passwordAs;
      $_SESSION["fechaNacAs"]=$fechaNacAs;
      $_SESSION["escuelaAs"]=$escuelaAs;
      if($nivelAcAs=="1"){
         $_SESSION["nivelAcAs"]="UNIVERSIDAD";
      }elseif($nivelAcAs=="2"){
         $_SESSION["nivelAcAs"]="CARRERA T&Eacute;CNICA";
      }elseif($nivelAcAs=="3"){
         $_SESSION["nivelAcAs"]="PREPARATORIA";
      }elseif($nivelAcAs=="4"){
         $_SESSION["nivelAcAs"]="SECUNDARIA";
      }
      
      $_SESSION["direccionAs"]=$direccionAs;
      //$_SESSION["telAs"]=$telAs;
      
      if(validacionNormal( $facebookAs)){
        $_SESSION["facebookAs"]=$facebookAs;
      }
      if(validacionNormal($skypeAs)){
         $_SESSION["skypeAs"]=$skypeAs;
      }
      if(validacionNormal($twitterAs)){
          $_SESSION["twitterAs"]=$twitterAs;
      }
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
         include("errorPagina.php");
      }else{
         $user->setUser($userSession->getCurrentUser());
         $dato=$user->getCorreo();
         $c=new conectar();
         $conexion=$c->conexion();
     
         $aspiranteObje=new Aspirante($_SESSION["nombreAs"],$_SESSION["passwordAs"],
         $_SESSION["apPatAs"],$_SESSION["apMatAs"],$_SESSION["fechaNacAs"],
         $expAsp,$sueldoAsp,$_SESSION["direccionAs"],$_SESSION["nivelAcAs"],$_SESSION["escuelaAs"],
         $habiliAsp,$_SESSION["mailAs"],$_SESSION["telAs"],$cantidadIdiomasAsp,$idiomasEspAsp);
         $fileFoto=addslashes(file_get_contents($_FILES["archivo_aspirante"]["tmp_name"]));
         $nombre=$aspiranteObje->get_nombre();
         $sql = "UPDATE Aspirante SET 
         Nombre ='$nombre', 
         ApellidoPat = 'Uriostegui' 
         WHERE CorreoElec = '$dato'";

         $result=mysqli_query($conexion,$sql);

        /* $sqlCeldas= "insert into Aspirante (IDAspirante,Nombre,Contra,ApellidoPat,ApellidoMat,
         SueldoDeseado,Direccion,Escuela,NivelAcademico,CorreoElec,ResumenExpPrevLab,ResumenHab,
         numeroIdiomas,detallesIdiomas,FotoPerfil";
         

         $sqlValores=" values('".$aspiranteObje->generarIdentificador()."','".$aspiranteObje->get_nombre()."'
         ,'".$aspiranteObje->get_password()."','".$aspiranteObje->get_apellidoPaterno()."',
         '".$aspiranteObje->get_apellidoMaterno()."','".$aspiranteObje->get_sueldoDeseado()."',
         '".$aspiranteObje->get_direccion()."','".$aspiranteObje->get_escuela()."',
         '".$aspiranteObje->get_nivelAcademico()."','".$aspiranteObje->get_correoElectronico()."',
         '".$aspiranteObje->get_resumenExperienciasLaborales()."','".$aspiranteObje->get_resumenHabilidades()."',
         ".$aspiranteObje->get_numeroIdiomas().",'".$aspiranteObje->get_detallesIdiomas()."','$fileFoto'";
         if(isset($_SESSION["facebookAs"])){
            $sqlCeldas=$sqlCeldas.",FacebookAspirante";
            $sqlValores=$sqlValores.",'".$_SESSION["facebookAs"]."'";
            $aspiranteObje->set_NombreFacebook($_SESSION["facebookAs"]);
         }

         if(isset($_SESSION["skypeAs"])){
            $sqlCeldas=$sqlCeldas.",SkypeAspirante";
            $sqlValores=$sqlValores.",'".$_SESSION["skypeAs"]."'";
            $aspiranteObje->set_NombreSkype($_SESSION["skypeAs"]);
         }

         if(isset($_SESSION["twitterAs"])){
            $sqlCeldas=$sqlCeldas.",TwitterAspirante";
            $sqlValores=$sqlValores.",'".$_SESSION["twitterAs"]."'";
            $aspiranteObje->set_NombreTwitter($_SESSION["twitterAs"]);
         }
         $sqlCeldas=$sqlCeldas.")";
         $sqlValores=$sqlValores.")";
         $sql=$sqlCeldas.$sqlValores;*/
   
         if ($conn->query($sql) === TRUE) {
            include("index_asp.php");
         } else {
           include("errorPagina.php");
         }
      }
      include("index_asp.php");
   }else{
      include("editarPerfilAspirante.php");
   }
   


?>