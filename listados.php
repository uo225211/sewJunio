<?php
session_start();
if (!isset($_SESSION["id"])) {
  header( "location: administracion.php" );
}
$cabecera=$_SESSION['cabecera'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header('location: principalA.php?nombre='.urlencode($nombre)."&apellido=".urlencode($apellido));
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
  <script src="./js/sitios.js"></script>
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
        <h1 class=" xxxlarge  text-blue"><b>Listado de <?php echo $_SESSION["lista"] ?></b></h1>
        <hr class="round round-blue">      

      <section  class="container" id ="pagina">
        <div class="center" id="suscripcion">  
        <table class="tabla">
        <thead>
        <tr>
        <?php foreach($cabecera as $cabe) { ?>
            <th ><?php echo $cabe ?> </th>
                                  
        <?php } ?>
                </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION["datos"] as $dato){?>
                <tr>
                    <?php foreach($dato as $valor){ ?>            
                    <td><?php echo $valor; ?></td>
                    <?php } ?>
                </tr>

                
            <?php } ?>
            </tbody>
        </table>
        </div>
        <div class="container" id="suscripcion"> 
            <p><p> 
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="botones">
        <input type = 'submit' class='button' name = 'persoanjesL' value = 'Volver'/>
          </form>
        
                    </div>
      </section>
      </article>
        
    </main>
    <footer>    
      
      <a href="https://validator.w3.org/check?uri=referer">
        <img src="./multimedia/HTML5.png" alt=" HTML5 Válido!"></a>
    
      <a href=" http://jigsaw.w3.org/css-validator/check/referer ">
        <img src="./multimedia/CSS3.png" alt="CSS Válido!" width="64" height="63"></a>
    </footer> 
  
  </body>
