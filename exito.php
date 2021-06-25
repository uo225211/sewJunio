<?php 
  $id = $_GET["id"];
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
                    <button onclick="musica.play()">
                    <img id="pause/play" src="multimedia/play.png"  alt="pause/play">
                  </button>
                  <button onclick="musica.sound()">
                    <img id="sound/notSound" src="multimedia/sound.png"  alt="muted/sound">
                  </button>
                    <script src="./js/musica.js"></script>
                  </div></li>
              </ul>
          </nav>
      </aside>

    <article class="rightcolumn" id ="rightcolumn">  
        <h1 class=" xxxlarge  text-blue"><b>SUSCRIPCIÓN COMPLETA</b></h1>
        <hr class="round round-blue">
        <h2>Su id es <?php echo $id ?></h2>
          <p>Por favor ingrese el dinero en la cuenta ES09-0000-0000-0000 </p>
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
</html>