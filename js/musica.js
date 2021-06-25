"use strict";
class Musica {
	constructor(){ 
	
		this.audio=document.getElementById("audio");  
		this.audio.volume = 0.5;
		if (this.audio.paused){
			document.getElementById("pause/play").setAttribute("src", "multimedia/play.png");
		}
		else{
			document.getElementById("pause/play").setAttribute("src", "multimedia/pause.png");
		}
	  }
play() {
	if (this.audio.paused){
		this.audio.play();
		document.getElementById("pause/play").setAttribute("src", "multimedia/pause.png");
	}
	else{
		this.audio.pause();
		document.getElementById("pause/play").setAttribute("src", "multimedia/play.png");
	}
		   
}
  
sound(){
	if (this.audio.muted){
		this.audio.volume = 0;
		document.getElementById("sound/notSound").setAttribute("src", "multimedia/notsound.png");
	}
	else{
		this.audio.volume = 0.5;
		document.getElementById("sound/notSound").setAttribute("src", "multimedia/sound.png");
	}
		   
}
comprobarPlay(){
	if (this.audio.paused){
		this.audio.play();
		document.getElementById("pause/play").setAttribute("src", "multimedia/pause.png");
	}
	else{
		this.audio.pause();
		document.getElementById("pause/play").setAttribute("src", "multimedia/play.png");
	}
	
		   
}
  
   
	
}

var musica= new Musica();
class Navegador{
    constructor(){ 
	
      this.audio=document.getElementById("audio");   
      this.audio.autoplay = "true";
      this.audioloop=true;
      this.audio.volume = 0.5; 
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

class MachMedia{
    constructor(){ 
		this.display()
    }
    display() {
		var tamaño = window.matchMedia("(max-width: 992px)"); 
		
	  tamaño.addEventListener("change",(e)=>{
		if(e.matches) {
			document.getElementById("mySidebar").style.display = "none";
			document.getElementById("myOverlay").style.display = "none";
		  } else {
			document.getElementById("mySidebar").style.display = "block";
			document.getElementById("myOverlay").style.display = "block";
       }});
      }
       
}


var media = new  MachMedia();

