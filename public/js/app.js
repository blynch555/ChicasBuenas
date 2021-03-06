$(function(){
	$('#headerListSection').slick({
		slidesToShow: 10,
		slidesToScroll: 2,
		autoplay: false,
		mobileFirst: true,
		responsive: [
			{
				breakpoint: 810,
				settings: {
					arrows: false,
					autoplay: true,
					slidesToShow: 3,
					slidesToScroll: 1
				}
			}
		]
	});

	$('[data-toggle="tooltip"]').tooltip({
		html: true
	});

	$("#linkPublicaMe, #linkPublicaMeBanner").click(function(e){
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