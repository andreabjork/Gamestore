$(window).on("load resize",scaleHeight);

function scaleHeight(){
	$(".container").height("auto");
	
	var Dheight = $(document).height();
	var Wheight = $(window).height();
	
	
	var height = Math.max(Dheight,Wheight);
	
	
	var headerHeight = 180;
	var footerHeight = 100;
	var contentHeight = $(".container").height();
	
	
	var totalHeight = headerHeight + footerHeight + contentHeight;

	var availableHeight = height-(headerHeight+footerHeight)-5;
	$(".container").height(availableHeight);
	var newHeight = $(".container").height();
	var diff = newHeight-availableHeight;
}

