<?php
include("checkAdmin.php");
$show = "none";
if(isset($_SESSION["question_id"])){
 $show = "";
}

?>
<?php echo"$head" ?>
<link rel="stylesheet" href="css/home.css"/>
<?php echo"$navbar"?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-6" style="display: <?php echo "$show" ?>;">
            <div class="card">
                <div><i class="fab fa-gg"></i></div>
                <div><h1>Recent paper</h1></div>
                <div><a href='create_paper.php'>View</a></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div><i class="far fa-copy"></i></div>
                <div><h1>Papers</h1></div>
                <div><a href='all_papers.php'>View</a></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div><i class="fas fa-sort-numeric-up-alt"></i></div>
                <div><h1>Filter</h1></div>
                <div><a href='filterQuestion.php'>Filter</a></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div><i class='fas fa-cogs'></i></div>
                <div><h1>Generate Paper</h1></div>
                <div><a href='generate.php'>Generate</a></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div><i class="fas fa-plus-circle"></i></div>
                <div><h1>Add Question</h1></div>
                <div><a href='addQuestion.php'>Add</a></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div><i class='fab fa-stripe-s'></i></div>
                <div><h1>Subjects</h1></div>
                <div><a href='subjects.php'>Subject</a></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div><i class='fab fa-cuttlefish'></i></div>
                <div><h1>Chapters</h1></div>
                <div><a href='chapters.php'>Chapter</a></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div><i class='fab fa-tumblr'></i></div>
                <div><h1>Topics</h1></div>
                <div><a href='topics.php'>Topic</a></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6"></div>
    </div>
</div>
<?php echo"$script_bar"?>
<?php echo"$footer"?>