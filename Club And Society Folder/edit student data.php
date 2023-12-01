<?php
session_start();

if (isset($_SESSION['user_id'])) 
{
    $userID = $_SESSION['user_id'];

    #echo "User ID: " . $userID;
} 

function editStudentData($userID, $input, $column)
{
    $conn=  require __DIR__ . "/accessDB.php";
    $success=false;
    $sql = "UPDATE student SET $column ='$input' WHERE id_number=$userID";

    if ($conn->query($sql) === TRUE) 
    {
        $success=true;        
    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    return $success;
}

?>

<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') // get phone num
{ 
    $input = filter_input(INPUT_GET, 'phone');
    if (!empty($input))
    {
        if(editStudentData($userID, $input,"phone_number"))
        {
            echo "<p>Phone number is changed</p>";
        }
    }
    
    
}
?>


<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') // to get email
{ 

    $input = filter_input(INPUT_GET, 'email');
    if (!empty($input))
    {
        if(editStudentData($userID, $input,"email_address"))
        {
            echo "<p>Email Address is changed</p>";
        }
    }

}
?>

<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') // to get interest
{ 

    $input = filter_input(INPUT_GET, 'interest');
    if (!empty($input))
    {
        if(editStudentData($userID, $input,"interests"))
        {
            echo "<p>Interest is changed</p>";
        }
    }

}
?>