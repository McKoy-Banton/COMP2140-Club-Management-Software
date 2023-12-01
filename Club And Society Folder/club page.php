<?php
session_start();


if (!isset($_SESSION["user_id"])) {
    header("Location: login member page.php");
    exit;
}



$club_id = $_SESSION["user_id"];

$host = 'localhost';
$username = 'kevonteh';
$password = 'Kim_bro123';
$dbname = 'club_member';
$conn = require __DIR__ . "/accessDB.php";

$statement = $conn->query("SELECT * FROM club WHERE club_id = $club_id");

$club = $statement->fetch_assoc();




?>



<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Club Page</title>
		<link href="club member page.css" type="text/css" rel="stylesheet" />
		<script src="club member page.js" type="text/javascript"></script>
	</head>

	<body>
		<header>
			<h1 id="Studentname">
			</h1>
			<nav>
				<ul id="NavLinks">
					<li><a href="club_profile.php"><button>View Profile</button></a></li>
					<li><a href="logout member.php"><button>Log Out</button></a></li>
				</ul>
			</nav>
		</header>

		<main>
			<div id="Main">
                
                <div id="Welcome">
                    <h2>Welcome <?php echo $club["club_name"]; ?> Leader !</h2>
                </div>
                
                    <h3 id ="list">Club Options:</h3>
                    <div id="clubsarea">
						<ul id="Clubs">
						<li><a href="update_club.php">Edit Club Information</a></li>
                        <li><a href="create_notify.php">Make Notification</a></li>
                    </div>

                    
                </div>
			</div>
		</main>	
	</body>
</html>

