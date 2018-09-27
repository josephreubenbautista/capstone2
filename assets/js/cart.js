$('#alert-checkout').hide();

$('#checkout-submit').click(()=>{
	let address = $('#addresscart').val();

	if(address==0){
		$('#alert-checkout').show();
	}else{
		$('#form-of-checkout').submit();
	}

});
$('#modal-cart-remove').click(()=>{
	let id = $('#hidden-item-id').val();
	$('.div'+id).hide();

	let itemQty = parseInt($('#qty'+id).text());

	let oldSub = parseInt($('#sub'+id).text().split(',').join(''));
	let oldTotal = parseInt($('#total-price').text().split(',').join(''));

	let totalQty = parseInt($('#total-quantity').text());

	let totalQuantity = 0;
	totalQuantity = totalQty - itemQty;
	$('#total-quantity').html(totalQuantity);


	let totalItem = parseInt($('#total-items').text()) - 1;
	$('#total-items').html(totalItem);

	let total = 0;
	total = oldTotal-oldSub;
	$('#total-price').html(total);

	$.ajax({
		url : "controllers/delete_from_cart.php",
		data : {id : id},
		method: "POST",
	}).done(data =>{
		$('#badge-cart').html(data);
		$('#total-quantity').html(data);
	});
 
});

$('.cart-btn-remove').click((e)=>{
	let itemToDelete = e.target.getAttribute('data-index');
	// console.log(itemToDelete);
	$.ajax({
		url : 'controllers/delete_show_item.php',
		method : 'post',
		data : {id : itemToDelete},
	}).done(data =>{
		let product = JSON.parse(data);
		// console.log(product);
		product.forEach((item)=>{
			$('#item-name').html(item['name']);
			$('#item-category').html(item['category']);
			$('#modal-image').attr("src", item['image']);
			$('#hidden-item-id').val(itemToDelete);
						
		});
	});
});

$('.cart-btn-update').click((e)=>{
	let id = e.target.getAttribute('data-index');
	let oldQty = parseInt($('#qty'+id).text());

	let oldSub = parseInt($('#sub'+id).text().split(',').join(''));
	let oldTotal = parseInt($('#total-price').text().split(',').join(''));

	let olditemqty = $('#hidden-item-qty'+id).val();
	let quantity = $('#cart-item-qty'+id).val();

	if (quantity.length==0){
		$('#errormessages'+id).html('Please Input valid quantity');
		$('#cart-item-qty'+id).val(olditemqty);
	}else{

		if(quantity<=0){
			$('#errormessages'+id).html('Please Input valid quantity');
			$('#cart-item-qty'+id).val(olditemqty);
		}else{
			$('#errormessages'+id).html('');
			$('#hidden-item-qty'+id).val(quantity);
			$.ajax({
				url : "controllers/update_the_cart.php",
				data : {id : id, quantity : quantity},
				method: "POST",
			}).done(data =>{
				data = JSON.parse(data);
				let product = data.product;
				$('#badge-cart').html(data.quantity);
				$('#total-quantity').html(data.quantity);

				let sub = 0;
				let total=0;
				product.forEach((item)=>{
					sub=quantity*item['price'];

					$('#sub'+id).html(sub.toFixed(2));
					$('#qty'+id).html(quantity);
								
					total = oldTotal-oldSub+sub;
					console.log(total);
					$('#total-price').html(total.toFixed(2));
								
					if(quantity!=oldQty){
						// console.log(oldQty);
						$('#msg').html('Successfully updated quantity of '+item['name'])
					}else{
						$('#msg').html('The quantity you have submitted is the same as the quantity you originally ordered.')
					}


							
					$('#msgBox').show();
				});

							

			});
			
		}
	}
				

});

$('.okbtn').click(()=>{
				
	$('#msgBox').hide();
});



