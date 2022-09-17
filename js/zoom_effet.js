
    // zoom = 2;
    // loupe = document.getElementById("loupe");
    // document.body.onmousemove = function(event){
    //     loupe.style.left = event.clientX+200;
    //     loupe.style.top = event.clientY+200;
    // }

    // loupe = document.getElementById("loupe");
    // initial = document.getElementById("initial");
    // var zoom, largeur, hauteur, carre;
    // function preparer(){
    //     zoom = 3;
    //     largeur = 500;
    //     hauteur = 300;
    //     carre = 200;
    //     initial.width = largeur;
    //     initial.height = hauteur;
    //     loupe.height = zoom*hauteur;
    //     loupe.width = zoom*largeur;
    // }
    // document.body.onmousemove = function(){
    //     zoom = 3;
    //     largeur = 500;
    //     hauteur = 300;
    //     carre = 200;
    //     initial.width = largeur;
    //     initial.height = hauteur;
    //     loupe.height = zoom*hauteur;
    //     loupe.width = zoom*largeur;
    // }
    // console.log(loupe);


zoom = 2;
loupe1 = document.querySelector(".slides li img");
document.body.onmousemove = function (event) {
    loupe1.style.left = event.clientX + 200;
    loupe1.style.top = event.clientY + 200;
}

loupe1 = document.querySelector(".slides li img");
initial1 = document.querySelector(".slides li img");
var zoom, largeur, hauteur, carre;
function preparer() {
    zoom = 3;
    largeur = 500;
    hauteur = 300;
    carre = 200;
    initial1.width = largeur;
    initial1.height = hauteur;
    loupe1.height = zoom * hauteur;
    loupe1.width = zoom * largeur;
}
document.body.onmousemove = function () {
    zoom = 3;
    largeur = 500;
    hauteur = 300;
    carre = 200;
    initial1.width = largeur;
    initial1.height = hauteur;
    loupe1.height = zoom * hauteur;
    loupe1.width = zoom * largeur;
}
console.log(loupe1);