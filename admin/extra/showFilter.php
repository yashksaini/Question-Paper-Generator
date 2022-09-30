<?php
session_start();
include("../../config.php");

$email = $_SESSION["email"];
$password = $_SESSION["password"];

$query = "SELECT * FROM users WHERE email = '$email' AND password='$password' AND role='admin'";
$allData = '';
if(mysqli_num_rows(mysqli_query($con,$query))==0){
    header('location:../index.php');
}
else{
  if(isset($_POST["chap_id"])){
    $chap_id = $_POST["chap_id"];
    $topic_id = $_POST["topic_id"];
    $level = $_POST["level"];
    $type = $_POST["type"];

    if($topic_id=="0" || !$topic_id){
        if($level=="0" || !$level){
            if($type=="0" || !$type){
                $query = "SELECT * FROM questions WHERE chapter_id='$chap_id'";
                // echo "No filter";
            }
            else{
                $query = "SELECT * FROM questions WHERE chapter_id='$chap_id' AND type='$type'";
                // echo "Only Type";
            }
        }
        else{
            if($type=="0"||!$type){
                $query = "SELECT * FROM questions WHERE chapter_id='$chap_id' AND level='$level'";
                // echo "Only level";
            }
            else{
                $query = "SELECT * FROM questions WHERE chapter_id='$chap_id' AND type='$type' AND level='$level'";
                // echo "Level + type";
            }
        }
    }
    else{
        if($level=="0"|| !$level){
            if($type=="0" || !$type){
                $query = "SELECT * FROM questions WHERE chapter_id='$chap_id' AND topic_id='$topic_id'";
                // echo "Only topic";
            }
            else{
                $query = "SELECT * FROM questions WHERE chapter_id='$chap_id' AND type='$type' AND topic_id='$topic_id'";
                // echo "topic + type";
            }
        }
        else{
            if($type=="0" || !$type){
                $query = "SELECT * FROM questions WHERE chapter_id='$chap_id' AND topic_id='$topic_id' AND level='$level'";
                // echo "Level + Topic";
            }
            else{
                $query = "SELECT * FROM questions WHERE chapter_id='$chap_id' AND type='$type' AND topic_id='$topic_id' AND level='$level'";
                // echo "Level + type + Type";
            }
        }
    }
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
    while($row=$result->fetch_assoc()){
        $id = $row["id"];
        $question = $row["question"];
        $solution = $row["solution"];
        $type_id = $row["type"];
        $level = $row["level"];
        $source = $row["source"];
        $board = $row["board_name"];
        $type = "";
        if($type_id>0){
            $query1 = "SELECT * FROM que_type WHERE id='$type_id'";
            $result1 = mysqli_query($con,$query1);
            $row1 = $result1->fetch_assoc();
            $type = $row1["que_type"];
        }
        $allData = $allData."
        <div class='card'>
        <div><span>ID_ $id</span><span>$type</span><span>$source</span><span class='float-end'>lv-$level</span><span>$board</span></div>
        <div class='question_box'>$question</div>
        <a href='#' onclick='showSolution(\"$id\")' id='show$id'>Show Solution <i class='fas fa-angle-down'></i></a>
        <div class='noShow' id='sol$id'><br/>
            <h1><b>Solution</b></h1>
            <div class='question_box' >$solution</div>
        </div>
    </div>";
    }
    echo $allData;
}
else{
    echo "No question added for the above coditions";
}
}
}

      
?>