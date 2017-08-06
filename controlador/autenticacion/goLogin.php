<?php

if(!empty($_POST['user']) and !empty($_POST['pass'])) {
  $db = new Conexion();
  $data = $db->real_escape_string($_POST['user']);
  $pass = Encrypta($_POST['pass']);
  $sql = $db->query("SELECT id,activo FROM users WHERE (usuario='$data' OR email='$data') AND pass='$pass' and activo= 1 ;");

/*if($db->recorrer($sql)[1] == 1){*/

  if( $db->rows($sql) > 0) {
      $_SESSION['app_id'] = $db->recorrer($sql)[0]; #Se crea la sesion y se le asigna el id del usuario que se autenticó, meidante uso de la funcion users.php

    /*if($_POST['sesion']) {
      ini_set('session.cookie_lifetime', time() + (60*60*24));  }*/


      echo 1;
    } else {
    echo '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>ERROR:</strong>  Las credenciales son incorrectas o tu usuario se encuentra inactivo...
    </div>';
}
  $db->liberar($sql);
  $db->close();
/*}else{
  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>ERROR:</strong> Usuario inactivo
</div>';
}*/
} else {
  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>ERROR:</strong> Todos los datos deben estar llenos.
</div>';
}






 ?>
