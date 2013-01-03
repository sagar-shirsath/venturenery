<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script type='text/javascript' src="flexcroll.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type='text/javascript'>
    function showMore() {
	{	more = document.getElementById("more");
		more.style.visibility = (more.style.visibility == "visible") ? "hidden" : "visible";
		}
	{   more = document.getElementById("more");
		more.style.visibility = (more.style.display == "block") ? "none" : "block";
		}
// 	{	main = document.getElementById("main");
// 		main.style.visibility = (main.style.visibility == "visible") ? "hidden" : "visible";
// 	}
}

    function overlay() {
	el = document.getElementById("overlay");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";

}
</script>
  </head>

<body>
	<div id="container">
		<div id="header">
			<div class="wrapper">
				<a href="/"><div id="logo">
				</div></a>
	
	
	<!-- 		Searchbar -->
				<div class="search-wrapper">
					<form action="#" name="search">
						<div class="search-box">
							<input name="seach" type="text" value="Search..." />
						</div>
						<input class="submit-button" name="Go" type="submit" />
					</form>
				</div>
				
	<!-- 		Dropdown menu -->
				<ul id="navbar">
				  <!-- The strange spacing herein prevents an IE6 whitespace bug. -->
					 <li><a href="company.php">Company</a><li>
					 <li><a href="person.php">Person</a><li>
					 <li><a href="#">Menu</a>
					 	<ul>
							<li><a href="/">Home</a></li>
							<li><a href="/register.php">Register</a></li>
							<li><a href="/login.php">Login</a></li>
							<li><a href="/watchlist.php">My Watchlist</a></li>
					 	</ul>
					  </li>
				</ul>
			</div>
		</div>
		
		
		
