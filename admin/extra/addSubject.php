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
    if(isset($_POST["class"])){
        $class = $_POST["class"];
        $subject_name = $_POST["subject"];
        $query = "SELECT * FROM subjects WHERE class='$class' AND sub_name='$subject_name'";
        if(mysqli_num_rows(mysqli_query($con,$query))==1){
            echo "Subject already added for this class";
        }
        else{
            $query = "INSERT INTO subjects
            (class,sub_name)VALUES
            ('$class','$subject_name')";
            if(mysqli_query($con,$query)){
                echo "Subject added Successfully";
            }
        }
    }
    else{
        echo"404 page not found";
    }
}

?>