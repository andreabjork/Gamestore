$('.cartBtn').click(function(e){
	var id = $(e.target).attr('prod_id');
	var type = $(e.target).attr('class').split(" ");
	var username = $(e.target).attr('user');
	console.log("this is the product id "+id);
	console.log('this is the extra class '+type[1]);
	console.log(typeof type);
	console.log('this is the username '+username);
	
	$.ajax({
		url: 'cart_actions.php',
		data: {action: type[1], user: username, prod_id: id},
		type: 'post',
		success: function(output) {
			console.log(output);
			//updateCart(type[1], id);
		}
	});
	
});

function updateCart(type,id){
	switch(type){
		case 'increment':
			increment(id);
			break;
		case 'decrement':
			decrement(id);
			break;
		case 'remove':
			remove(id);
			break;
		case 'add':
			add(id);
			break;
		default:
			break;
	}
}

function increment(id) {
	var selector = '#'+id+
	$(divID+'.incdec')[0].childNode;
}

function decrement(id){
	var divId = "#"+id;
	
}

function add(id){
	var divId = "#"+id;
	
}

function remove(id){
	var divId = "#"+id;
	
}

