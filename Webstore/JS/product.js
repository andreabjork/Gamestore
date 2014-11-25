console.log('running product.js');
var id = getID();
console.log('our id:');
console.log(id);
getImages(id);


$('.addBtn').click(function() {
	var id = $(this).attr('name');
	var btn = $(this);
	imageUrls = getImages(id);
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

function updateButton(btn) {
	console.log('current value');
	console.log(btn.val());
	btn.val("Item added to cart!");
	console.log("new value");
	console.log(btn.val());
	btn.css("background-color", "#D47619");
	btn.css("width", "250px");
}

function setImages(urls) {
	var mainImage = urls[0];
	console.log('setting images...');
	console.log('this will be the image url: ');
	console.log(mainImage);
	console.log('current source');
	console.log($('.mainImg').attr('src'));
	$('.mainImg').attr('src', mainImage);
	console.log('new source');
	console.log($('.mainImg').attr('src'));
	
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
	        $images.each(function () {
	            var filename = this.href.replace("https://notendur.hi.is/abb27/Lokaverkefni/", "");
	            console.log('this is the files name:');
	            console.log(filename);
	            var imgUrl = dir+'/'+filename;
	            console.log('this is the file url');
	            console.log(imgUrl);
	           	urls.push(imgUrl);	 
	        });

	        if(urls.length === 0) {
	        	urls = ['#'];
	        }
	    	setImages(urls);
	    },
	    error: function() {
	    	console.log('error retrieving images');
	    }
	});
}



