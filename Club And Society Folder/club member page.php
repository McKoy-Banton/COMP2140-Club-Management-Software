<?php
session_start();
#print_r($_SESSION);



?>





<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Club Member</title>
		<link href="club member page.css" type="text/css" rel="stylesheet" />
		<script src="club member page.js" type="text/javascript"></script>
	</head>

	<body>
		<header>
			<h1 id="Studentname">
			</h1>
			<nav>
				<ul id="NavLinks">
					<li><a href="user_profile.php"><button>User Profile</button></a></li>
					<li><a href="#"><button>View Recommend Clubs</button></a></li>
                    <li><a href="view_notification.php"><button>View Notifications</button></a></li>
                    <li><a href="edit student data.html"><button>Edit Student Data</button></a></li>
					<li><a href="search for club.html"><button>Search or Register</button></a></li>
					<li><a href="logout member.php"><button>Log Out</button></a></li>
				</ul>
			</nav>
		</header>

		<main>
			<div id="Main">
                
                <div id="Welcome">
                    <h2>Welcome!</h2>
                </div>
                
                    <div id="clubsarea">
						
                    </div>
                    
                </div>
			</div>
		</main>	
	</body>
</html>