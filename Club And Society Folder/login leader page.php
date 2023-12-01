<?php

$host = 'localhost';
$username = 'club_member';
$password = 'H2eE(dTL.pE*Ux?';
$dbname = 'club_member';

if ($_SERVER["REQUEST_METHOD"]==="POST")
{
    $mysqli= new mysqli($host, $username, $password, $dbname);
    $sql= sprintf("SELECT * FROM club WHERE club_id  = '%s'", 
          $mysqli-> real_escape_string ($_POST["username"]));

    $result= $mysqli->query($sql);

    $user= $result->fetch_assoc();

    #var_dump($user);
    $isinvalid=true;
    
    if($user)
    {
       if(password_verify($_POST["password"], $user["club_password"]))
       {
           $isinvalid=false; 
           session_start();
           $_SESSION["user_id"]=$user["club_id"];

           header("Location: club page.php");
           exit;

       }
    }

    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="login page.css" type="text/css" rel="stylesheet" />
  <script src="login page leader.js" type="text/javascript"></script>

</head>
<body>
  <div class="login-container">
    <h2>Login Page</h2>



    <form class="login-form"  method="POST">
      <div class="form-group">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

      </div>
      <div class="form-group">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
      </div>
      <div class="form-group">
        <a href="main page.html"><button type="submit">Log in</button></a>
      </div>
    </form>
  </div>
</body>
</html>