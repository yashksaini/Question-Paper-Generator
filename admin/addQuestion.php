<?php
include("checkAdmin.php");
if(isset($_POST["chap_id"])){
    $question = $_POST["question"];
    $solution = $_POST["solution"];
    $type = $_POST["type"];
    $level = $_POST["level"];
    $source = $_POST["source"];
    $board = $_POST["board"];
    $sub_class = $_POST["sub_class"];
    $chap_id = $_POST["chap_id"];
    $topic_id = $_POST["topic_id"];

    if($question&&$solution){
        $question_u = str_replace('\\','\\\\',$question,$count);
    $solution_u = str_replace('\\','\\\\',$solution,$count);
    $query = "INSERT INTO questions (question,solution,type,level,chapter_id,topic_id,sub_id,board_name,source) VALUES ('$question_u','$solution_u','$type','$level','$chap_id','$topic_id','$sub_class','$board','$source')";
    if(mysqli_query($con,$query)){
        echo "<script>alert('Question Added successfully');</script>";
    }
    else{
        echo "<script>alert('Error');</script>";
    }
    }
    else{
        echo "<script>alert('Enter question and solution first.');</script>";
    }
}
?>
<?php echo"$head" ?>
<link rel="stylesheet" href="css/addQuestion.css"/>
<?php echo"$navbar"?>
<div class="container-fluid">
    <h3 class="mb-2 mt-4 head">Add Question</h3>
    <form method="post">
    <div class="row">
        <div class="col-md-4">
        <label class="form-label">Select Class - Subject <span>*</span></label>
            <select id="sub_class" name="sub_class" class="form-control">
                <option value="" hidden>Select Class - Subject</option>
                <?php
                    $query = "SELECT * FROM subjects ORDER BY class ASC";
                    $result = mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0){ 
                        while($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            $class = $row["class"];
                            $sub_name = $row["sub_name"];
                            echo "<option value='$id'>$class - $sub_name</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-4" id="chap_select"></div>
        <div class="col-md-4" id="topic_select"></div>
    </div>
    <div class="row noShow" id="form_show" >
    <div class='col-md-3'>
        <label class='form-label'>Select Type</label>
        <select class='form-control' name='type' id='type'>
        <option value='' hidden>Select Type</option>
        <option value=''></option>
            <?php
            $query = "SELECT * FROM que_type";
            $result = mysqli_query($con,$query);
            while($row1=$result->fetch_assoc()){
                $type = $row1["que_type"];
                $type_id = $row1["id"];
                echo "<option value='$type_id'>$type</option>";
            } ?>
        </select>
        </div>
        <div class='col-md-3'>
        <label class='form-label'>Select Level</label>
            <select class='form-control' name='level' id='level'>
                <option value='' hidden>Select Level</option>
                <option value=''></option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
            </select>
        </div>
        <div class='col-md-3'>
            <label class='form-label'>Select board</label>
            <input type='text' placeholder='Enter board name. . ' class='form-control' id='board' name='board' />
        </div>
        <div class='col-md-3'>
            <label class='form-label'>Select source</label>
            <input type='text' placeholder='Enter source name. . ' class='form-control' id='source' name='source' />
        </div>
        <div class='col-12'>
            <label class='form-label'>Question <span>*</span></label>
            <textarea id='question' name='question' class='form-control ' style='min-height: 120px;' placeholder='Enter question here. . .'></textarea>
        </div>
        <div class='col-12 mt-3'>
            <label class='form-label'>Solution <span>*</span></label>
            <textarea id='question' name='solution' class='form-control ' style='min-height: 120px;' placeholder='Enter solution here. . .'  ></textarea>
        </div>
        <button class='add_btn btn'>Add Question</button>

    </div>
    </form>
</div>
<div class="container" >
    <h1><br/><br/><b>Recently added 10 questions</b><br/></h1>
    <?php
    
    $query = "SELECT * FROM questions ORDER BY id DESC LIMIT 10";
    $result = mysqli_query($con,$query);
    while($row=$result->fetch_assoc()){
        $id = $row["id"];
        $question = $row["question"];
        $solution = $row["solution"];
        $type_id = $row["type"];
        $level = $row["level"];
        $source = $row["source"];
        $board = $row["board_name"];
        $type="";
        if($type_id>0){
            $query1 = "SELECT * FROM que_type WHERE id='$type_id'";
            $result1 = mysqli_query($con,$query1);
            $row1 = $result1->fetch_assoc();
            $type = $row1["que_type"];
        }
        echo "
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
    ?>
</div>
<!-- <textarea class="form-control" style="min-height: 250px;" placeholder="Enter question here. . ."></textarea> -->
<?php echo"$script_bar"?>
<script src="scripts/addQuestion.js"></script>
<?php echo"$footer"?>