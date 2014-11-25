$("#products").hover(function()  {
	console.log("hovering on it!");
	$(".dropDown").css("display", "block");
}, function() {
	console.log('stopped hovering');
	$(".dropDown").css("display", "none");
});

$(".dropDown").hover(function()  {
	console.log("hovering on it!");
	$(".dropDown").css("display", "block");
}, function() {
	console.log('stopped hovering');
	$(".dropDown").css("display", "none");
});


$('#signin').click(function() {
	$(".signBox").show();
});

$('.logout').click(function() {
	console.log("trying to log out here!");
	$.ajax({
		url: 'login.php',
		data: {logout: 1},
		type: 'post',
		success: function(output) {
			if(output === "success"){
				console.log("Útskráning tókst!");
				signOut();
			}else{
				console.log("Eitthvað fór úrskeiðis :C");				
			}
		}
	});
});


$('#signBtn').click(function() {
	var user = $("#nameField").val();
	var pwd = $("#passwordField").val();
	var pwdMD5 = $.md5(pwd); 
	
	
	$.ajax({
		url: 'login.php',
		data: {username: user, password: pwdMD5},
		type: 'post',
		success: function(output) {
			if(output === "success"){
				$(".signBox").hide();
				setUser(user);
				console.log("Innskráning tókst! Reynum að fela");
			}else if(output === "failure"){
				console.log("Innskráning mistókst :(");
			}else{
				console.log("Eitthvað fór úrskeiðis :C");				
			}
		}
	});
});

function setUser(user) {
	$('.currentUser').show();
	$('#signin').hide();
	$('#cart').show();
	$('.userName')[0].innerHTML = user;
}

function signOut(){
	window.location.href = "index.php";
}
