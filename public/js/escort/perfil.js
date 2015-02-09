var photoTpl = '<div class="col-sm-3" id=":imageName"><a href="' + HOME + '/uploads/large/:urlImage" class="escortPhoto"><img src="' + HOME + '/uploads/medium/:urlImage" class="img-thumbnail"></a><button type="button" class="btn btn-danger btn-block btnDeletePhoto" data-image-name=":imageName"><i class="ion-close-circled"></i> Eliminar Fotografía</button></div>';
$(function(){
	$('#navMenu a').click(function (e) {
		e.preventDefault()
		$(this).tab('show');
        $('select').select2();
	});

	$('#escortPhotos').magnificPopup({
		delegate: 'a.escortPhoto',
		type: 'image',
		gallery:{
	    	enabled:true
		}
	});

	$("#uploadEscortPhoto").click(function(e){
		e.preventDefault();

		$('#fileupload').trigger('click');
	});

	$('#fileupload').fileupload({
        dataType: 'json',
        url: HOME + '/escort/upload-photo',
        done: function (e, data) {
        	$(data.result.files).each(function(i, file){
        		var tpl = photoTpl;
        		var imageName = file.name;

        		tpl = tpl.replace(':urlImage', imageName);
        		tpl = tpl.replace(':urlImage', imageName);
        		tpl = tpl.replace(':imageName', imageName);
        		tpl = tpl.replace(':imageName', imageName);

        		$("#colFileUpload").after(tpl);

                var n = noty({
                    text: 'Fotografía cargada!',
                    type: 'success',
                    timeout: 2000
                });

        		addDeletePhotoEvent();
        	});
        }
    });

    $("#hourly").change(function(){
    	if($(this).val() == 'Full Time'){
    		$("#dvHourlyTimeBegin").addClass('hide');
    		$("#dvHourlyTimeEnd").addClass('hide');
    	}else{
    		$("#dvHourlyTimeBegin").removeClass('hide');
    		$("#dvHourlyTimeEnd").removeClass('hide');
    	}
    });

    $("#btnSaveProperties").click(function(e){
    	e.preventDefault();
    	var btn = $(this);
    	var data = $("#frmProperties").serialize();
    	$(btn).text('Guardando...');
    	$("#frmProperties fieldset").attr('disabled', 'disabled');

    	$.post(HOME + '/escort/guardar-caracteristicas', data, function(response){
    		var n = noty({
    			text: 'La información de tu perfil fue guardada!',
    			type: 'success',
    			timeout: 2000
    		});

    		$(btn).html('<i class="ion-checkmark-circled"></i> Guardar cambios');
    		$("#frmProperties fieldset").removeAttr('disabled');
    	});
    });

    $("#btnSaveContact").click(function(e){
        e.preventDefault();
        var btn = $(this);
        var data = $("#frmContact").serialize();
        $(btn).text('Guardando...');
        $("#frmContact fieldset").attr('disabled', 'disabled');

        $.post(HOME + '/escort/guardar-contacto', data, function(response){
            var n = noty({
                text: 'Los datos de contacto fueron guardados!',
                type: 'success',
                timeout: 2000
            });

            $(btn).html('<i class="ion-checkmark-circled"></i> Guardar cambios');
            $("#frmContact fieldset").removeAttr('disabled');
        });
    });

    $("#btnSaveServices").click(function(e){
        e.preventDefault();
        var btn = $(this);
        var data = $("#frmServices").serialize();
        $(btn).text('Guardando...');
        $("#frmServices fieldset").attr('disabled', 'disabled');

        $.post(HOME + '/escort/guardar-servicios', data, function(response){
            var n = noty({
                text: 'El listado de servicios fue guardado!',
                type: 'success',
                timeout: 2000
            });

            $(btn).html('<i class="ion-checkmark-circled"></i> Guardar cambios');
            $("#frmServices fieldset").removeAttr('disabled');
        });
    });
    

    $('select').select2();

    addDeletePhotoEvent();
});

function addDeletePhotoEvent(){
	removeDeletePhotoEvent();

	$(".btnDeletePhoto").click(deletePhoto);
}
function removeDeletePhotoEvent(){
	$(".btnDeletePhoto").unbind('click');
}

function deletePhoto(e){
	e.preventDefault();
	var name = $(this).attr('data-image-name');
	if(confirm('¿esta seguro(a) de eliminar esta fotografía?')){
		$.post(HOME + '/escort/eliminar-fotografia', {name: name}, function(response){
			$("#" + name.replace('.jpeg', '')).fadeOut(function(){
				$(this).remove();
			});
		});
	}
}





