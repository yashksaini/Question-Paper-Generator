<?php
include("checkAdmin.php");
$section_id = false;
if(isset($_SESSION["section_id"])){
  $section_id = $_SESSION["section_id"];
  $section_number = $_SESSION["section_number"];
}
$font_size = $_SESSION["font_size"];
$question_id_g= $_SESSION['question_id'];
$marks_g = $_SESSION['marks'];
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
<div class='top_bar'>
  <a href='index.php' class='nav_box'><i class='fas fa-angle-left'></i></a>
  <a href='create_paper.php' class='nav_box '>Paper</a>
  <a href='solution.php' class='nav_box active_bar'>Solutions</a>
  <a href='questionId.php' class='nav_box '>Que With ID</a>
  <a href='queSolution.php' class='nav_box '>Que & Sol</a>
  <a href='#' class='nav_box' onclick='window.print()'><i class='fas fa-print'></i></a>
</div>
<div class='sub-page'>
<div contentEditable='true'>Add top section here</div>
";
foreach ($question_id_g as $key => $value) {
     
    $query = "SELECT * FROM questions WHERE id ='$value'";
    $ques = mysqli_query($con,$query);
    if($section_id){
      foreach($section_id as $key1 => $value1){
        $number = $section_number[$key1];
        if($number==$key){
          echo "
          <div class='paper'>
            <div class='que_no'></div>
            <div class='que' contentEditable='true'>
              <p class='showOR1'>$value1</p>
            </div>
            <div class='marks'></div>
          </div>";
        }
      }
    }
    if($key<100){
      $mark = $marks_g[$key];
    }
    while($row = $ques->fetch_assoc())
    {
      $solution = $row["solution"];
      if($key>100){
        echo "
        <div class='paper'>
          <div class='que_no'></div>
          <div class='que' contentEditable='true'>
            <p class='showOR'>OR</p>
            $solution
          </div>
          <div class='marks'></div>
        </div>";
      }
      else{
        echo "
        <div class='paper mt-4'>
          <div class='que_no'>$key</div>
          <div class='que' contentEditable='true'>$solution</div>
          <div class='marks'>($mark)</div>
        </div>";
      }
      
    }
    
  }
  echo "</div></div>";

?>

</div>
</div>
<?php echo"$script_bar"?>
<?php echo"$footer"?>