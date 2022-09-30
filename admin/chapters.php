<?php
include("checkAdmin.php");
// Update Query
if(isset($_POST["u_id"])){
  $id = $_POST["u_id"];
  $sub_id = $_POST["s_id"];
  $chap_name = $_POST["u_chapter"];

  $query = "SELECT * FROM chapters WHERE sub_id='$sub_id' AND chap_name='$chap_name'";
  if(mysqli_num_rows(mysqli_query($con,$query))==1){
    echo "<script>alert('Chapter already with this Subject.');</script>";
  }
  else{
    $query = "UPDATE chapters SET chap_name='$chap_name' WHERE id='$id'";
    if(mysqli_query($con,$query)){
      echo "<script>alert('Updated');</script>";
    }
}
}
if(isset($_POST["d_id"])){
  $d_id = $_POST["d_id"];
  $query = "DELETE FROM chapters WHERE id='$d_id'";
  if(mysqli_query($con,$query)){
    $query = "DELETE FROM topics WHERE chap_id='$d_id'";
    if(mysqli_query($con,$query)){
      echo "<script>alert('Removed');</script>";
    }
  }
}
?>
<?php echo"$head" ?>
<link rel="stylesheet" href="css/subject.css"/>
<?php echo"$navbar"?>

<div class="container">
    <button class="add_btn btn" data-bs-toggle="modal" data-bs-target="#add"><i class="fas fa-plus"></i> Chapters</button>
    <div class="row" id="showSubject">
      <!-- All Chapters Appear Here -->
    </div>
</div>

<?php echo"$script_bar"?>
<script src="scripts/addChapter.js"></script>
<!-- Modal for Adding-->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Chapter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form" method="post">
            
            <label class="form-label">Select Class - Subject</label>
            <select id="sub_class" name="sub_class" class="form-control">
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
            <label class="form-label">Chapter Name</label>
            <input type="text" id="chap_name" name='chapter' placeholder="Enter chapter name. . ." class="form-control" required/>
            <button type="submit" id="add_btn" class="btn submit_btn">Add Chapter</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Update Chapter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form" method="post">
          <input type="text" id="u_id" name='u_id' style="display: none;"/>
          <input type="text" id="s_id" name='s_id' style="display: none;"/>
            <label class="form-label">Class - Subject</label>
            <input type="text" id="u_sub_class" class="form-control" disabled/>
            <label class="form-label">Chapter Name</label>
            <input type="text" id="u_chap_name" name='u_chapter' placeholder="Enter chapter name. . ." class="form-control" required/>
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
        <h5 class="modal-title" id="exampleModalLabel">Remove Chapter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form" method="post">
            <input type="text" id="d_id" name='d_id' style="display: none;"/>
            <p>Do you really want to remove the chapter? All topics inside this chapter are also removed.</p>
            <button type="submit"  class="btn rem_btn">Remove</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function update(a,b,c,d,e){
      document.getElementById("u_id").value = a;
      document.getElementById("u_sub_class").value = c+ " - "+b;
      document.getElementById("u_chap_name").value = d;
      document.getElementById("s_id").value = e;
   }
   function remove(a){
      document.getElementById("d_id").value = a;
   }
</script>
<?php echo"$footer"?>