"use strict";
class Casa{
    constructor(nombre,escudo,historia,caracteristicas,rango,personajes){
        this.nombre = nombre;
        this.escudo = escudo;
        this.historia=historia;
        this.caracteristicas=caracteristicas;
        this.rango=rango;
        this.personajes=personajes;
    } 
}
class Personajes{
    constructor(nombre,posicion,descripcion){
        this.nombre = nombre;
        this.posicion = posicion;
        this.descripcion=descripcion;
    } 
}
class ArchivoXML {
    
    constructor(nombre){
        this.nombre = nombre;
        this.correcto = "¡Todo correcto! archivo XML cargado"
        
    }
    cargarDatos(){
        var casas=[];
        $.ajax({
            dataType: "xml",
            url: this.nombre,
            method: 'GET',
            success: function(datos){
                var i=0;
                var j=0;
                $(datos).find("casa").each(function(){
                    var casa                = $('nombre',this).text();
                    var escudo              = $('escudo',this).text();
                    var historia              = $('historia',this).text();
                    var caracteristicas    = $('caracteriticas',this).text();
                    var rango              = $('rango',this).text();
                    var personajes=[];
                    $(this).find("personaje").each(function(){
                        var personajeNombre    = $('nombrePersonaje',this).text();
                        var posicion    = $('posicion',this).text();
                        var descripcion    = $('descripcion',this).text();
                        personajes[j]= new Personajes(personajeNombre,posicion,descripcion);
                        j++;
                    });

                    casas[i]= new Casa(casa,escudo,historia,caracteristicas,rango,personajes);
                    i++;
                })
                for (var k=0; k<casas.length;k++){
                    var stringDatos =  "<h2>" + casas[k].nombre + "</h2> ";
                        stringDatos += "<img class='escudo' src='"+"multimedia/"+ casas[k].escudo +
                        "' alt='Escudo' />";
                        stringDatos += "<p>" + casas[k].historia + "</p>";
                        stringDatos += "<ul><li>Caracteristicas : " + casas[k].caracteristicas  + "</li>";
                        stringDatos += "<li>Rango: " + casas[k].rango + "</li><ul>";
                        var aux=casas[k].personajes;
                        for (var l=0; l<aux.length;l++){
                            var per=aux[l];
                            stringDatos +=  "<h3>" + per.nombre + "</h3> ";
                            stringDatos +=  "<h4>" + per.posicion + "</h4> ";
                            stringDatos += "<p>" + per.descripcion + "</p>";
                        }
                    }
                    
                    $("div").html(stringDatos);
                },
            error:function(){
                $("h3").html("¡Tenemos problemas! No se pudo cargar el archivo XML"); 
                $("h4").remove();
                $("h5").remove();
                $("p").remove();
                }
        });
    }
    crearElemento(tipoElemento, texto, insertarAntesDe){
        // Crea un nuevo elemento modificando el árbol DOM
        // El elemnto creado es de 'tipoElemento' con un 'texto' 
        // El elemnto se coloca antes del elemnto 'insertarAntesDe'
        var elemento = document.createElement(tipoElemento); 
        elemento.innerHTML = texto;
        $(insertarAntesDe).before(elemento);
    }
    verXML(){
        //Muestra el archivo JSON recibido
        /*this.crearElemento("h2","Archivo XML","footer"); 
        this.crearElemento("h3",this.correcto,"footer"); // Crea un elemento con DOM 
        this.crearElemento("h4","XML","footer"); // Crea un elemento con DOM        
        this.crearElemento("h5","","footer"); // Crea un elemento con DOM para el string con XML
        this.crearElemento("h4","Datos","footer"); // Crea un elemento con DOM 
        this.crearElemento("p","","footer"); // Crea un elemento con DOM para los datos obtenidos con XML*/
        this.cargarDatos();
        $("button").attr("disabled","disabled");
    }
}
var oviedo = new ArchivoXML("casas.xml");