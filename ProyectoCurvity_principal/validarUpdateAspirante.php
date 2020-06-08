<?php

    require('claseAspirante.php');
    include_once 'includes/user.php';
    include_once 'includes/user_session.php';
    $userSession = new UserSession();
    $user = new User();
    if(isset($_SESSION['user'])){
        $user->setUser($userSession->getCurrentUser());
        $dato=$user->getCorreo();
        include_once 'validarUpdateAspirante.php';
    }
    $nombreAs=$_POST["nombre_aspirante"];
    $apelPatAs=$_POST["apellido_paterno"];
    $apelMatAs=$_POST["apellido_materno"];
    $mailAs=$_POST["mail"];
    $passwordAs=$_POST["password"];
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

    $contadorEleConfimados=0;
    
    function validacionNormal ($StringEntrada){
    if(empty($StringEntrada) || trim($StringEntrada)== ""){
        return False;
    }else{
        return True;
    }
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

    if(!validacionNormal($nombreAs)){
        $Nombre_error="Nombre invalido";
    }else{
        $contadorEleConfimados++;//1
    }

    if(!validacionNormal($apelPatAs)){
        $apPaterno_error="Apellido Paterno invalido";  
    }else{
    $contadorEleConfimados++;//2
    }

    if(!validacionNormal($apelMatAs)){
        $apMaterno_error="Apellido Materno invalido";
    }else{
    $contadorEleConfimados++;//3
    }

    if(!validacionNormal($mailAs)){
    $mail_error="Correo invalido";
    }else{
    $contadorEleConfimados++;//4
    }

    if(!validacionNormal($passwordAs)){
    $password_error="Password invalida";
    }else{
    $contadorEleConfimados++;//5
    }

    if(!validacionNormal($escuelaAs)){
    $escuela_error="Escuela invalida";
    }else{
    $contadorEleConfimados++;//6
    }

    if(!validacionNormal($nivelAcAs)){
    $nivelAcad_error="Nivel Acad&eacute;mico invalido";
    }else{
    $contadorEleConfimados++;//7
    }

    if(!validacionNormal($direccionAs)){
    $direccion_error="Diecci&oacute;n invalida ";
    }else{
    $contadorEleConfimados++;//8
    }
   /* function validacionImagen($img){
        $allowed_extensions = array("jpg","jpeg","png");
        $listaValores=explode('.',$img);
        if( in_array($listaValores[count($listaValores)-1],$allowed_extensions)){
           return True;
        }else{
           return False;
        }
       }*/
     
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
     
       /*if(!validacionImagen($img)){
           $dirArchivo_error="Seleccione una imagen";
        }else{
          $contadorEleConfimados++;
       }*/
     
     
       if(!validacionNormal($habiliAsp)){
        $habilidades_error="Llene el apartado de habilidades";
        }else{
        $contadorEleConfimados++;//9
        }
     
        if(!validacionNormal($expAsp)){
           $experiencia_error="Llene el apartado de experiencia";
           }else{
           $contadorEleConfimados++;//10
           }
     
          if(!validacionNumeroEntero($cantidadIdiomasAsp)){
           $cantidadIdiomas_error="Escriba un numero valido";
          }else{
           $contadorEleConfimados++;//11
          }
     
          if(!validacionNormal($idiomasEspAsp)){
           $idiomasEsp_error="Llene el apartado";
           }else{
           $contadorEleConfimados++;//12
           }
     
            if(!validacionSueldo($sueldoAsp)){
               $sueldo_error="De un sueldo real";
            }else{
              $contadorEleConfimados++;//13
            }   

    if($contadorEleConfimados==13){
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
        
        if(validacionNormal( $facebookAs)){
            $_SESSION["facebookAs"]=$facebookAs;
        }
        if(validacionNormal($skypeAs)){
            $_SESSION["skypeAs"]=$skypeAs;
        }
        if(validacionNormal($twitterAs)){
            $_SESSION["twitterAs"]=$twitterAs;
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "u253306330_curvity";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
           include("errorPagina.php");
        }else{

            $aspiranteObje=new Aspirante($_SESSION["nombreAs"],$_SESSION["passwordAs"],
            $_SESSION["apPatAs"],$_SESSION["apMatAs"],$_SESSION["fechaNacAs"],
            $expAsp,$sueldoAsp,$_SESSION["direccionAs"],$_SESSION["nivelAcAs"],$_SESSION["escuelaAs"],
            $habiliAsp,$_SESSION["mailAs"], $cantidadIdiomasAsp,$idiomasEspAsp);
            $fileFoto = base64_encode(file_get_contents($_FILES['archivo_aspirante']['tmp_name']));
            
            $nombre=$aspiranteObje->get_nombre();
            $app=$aspiranteObje->get_apellidoPaterno();
            $apm=$aspiranteObje->get_apellidomaterno();
            $pw=$aspiranteObje->get_password();
            $fec=$aspiranteObje->get_fechaNacimiento();
            $exp=$aspiranteObje->get_resumenExperienciasLaborales();
            $salario=$aspiranteObje->get_sueldoDeseado();
            $dir=$aspiranteObje->get_direccion();
            $nivel=$aspiranteObje->get_nivelAcademico();
            $esc=$aspiranteObje->get_escuela();
            $hab=$aspiranteObje->get_resumenHabilidades();
            $email=$aspiranteObje->get_correoElectronico();
            $tel=$aspiranteObje->get_telefono();
            $num_id=$aspiranteObje->get_numeroIdiomas();
            $detalles=$aspiranteObje->get_detallesIdiomas();
            $sql = "UPDATE Aspirante SET 
            Nombre ='$nombre',
            Contra='$pw',
            ApellidoPat = '$app',
            ApellidoMat='$apm',
            SueldoDeseado='$salario',
            Direccion='$dir',
            Escuela='$esc',
            NivelAcademico='$nivel',
            CorreoElec='$email',
            ResumenExpPrevLab='$exp',
            ResumenHab='$hab',
            numeroIdiomas='$num_id',
            detallesIdiomas='$detalles',
            FacebookAspirante='$facebookAs',
            SkypeAspirante='$skypeAs',
            TwitterAspirante='$twitterAs',
            FotoPerfil='$fileFoto'
            WHERE CorreoElec = '$dato'";

            $result=mysqli_query($conn,$sql);
    
            if ($conn->query($sql) === TRUE) {
                header("location:index_asp.php"); 
                die();
            } else {
              include("errorPagina.php");
            }
         }
        }else{
            include("editarPerfilAspirante.php");
         }
?>