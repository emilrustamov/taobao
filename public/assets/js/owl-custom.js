//старый код Карины
//  $('.owl-carousel').owlCarousel({
//     loop: true,
//     margin: 25,
//     nav: true,
//     dots: false,
//     autoWidth: true,
//     items: 5,
//     autoplay: true,
//     autoplayTimeout: 3000,
//     autoplayHoverPause: true,
//     autoplaySpeed: 2000,
//     animateOut: 'fadeOut',
//     responsive: {
//       // Настройки для разных размеров экрана
//       0: {
//         items: 1 // Отображаем 1 элемент на устройствах с шириной экрана меньше 576px
//       },
//       576: {
//         items: 2 // Отображаем 2 элемента на устройствах с шириной экрана от 576px и больше
//       },
//       768: {
//         items: 3 // Отображаем 3 элемента на устройствах с шириной экрана от 768px и больше
//       }
//       // Добавьте больше настроек по мере необходимости
//     }
// });
// owl.on('mousewheel', '.owl-stage', function (e) {
//   if (e.deltaY>0) {
//       owl.trigger('next.owl');
//   } else {
//       owl.trigger('prev.owl');
//   }
//   e.preventDefault();
// });

// $('.owl-review').owlCarousel({
//   loop: true,
//   margin: 25,
//   nav: true,
//   dots: false,
//   autoWidth: true,
//   items: 1,
//   autoplay: true,
//   autoplayTimeout: 3000,
//   autoplayHoverPause: true,
//   autoplaySpeed: 2000,
//   animateOut: 'fadeOut',
// });
// owl.on('mousewheel', '.owl-stage', function (e) {
// if (e.deltaY>0) {
//     owl.trigger('next.owl');
// } else {
//     owl.trigger('prev.owl');
// }
// e.preventDefault();
// });

function handleMouseWheel(owlInstance) {
  owlInstance.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY > 0) {
      owlInstance.trigger('next.owl');
    } else {
      owlInstance.trigger('prev.owl');
    }
    e.preventDefault();
  });
}

var owl1 = $('.owl-carousel').owlCarousel({
  loop: true,
    margin: 25,
    nav: true,
    dots: false,
    autoWidth: true,
    items: 5,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    autoplaySpeed: 2000,
    animateOut: 'fadeOut',
    responsive: {
      // Настройки для разных размеров экрана
      0: {
        items: 1 // Отображаем 1 элемент на устройствах с шириной экрана меньше 576px
      },
      576: {
        items: 2 // Отображаем 2 элемента на устройствах с шириной экрана от 576px и больше
      },
      768: {
        items: 3 // Отображаем 3 элемента на устройствах с шириной экрана от 768px и больше
      }
      // Добавьте больше настроек по мере необходимости
    }
});

var owl2 = $('.owl-review').owlCarousel({
  loop: true,
  margin: 25,
  nav: true,
  dots: false,
  autoWidth: true,
  items: 1,
  autoplay: true,
  autoplayTimeout: 3000,
  autoplayHoverPause: true,
  autoplaySpeed: 2000,
  animateOut: 'fadeOut',
});

handleMouseWheel(owl1);
handleMouseWheel(owl2);






