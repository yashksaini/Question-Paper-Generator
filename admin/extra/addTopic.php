<?php
session_start();
include("../../config.php");

$email = $_SESSION["email"];
$password = $_SESSION["password"];

$query = "SELECT * FROM users WHERE email = '$email' AND password='$password' AND role='admin'";
if(mysqli_num_rows(mysqli_query($con,$query))==0){
    header('location:../index.php');
}
else{
    if(isset($_POST["topic_name"])){
        $chap_id = $_POST["chap_id"];
        $topic_name = $_POST["topic_name"];
        $query = "SELECT * FROM topics WHERE chap_id='$chap_id' AND topic_name='$topic_name'";
        if(mysqli_num_rows(mysqli_query($con,$query))==1){
            echo "Topic already added for this chapter";
        }
        else{
            $query = "INSERT INTO topics
            (chap_id,topic_name)VALUES
            ('$chap_id','$topic_name')";
            if(mysqli_query($con,$query)){
                echo "Topic added Successfully";
            }
        }
    }
    else{
        echo"404 page not found";
    }
}

?>