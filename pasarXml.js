"use strict";
class ArchivoXML {
    constructor(nombre){
        this.nombre = nombre;
        this.correcto = "¡Todo correcto! archivo XML cargado"
    }
    cargarDatos(){
        $.ajax({
            dataType: "xml",
            url: this.nombre,
            method: 'GET',
            success: function(datos){
                
                    //Pasar el archivo XML a un string
                    var str = (new XMLSerializer()).serializeToString(datos);
                    
                    $("h5").text(str);
                
                    //Extracción de los datos contenidos en el XML
                    var totalNodos            = $('*',datos).length; // cuenta el número de elementos: son los nodos del DOM de XML
                    var casa                = $('casa',datos).attr("nombre");
                    var escudo              = $('escudo',datos).text();
                    var historia              = $('historia',datos).text();
                    var caracteristicas    = $('caracteriticas',datos).text();
                    var rango              = $('rango',datos).text();
                    var personajeNombre    = $('personaje',datos).attr("nombre");
                    var posicion    = $('posicion',datos).text();
                    var descripcion    = $('descripcion',datos).text();
                    
                    var stringDatos =  "<ul><li>Número de elementos del archivo XML: " + totalNodos + "</li> ";
                        stringDatos += "<li>Casa: " + casa + "</li>";
                        stringDatos += "<li>escudo : " + escudo  + " grados</li>";
                        stringDatos += "<li>historia: " + historia + " grados</li>";
                        stringDatos += "<li>caracteristicas: " + caracteristicas + "</li>";
                        stringDatos += "<li>rango: " + rango + "</li>";
                        stringDatos += "<li>personajeNombre: " + personajeNombre + "</li>";
                        stringDatos += "<li>posicion: " + posicion + " grados Celsius</li>";
                        stringDatos += "<li>Descripción: " + descripcion + "</li><ul>";
                    
                    $("p").html(stringDatos);                  
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