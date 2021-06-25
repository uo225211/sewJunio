<?php

require_once './BaseDatos/Database.php';
require_once "./BaseDatos/Queries.php";

$dni     = $nombre     = $apellidos    = "";
$dia     = $telefono   = $tarifa    = $casa = $talla    = "";
$dni_err = $nombre_err = $apellidos_err = $fecha_err = "";
$fecha= $id ="";
$telefono_err  = $tarifa_err = $casa_err = $talla_err    = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    if (empty(trim($_POST['dni']))) {
        $dni_err = "¡El dni no puede estar vacío!";
    } else {
        if (strlen($_POST['dni'])>9){
            $dni_err = "¡El dni no puede ser más de ) caracteres!";
        }
        else{
            $_suscripcion = Database::getInstance()->findByDNI($_POST["dni"]);
            if ($_suscripcion["id_suscripcion"] == -1) { 
                $dni = trim($_POST["dni"]);
            } else {
                $dni_err = "Ya se empleo es DNI";
            }
        }
    }
    if (empty(trim($_POST["nombre"]))) {
        $nombre_err = "Introduce tu nombre.";
    } else {
        $nombre = trim($_POST["nombre"]);
    }
    if (empty(trim($_POST["apellidos"]))) {
        $apellidos_err = "Introduce tu nombre.";
    } else {
        $apellidos = trim($_POST["apellidos"]);
    }
    if (empty(trim($_POST["telefono"]))) {
        $telefono_err = "Introduce tu teléfono.";
    } else {
        $telefono = trim($_POST["telefono"]);
    }
    if (empty($_POST["tarifas"])) {
        $tarifa_err = "Selecione una tarifa.";
    } else {
        $tarifa = trim($_POST["tarifas"]);
    }
    if (empty($_POST['casasL'])) {
        $casa_err = "Seleccione una casa";
    } else {        
        $_num = Database::getInstance()->numCasa($_POST["casasL"]);
        if ($_num <8) { 
            $casa = trim($_POST["casasL"]);
        } else {
            $dni_err = "Esta casa esta llena";
        }
        
    }
    if (empty(trim($_POST["fecha"]))) {
        $fecha_err = "Introduce tu fecha de nacimiento .";
    } else {
        $talla = trim($_POST["fecha"]);
    }
    if (empty(trim($_POST["talla"]))) {
        $talla_err = "Introduce tu talla.";
    } else {
        $talla = trim($_POST["talla"]);
    }

    $mensaje="";

    if (empty($dni_err) && empty($nombre_err) && empty($fecha) &&empty($apellidos_err) && empty($telefono_err) && empty($tarifa_err) && empty($casa_err) && empty($talla_err)) {
        $_num = Database::getInstance()->findByLastIdSuscripción();
        $id=$_num+1;
        if (Database::getInstance()->suscripcion($id,$nombre, $apellidos,$fecha,$dni,$telefono,$tarifa,$casa,$talla)) {
            
            header('Location: exito.php?id='.urlencode($id));
           
        } else {
            echo "Lo sentimos la suscripción ha fallado";
        }
    }
}
$casas=Database::getInstance()->numTodasCasas();
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
  <link rel="stylesheet" type="text/css" href="./estilo.css">
  </head>
  <body> 
    <audio id ="audio" src="./multimedia/fondo.mp3" preload="auto" autoplay loop></audio> 	
    
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
      <a class="bar-item button " href="../index.html" onclick="media.display()">Inicio</a>
      <a class="bar-item button " href="../historia.html" onclick="media.display()">Historia del rol en vivo</a>
      <a class="bar-item button " href="../reglas.html" onclick="media.display()">Normas del evento </a>
      <a class="bar-item button " href="../sitio.html" onclick="media.display()">Localización y tiempo</a>
      <a class="bar-item button " href="../asociaciones.html" onclick="media.display()">Agradecimientos</a>
      <a class="bar-item button " href="./suscricion,php" onclick="media.display()">Suscrición</a>
      <a class="bar-item button " href="../horario.html" onclick="media.display()">Horario</a>
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
        <section class="container" id="suscripcion">
          <h1 class=" xxxlarge  text-blue"><b>Suscripción</b></h1>
        <hr class="round round-blue">
        <p>Cuando te suscribes a este evento tendaras que rellenar los campos que se indican en 
          el formulario y cuando estes segritrado te aparecera un id y una cuenta, la donde tienes 
          que insgrasar dinero poniendo como asunto tu id.</p>
        <p>El evento esta preparado para 40 persona 8 por cada casa.Cuando el cupo se haya 
          llenada ya no se podra elegir esa casa para inscribirse.</p>
        <p>Tambien hay que seceionar una las tarifas que hay:</p>
        <ul>
            <li>Tarifa 1: Rol, vestuario y seguro: 40€</li>
            <li>Tárifa 2: Tarifa 1 más la comida: 50€</li>
          </ul>
          <p>A continuación se podra el numero libre de sitios en cada casa</p>
          <ul>
          <?php foreach($casas as $Tcasa) { ?>
            <li><?php echo $Tcasa['casa'] ?>: <?php echo $Tcasa['num'] ?>
                                  
            <?php } ?>
          </ul>
        </section>
      </article>
      <article  class="container" id ="pagina">
        <h1 class=" xxxlarge  text-blue"><b>Suscripción</b></h1>
        <hr class="round round-blue">
        <section class="container" id="suscripcion">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="suscripcion">
            <label for="dni">DNI:</label>
            <input type="text" name="dni" /> 
            <span class="error">* <?php echo $dni_err;?></span>
            <br>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" />
            <span class="error">* <?php echo $nombre_err;?></span>
            <br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" />
            <span class="error">* <?php echo $apellidos_err;?></span>
            <br>
            <label for="fecha">Fecha de nacimiento: </label>
            <input type="date" name="fecha"  min="1910-01-01" max="2006-12-31"/>
            <span class="error">* <?php echo $fecha_err;?></span>
            <br>
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" />
            <span class="error">* <?php echo $telefono_err;?></span>
           <br>
            Tarifa: 
            <input type="radio" name="tarifas" <?php if (isset($tarifa) && $tarifa=="1") echo "checked";?> value="1">Tarifa 1
            <input type="radio" name="tarifas" <?php if (isset($tarifa) && $tarifa=="2") echo "checked";?> value="2">tarifa 2
            <span class="error">* <?php echo $tarifa_err;?></span>
            <br>
            Casa: 
            <select id="casa" name="casasL">
                <option>Butrón</option>
                <option >Zevallos</option>                
                <option >Osuna</option>
                <option >Meneses</option>
            </select>
            <br>
            <label for="talla">Talla:</label>
            <input type="text" name="talla" />
            <span class="error">* <?php echo $talla_err;?></span>
            <br>
            <input class="button" type="submit" value="Suscribirse" />
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
</html>