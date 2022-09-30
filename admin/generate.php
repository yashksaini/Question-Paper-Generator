<?php
include("checkAdmin.php");
?>
<?php echo"$head" ?>
<link rel="stylesheet" href="css/addQuestion.css"/>
<?php echo"$navbar"?>
<div class="container">
    <div class="row mt-3" style="display:<?php if(isset($_POST['no_ques'])){ echo"none";}?>;">
        <div class="col-md-3 "></div>
        <div class="col-md-6 ">
            <form method="post">
                <label class="form-label">Enter Font Size</label>
                <input type='number' min='12' max='24' placeholder="Enter Font Size"  class="form-control" required name="font_size"/>
                <label class="form-label">Enter number of questions</label>
                <input type='number' min='1' max='50' placeholder="Enter number of questions" id="total_questions" class="form-control" required name="no_ques"/>
                <label class="form-label">Enter number of Sections</label>
                <input type='number' min='0' max='50' placeholder="Enter number of Sections" id="total_questions" class="form-control" required name="no_sections"/>
                <button class="add_btn btn m-0 float-end">Create</button>
            </form>
        </div>
        <div class="col-md-3">
        </div>
</div>
<div class="row mt-3">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
<form action="create_paper.php" method="post">
    
    <?php
    if(isset($_POST['no_ques']))
      {
        $show="none";
        $_SESSION["font_size"] = $_POST["font_size"];
        $no_ques = $_POST['no_ques'];
        $no_sections = $_POST['no_sections'];
        if($no_sections<=$no_ques){
            echo "
         <label class='form-label'>Enter Paper Name</label>
            <input type='text' name='paper_name' class='form-control' placeholder='Enter Paper Name here. .' required />
         <div class='table-responsive rounded'>
            <table border='0' class='table' style='text-align:left;'>
            <thead class='thead'>
                <tr>
                    <th>Que</th>
                    <th>Que Id</th>
                    <th>Mark</th>
                    <th>Add OR</th>
                </tr>
            </thead>
            <tbody>";
            for($i=1;$i<=$no_ques;$i++)
            {
              echo "
              <tr>
                <td>$i</td>
                <td id='q_$i'><input class='form-control' placeholder='que _id' type='number'min='1' name='question_id[$i]' required/></td>
                <td ><input class='form-control' placeholder='marks' type='number'min='1' name='marks[$i]' required/></td>
                <td><button onclick=\"addOR($i)\" class='add_btn btn m-0 p-0' style='width:80px'><i class='fas fa-plus'></i> OR</button></td>
              </tr>";
            }
            echo "
            </tbody>
            </table>";
            if($no_sections>0){
                echo"
            <table border='0' class='table mt-4' style='text-align:left;'>
            <thead class='thead'>
                <tr>
                    <th>S.No</th>
                    <th>Section Name</th>
                    <th>Start Question</th>
                </tr>
            </thead>
            <tbody>";
            for($i=1;$i<=$no_sections;$i++)
            {
              echo "
              <tr>
                <td>$i</td>
                <td id='q_$i'><input class='form-control' placeholder='section_name' type='text' name='section_id[$i]' required/></td>
                <td ><input class='form-control' placeholder='Start Question' type='number' min='1' max='$no_ques' name='section_number[$i]' required/></td>
              </tr>";
            }
            echo "
            </tbody>
            </table>
            ";
            }
            

            echo "
            </div>
            
            <button type='submit' class='btn submit_btn'>Generate Paper</button>
            ";
        }
        else{
            echo "Sections cannot exceed number of questions.";
        }
         
      }
     ?>
</form>
        </div>
        <div class="col-md-2">
        </div>
        
    </div>
</div>

<?php echo"$script_bar"?>
<script>
let arr = [];
for(let i=0;i<50;i++){
    arr[i]=0;
}
    function addOR(value){
        let x = "q_"+value;
        if(arr[value-1]<3){
            arr[value-1]++;
            let y = arr[value-1]+100*value;
            document.getElementById(x).innerHTML += "<p style='text-align:center'>OR</p><br/><input class='form-control' type='number' placeholder='que _id'  'min='1' name='question_id["+y+"]' required />";
        }
        else{
            alert("You can add max 3 OR for each question");
        }
        
    }
</script>

<?php echo"$footer"?>