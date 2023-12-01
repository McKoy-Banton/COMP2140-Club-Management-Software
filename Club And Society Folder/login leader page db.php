<?php
$host = 'localhost';
$username = 'club_member';
$password = 'H2eE(dTL.pE*Ux?';
$dbname = 'club_member';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_number="6201465709";
$full_name = 'Courtney Day';
$phone_number= '+18764596782';
$email_address = "bigheadcourtney@gmail.com";
$major="Accounting";
$minor= 'Computer Science';
$degree="Bachelor of Science";
$faculty='Social Sciences';
$interests="Finance";
$student_password="Honey34";
$clubs="UWI Young Investors";

$password_hash= password_hash($student_password,PASSWORD_DEFAULT);

// copy and paste section
$club_id= "12345678";
$club_name= "Computing Society";
$faculty="Science and Technology";
$social_media_link="https://www.Instagram/CS Club";
$meeting_day= "Thursday";
$meeting_times="3:00pm - 5:00pm";
$email_address="computing@uwimona.com";
$phone_number="+18761234567";
$club_president="John Daley";
$department="Computing";
$club_password="bestclub10";
// copy and past section ends

$club_password_hash= password_hash($club_password,PASSWORD_DEFAULT);

// SQL query to insert data
$sql = "INSERT INTO student (id_number, full_name , phone_number, email_address, major, minor, degree, faculty, interests, student_password, clubs ) VALUES ('$id_number','$full_name', '$phone_number', '$email_address',  '$major', '$minor', '$degree', '$faculty', '$interests', '$password_hash', '$clubs')";

// Perform the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


   





return $conn
?>