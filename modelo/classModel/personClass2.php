<?php

class doPersona{

  private $idusuario;
  private $nombre;
  private $password;
  private $correo;


public function __construct(){


   $this->idusuario = $_POST['idusuario'];
   $this->nombre = $_POST['nombre'];
   $this->password = $_POST['pass1'];
   $this->correo = $_POST['email'];

}



public function add(){
$this->db = new Conexion();

  $this->sql2 = $this->db->query("SELECT id FROM persona2 WHERE correo='$this->correo' LIMIT 1;");

   $this->num = $this->db->rows($this->sql2);
      if($this->num == 0){
$this->db->liberar($this->sql2);
        #$this->db->query("INSERT INTO persona2 (idusuario,nombre,password,correo) VALUES ('$this->idusuario','$this->nombre','$this->password','$this->correo');");
         #$this->db->query($this->sql);
        #header('location: ?view=person&mode=add&success=true&id='.$this->num.'');

        echo $this->idusuario;
        echo '</br>';
        echo $this->nombre;
        echo '</br>';
        echo $this->password;
        echo '</br>';
        echo $this->correo;



}else{
  header('location: ?view=person&mode=add&error=,true&id='.$this->num.'');
}

}




/*public function add(){
  $idusuario = $_POST['idusuario'];
$nombre = $_POST['nombre'];
$password = $_POST['pass1'];
$correo = $_POST['correo'];




echo $idusuario;
echo '</br>';
echo $nombre;
echo '</br>';
echo $password;
echo '</br>';
echo $correo;

}*/


}



 ?>
