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

$club =  $statement->fetch_assoc();



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="club_profile.css" type="text/css" rel="stylesheet" />
</head>
<body>  
    <div class="user-profile-container">
        <div class="profile-header">
            <img src="img/user-icon.png" alt="Profile Icon">
            <h2>Club Profile</h2>
        </div>
        <div class="profile-info">
            <p><strong>Club Name:</strong> <?php echo $club["club_name"]; ?></p>
            <p><strong>Club ID:</strong> <?php echo $club["club_id"]; ?></p>
            <p><strong>Faculty:</strong> <?php echo $club["faculty"]; ?></p>
            <p><strong>Email Address:</strong> <?php echo $club["social_media_link"]; ?></p>
            <p><strong>Meeting Day</strong> <?php echo $club["meeting_day"]; ?></p>
            <p><strong>Meeting Times</strong> <?php echo $club["meeting_times"]; ?></p>
            <p><strong>Email:</strong> <?php echo $club["email_address"]; ?></p>
            <p><strong>Contact:</strong> <?php echo $club["phone_number"]; ?></p>
            <p><strong>Club President:</strong> <?php echo $club["club_president"]; ?></p>
            <p><strong>Department: </strong> <?php echo $club["department"]; ?></p>
            <p><strong>Password: </strong> <?php echo $club["club_password"]; ?></p>
        </div>
        <a href="club page.php" class="btn">Close</a>
        
    </div>
</body>
</html>