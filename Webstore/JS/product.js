$('.addBtn').click(function() {
	var user = getUser();
	var id = $(this).attr('name');
	
	$.ajax({
		url: 'cart_actions.php',
		data: {action: 'add', user: user, prod_id: id},
		type: 'post',
		success: function(output) {
			console.log(output);
			console.log('did we get in here?');
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
