<?php
// Database: Encapsula una instancia de la base de datos
// de forma que una única instancia sea la responsable del
// acceso, ejecución de consultas y obtención de los resultados.

require_once "Queries.php";

class Database {
    private static ?Database $instance = null;
    private mysqli $db;
    private string $servername   = 'localhost';
    private string $username = 'DBUSER2020';
    private string $password = "DBPSWD2020";
    private string $database = "sewjunio";
   
    

    private function __construct() {
        $this->db = new mysqli($this->servername, $this->username, $this->password, $this->database);
    }

    public static function getInstance(): ?Database
    {
        if (self::$instance == null)
        {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getDb(): mysqli
    {
        return $this->db;
    }


   //Suscribirse
    public function suscripcion($id,$name, $apelidos,$fecha, $dni,$telefono,$tarifa,$casa,$talla): bool
    {
        $_inserted = false;
        $objeto_DateTime = date_create_from_format('Y-m-d', $fecha);
        if ($stmt = $this->db->prepare( Queries::$QUERY_SUSCRIBIRSE )) {
            $stmt->bind_param('sssssiisi', $id,$name, $apelidos,$objeto_DateTime, $dni,$telefono,$tarifa,$casa,$talla);

            $_inserted = $stmt->execute();
            $stmt->close();
        }
        return $_inserted;
    }

    //Obtener ultimo numero de una casa
    public function login($id_participante, $contraseña): bool
    {
        $_result = false;
        if ($stmt = $this->db->prepare( Queries::$QUERY_LOGIN )) {
            $stmt->bind_param('s', $id_participante);

            if ($stmt->execute()) {
                $result = $stmt->get_result()->fetch_assoc();
                $_result = isset($result["id_participante"]) && ($contraseña==$result["contraseña"]) && ($result["posicion"]=="coordinador");
            }
            $stmt->close();
        }
        return $_result;
    }

   //Devuelve el nombre del coordinador
    public function findByIdparticipante($id_participante): array
    {
        $_participante = array();
        if ($stmt = $this->db->prepare( Queries::$QUERY_FINDBYIDPARTICIPANTE )) {
            $stmt->bind_param('s', $id_participante);

            if ($stmt->execute()) {
                $result = $stmt->get_result()->fetch_assoc();
                if (isset($result["nombre"]) && isset($result["apellido"])) {
                    $_participante = $result;
                } else {
                    $_participante["nombre"] = "Participante no encontrado";
                    $_participante["id_participante"] = -1;
                }
            }
            $stmt->close();
        }
        return $_participante;
    }


    //Devuelve una suscripción
    public function findByIdSuscripción($id_suscripcion): array
    {
        $_participante = array();
        if ($stmt = $this->db->prepare( Queries::$QUERY_FINDBYIDSUSCRIPCION )) {
            $stmt->bind_param('s', $id_suscripcion);

            if ($stmt->execute()) {
                $result = $stmt->get_result()->fetch_assoc();
                if (isset($result["nombre"]) && isset($result["apellido"])) {
                    $_participante = $result;
                } else {
                    $_participante["nombre"] = "Suscripción no encontrada";
                    $_participante["id_participante"] = -1;
                }
            }
            $stmt->close();
        }
        return $_participante;
    }
   
//Devuelve el nomre del coordinador
public function findByDNI($dni): array
{
    $_participante = array();
    if ($stmt = $this->db->prepare( Queries::$QUERY_FINDBYDNI )) {
        $stmt->bind_param('s', $dni);

        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_assoc();
            if (isset($result["id_suscripcion"])) {
                $_participante = $result;
            } else {
                $_participante["dni"] = "DNI ya empleado";
                $_participante["id_suscripcion"] = -1;
            }
        }
        $stmt->close();
    }
    return $_participante;
}

    //Devuelve el nomre del coordinador
    public function findByLastIdSuscripción(): int
    {
        $_result = 0;
        if ($stmt = $this->db->prepare( Queries::$QUERY_FINDBYLASTIDSUSCRIPCION )) {
            $stmt->execute();
            $_result = $stmt->get_result()->fetch_assoc()["num"];
            $stmt->close();

        }
        return $_result;
    }
    //Añadir a participante
    public function añadirParticipanteSuscripcion($id, $nombre, $apellido, $fecha,$dni,$telefono): bool
    {
        $_result = false;
        if ($stmt = $this->db->prepare( Queries::$QUERY_AÑADIRPARTICIPANTESUSCRIPCION )) {
            $objeto_DateTime = date_create_from_format('Y-m-d', $fecha);
            $stmt->bind_param('sssssi', $id, $nombre, $apellido, $fecha,$dni,$telefono);

            $_result = $stmt->execute();
            echo $stmt->error;
            $stmt->close();
        }
        return $_result;
    }


   //Añadir a participante casa Zevallos
   public function añadirPersonajeZ($id, $id_participante): bool
   {
       $_result = false;
       if ($stmt = $this->db->prepare( Queries::$QUERY_AÑADIRPERSONAJEZ )) {
           $stmt->bind_param('ss', $id, $id_participante);

           $_result = $stmt->execute();
           echo $stmt->error;
           $stmt->close();
       }
       return $_result;
   }

    //Añadir a participante casa Butrón
    public function añadirPersonajeB($id, $id_participante): bool
    {
        $_result = false;
        if ($stmt = $this->db->prepare( Queries::$QUERY_AÑADIRPERSONAJEB )) {
            $stmt->bind_param('ss', $id, $id_participante);

            $_result = $stmt->execute();
            echo $stmt->error;
            $stmt->close();
        }
        return $_result;
    }

  //Añadir a participante casa Osuna
  public function añadirPersonajeO($id, $id_participante): bool
  {
      $_result = false;
      if ($stmt = $this->db->prepare( Queries::$QUERY_AÑADIRPERSONAJEO )) {
          $stmt->bind_param('ss', $id, $id_participante);

          $_result = $stmt->execute();
          echo $stmt->error;
          $stmt->close();
      }
      return $_result;
  }

   //Añadir a participante casa Meneses
   public function añadirPersonajeM($id, $id_participante): bool
   {
       $_result = false;
       if ($stmt = $this->db->prepare( Queries::$QUERY_AÑADIRPERSONAJEM )) {
           $stmt->bind_param('ss', $id, $id_participante);

           $_result = $stmt->execute();
           echo $stmt->error;
           $stmt->close();
       }
       return $_result;
   }

   
    //Listar suscripciones
    public function findAllSuscripcion(): array
    {
        $_result = null;
        if ($result = $this->db->query( Queries::$QUERY_FINDALLSUSCRIPCION )) {
            $_result = $result->fetch_all(MYSQLI_ASSOC);
        }
        return $_result;
    }


     //Listar participantes
    public function findAllParticipantes(): array
    {
        $_result = null;
        if ($result = $this->db->query( Queries::$QUERY_FINDALLPARTICIPANTE )) {
            $_result = $result->fetch_all(MYSQLI_ASSOC);
        }
        return $_result;
    }


     //listar personajes
    public function findAllPersonajes(): array
    {
        $_result = null;
        if ($result = $this->db->query( Queries::$QUERY_FINDALLPERSONAJES )) {
            $_result = $result->fetch_all(MYSQLI_ASSOC);
        }
        return $_result;
    }

    //numero de personas por cada casa
    public function numTodasCasas(): array
    {
        $_result = null;
        if ($result = $this->db->query( Queries::$QUERY_NUMTODASLASCASA )) {
            $_result = $result->fetch_all(MYSQLI_ASSOC);
        }
        return $_result;
    }


   //Valor numeo inscritas en cada casa 
    public function numCasa($casa): int
    {
        $_result = 0;

        if ($stmt = $this->db->prepare( Queries::$QUERY_NUMCASA )) {
            $stmt->bind_param('s', $casa);
            $stmt->execute();
            $_result = $stmt->get_result()->fetch_assoc()["num"];
            $stmt->close();
        }
        return $_result;
    }
}


