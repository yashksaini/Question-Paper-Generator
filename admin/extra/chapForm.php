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

        $query = "SELECT * FROM chapters WHERE sub_id='$sub_id' ORDER BY chap_name ASC";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0){
            echo "
            <label class='form-label'>Select Chapter Name <span>*</span></label>
            <select class='form-control' name='chap_id' id='chap_id' onChange=\"showForm()\">
            <option value='' hidden>Select Chapter</option>";
            while($row= $result->fetch_assoc()){
                $chap_id = $row["id"];
                $chap_name = $row["chap_name"];
                echo "<option value='$chap_id'>$chap_name</option>";
            }
            echo "
            </select>
        ";
        }
        else{
            echo "No chapters added for this subject.";
        }
    }
    else{
        echo"404 page not found";
    }
}

?>