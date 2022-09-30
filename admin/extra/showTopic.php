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
  $query = "SELECT chapters.*,subjects.class,subjects.sub_name 
            FROM chapters 
            INNER JOIN subjects 
            WHERE chapters.sub_id = subjects.id
            ORDER BY subjects.class DESC, chapters.chap_name ASC";

  $result = mysqli_query($con,$query);
  if(mysqli_num_rows($result)>0){
    while($row=$result->fetch_assoc()){
      $id = $row["id"];
      $name = $row["sub_name"];
      $class = $row["class"];
      $chap_name = $row["chap_name"];
      $sub_id = $row["sub_id"];
      echo "
      <div class='col-md-6 col-lg-4'>
        <div class='card'>
          <div class='card_top'>
            <h1> $chap_name</h1>
            <p>$class - $name <b>(Topics)</b></p>
          </div><hr/>";
            $query1 = "SELECT * FROM topics WHERE chap_id='$id'";
            $result1 = mysqli_query($con,$query1);
            if(mysqli_num_rows($result1)>0){
                echo "<ul class='list-group'>";
                while($row1=$result1->fetch_assoc()){
                    $topic_id = $row1["id"];
                    $topic_name = $row1["topic_name"];

        echo "<li class='list-group-item'>$topic_name 
                <div class='edit_box'>
                    <div data-bs-toggle='modal' data-bs-target='#remove' onclick='remove(\"$topic_id\")'><i class='fas fa-trash'></i></div>
                    <div data-bs-toggle='modal' data-bs-target='#update' onclick='update(\"$topic_id\",\"$name\",\"$class\",\"$chap_name\",\"$id\",\"$topic_name\")'><i class='fas fa-edit'></i></div>
                </div>
              </li>";
            }
                echo "</ul>";
            }   
            else{
                echo "<p>No Topics Added</p>";
            }
    
        echo "
    </div>
  </div>";
          
    }
  }
  else{
    echo "<div class='col-12'>No subjects added</div>";
  }
}

      
?>