$(window).on("load resize",scaleHeight);

function scaleHeight(){
	console.log("running scaleHeight");
	$(".container").height("auto");
	
	var Dheight = $(document).height();
	var Wheight = $(window).height();
	
	console.log("document: "+Dheight);
	console.log("window:   "+Wheight);
	
	var height = Math.max(Dheight,Wheight);
	
	console.log("height:   "+height);
	
	var headerHeight = 180;
	var footerHeight = 100;
	var contentHeight = $(".container").height();
	
	console.log("current height of content "+contentHeight);
	
	var totalHeight = headerHeight + footerHeight + contentHeight;

	var availableHeight = height-(headerHeight+footerHeight)-5;
	console.log("Available height for content is "+availableHeight);
	$(".container").height(availableHeight);
	console.log("Height should be changed now");
}

