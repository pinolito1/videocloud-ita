<?php

  require 'conexion.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Se creó el usuario correctamente';
    } else {
      $message = 'Ocurrió un error';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/estilos.css">
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
  <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Registro</h3>
                    <form action="home.php" method="POST">
                        <div class="form-group">
                            <input name= "email" type="text" class="form-control" placeholder="Ingrese su email">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Ingrese una contraseña">
                        </div>
                        <div class="form-group">
                            <input name="confirm_password" type="password" class="form-control" placeholder="Repetir contraseña">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Registrarme" />
                        </div>
                        <div class="form-group">
                            <a href="login.php">¿Ya te registraste? Haz click aqui</a>
                        </div>
                    </form>
                </div>
</div>
</div>
</body>
</html>