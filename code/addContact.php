<?php
// Initialize the session.
session_start();
// Include config file
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(isset($_POST["contactSubmit"])){
    $contactEmail = $_POST["contact-email"];

    $user1 = $_SESSION["id"];

    $sqlSel = "SELECT * FROM users WHERE email = '".$contactEmail."'";
    $querySel = mysqli_query($link, $sqlSel);
    $rowSel = mysqli_fetch_assoc($querySel);

    $sql = "INSERT INTO contacts VALUES('".$user1."', '".$rowSel['user_id']."')";
    if ($link->query($sql) === TRUE) {
        echo "Contact Added Successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $link->error;
      }
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
        <div class="sitename"><a href="index.php"> Vido </a></div>
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
            <form method="post" action="">
                Contact Email: <input type="email" name="contact-email" placeholder="contact email">
                <br><br>
                <input type="submit" name="contactSubmit" class="btn btn-primary" value="Add contact">
            </form>
        </div>

    </div>
    </div>

</body>
</html>