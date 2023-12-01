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

// Create connection
$conn = require __DIR__ . "/accessDB.php";



function makeNotification($notification_message,$club_id)
{
    if(!empty($notification_message))
    {
        // File path
    $filePath = "txt/".$club_id .'.txt';
    
    $fileHandle = fopen($filePath, 'a');
    
    // Check if the file handle is valid
    if ($fileHandle) {
        // Add the new information and a new line
        fwrite($fileHandle,  $notification_message . PHP_EOL);
    
        // Close the file handle
        fclose($fileHandle);
    
        echo 'Information added successfully.';
    } else {
        echo 'Unable to open the file.';
    }
    
    $notification_message = ' ';
    
    }
}
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $notification_message = $_POST["notification_message"];
    

    makeNotification($notification_message,$club_id);

    // if(!empty($notification_message)){
    //     // File path
    // $filePath = $club_id .'.txt';
    
    // $fileHandle = fopen($filePath, 'a');
    
    // // Check if the file handle is valid
    // if ($fileHandle) {
    //     // Add the new information and a new line
    //     fwrite($fileHandle,  $notification_message . PHP_EOL);
    
    //     // Close the file handle
    //     fclose($fileHandle);
    
    //     echo 'Information added successfully.';
    // } else {
    //     echo 'Unable to open the file.';
    // }
    
    // $notification_message = ' ';
    
    // }
    


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make notification</title>
    <link rel="stylesheet" href="create_notify.css">
</head>
<body>
    <h1>Update Profile</h1>
    <form action="create_notify.php" method="post">
    
        <label for="notification_message">Notification Message:</label>
        <input type="text" name="notification_message" placeholder="Enter notification message" required>
        <br>

        <input type="submit" value="Update Profile">
        <a href="club page.php" class="btn">Close</a>
    </form>
</body>
</html>
