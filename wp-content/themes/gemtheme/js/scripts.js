jQuery(document).ready(function($) {

	// Toogle
	$(".toggle").click(function(e) {
		e.preventDefault();
		$(this).toggleClass("on");
	});





	$('.similar-carousel').owlCarousel({
		loop: true,
		items: 1,
		dots: true,
		autoplay: true,
	});

	$('.screen-carousel').owlCarousel({
		loop: true,
		autoplay: true,
		dots: true,
		responsive: {
			0 : {
				items: 1,
			},
			480 : {
				items: 2,
			},
			768 : {
				items: 3,
			}
		},
	});


	
});