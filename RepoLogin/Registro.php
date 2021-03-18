<?php 
    require 'BaseDatos.php';

    //Variable Global se llenara al momento de ser ejecutado
     $message = '';

    //condiciones para los campos si no estan vacios puede agregar a la base
   //variables Locales

      if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);//consulta de datos
        $stmt->bindParam(':email', $_POST['email']);//vinculacion de datos
        //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);//Guardar variable con cifrado los datos
        //almacenamos en variable password
        $stmt->bindParam(':password', $password);
    
        
      //condicion que todo se esta ejectando b
      if ($stmt->execute()) {
        $message = 'Nuevo usuario creado con éxito';
      } else {
        $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta.';
      }
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registrarse</title>
            <link rel = "preconnect" href = "https://fonts.gstatic.com">
        <link href = "https://fonts.googleapis.com/css2? family = Noto + Sans + JP: wght @ 300 & display = swap "rel =" stylesheet ">
         <link rel="stylesheet" href="assets/css/style.css">     
    </head>
    <body>

        
        <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
        <?php endif; ?>

        <h1>Registrarse</h1>
        <span> or <a href="Registro.php">Registro</a></span>

        <form action="Registro.php" method="post">
            <input type="text" name="email" placeholder="Ingrese su correo">
            <input type="password" name="password" value="" placeholder="Ingresa tu contraseña">
            <input type="password" name="confirm_password" placeholder="Confirmar  contraseña">
            <input type="submit" value="send">


    </form>

        
    </body>
</html>