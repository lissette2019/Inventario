<?php
        //inicializar sesion
        session_start();

        if (isset($_SESSION['user_id'])) {
            header('Location: /php-login');
        }
        require 'BaseDatos.php';

        //verificar los campos con la condicion
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');
            $records->bindParam(':email', $_POST['email']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);

            $message = '';

                //validar el usuario y si no se encuenttra vacio
            if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header("Location: /php-login");
            } else {
            $message = 'Lo siento, esas credenciales no coinciden';
            }
        }

?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Login</title>
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <link rel="stylesheet" href="assets/css/style.css">
        </head>
        <body>
            

            <?php if(!empty($message)): ?>
            <p> <?= $message ?></p>
            <?php endif; ?>

            <h1>Login</h1>
            <span>or <a href="Registro.php">Registrate</a></span>

            <form action="Login.php" method="POST">
            <input name="email" type="text" placeholder="coloca tu correo">
            <input name="password" type="password" placeholder="ingresa tu contraseña">
            <input type="submit" value="Submit">
            </form>
        </body>
    </html>
