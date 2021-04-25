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
    <title>Welcome - Vido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>
    <!-- header section -->
    <div class="header">
        <div class="sitename"> Vido </div>
        <div class="userdetails">
            <!-- right side of header -->
            <span class="userspan"> Hello, 
                <a href="settings.php">
                    <span class="userdetail-username"><?php echo htmlspecialchars($_SESSION["username"]);?></span> 
                </a>
            </span>
            <span class="userspan"> <a href="logout.php" class="btn btn-danger ml-3">Log Out</a> </span>
        
        </div>
    </div>

<!-- main content section -->
    <div class="main">
    <div class="container">
        <div class="row">
            <div class="col-sm">
            <div class="circle">
                <img class="user-image" src="assets/images/user.png" />
            </div>
            <br><br>
            <div class="start-call">
            <button class="btn btn-primary">Start Call</button>
            </div>
            </div>

            <!-- Friends table section -->
            <div class="col-sm">
                <div class="inside">
                    <span class="inside-heading">Friends</span>
                    <br><br>
                    <table class="call-table">
                    <tr><td>Kelly Jonas</td><td><i class="fas fa-video icon"></i></td></tr>
                    <tr><td>Kelly Jonas</td><td><i class="fas fa-video icon"></i></td></tr>
                    <tr><td>Kelly Jonas</td><td><i class="fas fa-video icon"></i></td></tr>
                    <tr><td>Kelly Jonas</td><td><i class="fas fa-video icon"></i></td></tr>
                    </table>
                </div>
            </div>


            <!-- Call history section -->
            <div class="col-sm">
            <div class="inside">
            <span class="inside-heading">History</span>
            <br><br>
                    <table class="call-table">
                    <tr><td>Kelly Jonas</td><td>30 min</td></tr>
                    <tr><td>Kelly Jonas</td><td>24 min</td></tr>
                    <tr><td>Kelly Jonas</td><td>12 min</td></tr>
                    <tr><td>Kelly Jonas</td><td>2 min </td></tr>
                    </table>
            </div>
            </div>
        </div>
    </div>
    </div>

</body>
</html>