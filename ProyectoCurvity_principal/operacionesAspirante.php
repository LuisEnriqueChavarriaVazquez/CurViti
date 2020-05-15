<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';
?>
<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>
<?php include 'AlmacenIncludesPHP/elementosPhp/navbars/navbarAspirante.php' ?>

<div class="content-search positionTable">
  <div class="content-table">
    <table id="table-style" class="z-depth-2 search-table">
      <thead>
        <tr class="title-table">
          <td class="title-table"></td>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><a href="operacionesAspirante.php">Mesera</a></td>
        </tr>
        <tr>
          <td><a href="operacionesAspirante.php">Ingeniero en sistemas</a></td>
        </tr>
        <tr>
          <td><a href="operacionesAspirante.php">Abogado</a></td>
        </tr>
        <tr>
          <td><a href="operacionesAspirante.php">Mesera</a></td>
        </tr>
        <tr>
          <td><a href="operacionesAspirante.php">Actor</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</nav>

<!--Cuerpo de las secciones-->
<br><br><br><br><br><br><br><br>
<h1>Bienvenido <?php echo $user->getNombre();  ?></h1>
<div class="boxSubjectsBrowser full-height backgroundInicioAspirante blue-grey lighten-5">
  <div class="row">
    <div class="col s6 m6 borderCardInicio">
      <a href="operacionesAspirante.php">
        <div class="card borderCardInicio waves-effect">
          <div class="card-image">
            <img class="roundPictures" src="https://images.unsplash.com/photo-1476231682828-37e571bc172f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60">
          </div>
          <div class="card-content">
            <p class="flow-text noLinkStyle">Empresa</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col s6 m6 borderCardInicio">
      <a href="operacionesAspirante.php">
        <div class="card borderCardInicio waves-effect">
          <div class="card-image">
            <img class="roundPictures" src="https://images.unsplash.com/photo-1476231682828-37e571bc172f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60">
          </div>
          <div class="card-content">
            <p class="flow-text noLinkStyle">Empresa</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col s6 m6 borderCardInicio">
      <a href="operacionesAspirante.php">
        <div class="card borderCardInicio waves-effect">
          <div class="card-image">
            <img class="roundPictures" src="https://images.unsplash.com/photo-1476231682828-37e571bc172f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60">
          </div>
          <div class="card-content">
            <p class="flow-text noLinkStyle">Empresa</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col s6 m6 borderCardInicio">
      <a href="operacionesAspirante.php">
        <div class="card borderCardInicio waves-effect">
          <div class="card-image">
            <img class="roundPictures" src="https://images.unsplash.com/photo-1476231682828-37e571bc172f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60">
          </div>
          <div class="card-content">
            <p class="flow-text noLinkStyle">Empresa</p>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/floatingButtons/botonHearing.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>