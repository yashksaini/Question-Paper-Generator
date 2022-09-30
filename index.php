<?php 


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>QPG</title>
    <link rel="stylesheet" href="styles/index.css"/>
  </head>
  <body>
    <div class="box">
        <div class="form_box">
            <div class="box_head">
                <div id="signup_tab"  onclick="toggle(true)">Signup</div>
                <div id="login_tab" class="active_tab" onclick="toggle(false)">Login</div>
            </div>
            <div class="box_body">
                <!-- Login Form -->
                <form method="post" id="login" class="form">
                    <label class="form-label">Email</label>
                    <input name="email" id="login_email" class="form-control" type="email" placeholder="Enter email here. . ." required/>
                    <label class="form-label">Password</label>
                    <input name="password" id="login_password" class="form-control" type="password" placeholder="Enter password here. . ." required/>
                    <button id="login_btn" class="btn submit_btn">Login</button>
                    <p id="login_message"></p>
                </form>
                <!-- Signup Form -->
                <form method="post" id="signup" class="nodisplay">
                    <label class="form-label">Name</label>
                    <input name="name" id="signup_name" class="form-control" type="text" placeholder="Enter name here. . ." required/>
                    <label class="form-label">Email</label>
                    <input name="email" id="signup_email" class="form-control" type="email" placeholder="Enter email here. . ." required/>
                    <label class="form-label">Password</label>
                    <input name="password" id="signup_password" class="form-control" type="password" placeholder="Enter password here. . ." required/>
                    <button id="signup_btn" class="btn submit_btn">SignUp</button>
                    <p id="signup_message"></p>
                </form>
            </div>
        </div>
    </div>
    
<!-- Jquery -->
<script src="jquery/jquery.min.js"></script>
<!--  Bootstrap Bundle with Popper -->
<script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="scripts/toggle.js"></script>
<script src="scripts/auth.js"></script>
  </body>
</html>