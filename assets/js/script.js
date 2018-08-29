function addToCart(itemid){
	let id = itemid;
	// console.log(id);
	let quantity = $('#itemquantity'+id).val();
	// console.log(id+": "+quantity);


	$.ajax({
		url : "controllers/add_to_cart.php",
		data : {id : id, quantity : quantity},
		method: "POST",
	}).done(data =>{
		$('#successMessage'+id).html(data);
	});

}

