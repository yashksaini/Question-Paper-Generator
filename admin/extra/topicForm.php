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
            <label class='form-label'>Select Chapter Name</label>
            <select class='form-control' name='chap_id' id='chap_id'>";
            while($row= $result->fetch_assoc()){
                $chap_id = $row["id"];
                $chap_name = $row["chap_name"];
                echo "<option value='$chap_id'>$chap_name</option>";
            }
            echo "
            </select>
            <label class='form-label'>Topic Name</label>
            <input type='text' name='topic_name' id='topic_name' placeholder='Enter topic name here' class='form-control' required/>
            <button id='add_btn' class='btn submit_btn' onclick=\"add_btn()\">Add topic</button>
            <p id='add_message'></p>
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