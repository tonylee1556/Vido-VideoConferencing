<?php
// Initialize the session
session_start();
include "config.php";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//fetching user's current details
$email = $_SESSION["username"];
$sql = "SELECT * FROM users WHERE email='".$email."'";
$query = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($query);


// on submit button click, update user's details
if(isset($_POST["submit"])){
    $name = $_POST["nameInput"];
    $sqlUpdate = "UPDATE users SET name='".$name."' WHERE email = '".$email."'";

    if ($link->query($sqlUpdate) === TRUE) {
        // echo "Record updated successfully";
      } else {
        echo "Error: " . $sqlUpdate . "<br>" . $link->error;
      }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vido - Settings</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- header section -->
        <div class="header">
            <a href="index.php"><div class="sitename"> Vido </div></a>
            <div class="userdetails">
            
                <span class="userspan"> Hello, 
                    <a href="settings.php">
                        <span class="userdetail-username"><?php echo htmlspecialchars($_SESSION["username"]);?></span> 
                    </a>
                </span>
                <span class="userspan"> <a href="logout.php" class="btn btn-danger ml-3">Log Out</a> </span>
            
            </div>
        </div>

    <!-- main body page -->
        <div class="main">
    <div class="container">
        <h3>Settings</h3>

        <!-- password reset and logout button -->
        <p>
        <a href="passwordReset.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        </p>

        <hr>
        <br>
        <br>

        <!-- personal info change form -->
        <h5>Personal Information</h5>
        <form method="post" action="">
        Name: <input type="text" placeholder="name" name="nameInput" value="<?php echo $row["name"]; ?>"/>
        <input type="submit" name="submit" value="Change">
        </form>

    </div>
</body>
</html>