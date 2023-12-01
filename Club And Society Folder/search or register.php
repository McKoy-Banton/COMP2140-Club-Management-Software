<?php
session_start();

if (isset($_SESSION['user_id'])) 
{
    $userID = $_SESSION['user_id'];

    #echo "User ID: " . $userID;
} 

function SearchClub($input) 
{
    $mysqli= require __DIR__ . "/accessDB.php";

    $sql = "SELECT * FROM club WHERE club_name LIKE '%$input%'";

    $result = $mysqli->query($sql);

    $user= $result->fetch_assoc();
    $mysqli->close();

    return $user;
}

function RegisterClubMember($userID, $input, $current_club)
{
    $conn=  require __DIR__ . "/accessDB.php";
    $newclub= $current_club . ", ".$input;
    $sql = "UPDATE student SET clubs='$newclub' WHERE id_number=$userID";

    if ($conn->query($sql) === TRUE) 
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}

?>

<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') // to search and display details of a club
{ 

    $input = filter_input(INPUT_GET, 'name');
    $isfound=false;


    $user= searchClub($input);


    $isinvalid=true;
     

    #echo "<h1>RESULT</h1>";

    if (!empty($input))
    {
        echo "<h3>Input Recieved </h3>";
        #echo $input;
        if($user)
        {
            echo "Club Name: ". $user["club_name"]. "<br>";
            echo "Faculty: ". $user["faculty"]. "<br>";
            echo "Social Media Page: ". $user["social_media_link"]. "<br>";
            echo "Meeting Day: ". $user["meeting_day"]. "<br>";
            echo "Meeting Time: ". $user["meeting_times"]. "<br>";
            echo "Email Address: ". $user["email_address"]. "<br>";
            echo "Phone Number: ". $user["phone_number"]. "<br>";
            echo "Club President: ". $user["club_president"]. "<br>";
            echo "Department: ". $user["department"]. "<br>";
        }

        else
        {
            echo "<h4>Club does not exist</h4>"; 
        }


    }

}
?>


<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') // to register for a club
{ 

    $input = filter_input(INPUT_GET, 'clubname');
    $isfound=false;

    $clubdata= $user= SearchClub($input);

    $isinvalid=true;
     

    #echo "<h1>RESULT</h1>";

    if (!empty($input))
    {
        echo "<h3>Input Recieved </h3>";
        #echo $input;
        if($clubdata)
        {
            $conn=  require __DIR__ . "/accessDB.php";

            $sql= "SELECT * FROM student WHERE id_number  = $userID";

            $result= $conn->query($sql);

            $user= $result->fetch_assoc();
            $conn->close();

            $current_club=$user["clubs"];
            $current_clubs=explode(", ", $current_club);
            $isregistered=false;

            foreach ($current_clubs as $club) 
            {
                if($club==$input)
                {
                    $isregistered=true;  
                }
            }
            
            if($isregistered==true)
            {
                echo "<p>You are already a member of the club</p>";

            }
            else
            {
                RegisterClubMember($userID, $input, $current_club);
            }

            

          // Change banner and modulerize

            


        }

        else
        {
             echo "<p>Club does not exist</p>";
        }


    }

}
?>