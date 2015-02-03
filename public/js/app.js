$(function(){
	$('#headerListSection').slick({
		slidesToShow: 10,
		slidesToScroll: 2,
		autoplay: true,
		responsive: [
			{
				breakpoint: 1101,
				settings: {
					slidesToShow: 9,
					slidesToScroll: 3
				}
			},
			{
				breakpoint: 810,
				settings: {
					slidesToShow: 7,
					slidesToScroll: 3
				}
			}
		]
	});
});