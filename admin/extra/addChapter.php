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
    if(isset($_POST["sub_id"])){
        $sub_id = $_POST["sub_id"];
        $chap_name = $_POST["chap_name"];
        $query = "SELECT * FROM chapters WHERE sub_id='$sub_id' AND chap_name='$chap_name'";
        if(mysqli_num_rows(mysqli_query($con,$query))==1){
            echo "Chapter already added for this subject";
        }
        else{
            $query = "INSERT INTO chapters
            (sub_id,chap_name)VALUES
            ('$sub_id','$chap_name')";
            if(mysqli_query($con,$query)){
                echo "Chapter added Successfully";
            }
        }
    }
    else{
        echo"404 page not found";
    }
}

?>