import Glide from '@glidejs/glide/';

if (document.querySelector('.glide')) {

   let a= new Glide('.glide', {
        type: 'carousel',
        autoplay: 4000,
        breakpoints: {
          "992": {
              perView: 2
          },
          "576": {
              perView: 1
          }
      },
        startAt: 0,
        perView: 3
      }).mount();
}