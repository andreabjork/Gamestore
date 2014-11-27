var id = getID();
console.log('our id:');
console.log(id);
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
			console.log(output);
			console.log('did we get in here?');
			updateButton(btn);
			if(output==="success"){
				console.log("item successfully added to cart, updating cartnumber");
				updateCart();
			} else {
				console.log("item was already in cart, not updating cartnumber");
			}
		}
	});
	
});

$('.subimg').click(function() {
	console.log('detecting click!');
	var buttonClass = $(this).attr('class');
	console.log(buttonClass);
	console.log(buttonClass[1]);
	var imgClass = '.'+(buttonClass.split(" "))[1];
	console.log(imgClass);
	var src = $(imgClass).attr('src');
	console.log(src);
	$('.mainImg').attr('src', src);
	
});

function updateCart() {
	var prevAmount = $('.incart')[0].innerHTML;
	console.log('UPDATING CART.............');
	console.log(prevAmount);
	$('.incart')[0].innerHTML = parseInt(prevAmount)+1;
}

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
	
	console.log(urls[current]);
	$('.bigImg').attr('src', urls[current]);
});

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


function updateImgpanel(urls) {
	console.log('length of urls!');
	console.log(urls.length);
	if(urls.length <= 1) {
		$('.subImgBoxes').hide();
	} else if(urls.length === 2) {
		$('.img3').hide();
	}
}

function updateButton(btn) {
	console.log('current value');
	btn.val("Item added to cart!");
	btn.addClass('added');
}


// Use: elem = getImgElements(subfolder)
// Pre: subfolder is a string corresponding to a folder name in location data/images/
// Post: elem is an object with attributes that are relevant to the content of tab 3 of the popup.
//		elem.imgUrl is an array for the image urls of tab and elem.imgDescript is an array for the image description texts of the tab.
function getImages(id) {
	var urls = [];
	var dir = "data/images/"+id;
	console.log('dir');
	console.log(dir);
	$.ajax({
	    //This will retrieve the contents of the folder if the folder is configured as 'browsable'
	    url: dir,
	    success: function (data) {
	        $images = $(data).find("a:contains(.jpg)");
	        console.log(data);
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



