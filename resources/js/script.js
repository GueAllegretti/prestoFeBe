
import anime from 'animejs';


window.addEventListener('scroll', updateScroll)
function updateScroll () {
        if (window.scrollY>100 ) {
          let bg1=document.querySelector('.bg-1')
              if (bg1) {
                bg1.classList.add('scrollDown')

              }
            }
          }
        // console.log(window);





anime({
  targets: '.presto-name',
  translateX:1000 ,
    duration: 800,


});
//Hello world
let bgweb= anime({

  targets: '.bg-wrapper',
  // delay:500,
  opacity:1,
  duration: 4000,
  top:80,
  left:400,
  // easing: 'easeOutElastic(.4, 2)',
  easing: 'easeInOutExpo',
  // easing: 'spring',
  autoplay: false,
});
let bgcell= anime({
  targets: '.bg-wrapper',
  // delay:500,
  opacity:1,
  duration: 4000,
  top:80,
  left:60,
  opacity:.5,
  // easing: 'easeOutElastic(.4, 2)',
  easing: 'easeInOutExpo',
  // easing: 'spring',
  autoplay: false,
});
const mediaQueryCell = window.matchMedia('(max-width: 450px)')
const mediaQueryWeb = window.matchMedia('(min-width: 451px)')



  if (mediaQueryCell.matches) {
    bgcell.play()

  }  if (mediaQueryWeb.matches){

      bgweb.play()

  }



let animation = anime({
  targets: '.bg-1, .bg-3',
  translateY: 120,
  duration: 2000,
  opacity:0.5,
  // easing: 'easeOutElastic(.4, 2)',
  // easing: 'easeInOutExpo',
  easing: 'spring',
  autoplay:false
});

let animation2 = anime({
  targets: '.bg-7, .bg-4, .bg-2, .bg-8',
  translateY: 100,
  duration: 2000,
  opacity:0.5,
  // easing: 'easeOutElastic(.4, 2)',
  // easing: 'easeInOutExpo',
  easing: 'spring',
  autoplay:false
});
let animation3 = anime({
  targets: '.bg-5, .bg-6',
  translateY: 100,
  duration: 2000,
  opacity:0.5,
  // easing: 'easeOutElastic(.4, 2)',
  // easing: 'easeInOutExpo',
  easing: 'spring',
  autoplay:false
});

window.onscroll = function(e){
  animation.seek(window.scrollY * 0.7);
  animation2.seek(window.scrollY * 0.7);
  animation3.seek(window.scrollY * 0.7);
}

let navbar= document.querySelector(".navbar")
let anchors= document.querySelectorAll('a')
document.addEventListener("scroll",()=>{
    if (innerWidth>=992) {
        if (window.scrollY>50) {
            navbar.classList.add('navbar-top')
            anchors.forEach(anchor => {

              // anchor.classList.add('color-black')
              document.documentElement.setAttribute('data-theme', 'light');

            });
            // navbar.style.paddingTop="0"
            // navbar.style.paddingBottom="0"
            // navbar.style.backgroundColor= "var(--primary)"

        } else {
            navbar.classList.remove('navbar-top')
            anchors.forEach(anchor => {

              // anchor.classList.remove('color-black')
              document.documentElement.setAttribute('data-theme', 'dark');

            });


        }

    }
})



anime({
  targets: '#alertrash',
  keyframes: [
    {translateY: -5},
    {translateY: 0},

  ],
  duration: 500,
  delay:4000,
  // easing: 'easeOutElastic(.4, 2)',
  // easing: 'easeInOutExpo',
  easing: 'easeOutElastic(1, .8)',
  loop:true,

});
let alertfixed= document.querySelector('#alert')
if (alertfixed) {
  setTimeout(() => {

    alertfixed.classList.add('fade-out')
}, 3000);

}