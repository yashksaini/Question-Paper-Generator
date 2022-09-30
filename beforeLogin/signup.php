<?php 
include("../config.php");
if(isset($_POST["name"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Password condition
    if(strlen($password)< 6){
        echo "Password must be 6 charater's long";
    }
    else{

        $query = "SELECT * FROM users WHERE email = '$email'";
        // Duplicate email check
        if(mysqli_num_rows(mysqli_query($con,$query))==1){
            echo "This email is used by another account.";
        }
        else{
            // Create User
            $query = "INSERT INTO users 
            (name,email,password,role) VALUES
            ('$name','$email','$password','user')";
            if(mysqli_query($con,$query)){
                echo "Signned up successfully.Please Login";
            }
        }
    }
}
else{
    echo "404 Page not found";
}
?>