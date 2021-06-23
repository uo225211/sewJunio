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
    vercasa(escudoComparar){
        var casas=[];
        $.ajax({
            dataType: "xml",
            url: this.nombre,
            method: 'GET',
            success: function(datos){
                var i=0;                
                $(datos).find("casa").each(function(){
                    var casa                 = $(this).attr("nombre");
                    var escudo              = $('escudo',this).text();
                    var historia              = $('historia',this).text();
                    var caracteristicas    = $('caracteriticas',this).text();
                    var rango              = $('rango',this).text();
                    var personajes=[];
                    var j=0;
                    $(this).find("personaje").each(function(){
                        var personajeNombre    = $(this).attr("nombrePersonaje");
                        var posicion    = $('posicion',this).text();
                        var descripcion    = $('descripcion',this).text();
                        personajes[j]= new Personajes(personajeNombre,posicion,descripcion);
                        j++;
                    });

                    casas[i]= new Casa(casa,escudo,historia,caracteristicas,rango,personajes);
                    i++;
                })
                var node=document.createElement("DIV");
                for (var k=0; k<casas.length;k++){                
                    if (casas[k].escudo==escudoComparar){
                        var node2 = document.createElement("h2");                 // Create a <h2> node
                        var textnode = document.createTextNode(casas[k].nombre); 
                        node2.appendChild(textnode); 
                        node.appendChild(node2); 
                        var node3 = document.createElement("IMG");  // Create a <img> node
                        node3.setAttribute("src", casas[k].escudo);
                        node3.setAttribute("class", "escudo");
                        node.appendChild(node3); 
                        var node4 = document.createElement("p");                 // Create a <p> node
                        var textnode = document.createTextNode(casas[k].historia); 
                        node4.appendChild(textnode); 
                        node.appendChild(node4); 
                        var node5 = document.createElement("UL");                 // Create a <ul> node
                        var node6 = document.createElement("Li");
                        var textnode = document.createTextNode("Caracteristicas : " + casas[k].caracteristicas ); 
                        node6.appendChild(textnode); 
                        node5.appendChild(node6);
                        var node6 = document.createElement("Li");
                        var textnode = document.createTextNode("Rango: " + casas[k].rango ); 
                        node6.appendChild(textnode); 
                        node5.appendChild(node6);
                        node.appendChild(node5); 
                        var aux=casas[k].personajes;
                        for (var l=0; l<aux.length;l++){
                            var per=aux[l];
                            var node2 = document.createElement("h3");                 // Create a <h2> node
                            var textnode = document.createTextNode(per.nombre ); 
                            node2.appendChild(textnode); 
                            node.appendChild(node2); 
                            var node2 = document.createElement("h4");                 // Create a <h2> node
                            var textnode = document.createTextNode(per.posicion); 
                            node2.appendChild(textnode); 
                            node.appendChild(node2); 
                            var node2 = document.createElement("p");                 // Create a <h2> node
                            var textnode = document.createTextNode(per.descripcion); 
                            node2.appendChild(textnode); 
                            node.appendChild(node2);                            
                        }
                    }                    
                    var item = document.getElementById("casas");
                    item.replaceChild(node, item.childNodes[0]);
                }
                },
            error:function(){
                $("h3").html("¡Tenemos problemas! No se pudo cargar el archivo XML"); 
                $("h4").remove();
                $("h5").remove();
                $("p").remove();
                }
        });
    }
        
}
var verCasas = new ArchivoXML("casas.xml");

"use strict";
class Navegador{
    constructor(){        
    }
    open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
      }
       
    close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
      }
    
        
}
var nave = new  Navegador();