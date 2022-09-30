<?php
include("checkAdmin.php");
if(isset($_POST['p_id'])){
  $_SESSION["p_id"] =$_POST["p_id"];
}
$paper_id = $_SESSION["p_id"];
$font_size = 12;

?>
<?php echo"$head" ?>
<link rel="stylesheet" href="css/paper.css"/>
<style>
  .paper p,
h1,
h2,
h3,
h4,
h6,
span,
pre,
li,
ul,
td,
th,
table,
div,
mjx-math {
  font-size: <?php echo "$font_size"?>pt !important;
  line-height: 1.5;
  margin: 0;
}
</style>

<?php


echo "<div class='page_size'>
<div class='top_bar' style='display:none'>
  <a href='create_paper.php' class='nav_box active_bar'>Paper</a>
  <a href='solution.php' class='nav_box '>Solutions</a>
  <a href='questionId.php' class='nav_box'>Que With ID</a>
  <a href='queSolution.php' class='nav_box'>Que & Sol</a>
  <a href='#' class='nav_box' onclick='window.print()'>Print</a>
</div>
<div class='sub-page'>
<div contentEditable='true'>Add top section here</div>
";

$query = "SELECT * FROM papers WHERE paper_id='$paper_id' ORDER BY id ASC";
$res= mysqli_query($con,$query);

while($row=$res->fetch_assoc()){
    $q_id = $row["que_id"];
    $q_no = $row["q_no"];
    $marks = $row["marks"];
    $query = "SELECT * FROM questions WHERE id ='$q_id'";
    $ques = mysqli_query($con,$query);
    $row1 = $ques->fetch_assoc();
    $question = $row1["question"];
    $id = $row1["id"];
    if($q_no>100){
        echo "
        <div class='paper'>
          <div class='que_no'></div>
          <div class='que' contentEditable='true'>
            <p class='showOR'>OR</p>
            <b>ID_ $id</b></br>
            $question
          </div>
          <div class='marks'></div>
        </div>";
    }
    else{
        echo "
        <div class='paper mt-4'>
          <div class='que_no'>$q_no</div>
          <div class='que' contentEditable='true'>
          <b>ID_ $id</b><br/>$question</div>
          <div class='marks'>($marks)</div>
        </div>";
    }
}
echo "</div></div>";
?>
</div>
</div>
<?php echo"$script_bar"?>
<?php echo"$footer"?>