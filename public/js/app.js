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

		publicaMe();
	});

	$(".publicameSelectPhoto").click(function(e){
		e.preventDefault();

		$(".publicameSelectPhoto.active").removeClass('active');
		$(this).addClass('active');
		$("#publicame_photo_id").val($(this).attr('data-photo-id'));
	});

	$("#btnPublicaMe").click(function(e){
		e.preventDefault();

		var photoId = $("#publicame_photo_id").val();
		if(photoId == ''){
			alert('Primero debes seleccionar la fotografía que aparecere en la sección PublicaMe!');
		}else{
			$("#frmPublicaMe").submit();
		}
	});
});


function publicaMe(){
	console.log('linkPublicaMe');
	$("#dlgPublicaMe").modal('show');
}