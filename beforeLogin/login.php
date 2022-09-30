<?php 
session_start();
include("../config.php");
if(isset($_POST["email"])){
    
    $_SESSION['email']=$_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $email = $_SESSION["email"];
    $password = $_SESSION["password"];
    // Password condition
    if(strlen($password)< 6){
        echo "Password must be 6 charater's long";
    }
    else{
        $query = "SELECT * FROM users WHERE email = '$email' AND password='$password'";
        if(mysqli_num_rows(mysqli_query($con,$query))==1){
            echo "login";
        }
        else{
           echo "Email or password is incorrect";
        }
    }
}
else{
    echo "404 Page not found";
}
?>