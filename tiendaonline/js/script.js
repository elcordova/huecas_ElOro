var inicio=function(){
	$(".cantidad").keyup(function(e){
		if($(this).val()!=''){
			if (e.keyCode==13) {
				var id= $(this).attr('data-id');
				var cantidad=$(this).val();
				var precio= $(this).attr('data-precio');
				alert(cantidad);
				$(this).parentsUntil('.divisor').find('.subtotal').text('Subtotal: '+(precio*cantidad));
				$.post('./js/modificarDatos.php',{
					Id:id,
					Precio:precio,
					Cantidad:cantidad
				},function(e){

					$("#total").text('Total: '+e);


				});

			}
		}
	});
}

$(document).on('ready',inicio);