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

	$('#shareme').sharrre({
		share: {
			googlePlus: true,
			facebook: true,
			twitter: true
		},
		enableTracking: true,
		buttons: {
			googlePlus: {size: 'tall', annotation:'bubble'},
			facebook: {layout: 'box_count'},
			twitter: {count: 'vertical'}
		},
		hover: function(api, options){
			$(api.element).find('.buttons').show();
		},
		hide: function(api, options){
			$(api.element).find('.buttons').hide();
		}
	});
});