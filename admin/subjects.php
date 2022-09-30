<?php
include("checkAdmin.php");
// Update Query
if(isset($_POST["u_id"])){
  $id = $_POST["u_id"];
  $class = $_POST["u_class"];
  $sub_name = $_POST["u_subject"];

  $query = "SELECT * FROM subjects WHERE class='$class' AND sub_name='$sub_name'";
  if(mysqli_num_rows(mysqli_query($con,$query))==1){
    echo "<script>alert('Subject already with this class.');</script>";
  }
  else{
    $query = "UPDATE subjects SET sub_name='$sub_name',class='$class' WHERE id='$id'";
    if(mysqli_query($con,$query)){
      echo "<script>alert('Updated');</script>";
    }
}
}
if(isset($_POST["d_id"])){
  $d_id = $_POST["d_id"];
  $query = "DELETE FROM subjects WHERE id='$d_id'";
  if(mysqli_query($con,$query)){
    echo "<script>alert('Removed');</script>";
  }
}
?>
<?php echo"$head" ?>
<link rel="stylesheet" href="css/subject.css"/>
<?php echo"$navbar"?>

<div class="container">
    <button class="add_btn btn" data-bs-toggle="modal" data-bs-target="#add"><i class="fas fa-plus"></i> Subjects</button>
    <div class="row" id="showSubject">
      <!-- All Subjects Appear Here -->
    </div>
</div>

<?php echo"$script_bar"?>
<script src="scripts/addSubject.js"></script>
<!-- Modal for Adding-->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form" method="post">
            
            <label class="form-label">Select Class</label>
            <select id="class" name="class" class="form-control">
                <?php
                    $query = "SELECT * FROM classes ORDER BY class_name ASC";
                    $result = mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = $result->fetch_assoc()) {
                            $class = $row["class_name"];
                            echo "<option value='$class'>$class</option>";
                        }
                    }
                ?>
            </select>
            <label class="form-label">Subject Name</label>
            <input type="text" id="sub_name" name='subject' placeholder="Enter subject name. . ." class="form-control" required/>
            <button type="submit" id="add_btn" class="btn submit_btn">Add subject</button>
            <p id="add_message"></p>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Updating-->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Subject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form" method="post">
          <input type="text" id="u_id" name='u_id' style="display: none;"/>
            <label class="form-label">Select Class</label>
            <select id="u_class" name="u_class" class="form-control" >
                <?php
                    $query = "SELECT * FROM classes ORDER BY class_name ASC";
                    $result = mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = $result->fetch_assoc()) {
                            $class = $row["class_name"];
                            echo "<option value='$class'>$class</option>";
                        }
                    }
                ?>
            </select>
            <label class="form-label">Subject Name</label>
            <input type="text" id="u_sub_name" name='u_subject' placeholder="Enter subject name. . ." class="form-control" required/>
            <button type="submit"  class="btn submit_btn">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal for Removing-->
<div class="modal fade" id="remove" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Subject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form" method="post">
            <input type="text" id="d_id" name='d_id' style="display: none;"/>
            <p>Do you really want to remove the subject?</p>
            <button type="submit"  class="btn rem_btn">Remove</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function update(a,b,c){
      document.getElementById("u_id").value = a;
      document.getElementById("u_sub_name").value = b;
      document.getElementById("u_class").value = c;
   }
   function remove(a){
      document.getElementById("d_id").value = a;
   }
</script>
<?php echo"$footer"?>