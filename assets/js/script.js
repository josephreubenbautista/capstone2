

// let deleteElement = document.querySelectorAll('[id^="delete"]');


// deleteElement.forEach(function (element){
	document.addEventListener('click', function (e) {
		let taskToDelete = e.target.getAttribute('data-index');


		//ajax request
		$.post('controllers/delete.php',
			{id: taskToDelete},
			function (data){
				let tasks = JSON.parse(data);
				let htmlString = '';
				tasks.forEach(function (task){

					htmlString += `<li><span><i id="delete${task['id']}" data-index="${task['id']}" class="far fa-trash-alt"></i></span>${task['name']}</li>`;
				});

				let pending = document.querySelector('#completedTask');
				pending.innerHTML = htmlString;
			});

	});

// });
// document.addEventListener('click', deleteElement, function (){
// 	console.log(deleteElement.id);


// });












