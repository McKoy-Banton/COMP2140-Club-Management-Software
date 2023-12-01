<?php
$host = 'localhost';
$username = 'club_member';
$password = 'H2eE(dTL.pE*Ux?';
$dbname = 'club_member';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

return $conn;

?>