$('.cartBtn').click(function(e){
	var id = $(e.target).attr('prod_id');
	var type = $(e.target).attr('class')[1];
	var username = $(e.target).attr('user');
	$.ajax({
		url: 'functions/cart_actions.php',
		data: {action: type, user: username, prod_id: id},
		type: 'post',
		success: function(output) {
			console.log(output);
			updateCart(type,id);
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

function increment(id){
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

