<?php
include("checkAdmin.php");
?>
<?php echo"$head" ?>

<link rel="stylesheet" href="css/addQuestion.css"/>
<?php echo"$navbar"?>
<div class="container-fluid">
    <h3 class="mb-2 mt-4 head">Filter Questions</h3>
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
    <div class='col-md-4'>
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
        <div class='col-md-4'>
        <label class='form-label'>Select Level</label>
            <select class='form-control' name='level' id='level'>
                <option value='' hidden>Select Level</option>
                <option value=''></option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
            </select>
        </div>
        <div class='col-md-4'>
            <button class='add_btn btn' onclick="showFilter()">Filter</button>
        </div>
    </div>
</div>
<div class="container" id="filtered_questions" >
</div>
<script type="text/javascript"
     src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
  </script>
<?php echo"$script_bar"?>
<script src="scripts/filterQuestion.js"></script>
<?php echo"$footer"?>