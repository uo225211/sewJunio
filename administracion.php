<?php

require_once './BaseDatos/Database.php';
require_once "./BaseDatos/Queries.php";
session_start();
if (isset($_SESSION["id"])) {
  $_SESSION["id"] = "location: administracion.php" ;
}

$id     = $contraseña     = "";
$id_err = $contraseña_err = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    if (empty(trim($_POST['id']))) {
        $id_err = "Introduce tu id";
    } else {
      $id = trim($_POST['id']);
    }
    if (empty(trim($_POST['contraseña']))) {
      $contraseña_err = 'Introduce tu contraseña';
  } else {
      $contraseña = trim($_POST['contraseña']);
  }
  if ( empty($contraseña_err) && empty($id_err) ) {
    if ( Database::getInstance()->login($id, $contraseña) ){
        $coor = Database::getInstance()->findByIdparticipante($id);

        // Almacenar los datos del usuario en la sesión
        $_SESSION['nombre']   = $coor["nombre"];
        $_SESSION['apellido'] = $coor["apellido"];
        $_SESSION["id"] = "location: administracion.php" ;
        header('location: principalA.php');
    } else {
        $error = 'Id o contraseña incorrectos';
    }
}
}
?>
<!DOCTYPE HTML>

<html lang="es">
  
<head>
    
<meta charset="UTF-8">
  <title>El destino del Bierzo</title>
  <meta name="description" content="Pagina del rol en vivo: Destino del Bierzo">
  <meta name="author" content="Beatriz Arbizu Ramírez">
  <meta name="keywords" content="rol,bierzo,destino, reglas, asociación">    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="stylesheet" type="text/css" href="estiloTabla.css">
  </head>
  <body>     
    <audio id ="audio" src="multimedia/fondo.mp3" preload="auto" autoplay loop></audio> 	
    
  <!-- Sidebar/menu -->
  <nav class="sidebar collapse top large padding" id="mySidebar">  
    <a href="javascript:void(0)" class="button hide-large display-topleft" id="cerrar" onclick="nave.close()">Cerrar Menu</a>  
    <div class="container">
        <h3 class="padding-64"><b>El destino </b><b>del Bierzo</b></h3>
        <div class="row-padding half">
          <img id="pause/play" src="multimedia/play.png" onclick="musica.play()" alt="pause/play">
          <img id="sound/notSound" src="multimedia/sound.png" onclick="musica.sound()" alt="pause/play">
          <script src="./js/musica.js"></script>
        </div><!-- / player -->
    </div>
    <div class="bar-block">
      <a class="bar-item button " href="index.html" onclick="media.display()">Inicio</a>
      <a class="bar-item button " href="historia.html" onclick="media.display()">Historia del rol en vivo</a>
      <a class="bar-item button " href="reglas.html" onclick="media.display()">Normas del evento </a>
      <a class="bar-item button " href="sitio.html" onclick="media.display()">Localización y tiempo</a>
      <a class="bar-item button " href="asociaciones.html" onclick="media.display()">Agradecimientos</a>
      <a class="bar-item button " href="suscripcion.php" onclick="media.display()">Suscrición</a>
      <a class="bar-item button " href="horario.html" onclick="media.display()">Horario</a>
      <a class="bar-item button " href="./administracion.php" onclick="media.display()">Administración</a>
    </div>       
  </nav>
   
  <!-- Top menu on small screens -->
    <header class="container top hide-large colorFondo xlarge padding">
      <a href="javascript:void(0)" class="button colorFondo margin-right" onclick="nave.open()">☰</a>
      <span>El destino del Bierzo</span>
    </header>
    
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="overlay hide-large" onclick="nave.close()" title="close side menu" id="myOverlay"></div>
    
    <main id="contenido" class="main">
      <article  class="container" id ="pagina">
        <h1 class=" xxxlarge  text-blue"><b>Adminitrador</b></h1>
        <hr class="round round-blue">
        <p>Hola si no eres uncoordinador del evento no puedes pasar, pero si lo eres adelante
        y registrate</p>
        
      </article>
      <article  class="container" id ="pagina">
        <section class="container" id="suscripcion">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="suscripcion">
            <label for="id">Id personal del evento:</label>
            <input type="text" name="id" /> 
            <span class="error">* <?php echo $id_err;?></span>
            <br>
            <label for="contraseña">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña" placeholder="*********">
            <span class="error"><?php echo $contraseña_err; ?></span>
          
            <input class="button" type="submit" value="Registrarse" />
            <input class="button" type="reset" class="button-clear" value="Borrar">
          </form>
        </section>
      </article>
        
    </main>
    <footer>    
      
      <a href="https://validator.w3.org/check?uri=referer">
        <img src="../multimedia/HTML5.png" alt=" HTML5 Válido!"></a>
    
      <a href=" http://jigsaw.w3.org/css-validator/check/referer ">
        <img src="../multimedia/CSS3.png" alt="CSS Válido!" width="64" height="63"></a>
    </footer> 
  
  </body>
