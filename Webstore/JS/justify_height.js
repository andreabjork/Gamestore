// this is purely to keep the footer at the bottom of the page.
$(window).on("load resize",scaleHeight);

// when an item from the cart is removed, scale height again.
$(".remove").click(scaleHeight);

// Usage: scaleHeight()
// Post:  if the height of the contents of the page (under normal circumstances)
//		  would not fill the height of the viewport, the height of the content are has been
//		  increased to fit the viewport. 
function scaleHeight(){
	$(".container").height("auto");
	
	var Dheight = $(document).height();
	var Wheight = $(window).height();
	
	
	var height = Math.max(Dheight,Wheight);
	
	
	var headerHeight = 180;
	var footerHeight = 100;
	var contentHeight = $(".container").height();
	
	
	var totalHeight = headerHeight + footerHeight + contentHeight;

	var availableHeight = height-(headerHeight+footerHeight);
	$(".container").height(availableHeight);
	var newHeight = $(".container").height();
	var diff = newHeight-availableHeight;
}

