"use strict";
class Geolocalización {
    constructor (){
        navigator.geolocation.getCurrentPosition(this.getPosicion.bind(this), this.verErrores.bind(this));
    }
    getPosicion(posicion){
        this.mensaje = "Se ha realizado correctamente la petición de geolocalización";
        this.longitud         = posicion.coords.longitude; 
        this.latitud          = posicion.coords.latitude;  
        this.precision        = posicion.coords.accuracy;
        this.altitud          = posicion.coords.altitude;
        this.precisionAltitud = posicion.coords.altitudeAccuracy;
        this.rumbo            = posicion.coords.heading;
        this.velocidad        = posicion.coords.speed;       
    }
    verErrores(error){
        switch(error.code) {
        case error.PERMISSION_DENIED:
            this.mensaje = "El usuario no permite la petición de geolocalización"
            break;
        case error.POSITION_UNAVAILABLE:
            this.mensaje = "Información de geolocalización no disponible"
            break;
        case error.TIMEOUT:
            this.mensaje = "La petición de geolocalización ha caducado"
            break;
        case error.UNKNOWN_ERROR:
            this.mensaje = "Se ha producido un error desconocido"
            break;
        }
    }
    getLongitud(){
        return this.longitud;
    }
    getLatitud(){
        return this.latitud;
    }
    getAltitud(){
        return this.altitud;
    }
    irGoogle(){
        var url='https://www.google.es/maps/dir/ ';
        url+=this.getLatitud +','+ this.getLongitud;
        url+='/43.5439586,+-5.6732480/@43.4614307,-5.8320783,12z/data=!3m1!4b1!4m10!4m9!1m3!2m2!1d-5.8502461!2d43.3672702!1m3!2m2!1d-5.673248!2d43.5439586!3e0?hl=es&authuser=0'
        var win = window.open(url, '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();  
    }
}
var sitio = new Geolocalización();

"use strict";
class Meteo {
    constructor(){
        this.apikey = "778cf9af97a74c00ae40358414b8d072";
        this.latitud = "43.5439586";
        this.longitud = "-5.6732480";
        this.unidades = "&units=metric";
        this.idioma = "&lang=es";
        this.url = "https://api.weatherbit.io/v2.0/current?lat=" + this.latitud +"&lon=" + this.longitud + "&key=" + this.apikey +
		"&include=minutely";
        this.correcto = "¡Todo correcto! XML recibido de <a href='https://www.weatherbit.io/api/'>Weatherbit</a>"
        this.cargarDatos();
    }
    cargarDatos(){
        $.ajax({
            dataType: "json",
            url: this.url,
            method: 'GET',
            success: function(datos){
                    //Presentación de los datos contenidos en JSON
                    var node=document.createElement("DIV");
                    var node2 = document.createElement("ul"); 
                    var node3 = document.createElement("li"); 
                    var textnode = document.createTextNode("Temperatura: " + datos.data[0].temp +" grados Celsius" ); 
                    node3.appendChild(textnode); 
                    node2.appendChild(node3);
                    var node3 = document.createElement("li"); 
                    var textnode = document.createTextNode("Temperatura aparente: " + datos.data[0].app_temp+" grados Celsius" ); 
                    node3.appendChild(textnode); 
                    node2.appendChild(node3);
                    var node3 = document.createElement("li"); 
                    var textnode = document.createTextNode("Velocidad viento: " + datos.data[0].wind_spd+" m / s" ); 
                    node3.appendChild(textnode); 
                    node2.appendChild(node3);
                    var node3 = document.createElement("li"); 
                    var textnode = document.createTextNode("Humedad relativa: " + datos.data[0].rh+" %" ); 
                    node3.appendChild(textnode); 
                    node2.appendChild(node3);
                    var node3 = document.createElement("li"); 
                    var textnode = document.createTextNode("Visibilidad: " + datos.data[0].vis+" Km" ); 
                    node3.appendChild(textnode); 
                    node2.appendChild(node3);
                    var node3 = document.createElement("li"); 
                    var textnode = document.createTextNode("Nubosidad: " + datos.data[0].app_temp+"  %os Celsius" );                        
                    node3.appendChild(textnode); 
                    node2.appendChild(node3);
                    node.appendChild(node2);      
                    node.setAttribute("id", "cambioTiempo");                   
                    var item = document.getElementById("tiempo");
                    item.replaceChild(node, document.getElementById("cambioTiempo"));
                },
            error:function(){
                $("h3").html("¡Tenemos problemas! No puedo obtener JSON de <a href='http://openweathermap.org'>OpenWeatherMap</a>"); 
                $("h4").remove();
                $("pre").remove();
                $("p").remove();
                }
        });
    }
}
var meteo = new Meteo();