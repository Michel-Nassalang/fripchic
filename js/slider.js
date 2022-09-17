var compteurimage=1;
var totalimage=5;

function slider(x){

    var image=document.getElementById('image');
    compteurimage=compteurimage + x;
    image.src="../medias/dressing"+compteurimage+".jpg";
    if(compteurimage>=totalimage){
        compteurimage=1;
    }
    if(compteurimage<1){
        compteurimage=totalimage;
    }
}
function sliderauto(){

    var image=document.getElementById('image');
    compteurimage=compteurimage + 1;
    image.src="../medias/dressing"+compteurimage+".jpg";
    image.style="transition: ease-in-out 1s";
    if(compteurimage>=totalimage){
        compteurimage=1;
    }
    if(compteurimage<1){
        compteurimage=totalimage;
    }
}
window.setInterval(sliderauto, 3500);