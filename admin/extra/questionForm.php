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
    if(isset($_POST["chap_id"])){
        $chap_id = $_POST["chap_id"];

        $query = "SELECT * FROM topics WHERE chap_id='$chap_id' ORDER BY chap_id ASC";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0){
            echo "
            <label class='form-label'>Select Topic</label>
            <select class='form-control' name='topic_id' id='topic_id'>
            <option value='' hidden>Select Topic</option>
            <option value=''> </option>";
            while($row= $result->fetch_assoc()){
                $topic_id = $row["id"];
                $topic_name = $row["topic_name"];
                echo "<option value='$topic_id'>$topic_name</option>";
            }
            echo "
            </select>
        ";
        }
        else{
            echo " <label class='form-label'>Select Topic</label>
            <select class='form-control' name='topic_id' id='topic_id'>
            <option value='' hidden>Select Topic</option>
            <option value=''> </option>
            </select>";
        }
    }
    else{
        echo"Select Chapter first";
    }
}

?>