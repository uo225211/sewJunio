DROP TABLE IF EXISTS suscripcion;
DROP TABLE IF EXISTS personaje;
DROP TABLE IF EXISTS participante;
DROP TABLE IF EXISTS vestuario;

CREATE TABLE suscripcion
(
    id_suscripcion     INTEGER NOT NULL,
    nombre  VARCHAR(128) NOT NULL,
    apellido VARCHAR(128) NOT NULL,
    fecha_Nacimiento     DATE NOT NULL,
    dni     VARCHAR(9) NOT NULL,
    telefono    INTEGER NOT NULL,
    tarifa      INTEGER NOT NULL,
    casa        VARCHAR(128) NOT NULL,
    talla      INTEGER NOT NULL,

    CONSTRAINT pk_suscripcion         PRIMARY KEY (id_suscripcion),
    CONSTRAINT uq_dni  UNIQUE (dni)
);

CREATE TABLE participante
(
    id_participante         INTEGER NOT NULL,
    nombre              VARCHAR(128) NOT NULL,
    apellido            VARCHAR(128) NOT NULL,
    fecha_Nacimiento    DATE NOT NULL,
    dni                 VARCHAR(9) NOT NULL,
    telefono            INTEGER NOT NULL,
    posicion            VARCHAR(128) NOT NULL,
    contraseña          VARCHAR(128),

    CONSTRAINT pk_participante PRIMARY KEY (id_participante ),
    CONSTRAINT uq_dni  UNIQUE (dni)
);


CREATE TABLE vestuario
(
    id_vertuario          VARCHAR(128) NOT NULL,    
    ropa           VARCHAR(128) NOT NULL,
    arma           VARCHAR(128),  

    CONSTRAINT pk_vestuario        PRIMARY KEY (id_vertuario)
);

CREATE TABLE personaje
(
    id_personaje          INTEGER NOT NULL,
    tipo                VARCHAR(128) NOT NULL,
    id_participante          INTEGER NOT NULL, 
    id_vertuario           VARCHAR(128) NOT NULL, 
    nombre_rol      VARCHAR(128) NOT NULL,

    CONSTRAINT pk_personaje         PRIMARY KEY (id_personaje,tipo),
    CONSTRAINT fk_personaje_participante FOREIGN KEY (id_participante) REFERENCES participante (id_participante) ON DELETE NO ACTION,
    CONSTRAINT fk_personaje_vestuario FOREIGN KEY (id_vertuario) REFERENCES vestuario (id_vertuario) ON DELETE NO ACTION
);

INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`,  `tarifa`, `casa`, `talla`) 
VALUES ('01', 'Andrés', 'García Rodríguez', '04/07/1995', '44437061A', '679823168', '1', 'Zevallos', '44') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('02', 'Andrés', 'Estaban Díaz ', '28/06/1999', '44097650A', '649972761', '2', 'Butrón', '42') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('03', 'Andrei', 'Gilenco gasco', '31/03/2001', '44437061B', '619823168', '1', 'Osuna', '44') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('04', 'Víctor', 'García losada', '20/02/1999', '44437061C', '629823168', '1', 'Osuna', '44') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('05', 'Pablo ', 'Villahoz ladrón ', '18/12/2000', '44437061D', '629823168', '2', 'Zevallos', '44') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('06', 'Alicia ', 'Rodríguez berbel ', '11/07/2001', '44437061E', '649823168', '1', 'Zevallos', '44') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('07', 'Ángela ', 'Sevane González', '8/12/2000', '44437061F', '659823168', '1', 'Butrón', '44') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('08', 'Andrea', 'García Rodríguez', '04/07/1995', '44437032G', '669823169', '1', 'Meneses', '36') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('09', 'Nestor ', 'Coello marques', '15/05/1999', '44437061H', '689823168', '2', 'Zevallos', '42') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('10', 'Marcos ', 'Martínez soto', '04/12/1995', '44437061I', '699823168', '1', 'Meneses', '44') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('11', 'Esther ', 'López santos ', '04/11/1996', '44437061J', '671823168', '1', 'Butrón', '36') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('12', 'Paula', 'Canedo de arriba', '21/07/1996', '44437061K', '672823168', '2', 'Osuna', '36') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('13', 'Judith', 'Palla león', '05/07/1998', '44437061L', '673823168', '1', 'Osuna', '34') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('14', 'Daniel', 'González Domínguez', '04/11/1989', '44437061M', '674823168', '2', 'Meneses', '46') ;
INSERT INTO `suscripcion` (`id_suscripcion`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `tarifa`, `casa`, `talla`) 
VALUES ('15', 'Marta ', 'López Cao', '04/10/1995', '44437061N', '675823168', '1', 'Zevallos', '38') ;

INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('01', 'Andrés', 'García Rodríguez', '04/07/1995', '44437061A', '679823168', 'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('02', 'Andrés', 'Estaban Díaz ', '28/06/1999', '44097650A', '649972761',  'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('03', 'Andrei', 'Gilenco gasco', '31/03/2001', '44437061B', '619823168',  'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('04', 'Víctor', 'García losada', '20/02/1999', '44437061C', '629823168', 'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('05', 'Pablo ', 'Villahoz ladrón ', '18/12/2000', '44437061D', '629823168', 'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('06', 'Alicia', 'Rodríguez berbel ', '11/07/2001', '44437061E', '649823168',  'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('07', 'Ángela', 'Sevane González', '8/12/2000', '44437061F', '659823168',  'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('08', 'Andrea', 'García Rodríguez', '04/07/1995', '44437032G', '669823169',  'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('09', 'Nestor', 'Coello marques', '15/05/1999', '44437061H', '689823168', 'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('10', 'Marcos', 'Martínez soto', '04/12/1995', '44437061I', '699823168',  'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('11', 'Esther ', 'López santos ', '04/11/1996', '44437061J', '671823168',  'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('12', 'Paula', 'Canedo de arriba', '21/07/1996', '44437061K', '672823168', 'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('13', 'Judith', 'Palla león', '05/07/1998', '44437061L', '673823168',  'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('14', 'Daniel', 'González Domínguez', '04/11/1989', '44437061M', '674823168',  'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('15', 'Marta', 'López Cao', '04/10/1995', '44437061N', '675823168', 'juagdor') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('45', 'David', 'López Cao', '04/10/1995', '54437061N', '675823168', 'coordinador' , 'c45') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('46', 'Satiago  ', 'Rodriguez Cao', '04/10/1995', '50437061N', '675823168', 'coordinador' , 'c46') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('47', 'Beatriz', 'Arbizu Ramirez', '04/10/1995', '51437061N', '675823168', 'coordinador' , 'c47') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('48', 'Alberto', 'Rodriguez Cao', '04/10/1995', '52437061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('49', 'Iván', 'Rodriguez Cao', '04/10/1995', '53437061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('50', 'Daniel', 'Rodriguez Cao', '04/10/1995', '54435551N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('51', 'Iván', 'Rodriguez Vega', '04/10/1995', '55437061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('52', 'Daniel', 'Rodriguez Sanchez', '04/10/1995', '56437061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('53', 'Paloma', 'Rodriguez Cao', '04/10/1995', '57437061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('54', 'Jesús', 'Rodriguez Cao', '04/10/1995', '58437061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('55', 'Daniel', 'Rodriguez Cresta', '04/10/1995', '59437061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('56', 'Carmen', 'Rodriguez Cao', '04/10/1995', '50137061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('57', 'Jolo', 'Rodriguez Cao', '04/10/1995', '50237061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('58', 'Andrei', 'Rodriguez Cao', '04/10/1995', '50337061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('59', 'Nerea', 'Rodriguez Cao', '04/10/1995', '50455561N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('60', 'José', 'Rodriguez Cao', '04/10/1995', '50537061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('61', 'Marta', 'Rodriguez Cao', '04/10/1995', '50637061N', '675823168', 'master' , 'master') ;
INSERT INTO `participante` (`id_participante`, `nombre`, `apellido`, `fecha_Nacimiento`, `dni`, `telefono`, `posicion`, `contraseña`) 
VALUES ('62', 'Michy', 'Rodriguez Cao', '04/10/1995', '50737061N', '675823168', 'master' , 'master') ;

INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C01', 'Caracteristica del Emisario') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C02', 'Aldeano normal') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C03', 'Aldeano normal', '', 'delantal') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C04', 'Caracteristica del posader@') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C05', 'Armadura de cuaro, túnica y capa', 'espada') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C06', 'Noble menor', 'arco') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C07', 'Armadura entera y túnica', 'espada') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C08', 'Noble Alto') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C09', 'Maestro') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C10', 'Túnica druida') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C11', 'Noble Alto+ armadura completa') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C12', 'Caracteristica del Bufón') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C13', 'Caracteristica del Mendigo') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C14', 'Caracteristica de una cortesana') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C15', 'Esplorador', 'arco y daga') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C16', 'explorador baja calidad','') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C17', 'Caracteristica de una pocero') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C18', 'Aldeano buena calidad') ;
INSERT INTO `vestuario` (`id_vertuario`,`ropa`, `arma`) 
VALUES ('C19', 'Aldeano normal y armadura de cuero') ;

INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`) 
VALUES (1,'Z','1','C16', "Nuevo miembro de la casa Zevallos") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (2,'Z','5','C16', "Nuevo miembro de la casa Zevallos") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (3,'Z','6','C16', "Nuevo miembro de la casa Zevallos") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (4,'Z','9','C16', "Nuevo miembro de la casa Zevallos") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (5,'Z','15','C16', "Nuevo miembro de la casa Zevallos") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (1,'B','2','C19', "Nuevo miembro de la casa Butrón") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (2,'B','7','C19', "Nuevo miembro de la casa Butrón") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (3,'B','11','C19', "Nuevo miembro de la casa Butrón") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (1,'O','3','C18', "Nuevo miembro de la casa Osuna") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (2,'O','4','C18', "Nuevo miembro de la casa Osuna") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (3,'O','12','C18', "Nuevo miembro de la casa Osuna") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (4,'O','13','C18', "Nuevo miembro de la casa Osuna") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (1,'M','8','C02', "Nuevo miembro de la casa Meneses") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (2,'M','10','C02', "Nuevo miembro de la casa Meneses") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (3,'M','14','C02', "Nuevo miembro de la casa Meneses") ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (1,'N','45','C03','Tendero') ;
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (2,'N','45','C01','Emisario');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (3,'N','46','C04','Posadero');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (4,'N','46','C09','Maestro de espadas duales');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (5,'N','47','C02','Aldeana');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (6,'N','48','C05','Guardia');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (7,'N','48','C09','Maestro de Lanza');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (8,'N','49','C06','Alfonso Zevallos');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (9,'N','50','C07','Capitan de la guardia');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (25,'N','50','C09','Maestro de mandoble');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (10,'N','51','C08','Miguel Osuna');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (11,'N','52','C09','Maestrao de arco');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (12,'N','52','C10','Curandera');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (13,'N','53','C11','Alicia Bruton');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (14,'N','54','C08','Juán Miguel Rodriguez');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (15,'N','55','C12','Bufón');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (16,'N','55','C13','mendigo');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`) 
VALUES (17,'N','56','C05','soldado');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`) 
VALUES (18,'N','56','C14','Cortesana');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (19,'N','57','C08','Pedro Meneses');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (20,'N','58','C02','Aldeano');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (21,'N','59','C02','Aldeano');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (22,'N','60','C15','Cazador');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`)
VALUES (23,'N','61','C02','Aldeana');
INSERT INTO `personaje` (`id_personaje`, `tipo`, `id_participante`, `id_vertuario`, `nombre_rol`) 
VALUES (24,'N','62','C17','Pocero');