<?php
require_once "config.php";

$userId = $_GET['userId'];
$email = $_GET['email'];

$sql = "update login set isValid=1 where user_id=".$userId."";
if ($link->query($sql) === TRUE) {
    echo "Verified successfuly";
        $sql2 = "insert into users (user_id, email) values ('".$userId."', '".$email."')";
        if ($link->query($sql2) === TRUE) {
            echo "added successfuly";
            header('location:login.php');
        } else {
            echo "Error: " . $sql2 . "<br>" . $link->error;
          }
  } else {
    echo "Error: " . $sql . "<br>" . $link->error;
  }
?>