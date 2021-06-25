<?php

class Queries {
    public static string $QUERY_SUSCRIBIRSE
        = 'INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`,  `tarifa`, `casa`, `talla`) VALUES (?,?,?,?,?,?,?,?,?)';

    public static string $QUERY_NUMCASA
        = 'SELECT count(*) num FROM `suscripcion` WHERE casa = ?';

    public static string $QUERY_NUMTODASLASCASA
        = 'SELECT casa,count(*) num FROM `suscripcion` group by casa';

    public static string $QUERY_LOGIN
        = 'SELECT id_participante,posicion,contraseña FROM participante WHERE id_participante=?';

    public static string $QUERY_FINDBYIDPARTICIPANTE
        = 'SELECT nombre,apellido FROM participante WHERE id_participante=?';

    public static string $QUERY_FINDBYIDSUSCRIPCION
        = 'SELECT * FROM suscripcion WHERE id_suscripcion=?';

    public static string $QUERY_FINDBYLASTIDSUSCRIPCION
        = 'SELECT max(id_suscripcion) num FROM `suscripcion`';

    public static string $QUERY_AÑADIRPARTICIPANTESUSCRIPCION
        = 'INSERT INTO participante (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) VALUES (?,?,?,?,?,?,jugador,"")';

    public static string $QUERY_ULTIMOVALORPERSONAJECASA
        = 'SELECT max(id_personaje) FROM `personaje` WHERE tipo= ? ';

    public static string $QUERY_AÑADIRPERSONAJEZ
        = 'INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)  VALUES (?,Z,?,C16, "Nuevo miembro de la casa Zevallos")';

    public static string $QUERY_AÑADIRPERSONAJEB
        = 'INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)  VALUES (?,B,?,C19, "Nuevo miembro de la casa Butrón")';
    
    public static string $QUERY_AÑADIRPERSONAJEO
        = 'INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)  VALUES (?,O,?,C18, "Nuevo miembro de la casa Osuna") ;';
        
    public static string $QUERY_AÑADIRPERSONAJEM
        = 'INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)  VALUES (?,M,?,C2, "Nuevo miembro de la casa Meneses") ;';

    public static string $QUERY_FINDBYIDPERSONAJE
        = 'SELECT * FROM personaje WHERE id_personaje= ?';

    public static string $QUERY_FINDALLSUSCRIPCION
        = 'SELECT * FROM suscripcion';

    public static string $QUERY_FINDALLPARTICIPANTE
        = 'SELECT * FROM participante';

    public static string $QUERY_FINDALLPERSONAJES
        = 'SELECT id_personaje,nombre,apellido,nombre_rol,ropa,arma,otro_Complemento FROM personaje,vestuario,participante WHERE participante.id_participante=personaje.id_participante and vestuario.id_vertuario=personaje.id_vertuario order by nombre_rol';
    
    public static string $QUERY_FINDBYDNI
        = 'SELECT * FROM suscripcion WHERE dni=?';
}