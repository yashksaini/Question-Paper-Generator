<?php
include("checkAdmin.php");
?>
<?php echo"$head" ?>
<link rel="stylesheet" href="css/addQuestion.css"/>
<?php echo"$navbar"?>

<div class="container mt-4">
    <h1 class="mt-2 mb-4"><b>All Generated Papers</b></h1>
    <div class="row">
        <div class="col-md-12">
        <div class='table-responsive bg-white'>
        <table class='table table-bordered' style='text-align:center;'>
            <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Paper Name</th>
                    <th scope="col">View</th>
            </tr>
                <?php
                $num=0;
                $query = "SELECT * FROM paper_details ORDER BY id DESC";
                $res = mysqli_query($con,$query);
                if(mysqli_num_rows($res)>0){
                    while($row=$res->fetch_assoc()){
                        $p_id = $row["id"];
                        $paper_name = $row["paper_name"];
                        $num++;
                        echo "
                        <tr>
                            <td scope='row'>$num</td>
                            <td>$paper_name</td>
                            <td><form method='post' action='view_paper.php'><input name='p_id' value='$p_id' style='display:none'/><button type='submit' class='add_btn btn m-0 p-0' style='width:80px'>View</button></form></td>
                        </tr>";
                    }
                }      
                ?>
        </table>
    </div>
        </div>
    </div>
   
</div>
<?php echo"$script_bar"?>


<?php echo"$footer"?>