// Топ продаж на главной начало
$(document).ready(function () {
	$(".regular").slick(
		{
			dots: false,
			infinite: true,
			slidesToScroll: 3,
			slidesToShow: 5,
			centerMode: true,
			speed: 500,
			arrows: false,
			swipeToSlide: true,
			autoplay: true,
			autoplaySpeed: 2500,
			mobileFirst: true,
			adaptiveHeight: true,
			focusOnSelect: true,
			responsive: [
				{

					breakpoint: 1200,
					settings: {
						slidesToShow: 5,
						slidesToScroll: 3,
					}
				},{

				breakpoint: 992,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			}, {

				breakpoint: 300,
				settings: {
					slidesToShow: 1,
				}
			},]
		}
	);
});
// Топ продаж на главной конец

// Доп товары в карточке товара начало
$(document).ready(function () {
	$(".recomended-products").slick(
		{
			dots: false,
			infinite: true,
			slidesToScroll: 3,
			slidesToShow: 3,
			centerMode: true,
			speed: 500,
			arrows: true,
			swipeToSlide: true,
			autoplay: true,
			autoplaySpeed: 2500,
			mobileFirst: true,
			adaptiveHeight: true,
			focusOnSelect: true,
			prevArrow: '<button class="slick-prev-btn"><</button>',
			nextArrow: '<button class="slick-next-btn">></button>',
			responsive: [{

				breakpoint: 992,
				settings: {
					slidesToShow: 5,
				}
			},
			{
				breakpoint: 300,
				settings: {
					slidesToShow: 2,
				}
			}]
		}
	);
});

// Доп товары в карточке товара конец

// Отзывы с инсты начало
$(document).ready(function () {
	$(".instaposts").slick(
		{
			dots: false,
			infinite: true,
			slidesToScroll: 1,
			slidesToShow: 1,
			speed: 500,
			arrows: false,
			swipeToSlide: true,
			autoplay: true,
			autoplaySpeed: 2500,
			mobileFirst: true,
			adaptiveHeight: true,
			focusOnSelect: true,
		}
	);
});

// Отзывы с инсты конец


// Доп картинки у товара начало
$(".product-thumb").slick({
	centerMode: true,
	centerPadding: '5px',
	slidesToShow: 3,
	slidesToScroll: 3,
	vertical: true,
	verticalSwiping: true,
	arrows: false,
	swipeToSlide: true,
	focusOnSelect: true,
	autoplay: true,
	autoplaySpeed: 1000,
	responsive: [
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 5,
				vertical: true,

			}
		},
		{
			breakpoint: 576,
			settings: {
				slidesToShow: 3,
				vertical: false,
				verticalSwiping: false,
				mobileFirst: true,
				centerMode: false,
			}
		},]
});
