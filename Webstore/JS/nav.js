$(function() {
	$("#products").hover(openDropDown(), closeDropDown());
});
function openDropDown() {
	console.log("hovering on it!");
	$(".dropDown").css("display", "block");
}

function closeDropDown() {
	console.log('stopped hovering');
	$(".dropDown").css("display", "none");
}

/*
$("#products").hover(function()  {
	console.log("hovering on it!");
	$(".dropDown").animate(
		{display: "block"},
		1500);
}, function() {
	console.log('stopped hovering');
	$(".dropDown").animate(
		{display: "none"},
		1500);
});

$(".dropDown").hover(function()  {
	console.log("hovering on it!");
	$(".dropDown").animate(
		{display: "block"},
		1500);
}, function() {
	console.log('stopped hovering');
	$(".dropDown").animate(
		{display: "none"},
		1500);
});
*/


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
	$(".signBox").css("display", "block");
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
				console.log("Innskráning tókst!");
			}else if(output === "failure"){
				console.log("Innskráning mistókst :(");
			}else{
				console.log("Eitthvað fór úrskeiðis :C");				
			}
		}
	});
});


