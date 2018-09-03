$('.add-to-cart-btn').click((e)=>{
	let id = e.target.getAttribute('data-index');

	let quantity = $('#itemquantity'+id).val();
				
	$.ajax({
		url : "controllers/add_to_cart.php",
		data : {id : id, quantity : quantity},
		method: "POST",
	}).done(data =>{
		data = JSON.parse(data);
		let product = data.product;
					
		$('#badge-cart').html(data.quantity);

		product.forEach((item)=>{
			$('#msg').html(quantity+" item/s of "+item['name']+" successfully added to cart.")
			$('#msgBox').show();
		});

					

	});

});

$('.okbtn').click(()=>{
	$('.item-qty').val('1');
	$('#msgBox').hide();
});
