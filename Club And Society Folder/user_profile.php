<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login member page.php");
    exit;
}

$user_id = $_SESSION["user_id"];

$host = 'localhost';
$username = 'CLUBMANAGER1';
$password = 'z@%mag';
$dbname = 'club_management_database';
$conn = require __DIR__ . "/accessDB.php";


$statement = $conn->query("SELECT * FROM student WHERE id_number = $user_id");

$student = $statement->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="user_profile.css" type="text/css" rel="stylesheet" />
</head>
<body>  
    <div class="user-profile-container">
        <div class="profile-header">
            <img src="img/user-icon.png" alt="Profile Icon">
            <h2>User Profile</h2>
        </div>
        <div class="profile-info">
            <p><strong>Full Name:</strong> <?php echo $student["full_name"]; ?></p>
            <p><strong>ID Number:</strong> <?php echo $student["id_number"]; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $student["phone_number"]; ?></p>
            <p><strong>Email Address:</strong> <?php echo $student["email_address"]; ?></p>
            <p><strong>Major:</strong> <?php echo $student["major"]; ?></p>
            <p><strong>Minor:</strong> <?php echo $student["minor"]; ?></p>
            <p><strong>Degree:</strong> <?php echo $student["degree"]; ?></p>
            <p><strong>Faculty:</strong> <?php echo $student["faculty"]; ?></p>
            <p><strong>Interests:</strong> <?php echo $student["interests"]; ?></p>
            <p><strong>Club/s:</strong> <?php echo $student["clubs"]; ?></p>
            <p><strong>Password:</strong> <?php echo $student["student_password"]; ?></p>
        </div>
        <a href="club member page.php" class="btn">Close</a>
    </div>
</body>
</html>