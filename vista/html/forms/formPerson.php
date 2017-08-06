<?php include(HTML_DIR .'secciones/header.php') ; ?>
<?php include(HTML_DIR .'secciones/top_nav.php') ; ?>








<!--  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu</span>-->

<!--  <script>
  function openNav() {
      document.getElementById("mySidenav").style.display = "block";
  }

  function closeNav() {
      document.getElementById("mySidenav").style.display = "none";
  }
</script>  -->



  <div class="span10  ">
  		<div class="">
  			<i class="icon-shopping-cart"></i> </div>
  			<ul class="breadcrumb">
  			<li><a href="#">Home</a></li>
  			<li class="active">Persona</li>
  			</ul>
</div>




<body>


<div>
<form class="form-horizontal" action="?view=person&mode=add" method="POST">

  <div class="form-group">
      <label class="control-label col-xs-5">IdUsuario:</label>
      <div class="col-xs-5">
          <input type="text" class="form-control input-sm"  placeholder="Usuario" name="idusuario" required autofocus>
      </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-5">Nombre:</label>
            <div class="col-xs-5">
                <input type="text" class="form-control input-sm" placeholder="Nombre" name="nombre"  required >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-5">Password:</label>
            <div class="col-xs-5">
                <input type="password" class="form-control input-sm " id="inputPassword" placeholder="password" name="pass1" required>
            </div>
        </div>

  <div class="form-group" >
      <label class="control-label col-xs-5">Email:</label>
      <div class="col-xs-5">
          <input type="email" class="form-control input-sm" id="inputEmail" placeholder="Email" name="email" required>
      </div>
  </div>

  <div class="form-group">
      <div class="col-xs-offset-5 col-xs-5">
          <input type="submit" class="btn btn-primary" >
          <input type="reset" class="btn btn-default" >

      </div>
  </div>
  <?php
  if(isset($_GET['success'])) {
    echo '<div class="alert alert-dismissible alert-success">
      <strong>Completado!</strong> El registro fue exitoso.
    </div>';
  }

  if(isset($_GET['error'])) {
    if($_GET['error'] == 1) {
      echo '<div class="alert alert-dismissible alert-danger">
        <strong>Error!</strong></strong> El registro no fue exitoso
      </div>';
    }  if($_GET['error'] == 2) {
      echo '<div class="alert alert-dismissible alert-danger">
        <strong>Error!</strong></strong>El usuario o correo ya existen.
      </div>';
    }
  }
  ?>

  </form>

<!--
<form class="form-horizontal" action="?view=person&mode=add" method="POST">
    <div class="form-group" >
        <label class="control-label col-xs-5">Email:</label>
        <div class="col-xs-5">
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="correo" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-5">Password:</label>
        <div class="col-xs-5">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="pass1" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-5">Confirmar Password:</label>
        <div class="col-xs-5">
            <input type="password" class="form-control" placeholder="Confirmar Password" name="pass2" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-5">Nombre:</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-5">Apellido:</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-5" >Telefono:</label>
        <div class="col-xs-5">
            <input type="tel" class="form-control" placeholder="Telefono" name="telefono" required>
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-xs-5" >Fecha Nacimiento:</label>
        <div class="col-xs-5">

            <div class='col-xs-8 form-group'>
            <div class="input-group date" id='datetimepicker10'>
            <input type="text" class="form-control" value="" readonly placeholder="Fecha Nacimiento" name="fecha_nac" required>
             <span class="input-group-addon">
                 <i class="glyphicon glyphicon-calendar">
                 </i>
              </span>
            </div>
            </div>

        </div>
        <script type="text/javascript">
        $(function () {
            $('#datetimepicker10').datepicker({

                todayHighlight: true

            });
        });
        </script>
    </div>
    <input type="hidden" name="registro" value="2"/>
    <div class="form-group">
        <label class="control-label col-xs-5">Dirección:</label>
        <div class="col-xs-5">
            <textarea rows="3" class="form-control" placeholder="Dirección" name="direccion" required></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-5 col-xs-5">
            <input type="submit" class="btn btn-primary" >
            <input type="reset" class="btn btn-default" >

        </div>
    </div>


</form>   -->

</div>







    <!--<script src="https://code.jquery.com/jquery.js"></script>-->
  <script src="estilos/js/bootstrap.min.js"></script>
  <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>




  </body>
</html>
