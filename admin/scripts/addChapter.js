$(document).ready(function () {
  $(`#showSubject`).load(`extra/showChapter.php`);
  // For Chapter
  $("#add_btn").click(function (e) {
    e.preventDefault();

    let chap_name = document.getElementById("chap_name").value;
    let sub_id = document.getElementById("sub_class").value;
    $.ajax({
      type: "POST",
      data: { sub_id: sub_id, chap_name: chap_name },
      url: "extra/addChapter.php",
      success: function (data) {
        document.getElementById("add_message").innerHTML = data;
        $(`#showSubject`).load(`extra/showChapter.php`);
      },
    });
  });
});
