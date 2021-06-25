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
    
    <header class="Titulo">
      <p>El destino del Bierzo</p>
  </header> 
  <main class="row">
      <aside class="leftcolumn" id="leftcolumn">
          <nav>
              
              <ul>
                  <li><a href="index.html" >Inicio</a></li>
                  <li><a  href="historia.html" >Historia</a></li>
                  <li><a href="reglas.html" >Normas del evento </a></li>
                  <li> <a  href="sitio.html" >Localización y tiempo</a></li>
                  <li><a href="asociaciones.html" >Agradecimientos</a></li>
                  <li><a href="suscripcion.php" >Suscrición</a></li>
                  <li>  <a  href="horario.html" >Horario</a></li>
                  <li><a class="active" href="./administracion.php" >Administración</a></li>
                  <li></li>
                  <li><div class="center">
                    <img id="pause/play" src="multimedia/play.png" onclick="musica.play()" alt="pause/play">
                    <img id="sound/notSound" src="multimedia/sound.png" onclick="musica.sound()" alt="pause/play">
                    <script src="./js/musica.js"></script>
                  </div></li>
              </ul>
          </nav>
      </aside>

    <article class="rightcolumn" id ="rightcolumn">  
        <h1 class=" xxxlarge  text-blue"><b>Adminitrador</b></h1>
        <hr class="round round-blue">
        <p>Hola si no eres uncoordinador del evento no puedes pasar, pero si lo eres adelante
        y registrate</p>
        
     
      <selction  class="container" id ="pagina">
        <div class="container" id="suscripcion">
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
</div>
      </selction>
      </article>
        
    </main>
    <footer>    
      
      <a href="https://validator.w3.org/check?uri=referer">
        <img src="../multimedia/HTML5.png" alt=" HTML5 Válido!"></a>
    
      <a href=" http://jigsaw.w3.org/css-validator/check/referer ">
        <img src="../multimedia/CSS3.png" alt="CSS Válido!" width="64" height="63"></a>
    </footer> 
  
  </body>
