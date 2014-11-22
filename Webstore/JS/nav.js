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
