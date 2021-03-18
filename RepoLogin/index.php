        <?php
        //inicializar sesion
        session_start();

        require 'BaseDatos.php';

        //validaciones 
        if (isset($_SESSION['user_id'])) {
            $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE id = :id');
            $records->bindParam(':id', $_SESSION['user_id']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);

            $user = null;

            if (count($results) > 0) {
            $user = $results;
            }
        }
        ?>


        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Bienvenido al Inventario</title>
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <link rel="stylesheet" href="assets/css/style.css">
        </head>
        <body>
           
            
            <?php if(!empty($user)): ?>
            <br>Bienvenido <?= $user['email']; ?>
            <br>Ha iniciado sesión correctamente
            <a href="CerrarSesion.php">
               CerrarSesion
            </a>
            <?php else: ?>
            <h1>Por favor ingresa o regístrate</h1>

            <a href="Login.php">Login</a> or
            <a href="Registro.php">Registrate</a>
            <?php endif; ?>
        </body>
        </html>
