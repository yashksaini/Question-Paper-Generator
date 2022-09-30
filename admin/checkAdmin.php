<?php 
session_start();
include("../config.php");

$email = $_SESSION["email"];
$password = $_SESSION["password"];

$query = "SELECT * FROM users WHERE email = '$email' AND password='$password' AND role='admin'";
if(mysqli_num_rows(mysqli_query($con,$query))==0){
    header('location:../index.php');
}
// Logout 
if(isset($_POST["logout"])) 
{ 
    session_destroy();
    header('location:../index.php');
} 

$head = "<!DOCTYPE html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <!-- Bootstrap CSS -->
    <link
      href='../bootstrap/css/bootstrap.min.css'
      rel='stylesheet'
      integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3'
      crossorigin='anonymous'
    />
    <!-- Font Awesome -->
    <link
      rel='stylesheet'
      href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'
    />
    <!-- CSS  -->
    <link href='css/navbar.css' rel='stylesheet' />
    ";
$navbar = "<title>Admin</title>
</head>

<body>
  <div class='nav' id='nav'>
    <div class='nav-top'>
    <i class='fas fa-scroll'></i>
    </div>
    <div class='menu_btn' id='menu-btn'>
      <i class='fas fa-bars'></i>
      <i class='fas fa-times'></i>
    </div>
    <div class='nav-list' id='list'>
      <a class='nav_link' href='index.php'>
        <i class='fas fa-home'></i> <span>Home</span>
      </a>
      <a class='nav_link' href='generate.php'>
        <i class='fas fa-cogs'></i> <span>Generate</span>
      </a>
      <a class='nav_link' href='all_papers.php'>
      <i class='fas fa-copy'></i> <span>All Papers</span>
      </a>
      <a class='nav_link' href='filterQuestion.php'>
        <i class='fas fa-filter'></i> <span>Filter</span>
      </a>
      <a class='nav_link' href='addQuestion.php'>
        <i class='fas fa-plus-square'></i> <span>Add Question</span>
      </a>
      <a class='nav_link' href='subjects.php'>
        <i class='fab fa-stripe-s'></i> <span>Subjects</span>
      </a>
      <a class='nav_link' href='chapters.php'>
        <i class='fab fa-cuttlefish'></i> <span>Chapters</span>
      </a>
      <a class='nav_link' href='topics.php'>
        <i class='fab fa-tumblr'></i> <span>Topics</span>
      </a>
      <div class='nav_link'>
        <form method='post' style='width:100%'> 
          <input name='logout' style='display:none' /> 
          <button type='submit'><i class='fas fa-sign-out-alt'></i> <span>Log Out</span></button>
        </form>
      </div>
    </div>
  </div>
  <div class='content'>";
  $script_bar = "</div>
  </div>
  <script src='../tinymce/tinymce.min.js'></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  
  <script>
  
var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

tinymce.init({
  selector: 'textarea',
  plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
  tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
  tinydrive_dropbox_app_key: 'YOUR_DROPBOX_APP_KEY',
  tinydrive_google_drive_key: 'YOUR_GOOGLE_DRIVE_KEY',
  tinydrive_google_drive_client_id: 'YOUR_GOOGLE_DRIVE_CLIENT_ID',
  mobile: {
    plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter pageembed charmap mentions quickbars linkchecker emoticons advtable'
  },
  menu: {
    tc: {
      title: 'Comments',
      items: 'addcomment showcomments deleteallconversations'
    }
  },
  menubar: false,
  toolbar: false,
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
  height: 120,
});
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/3.2.0/es5/tex-mml-chtml.min.js' integrity='sha512-9DkJEmXbL/Tdj8b1SxJ4H2p3RCAXKsu8RqbznEjhFYw0cFIWlII+PnGDU2FX3keyE9Ev6eFaDPyEAyAL2cEX0Q==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
";

$footer= "


<script type='text/javascript'>
// To restrict form resubmission
  if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href ); 
   }
</script>
<script
  src='../bootstrap/js/bootstrap.bundle.min.js'
  integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p'
  crossorigin='anonymous'
></script>
<script src='scripts/navbar.js'></script>
</body>
</html>";
?>