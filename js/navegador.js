"use strict";
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
    
      play() {
        if (document.getElementById("pause/play").getAttribute("src")=="multimedia/play.png"){
          this.audio.play();
          document.getElementById("pause/play").setAttribute("src", "multimedia/pause.png");
        }
        else{
          this.audio.play();
          document.getElementById("pause/play").setAttribute("src", "multimedia/play.png");
        }
             
      }
        
      sound(){
        if (document.getElementById("sound/notSound").getAttribute("src")=="multimedia/sound.png"){
          this.audio.volume = 0;
          document.getElementById("sound/notSound").setAttribute("src", "multimedia/notsound.png");
        }
        else{
          this.audio.volume = 0.7;
          document.getElementById("sound/notSound").setAttribute("src", "multimedia/sound.png");
        }
             
      }
}


var nave = new  Navegador();



