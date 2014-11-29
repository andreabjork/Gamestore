// make sure not to display decrement button if quantity is 0.
$(window).load(updateDecButton());

// Handle any button click, except proceed to checkout.
$('.cartBtn').click(function(e){
	var id = $(e.target).attr('prod_id');
	var type = $(e.target).attr('class').split(" ");
	var username = $(e.target).attr('user');
	var $thisBtn = $(this);
	
	$.ajax({
		url: 'cart_actions.php',
		data: {action: type[1], user: username, prod_id: id},
		type: 'post',
		success: function(output) {
			updateCart(type[1], $thisBtn);
		}
	});
	
});

// Handle proceed to checkout
$('.checkout').click(function() {
	alert('We regret to inform you that the site you are on is a dummy site! We will not sell you any of these boardgames');
});

// Usage: updateCart(type, btn)
// Pre:   type is one of: 'increment', 'decrement' or 'remove'.
//		  btn is the pressed button, and corresponds to the type.
// Post:  the appropriate function has been called.
function updateCart(type, btn){
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
		default:
			break;
	}
}

// Usage: increment(btn)
// Pre:   btn is an increment button
// Post:  the quantity of the cartItem which btn belongs to has
//		  been increased by 1. Price and Subtotal have been adjusted
function increment(btn) {
	var spanEle = btn.parent().children();
	var quantity = spanEle[1].innerHTML;
	
	var cartItem = btn.parent().parent().children();
	var itemPrice = (($(($(($(cartItem[0]).children())[1]).children())[1]).children())[0]).innerHTML;
	var itemTotPrice = ($(($(($(cartItem[0]).children())[1]).children())[2]).children())[0];
	var oldTotPrice = itemTotPrice.innerHTML;
	var subtotal = $("#subTot")[0];
	var oldSubtotal = $("#subTot")[0].innerHTML;
	
	spanEle[1].innerHTML = parseInt(quantity)+1;
	itemTotPrice.innerHTML = (parseFloat(oldTotPrice)+parseFloat(itemPrice)).toFixed(2);
	subtotal.innerHTML = (parseFloat(oldSubtotal)+parseFloat(itemPrice)).toFixed(2);
	
	if(parseInt(quantity)===1) {
		$(spanEle[2]).css("display", "block");
	}
}

// Usage: increment(btn)
// Pre:   btn is a decrement button
// Post:  the quantity of the cartItem which btn belongs to has
//		  been decreased by 1. Price and Subtotal have been adjusted
function decrement(btn){
	var spanEle = btn.parent().children();
	var quantity = spanEle[1].innerHTML;
	
	var cartItem = btn.parent().parent().children();
	var itemPrice = (($(($(($(cartItem[0]).children())[1]).children())[1]).children())[0]).innerHTML;
	var itemTotPrice = ($(($(($(cartItem[0]).children())[1]).children())[2]).children())[0];
	var oldTotPrice = itemTotPrice.innerHTML;
	var subtotal = $("#subTot")[0];
	var oldSubtotal = $("#subTot")[0].innerHTML;
	
	if(parseInt(quantity)>1) {
		spanEle[1].innerHTML = parseInt(quantity)-1;
		itemTotPrice.innerHTML = (parseFloat(oldTotPrice)-parseFloat(itemPrice)).toFixed(2);
		subtotal.innerHTML = (parseFloat(oldSubtotal)-parseFloat(itemPrice)).toFixed(2);
	}
	if(parseInt(quantity)<=2) {	
		btn.css("display", "none");
	}

}

// Usage: increment(btn)
// Pre:   btn is a remove button
// Post:  the cartItem which btn belongs to has been removed. Subtotal has been adjusted.
function remove(btn){
	var cartItem = btn.parent().children();
	var itemTotPrice = ($(($(($(cartItem[0]).children())[1]).children())[2]).children())[0];
	var oldTotPrice = itemTotPrice.innerHTML;
	var subtotal = $("#subTot")[0];
	var oldSubtotal = $("#subTot")[0].innerHTML;
	subtotal.innerHTML = (parseFloat(oldSubtotal)-parseFloat(oldTotPrice)).toFixed(2);
	
	btn.parent().remove();
	
	var prevAmount = $('.incart')[0].innerHTML;
	$('.incart')[0].innerHTML = parseInt(prevAmount)-1;

}

// Usage: updateDecButton()
// Post:  all cartItems with quantity 0 now have their decrement button hidden.
function updateDecButton() {
	var decbuttons = $('.decrement');
	var quant = $('.quantity');
	for (var i=0; i < quant.length; i++) {
	  if(quant[i].innerHTML < 2) {
	  		$(decbuttons[i]).hide();
	  }
	};
}
