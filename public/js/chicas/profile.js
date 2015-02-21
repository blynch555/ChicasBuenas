$(function(){
	$(".escortPhotos").slick({
		slidesToShow: 1
	});

	$('.escortPhotos').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title');
			},
			tError: '<a href="%url%">La imagen</a> no pudo ser cargada.'
		},
		gallery: {
			enabled: true,
			tPrev: 'Anterior',
		    tNext: 'Siguiente',
		    tCounter: '%curr% de %total%'
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		},
		tClose: 'Cerrar (Esc)',
		tLoading: 'Cargando...'
	});

	new Share("#socialShare", {
		networks: {
			facebook: {app_id: "430700113754492"},
			pinterest: {enabled: false},
			email: {enabled: false},
		},
		title: escort.name + ' ya esta en ChicasBuenas.cl',
		description: escort.description,
		url: escort.url,
		image: escort.photo_url,
		ui: {
			button_text: 'Compartir'
		}
	});

});