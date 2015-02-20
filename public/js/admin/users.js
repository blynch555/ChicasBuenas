$(function(){
	$(".btnDelete").click(function(e){
		e.preventDefault();

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

	$(".btnSendEmail").click(function(e){
		e.preventDefault();

		var email = $(this).attr('data-email');
		$("#email").val(email);

		$("#dlgSendMessage").modal('show');
	});

	$("#btnSendMessage").click(function(e){
		e.preventDefault();

		var email = $("#email").val();
		var subject = $("#subject").val();
		var body = $("#body").val();

		$.post(HOME + '/send-email', {email: email, subject: subject, body: body}, function(){
			$("#dlgSendMessage").modal('hide');

			$("#email, #subject, #body").val('');
		});
	});
});