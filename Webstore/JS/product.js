var id = getID();
var urls = getImages(id);
if($('.stock').hasClass('out')) { $('.addBtn').hide();}

$('.addBtn').click(function() {
	var id = $(this).attr('name');
	var btn = $(this);
	$.ajax({
		url: 'cart_actions.php',
		data: {action: 'add', prod_id: id},
		type: 'post',
		success: function(output) {
			if(output==="success"){
				updateButton(btn,"success");
				updateCart();
			} else {
				updateButton(btn,"existed");
			}
		}
	});
	
});

$('.subimg').click(function() {
	var buttonClass = $(this).attr('class');
	var imgClass = '.'+(buttonClass.split(" "))[1];
	var src = $(imgClass).attr('src');
	$('.mainImg').attr('src', src);
	
});

$('.mainImg').click(function() {
	var src = $('.mainImg').attr('src');
	$('.bigImg').attr('src', src);
	if(src.indexOf('1')) { current = 0;}
	else if(src.indexOf('2')) { current = 1;}
	else if(src.indexOf('3')) { current = 2;}
	$('.overlay').show();
});

$('.close').click(function() {
	$('.overlay').hide();
});

$('.next').click(function() {
	if(current < urls.length-1) {
		current++;
	}else{
		current = 0;
	}
	$('.bigImg').attr('src', urls[current]);
});

$('.prev').click(function() {
	if(current > 0) {
		current--;
	}else{
		current = urls.length-1;
	}
	$('.bigImg').attr('src', urls[current]);
});

// Usage: updateButton(btn, result)
// Pre:   btn is a button on a single product page.
// Post:  if the item was not in the current users cart, it has now been added. A message describing
//        the action that has been taken has been put on the button.
function updateButton(btn, result) {
	if (result === "success"){
		btn.val("Item added to cart!");
		btn.addClass("added");
	}
	if (result === "existed"){
		btn.val("Item already in cart!");
		btn.addClass("exists");
	}
}

// Usage: updateCart()
// Post:  the items-in-cart number has been increased by 1.
function updateCart() {
	var prevAmount = $('.incart')[0].innerHTML;
	$('.incart')[0].innerHTML = parseInt(prevAmount)+1;
}

// Usage: var Id = getID()
// Post:  Id is the id of the product displayed.
function getID() {
	var url = window.location.href;
	var params = ((url.split("?"))[1]).split("&");
	var id=1;
	for (var i=0; i < params.length; i++) {
	  if(params[i].indexOf("id=") >-1) {
	  	id = (params[i].split("="))[1];
	  }
	}
	
	return id;
}


// Use: elem = getImgElements(subfolder)
// Pre: subfolder is a string corresponding to a folder name in location data/images/
// Post: elem is an object with attributes that are relevant to the content of tab 3 of the popup.
//		elem.imgUrl is an array for the image urls of tab and elem.imgDescript is an array for the image description texts of the tab.
function getImages(id) {
	var urls = [];
	var dir = "data/images/"+id;
	$.ajax({
	    //This will retrieve the contents of the folder if the folder is configured as 'browsable'
	    url: dir,
	    success: function (data) {
	        $images = $(data).find("a:contains(.jpg)");
	        $images.each(function () {
	            var hrefparts = this.href.split("/");
	            var n = hrefparts.length;
	            var filename = hrefparts[n-1];
	            var imgUrl = dir+'/'+filename;
	           	urls.push(imgUrl);	 
	        });
	    },
	    error: function() {
	    	console.log('error retrieving images');
	    }
	});
	return urls;
}



