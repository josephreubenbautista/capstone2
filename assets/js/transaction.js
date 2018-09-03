$('.transactcode').click((e)=>{

	let id = e.target.getAttribute('data-index');
				

	$('#customername').html($('#tdname'+id).text());
	$('#date').html($('#date'+id).text());

	let transactionCode = $('#transcode'+id).text();
	$.ajax({
		url : "controllers/order_details.php",
		data : {code : transactionCode},
		method: "POST",
	}).done(data =>{
		data = JSON.parse(data);
		let products = data.product;
					
		let quantity = data.quantity;
		let det = '';
		products.forEach((item,index)=>{
			// console.log(item['image_path']);
						
			det+='<tr><td><img class="img-fluid transact-image" src="'+item['image_path']+'""></td><td></td><td></td><td></td><td><p><small>Product Name:   </small><strong>'+item['name']+'</strong></p><p><small>Quantity:   </small><strong>'+quantity[index]+'</strong></p></td></tr>'

						
						
		});

		$('#det').html(det);
						
	});

								

});