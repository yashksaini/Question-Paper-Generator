$(document).ready(function () {
  $(`#showSubject`).load(`extra/showSubject.php`);
  // For Subject
  $("#add_btn").click(function (e) {
    e.preventDefault();

    let class_name = document.getElementById("class").value;
    let sub_name = document.getElementById("sub_name").value;
    console.log(class_name, sub_name);
    $.ajax({
      type: "POST",
      data: { class: class_name, subject: sub_name },
      url: "extra/addSubject.php",
      success: function (data) {
        document.getElementById("add_message").innerHTML = data;
        $(`#showSubject`).load(`extra/showSubject.php`);
      },
    });
  });
});
