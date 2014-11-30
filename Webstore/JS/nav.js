// Open up the dropdown menu when hovering on 'Our products':
$("#products").hover(function()  {
	$(".dropDown").css("display", "block");
}, function() {
	$(".dropDown").css("display", "none");
});

// Keep the drop down menu open when hovering on it:
$(".dropDown").hover(function()  {
	$(".dropDown").css("display", "block");
}, function() {
	$(".dropDown").css("display", "none");
});

// toggle the sign in frame when 'Sign in!' is clicked:
$('#signin').click(function() {
	$(".signBox").toggle();
	$("#nameField").focus();
});

// logout from the current user when 'logout' is clicked:
$('.logout').click(function() {
	console.log("trying to log out here!");
	$.ajax({
		url: 'login.php',
		data: {logout: 1},
		type: 'post',
		success: function(output) {
			if(output === "success"){
				signOut();
			}else{			
			}
		}
	});
});

$('#signBtn').click(login);

// Use: login()
// Post: If credentials were valid, the user has been logged in, otherwise nothing has happened.
function login() {
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
				$("#loginError").hide();
				setUser(user);
			}else if(output === "failure"){
				$("#loginError").show();
				console.log("Login failed.");
			}else{
				$("#loginError").show();
				console.log("Something went wrong!");				
			}
		}
	});
	return false;
}

// Use: setUser(user)
// Pre: user is a valid user from Customers
// Post: The layout of the site has been updated for this user to display his cart and username.
function setUser(user) {
	$('.currentUser').show();
	$('.addBtn').show();
	$('#signin').hide();
	$('#cart').show();
	$('.userName')[0].innerHTML = user;
}

// Use: signOut()
// Post: user will be signed out and redirected to index.php.
function signOut(){
	window.location.href = "index.php";
}
