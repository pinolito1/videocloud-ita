<?php
  session_start();

  require 'conexion.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  
  <!-- <link href="https://vjs.zencdn.net/7.2/video-js.min.css" rel="stylesheet"> -->
  <!-- <script src="https://vjs.zencdn.net/7.2/video.min.js"></script> -->

  <link rel="stylesheet" href="css/video-js.css">
  <script src="js/video.js"></script>
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
  <title>Bienvenido</title>

</head>
<body>
  <header>
       <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="home.php">Videos</a></li>
        <li><a href="registro.php">Registrarse</a></li>
        <li><a href="login.php">Iniciar Sesión</a></li>
      </ul>
    </nav>
    <h1 class="titulo">Videos grabados</h1>
  </header>

  <main>
    <div class="contenedor">
      <video class="fm-video2 video-js vjs-16-9 vjs-big-play-centered" data-setup="{}" controls id="fm-video">
        <source src="video/1.mp4" type="video/mp4">
      </video>
  
     <article>
        <h2>Videos</h2>
      <a href="trigun1.html"><img class="centrado" src="img/1.jpg" alt="Capitulo 10"></a>
      <a href="video2.html"><img class="centrado" src="img/2.jpg" alt="Capitulo 10"></a>
      <a href="video3.html"><img class="centrado" src="img/3.jpg" alt="Capitulo 10"></a>
      <a href="video4.html"><img class="centrado" src="img/4.jpg" alt="Capitulo 10"></a>
      <a href="video5.html"><img class="centrado" src="img/5.jpg" alt="Capitulo 10"></a>
      <a href="video6.html"><img class="centrado" src="img/6.jpg" alt="Capitulo 10"></a>           
      </article>
    </div>
  </main>

  <script>
    var reproductor = videojs('fm-video', {
      fluid: true
    });
  </script>
</body>
</html>
