<?php include(HTML_DIR .'secciones/header.php') ; ?>


<div class="alert alert-dismissible alert-danger">
<h4>Error</h4>
  <p>No se puede procesar esta solicitud.<a class="link" href="?view=index" class="alert-link">Inicio</a></p>
  <div><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Iniciar Sesion</button>

</div>
<?php
 include(HTML_DIR . '/login.html');
?>
