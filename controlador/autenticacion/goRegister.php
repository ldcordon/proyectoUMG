<?php


$db = new Conexion();

$user = $db->real_escape_string($_POST['user']);
$pass = Encrypta($_POST['pass']);
$email = $db->real_escape_string($_POST['email']);
$cod_act = $user;
$sql = $db->query("SELECT usuario FROM USERS WHERE usuario = '$user' or email = '$email' LIMIT 1;");
if($db->rows($sql) == 0){

          $keyreg = md5(time()); #Esta fuciona sirver para enviarle una clave única al usuario para que logre registrarse, envia la hora acual en md5
          $link = APP_URL. '?view=activar&key=' .$keyreg.'&user='.$cod_act; # se crea el link que incluye el keyreg de activación
          # esta es la URL que devuelve de APP_URL http://localhost:8080/Ocrend/?view=activar&key=KEY

        #***** Emipieza el código para enviar correo a los usuarios que quieran registrarse
        $mail = new PHPMailer;
        $mail->CharSet = "UTF-8";

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = PHPMAILER_HOST;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = PHPMAILER_USER;                 // SMTP username
        $mail->Password = PHPMAILER_PASS;                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = PHPMAILER_PORT;                                    // TCP port to connect to

        $mail->setFrom(PHPMAILER_USER, APP_TITLE); // Quien envia el correo
        $mail->addAddress($email, $user);     // Destinatario
        #$mail->addAddress('ellen@example.com');               // Name is optional
        #$mail->addReplyTo('info@example.com', 'Information');
        #$mail->addCC('cc@example.com');
        #$mail->addBCC('bcc@example.com');

        #$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Activación de cuenta';
        $mail->Body    = EmailTemplate($user,$link);
        $mail->AltBody = 'Hola' . $user . 'Para acivar tu cuenta haz click en el siguiente link:' . $link;


              if(!$mail->send()) {
                  echo 'Message could not be sent.';
                  echo 'Mailer Error: ' . $mail->ErrorInfo;
                  $HTML = '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oh snap!</strong>'.  $mail->ErrorInfo   .'</div>';
                  } else {
                      #echo 'Message has been sent';
                      try{
                        $db->query("INSERT INTO users (usuario,pass,email,keyreg) values ('$user','$pass','$email','$keyreg');");
                        $sql_2 = $db->query("SELECT MAX(id) as ID from users;");

                        #$_SESSION['app_id'] = $db->recorrer($sql_2)[0];

                      }catch(Exception $e){
                         echo 'IMPRIMIMOS EL MENSAJE QUE QUEREMOS QUE VEAN MAS EL ERROR CACHADO EN $e '.$e;
                      }

                      $db->liberar($sql_2);


                      $HTML = '1';


                }
#*****TERMINA EL CODIGO

#$HTML = 'ok';

        }else {
          $usuario = $db->recorrer($sql)[0];
          if(strtolower($user) == strtolower($usuario)){
            $HTML = '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Oh snap!</strong> <a href="#" class="alert-link">El usuario ingresado ya existe</a> and try submitting again.
        </div>';
  }else{
    $HTML = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oh snap!</strong> <a href="#" class="alert-link">El eMail ingresado ya existe</a> and try submitting again.
</div>';

  }
}
$db->liberar($sql);
$db->Close();

echo $HTML;



 ?>
