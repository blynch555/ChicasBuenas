$(function(){
	$('#headerListSection').slick({
		slidesToShow: 10,
		slidesToScroll: 2,
		autoplay: false,
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

	$('[data-toggle="tooltip"]').tooltip({
		html: true
	});

	$("#linkPublicaMe").click(function(e){
		e.preventDefault();

		
	});

	$("#linkPublicaMe").hover(function(){
		
	});
});