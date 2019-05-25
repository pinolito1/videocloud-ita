<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /Camara');
  }
  require 'conexion.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /Camara");
    } else {
      $message = 'Su correo o contraseña no coinciden';
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesion</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/estilos.css">
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-2">
                    <h3>Iniciar Sesion</h3>
                    <form action="home.php" method="POST">
                        <div class="form-group">
                            <input name="email" type="text" class="form-control" placeholder="Ingrese su email">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Ingrese su contraseña">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Iniciar Sesion">
                        </div>
                        <div class="form-group">

                            <a href="#" class="ForgetPwd" value="Login">¿Olvido su contraseña?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>