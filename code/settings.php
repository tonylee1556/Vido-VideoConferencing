<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
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

        <div class="main">
    <div class="container">
        <h3>Settings</h3>

        <p>
        <a href="passwordReset.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
    </div>
</body>
</html>