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
        <h1 class=" xxxlarge  text-blue"><b>Bienvenid@ <?php echo $_SESSION['nombre']  ?>." "<?php echo  $apellido  ?></b></h1>
        <hr class="round round-blue">
        
  
      <section  class="container" id ="pagina">
        <div class="container" id="suscripcion">
        
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
