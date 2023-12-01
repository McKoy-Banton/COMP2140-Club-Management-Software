<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Notifications</title>
    <link rel="stylesheet" href="view_notification.css">
    <script src="edit student.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <h1>View Notifications</h1>
        </div>
    </header>

</body>
</html>


<?php
session_start();

if (isset($_SESSION['user_id'])) 
{
    $userID = $_SESSION['user_id'];

    #echo "User ID: " . $userID;
} 


function readDataFile($filename)
{
    $fileContents = file_get_contents($filename);
    echo "<p>".$fileContents . "</p>". "<br>";
}

$conn=  require __DIR__ . "/accessDB.php";
$sql = "SELECT * FROM student WHERE id_number  = $userID";

$result= $conn->query($sql);

$user= $result->fetch_assoc();

$clubstring=$user["clubs"];
$clubs=explode(", ", $clubstring);


foreach ($clubs as $club) 
{
    if (strpos($club, "UWI Young Investors") !== false) 
    {
        echo "<h3> UWI Young Investors.</h3> <br>";
        readDataFile("txt/12377678.txt");
    } 

    if (strpos($club, "Computing Society") !== false) 
    {
        echo "<h3> Computing Society. </h3><br>";
        readDataFile("txt/12345678.txt");
    } 

    if (strpos($club, "MATHS Club") !== false) 
    {
        echo "<h3>MATHS Club. </h3><br>";
        readDataFile("txt/45177623.txt");
    } 
    
    if (strpos($club, "Programming Club") !== false) 
    {
        echo "<h3> Programming Club. </h3><br>";
        readDataFile("txt/34258634.txt");
    } 
    

}

?>

<main>
    <a href="club member page.php" id="close">Close</a>

</main>
