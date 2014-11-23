function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}   

$('.cartBtn').click(function(e){
	var id = $(e.target).attr('prod_id');
	var type = $(e.target).attr('class')[1];
	var username = getUrlParameter('user');
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

