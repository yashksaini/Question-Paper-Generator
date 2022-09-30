$(document).ready(function () {
  // For Signup Form
  $("#signup_btn").click(function (e) {
    e.preventDefault();
    let name = document.getElementById("signup_name").value;
    let email = document.getElementById("signup_email").value;
    let password = document.getElementById("signup_password").value;
    $.ajax({
      type: "POST",
      data: { name: name, email: email, password: password },
      url: "beforeLogin/signup.php",
      success: function (data) {
        document.getElementById("signup_message").innerHTML = data;
      },
    });
  });
  // For Login Form
  $("#login_btn").click(function (e) {
    e.preventDefault();
    let email = document.getElementById("login_email").value;
    let password = document.getElementById("login_password").value;
    $.ajax({
      type: "POST",
      data: { email: email, password: password },
      url: "beforeLogin/login.php",
      success: function (data) {
        document.getElementById("login_message").innerHTML = data;
        if (data == "login") {
          window.location.href = "admin/";
        }
      },
    });
  });
});
