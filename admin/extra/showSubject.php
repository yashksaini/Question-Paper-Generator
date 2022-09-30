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
  $query = "SELECT * FROM subjects ORDER BY class DESC";
  $result = mysqli_query($con,$query);
  if(mysqli_num_rows($result)>0){
    while($row=$result->fetch_assoc()){
      $id = $row["id"];
      $name = $row["sub_name"];
      $class = $row["class"];
      echo "
      <div class='col-md-6 col-lg-4'>
        <div class='card'>
          <div class='card_top'>
            <h1><span>$class</span> $name</h1>
          </div>
          
          <div class='edit_box'>
            <div data-bs-toggle='modal' data-bs-target='#remove' onclick='remove(\"$id\")'><i class='fas fa-trash'></i></div>
            <div data-bs-toggle='modal' data-bs-target='#update' onclick='update(\"$id\",\"$name\",\"$class\")'><i class='fas fa-edit'></i></div>
          </div>
        </div>
      </div>";
    }
  }
  else{
    echo "<div class='col-12'>No subjects added</div>";
  }
}

      
?>