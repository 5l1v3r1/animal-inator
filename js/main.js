// Front-End Development by: BlackVikingPro

console.log("Custom Commands (For development) ->");

function help() {
	console.log("\nclear() - Clears Console\nreload() - Reloads Page\ndie() - Kills Current Script\nexit() - Exits Page\n");
	console.log("help() - Displays help info\nserve(\"\") - Type 'help_serve()' for more info.\nlogOut() - Logs out of current session");
	console.log("\nNote: If you go 'logOut()' without being in an active session. It will clear ALL browser cache associated with this site.");
}
help();

function help_serve() {
	console.log("Syntax = serve('') | Target site url goes in between -> ('') <- \nLoads up target site between these params.");
}

// for ease with development
function reload() {
	window.location.reload();
}

function die() { return false; } // kills script

function exit() {
	$(window).unload();
	window.location = "about:blank"; // if this doesn't work, let's redirect them to "about:blank"
}

function serve(site) {
	var site;
	if (site === undefined) {
		// wait for user input
	} else if (site != undefined) {
}
return window.location = site;
}

var user = $('#user').val();

// check for a session
if ($.session.get("user") != null) {
	// session exists
	$(".flipper").toggleClass("rotator");
	var user = $.session.get("user");
} else {
	// no session here.
}

$(document).keypress(function(e) {
if(e.which == 13) { // key code "13" is global for "Enter" key

var user = $('#user').val();
if (user.length > 20) { // config this to change allowed amount of characters in the username
	// $("#msg").html("Uh oh, username seems to be just a bit too long. Please shorten it now.");
	$("#msg").html("<br /><br />Uh oh, username seems to be just a bit too long. Please shorten it now.");
	return false;
} else {
	// users length stays within the required amount
}

if (user.length != 0) {
	flipPage();
	// $("#msg").html("<br /><span>Shall this be your username? <button class=\"btn waves-effect waves-light green\" onclick=\"flipPage();\">Yes</button></span>");
} else {
	return false;
}

}
});

// let's use a bit of jQuery Ajax
function changeUsername() {
	var user = $('#user').val();
	$("#username-display").text(user);
	changeCounter();
	$.session.set("user", user);
}

if (user.length == 0) {
	$('#chars-left').text("20");
}

function changeCounter() {
	var user = $('#user').val();
	var length = user.length;
	var max_chars = 20;
	var get_chars = 20 - length;
	$('#chars-left').text(get_chars);
}

/* Now, let's do some stuff once username is set! */

function flipPage() {
	var user = $.session.get("user");
	$(".flipper").toggleClass("rotator");
	$('#greetings').text(user);
	showHint();
}

function mainFunctions() {
	var user = $.session.get("user");
	// console.log(user);
	$('#greetings').text(user);
}

mainFunctions();

function logOut() {
	// log out
	$.session.remove('user');
	reload();
}

function setNewUser() {
	$(".flipper").toggleClass("rotator");
	$(".reverse").html("<button class=\"btn waves-effect waves-light green\" onclick=\"setNewUser();\">Return</button><br />");
	$("#user").focus();
}

// let's check user session on main screen
if ($.session.get("user") == undefined) {
	// show nothing
} else {
	$(".reverse").html("<button class=\"btn waves-effect waves-light green\" onclick=\"setNewUser();\">Return</button><br />");
}

// hopefully now we're bug free. let's do the main goal here.

function showHint() {
// var menuId = $("ul.nav").first().attr("id");
var user = $.session.get("user");
var request = $.ajax({
  url: "get_names.php",
  type: "GET",
  data: {user : user},
  dataType: "text"
});

request.done(function(msg) {
	console.log(user);
	console.log(msg);
  $("#txtHint").text( msg );
});

request.fail(function(jqXHR, textStatus) {
  alert( "Request failed: " + textStatus );
});
}

if (user != undefined) {
	showHint();
} else {
	// do nothing
}