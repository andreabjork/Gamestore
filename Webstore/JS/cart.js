$('.cartBtn').click(function(e){
	var id = $(e.target).attr('prod_id');
	var type = $(e.target).attr('class').split(" ");
	var username = $(e.target).attr('user');
	var $thisBtn = $(this);
	console.log('what is this?');
	console.log($thisBtn);
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
			console.log('did we get in here?');
			updateCart(type[1], $thisBtn);
			console.log('get past this?');
		}
	});
	
});



function updateCart(type, btn){
	console.log("updating Cart....");
	switch(type){
		case 'increment':
			increment(btn);
			break;
		case 'decrement':
			decrement(btn);
			break;
		case 'remove':
			remove(btn);
			break;
		case 'add':
			add(btn);
			break;
		default:
			break;
	}
}

function increment(btn) {
	var spanEle = btn.parent().children();
	var quantity = spanEle[1].innerHTML;
	spanEle[1].innerHTML = parseInt(quantity)+1;
	if(parseInt(quantity)===1) {
		$(spanEle[2]).css("display", "block");
	}
}

function decrement(btn){
	var spanEle = btn.parent().children();
	var quantity = spanEle[1].innerHTML;
	if(parseInt(quantity)>1) {
		spanEle[1].innerHTML = parseInt(quantity)-1;
	}
	if(parseInt(quantity)<=2) {	
		btn.css("display", "none");
	}

}

function add(id){
	return "";
}

function remove(btn){
	btn.parent().remove();
	
}

