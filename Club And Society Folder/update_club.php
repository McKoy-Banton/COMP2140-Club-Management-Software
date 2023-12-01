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



// Database connection parameters
$host = 'localhost';
$username = 'kevonteh';
$password = 'Kim_bro123';
$dbname = 'club_member';

// Create connection
$conn = require __DIR__ . "/accessDB.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function editClubData($social_media_link, $meeting_day,$meeting_times, $email, $club_president,$phone_number, $club_id)
{
    $arry = explode(" ", $club_president);
    $sql = "UPDATE club SET social_media_link ='$social_media_link', meeting_day ='$meeting_day', meeting_times =' $meeting_times', club_president = '$club_president', email_address = '$email' , phone_number = '$phone_number' WHERE club_id=$club_id";

    return $sql;

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $social_media_link = $_POST["social_media_link"];
    $meeting_day = $_POST["meeting_day"];
    $meeting_times = $_POST["meeting_times"];
    $email = $_POST["email_address"];
    $club_president = $_POST["club_president"];

    $phone_number = $_POST["phone_number"];



   

    $sql =  editClubData($social_media_link, $meeting_day,$meeting_times, $email, $club_president,$phone_number,$club_id);

    

    if ($conn->query($sql) === TRUE) {
       
        $club["social_media_link"] =  $social_media_link;
        $club["meeting_day"] =  $meeting_day;
        $club["meeting_times"] = $meeting_times;
        $club["email_address"] =  $email;
        $club["phone_number"] =  $phone_number;
        $club["club_president"] = $club_president;
        
       
        echo '<p class="success-message">Profile Updated Successfully</p>';
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="update_club.css" type="text/css" rel="stylesheet" />
    <title>Update Club</title>
</head>
<body>
    <h1>Update Club</h1>
    <form action="update_club.php" method="post">
        <label for="social_media_link">Social Media:</label>
        <input type="text" name="social_media_link" value= <?php echo $club["social_media_link"]; ?> required>
        <br>
        <label for="meeting_day">Meeting Day:</label>
        <input type="text" name="meeting_day" value= <?php echo $club["meeting_day"]; ?> required>
        <br>
        <label for="meeting_times">Meeting Times:</label>
        <input type="text" name="meeting_times" value= <?php echo $club["meeting_times"]; ?> required>
        <br>
        <label for="club_president">Club President:</label>
        <input type="text" name="club_president" value= <?php echo $club["club_president"]; ?> required>
        <br>
        <label for="email_address">Email:</label>
        <input type="email" name="email_address"value=  <?php echo $club["email_address"]; ?> required >
        <br>
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" value =  <?php echo $club["phone_number"]; ?> required>
        <br>
        <input type="submit" value="Update Profile">

        <style>
            .btn {
    display: inline-block;
    padding: 10px 15px;
    text-decoration: none;
    background-color: #333;
    color: #fff;
    border-radius: 4px;
    transition: background-color 0.3s;
}


.btn:hover {
    background-color: #555;
}

        </style>
        <a href="club page.php" class="btn">Close</a>
    </form>
</body>
</html>
