$(document).ready(function(){
	$('#select-cat').change(function(){
		if($('#select-cat option:selected').text().toLowerCase() === 'zapatos' 
			|| $('#select-cat option:selected').text().toLowerCase() === 'calzado'){
			$('#shoes-pick').removeClass('hidden');
		}else{
			$('#shoes-pick').addClass('hidden');			
		}
	});
	getCategory();

	$('#name-category').on('keypress',function(key){
		if(key.keyCode === 13){
			key.preventDefault();
			$('#add-category').click();
		}
	})
	$('#add-category').click(function(){
		var data 	= $('#name-category').val();
		var route 	= "http://localhost:8000/categories";
		var token   = $('#token').val();

		$.ajax({
			url: route,
			headers:{'X-CSRF-TOKEN': token},
			type: "POST",
			dataType: "json",
			data:{name: data}		
		}).promise().done(function(){
			$('#loading').removeClass('hidden');			
		}).done(function(){
			$('#loading').addClass('hidden');
			$('#name-category').val(null);
			Toast.defaults.width = '800px';
			Toast.success('Categoria Agregada', 'Exito');
			getCategory();
		});
	});

	$('#input').on('keypress',function(key){
		if($('#input').val().length  === 0){
			// prevent space bar
			if(key.which === 32){
				return false;
			}			
		}
		if($('#input').val().length !== 0 && key.keyCode === 13){
			var data  = $('#input').val();
			var route = "http://localhost:8000/search";
			var token = $('#token').val();

			$.ajax({
				url: route,
				headers:{'X-CSRF-TOKEN': token},
				type: 'POST',
				data: {param:data}
			}).promise().done(function(){
				$('#onload').removeClass('hidden');				
			}).done(function(data){
				$('#onload').addClass('hidden');
				$('#main-panel').html("");							
				$('#main-panel').html(data);
			});
		}
	});

	if( $('#edit-select option:selected').text().toLowerCase() === 'zapatos' || 
		$('#edit-select option:selected').text().toLowerCase() === 'calzado' ) {
		$('#shoes-pick').removeClass('hidden');
	}else{
		$('#shoes-pick').addClass('hidden');
	}

	$('#edit-select').change(function(){
		if( $('#edit-select option:selected').text().toLowerCase() === 'zapatos' || 
			$('#edit-select option:selected').text().toLowerCase() === 'calzado' ) {
				$('#shoes-pick').removeClass('hidden');
		}else{
			$('#shoes-pick').addClass('hidden');
			$('.case-shoes').removeAttr('checked');
		}
	});


	// Waste

	$('.editWaste').on('click',function(){
		var route = "http://localhost:8000/waste/"+$(this).val();

		$.get(route,function(res){
			$('#user').val(res.user);
			$('#waste_id').val(res.waste.id);
			$('#date-waste').val(res.waste.created_at);
			$('#waste-money').val('$'+res.waste.money);
			$('#waste_money').val(res.waste.money);
			$('#box-select').val(res.waste.box_id);
			$('#old_money').val(res.waste.box_id);
		});
	});

}); // fin del ready

function preview(input){
	if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#shown').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function getCategory(){
	$('#categoryTable').empty();
	$('#select-cat').empty();
	$('#select-cat').append("<option value='selected' disabled selected>Escoge la categoria</option>");
	var select = $('#select-cat');
	var tabla  = $('#categoryTable');		
	var route  = "http://localhost:8000/categories-list";

	$.get(route,function(res){
		$(res).each(function(key,value){
			tabla.append("<tr><td>"+ (key+1) +"</td>"+
						"<td>"+ value.name +"</td>"+
						"<td><button value='"+ value.id +"' OnClick='showElement(this);' data-toggle='modal' data-target='#modal' class='btn btn-warning btn-sm mr'>"+
						"<i class='fa fa-pencil'></i>"+
                        "</button>"+
                        "<button class='btn btn-danger btn-sm' value='"+ value.id +"' OnClick='deleteElement(this);'>"+
                            "<i class='fa fa-times'></i>"+
                        "</button></td></tr>");
			select.append("<option value='"+ value.id +"'>"+ value.name +"</option>");
		});
	});
};

function showElement(btn){
	var route = "http://localhost:8000/categories/"+btn.value+"/edit";
	$.get(route,function(res){
		$('#newName-category').val(res.name);
		$('#id').val(res.id);
	});
};

function deleteElement(btn){
	var route = "http://localhost:8000/categories/"+ btn.value +"";
	var token = $('#token').val();

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
	}).done(function(data){
		if(data.message === "Has"){
			Toast.defaults.width = '800px';
			Toast.error('No se puede eliminar la categoria (Articulos registrados en ella)', 'Error');
		}else{
			getCategory();	
			Toast.defaults.width = '800px';
			Toast.success('Categoria Eliminada', 'Exito');
		}		
	}).error(function(error){
		console.log(error);
	});
}

$('#update-category').click(function(){
	var id 	  = $('#id').val();
	var data  = $('#newName-category').val();
	var route = "http://localhost:8000/categories/"+ id +"";
	var token = $('#token_u').val();

	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data:{name: data},
	}).done(function(){
		getCategory();
		$('#modal').modal('toggle');
		Toast.defaults.width = '800px';
		Toast.success('Categoria Actualizada', 'Exito');
	}).error(function(error){
		console.log(error);
	});
});