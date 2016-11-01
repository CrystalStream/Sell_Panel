$(document).ready(function(){
	$(':checkbox').change(function(){
        if($(this).is(':checked')){
            $('.pass-field').attr('type','text');                
        }else{
             $('.pass-field').attr('type','password');
        }
    });

	$('.up-user').on('click',function(){		
		var btn = $(this).val();
		var route = "http://localhost:8000/admin/update-user/"+btn+"";
		$.get(route,function(res){
			$('#user-name').val(res.name);
			$('#rol-select').val(res.role_id);
			$('#id').val(res.id);
		});
	});

	$('.del-user').on('click',function(){
		var id = $(this).val();
		var route = "http://localhost:8000/admin/delete-user/"+id+"";
		var token = $('#token_admin').val();
		$.ajax({
			type: 'DELETE',
			url: route,
			dataType: 'json',
			headers: {'X-CSRF-TOKEN': token},
			data:{data:id}
		}).done(function(){
			location.reload();
		}).error(function(err){
			console.log(err);
		})
	});

	$('#update-user').on('click',function(){
		var id = $('#id').val();
		var route = "http://localhost:8000/admin/save-user/"+id+"";
		var token = $('#token_admin').val();
		var info = {
			name:    $('#user-name').val(),
			role_id: $('#rol-select').val(),
			password: $('#user-password').val()
		};
		$.ajax({
			type:'POST',
			url: route,
			dataType: 'json',
			headers: {'X-CSRF-TOKEN': token},
			data: {data: info}
		}).done(function(){
			location.reload();
		}).error(function(err){
			console.log(err);
		})
	})


}); // Find el ready
