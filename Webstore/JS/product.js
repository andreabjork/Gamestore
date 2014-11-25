$('.addBtn').click(function() {
	var id = $(this).attr('name');
	var btn = $(this);
	$.ajax({
		url: 'cart_actions.php',
		data: {action: 'add', prod_id: id},
		type: 'post',
		success: function(output) {
			console.log(output);
			console.log('did we get in here?');
			updateButton(btn);
		}
	});
	
});

function getUser() {
	var url = window.location.href;
	var params = ((url.split("?"))[1]).split("&");
	var user = "guest";
	
	for (var i=0; i < params.length; i++) {
	  if(params[i].indexOf("user=") >-1) {
	  	user = (params[i].split("="))[1];
	  }
	}
	
	return user;
}

function updateButton(btn) {
	console.log('current value');
	console.log(btn.val());
	btn.val("Item added to cart!");
	console.log("new value");
	console.log(btn.val());
	btn.css("background-color", "#D47619");
	btn.css("width", "250px");
}
