$(function(){
	$(".btnDelete").click(function(e){
		e.preventDefault()

		if(confirm('¿Esta seguro de eliminar este usuario?')){
			var id = $(this).attr('data-user-id');


			$.ajax({
				url: HOME + '/api/users/' + id,
				type: "DELETE",
				success: function(result) {
        			$("#tr_user_" + id).fadeOut();
    			}
			})
		}
	});
});