<script type="text/javascript">
			
			$('.delete-btn').click((e)=>{
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


			$('.edit-btn').click((e)=>{
				let itemToEdit = e.target.getAttribute('data-index');
				

				$.ajax({
					url : 'controllers/edit_show_item.php',
					method : 'post',
					data : {id : itemToEdit},
				}).done(data =>{
					let product = JSON.parse(data);
					product.forEach((item)=>{
						$('#hidden-item-id-edit').val(itemToEdit);

						$('#edit-name').val(item['name']);

						$('#'+item['category_id']).attr("selected", "true");

						$('#edit-price').val(item['price']);

						

						$('#edit-description').html(item['description']);
						
						$('#modal-image-edit').attr("src", item['image_path']);
						
						
					});

				});

			});



		</script>