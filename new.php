<?php

error_reporting(0);
if ($_POST["name"]) {
	// for xss prevention
	$name = htmlspecialchars($_POST["name"])."\n";

	// let's log this data for later
	$log_file = fopen("comm_names.txt", "a") or die("Unable to open file!");
	fwrite($log_file, $name);
	fclose($log_file);

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create a new name for Animal-Inator</title>

	<!-- Some files neccessary for this project -->
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/jquery.contextMenu.min.css"> -->
	<!-- AnimateCSS -->
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- Meta tags for page -->
	<meta name="copyright" content="Copyright by William Bohannon. 2016"/>
	<meta name="author" content="https://plus.google.com/+BlackViking/"/>
	<meta property="og:title" content="Front-End Development | BlackVikingPro"/>
	<meta property="og:description" content="My very first front-end development project"/>
	<meta name="twitter:card" content="First Front-End Development Project">
	<meta name="twitter:site" content="@BlackVikingPro">
	<meta name="twitter:creator" content="@BlackVikingPro">
	<meta name="twitter:url" content="https://lab.blackvikingpro.com/front-end/">
	<!-- Make site non-caching for future updates -->
	<meta http-equiv="Pragma" content="no-cache">
</head>
<body>

<div class="container">
<form action="" method="post" class="form">
	<center><label>Think of a animal name: </label></center><input type="text" name="name" required="" autofocus="">
</form>
</div>

<center>
	Go back <a href="/animal-inator">home</a>
</center>

<!-- jQuery Plugins -->
<script src="js/jquery.session.js"></script>
<script src="js/jquery.cookie.js"></script>
<!-- <script src="js/jquery.contextMenu.min.js"></script>
<script src="js/jquery.clipboard.min.js"></script> -->
<!-- Other JavaScript Files -->
<script src="js/materialize.min.js"></script>

<script>
	$(document).keypress(function(e) {
		if(e.which == 13) { // if user hits "Enter"
		$('.form').submit();
		alert("Thanks for the contribution!")
	}
	});
</script>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77900006-1', 'auto');
  ga('send', 'pageview');

</script>


</body>
</html>