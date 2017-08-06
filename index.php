<?php
require('controlador/core.php');


#echo $_SESSION['app_id'];
#session_destroy();

if(isset($_GET['view'])){
  if(file_exists('controlador/controladores/' . strtolower($_GET['view']) . 'Controller.php' )) {
    include('controlador/controladores/' . strtolower($_GET['view']) . 'Controller.php' );
  }else{
    include('controlador/controladores/errorController.php');
  }

}else{
  include('controlador/controladores/indexController.php');
}
  ?>
