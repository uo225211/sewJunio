<?php
session_start();
if (!isset($_SESSION["id"])) {
  header( "location: administracion.php" );
}
$nombre=$_SESSION['nombre'];
$apellido=$_SESSION['apellido'];
 require_once './BaseDatos/Database.php';
require_once "./BaseDatos/Queries.php";

$id     = $id_err    = "";
$_suscripcion=array();
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if(isset($_POST['persoanjesL'])){
          $_SESSION["datos"] =  Database::getInstance()->findAllPersonajes();
          $_SESSION["cabecera"]='"ID","Nombre","Apellidos","Rol","Ropa","Arma","")';
          $_SESSION["lista"]="Personajes";
          //$url

        } 
        
        if(isset($_POST['partipantesL'])){
          $_SESSION["datos"] =  Database::getInstance()->findAllParticipantes();
          $_SESSION["cabecera"]='"ID", `Nombre`, `Apellido`, `fecha_Nacimiento`, `DNI`, `Teléfono`, `posicion`, `contraseña"';
          $_SESSION["lista"]="participantes";
          //$url

        } 
        
        if(isset($_POST['suscripconesL'])){
          $_SESSION["datos"] =  Database::getInstance()->findAllSuscripcion();
          $_SESSION["cabecera"]='"ID", `Nombre`, `Apellido`, `fecha_Nacimiento`, `DNI`, `Teléfono`, `posicion`, ` `tarifa`, `casa`, `talla"';
          $_SESSION["lista"]="Suscripciones";
          //$url

        }
        


        if(isset($_POST['pagado'])){

          if (empty(trim($_POST['id']))) {
            $id_err = "¡El dni no puede estar vacío!";
          } else {
                  $_suscripcion = Database::getInstance()->findByIdSuscripción($_POST["id"]);
                if ($_suscripcion["id_suscripcion"] == -1) { 
                    $dni_err = "NO se encontro el id";                    
                } else {
                    $id= trim($_POST["id"]);
                    if (Database::getInstance()->añadirParticipanteSuscripcion($id,$suscripción['nombre'],$suscripción['apellido'],$suscripción['fecha'],
                    $suscripción['dni'],$suscripción['telefono'])){
                      $casa=$suscripción['casa'];
                      $valor=false;
                      $id_pers=Database::getInstance()->numCasa($casa)+1;
                      if ($casa=='Butrón'){
                        $valor=Database::getInstance()->añadirPersonajeB($id_pers,$id);
                      }
                      if ($casa=='Osuna'){
                        $valor=Database::getInstance()->añadirPersonajeO($id_pers,$id);
                      }
                      if ($casa=='Zevallos'){
                        $valor=Database::getInstance()->añadirPersonajeZ($id_pers,$id);
                      }
                      if ($casa=='Meneses'){
                        $valor=Database::getInstance()->añadirPersonajeM($id_pers,$id);
                      }
                      if ($valor){
                        $_SESSION["datos"] =  Database::getInstance()->findAllPersonajes();
                        $_SESSION["cabecera"]=explode(',','"ID","Nombre","Apellidos","Rol","Ropa","Arma"');
                        $_SESSION["lista"]="Personajes";
                      }
                    }
                }
            }
          }



/**
        *$pasar=array();
        *foreach($datos as $dato) { 
         * $aus=implode("@", $dato );
          *array_push($pasar,$aus);       
        *}
        *$url=implode(",",$pasar); 
        */
        header('location: listados.php');
        //.urlencode($lista)
        //."&cabecera=".urlencode($cabecera)
        //."&datos=".urlencode($url)); 
                                
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
      <a class="bar-item button " href=".suscripcion.php" onclick="media.display()">Suscrición</a>
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
        <h1 class=" xxxlarge  text-blue"><b>Bienvenid@ <?php echo $_SESSION['nombre']  ?>." "<?php echo  $apellido  ?></b></h1>
        <hr class="round round-blue">
        
      </article>
      <article  class="container" id ="pagina">
        <section class="container" id="suscripcion">
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="botones">
         
        <div class="conteiner padding">
            <label for="id">Introducir numero suscripción para asignar papel:</label>
            <input type="text" name="id" />
            <span class="error">* <?php echo $id_err;?></span>
         </div>
         <div class="center padding">
         <input type = 'submit' class='button' name = 'pagado' value = 'Añadir Personaje'/>
            <input type = 'submit' class='button' name = 'suscripconesL' value = 'Ver listado de suscripciones'/>
            </div>
        <div class="center padding">
        <input type = 'submit' class='button' name = 'persoanjesL' value = 'Ver listado de personajes'/>
        <input type = 'submit' class='button' name = 'partipantesL' value = 'Ver listado de participantes'/>
        </div>

        
          
      </form>
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
