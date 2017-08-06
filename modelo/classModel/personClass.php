<?php




class doPersona {


protected $idusuario;
protected $nombre;
protected $password;
protected $correo;



public function __construct($idu, $nom, $pass, $co){
  $this->idusuario = $idu;
  $this->nombre  = $nom;
  $this->password = $pass;
  $this->correo = $co;

}

public function add(){
  $this->db = new Conexion();
  $this->sql2 = $this->db->query("SELECT id FROM persona2 WHERE correo='$this->correo' LIMIT 1;");
  $this->num = $this->db->rows($this->sql2);
      if($this->num == 0){
          $this->db->query("INSERT INTO persona2 (idusuario,nombre,password,correo)
            VALUES ('$this->idusuario','$this->nombre','$this->password','$this->correo');")
              ? header('location: ?view=person&mode=add&success=true') :   header('location: ?view=person&mode=add&error=,true') ;
            }else{
               header('location: ?view=person&mode=add&error=2');
            }
}





}



 ?>
