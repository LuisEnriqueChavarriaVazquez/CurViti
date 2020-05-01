<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
signUpAspirante.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>
<?php
  if(!isset($dirArchivoAsp)){
    $dirArchivoAsp="";
  }
    
  if(!isset($habiliAsp)){
    $habiliAsp="";
  }

  if(!isset($expAsp)){
    $expAsp="";
  }

  if(!isset($nomIdi1Asp)){
    $nomIdi1Asp="";
  }

  if(!isset($porIdi1Asp)){
    $porIdi1Asp="";
  }

  if(!isset($nomIdi2Asp)){
    $nomIdi2Asp="";
  }

  if(!isset($porIdi2Asp)){
    $porIdi2Asp="";
  }

  if(!isset($nomIdi3Asp)){
    $nomIdi3Asp="";
  }

  if(!isset($porIdi3Asp)){
    $porIdi3Asp="";
  }

  if(!isset($sueldoAsp)){
    $sueldoAsp="";
  }


?>

<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Datos adicionales.
        </p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12" method="post" action="validarSegunParteRegistroAspirante.php" enctype="multipart/form-data">
            <div class="row">
                <!--Foto de perfil-->
                <div class="file-field input-field">
                    <div class="btn white blue-text text-darken-4">
                        <span>Foto de perfil</span>
                        <input type="file" id="archivo_aspirante" name="archivo_aspirante">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" id="archivoDir_aspirante" name="archivoDir_aspirante" 
                        value="<?php
                            echo  htmlspecialchars ($dirArchivoAsp)
                        ?>"
                        type="text">
                        <?php
                       if(isset($dirArchivo_error)){
                       echo  "<p class='white-text'>".$dirArchivo_error."</p>";
                        } ?>
                    </div>
                </div>
                <br>

                <!--Describe tus habilidades-->
                <div class="input-field col s12">
                    <textarea placeholder="Habilidades con que cuenta" id="habilidades_aspirante" name="habilidades_aspirante"  class="materialize-textarea white-text" data-length="200"><?php
                       echo  htmlspecialchars ($habiliAsp)
                    ?></textarea>
                    <label for="habilidades_aspirante">Habilidades.</label>
                    <?php
                       if(isset($habilidades_error)){
                       echo  "<p class='white-text'>".$habilidades_error."</p>";
                     } ?>
                </div>

                <div class="input-field col s12">
                    <textarea placeholder="Experiencia laboral." id="experiencia_laboral" name="experiencia_laboral" class="materialize-textarea white-text" data-length="200"><?php
                        echo  htmlspecialchars ($expAsp)
                    ?></textarea>
                    <label for="experiencia_laboral">Experiencia laboral.</label>
                    <?php
                       if(isset($experiencia_error)){
                       echo  "<p class='white-text'>".$experiencia_error."</p>";
                        } ?>
                </div>
                <!--Idiomas que domina-->
                <div class="input-field col s6">
                    <input placeholder="Idioma aprendido." id="idioma_dominado_uno" name="idioma_dominado_uno"
                     value="<?php
                        echo  htmlspecialchars ($nomIdi1Asp)
                     ?>" 
                     type="text" class="validate white-text truncate">
                    <label for="idioma_dominado_uno">(Opcional) Idioma 1.</label>
                    <?php
                       if(isset($idioma1nombre_error)){
                       echo  "<p class='white-text'>".$idioma1nombre_error."</p>";
                        } ?>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Porcentaje." id="porcenta_idioma_uno" name="porcenta_idioma_uno"
                    value="<?php
                        echo  htmlspecialchars ($porIdi1Asp)
                     ?>"
                     type="text" class="validate white-text">
                    <label for="porcenta_idioma_uno">% Idioma.</label>
                    <?php
                       if(isset($idioma1por_error)){
                       echo  "<p class='white-text'>".$idioma1por_error."</p>";
                        } ?>
                </div>

                <div class="input-field col s6">
                    <input placeholder="Idioma aprendido." id="idioma_dominado_dos"  name="idioma_dominado_dos" 
                    value="<?php
                        echo  htmlspecialchars ($nomIdi2Asp)
                     ?>"
                    type="text" class="validate white-text truncate">
                    <label for="idioma_dominado_dos">(Opcional) Idioma 2.</label>
                    <?php
                       if(isset($idioma2nombre_error)){
                       echo  "<p class='white-text'>".$idioma2nombre_error."</p>";
                        } ?>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Porcentaje." id="porcenta_idioma_dos" name="porcenta_idioma_dos" 
                    value="<?php
                        echo  htmlspecialchars ($porIdi2Asp)
                     ?>"
                    type="text" class="validate white-text">
                    <label for="porcenta_idioma_dos">% Idioma.</label>
                    <?php
                       if(isset($idioma2por_error)){
                       echo  "<p class='white-text'>".$idioma2por_error."</p>";
                        } ?>
                </div>

                <div class="input-field col s6">
                    <input placeholder="Idioma aprendido." id="idioma_dominado_tres" name="idioma_dominado_tres"
                    value="<?php
                        echo  htmlspecialchars ($nomIdi3Asp)
                     ?>"
                    type="text" class="validate white-text truncate">
                    <label for="idioma_dominado_tres">(Opcional) Idioma 3.</label>
                    <?php
                       if(isset($idioma3nombre_error)){
                       echo  "<p class='white-text'>".$idioma3nombre_error."</p>";
                        } ?>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Porcentaje." id="porcenta_idioma_tres" name="porcenta_idioma_tres"
                    value="<?php
                        echo  htmlspecialchars ($porIdi3Asp)
                     ?>"
                     type="text" class="validate white-text">
                    <label for="porcenta_idioma_tres">% Idioma.</label>
                    <?php
                       if(isset($idioma3por_error)){
                       echo  "<p class='white-text'>".$idioma3por_error."</p>";
                        } ?>
                </div>

                <!--Sueldo ideal-->
                <div class="input-field col s12">
                    <input placeholder="Ejemplo 30500" id="sueldo_ideal" name="sueldo_ideal"
                    value="<?php
                        echo  htmlspecialchars ($sueldoAsp)
                     ?>"
                     type="text" class="validate white-text truncate">
                    <label for="sueldo_ideal">Sueldo ideal.</label>
                    <?php
                       if(isset($sueldo_error)){
                       echo  "<p class='white-text'>".$sueldo_error."</p>";
                        } ?>
                </div>
            </div>
    </div>
    <a><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Siguiente.</button></a>
    </form>
</div>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>