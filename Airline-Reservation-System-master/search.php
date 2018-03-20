<?php
	require('connect.inc.php');
	session_start();


	if(isset($_POST['del']) && !empty($_POST['del'])){
		$del=$_POST['del'];
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
		{
			$id=$_SESSION['user_id'];
			if($del=='delete'){
				$query="DELETE FROM `users` WHERE `id` = $id ";
				mysql_query($query);
				session_unset();
				session_destroy();
			}
		}
	}
?>
<html>

	<head>
		<title>AAND RESERVATION | Home</title>
		<link rel="stylesheet" href="style.css" type="text/css"/>
		
			<script type="text/javascript">
		function images(){
				var image=["14.jpg","16.jpg","15.jpg"];
				var po=document.getElementById('im');
				console.log(po);
				var s=1;
				setInterval(function(){
					var op=1;
					po.style.opacity=op;
					po.src=image[s];
/*						setInterval(function(){
							po.style.opacity=op;
							op-=0.05;
						},500)*/
					s=(s+1)%3;
					op=1;
					//console.log(s);
				},3000);
			}
	</script>
		
	</head>

	<body onload="images()">
		<header>
			<div>
			<a href="search.php"><div id="header_left">
			<img id="site_logo" src="logo.png"/>
			<h1 class="title">AAND RESERVATION</h1>
			</div></a>
			<div id="header_right">
				<ul>
					<?php 
						if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
						{
							if(isset($_SESSION['airline_admin']) && !empty($_SESSION['airline_admin']))
							{
								echo"<a href='airline.php'><li class='outer_li'>Airline Details</li></a>";
							}
							echo"<li class='outer_li account'><a href=''>Account</a><ul class='inner'>";	
							echo"<a href='previous.php'><li  class='inner_li'>View Previous Bookings</li></a>";	
							echo"<a href='profile.php'><li class='inner_li'>Edit Profile</li></a>";	
							echo"<a href='logout.php'><li class='inner_li'>Logout</li></a>";	
							echo"</ul></li>";	
						}
						else
						{
							echo"<a href='login.php'><li class='outer_li'>Login / Register</li></a>";							
						}
					?>

				</ul>
			</div>
			</div>
		</header>
		<section>
			
			<div id="login_div">
				
				<div id="image_div">
							<img src="17.jpg" id="im"/>
				</div>
				
				<div id="not_image">
					<form action="list.php" method="post">
					<select  id="source" class="big_search" name="source" required>
						<option value="" disabled selected>Source</option>
						<option>Bangalore</option>	
						<option>Chennai</option>	
						<option>Delhi</option>	
						<option>Mumbai</option>	
						<option>Vizag</option>	
					</select>	
					<select class="big_search destination" name="destination" placeholder="Destination" required>
						<option value="" disabled selected>Destination</option>
						<option>Bangalore</option>	
						<option>Chennai</option>	
						<option>Delhi</option>	
						<option>Mumbai</option>	
						<option>Vizag</option>
					</select>
					<!--<input id="source" class="big_search" name="source" placeholder="Source" required/>-->
					<!--<input class="big_search destination" name="destination" placeholder="Destination" required/>-->
					<input class="med_search" name="date" type="date" max="2019-12-31" min="2017-01-01" required/>
					<input class="med_search destination" name="number" type="number" id="numb" min="1" max="5" placeholder="Travellers" required/>
					<input class="button med_search" type="submit" value="Search"/>
				</form>
				</div>
				
			</div>
		</section>
		
		<footer>
			<hr/>
			<p>&copy; 2017-2018 AAND RESERVATION</p>
		</footer>
	</body>

</html>