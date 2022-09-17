const contenu1 =document.querySelector(".contenu1");

const t1 = new TimelineMax();

t1.fromTo(contenu1 ,1, {width:"0%"}, {width:"100%"});