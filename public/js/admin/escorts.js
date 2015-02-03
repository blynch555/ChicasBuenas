$(function(){
	$(".btnDelete").click(function(e){
		e.preventDefault()

		if(confirm('¿Esta seguro de eliminar esta escort?')){
			var id = $(this).attr('data-escort-id');


			$.ajax({
				url: HOME + '/api/escorts/' + id,
				type: "DELETE",
				success: function(result) {
        			$("#tr_escort_" + id).fadeOut();
    			}
			})
		}
	});
});