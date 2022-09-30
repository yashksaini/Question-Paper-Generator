$(document).ready(function () {
  $("#sub_class").change(function () {
    let sub_id = document.getElementById("sub_class").value;
    $.ajax({
      type: "POST",
      data: { sub_id: sub_id },
      url: "extra/chapForm.php",
      success: function (data) {
        document.getElementById("chap_select").innerHTML = data;
        $(`#topic_select`).load(`extra/questionForm.php`);
        document.getElementById("form_show").className = "noShow";
      },
    });
  });
});
function showForm() {
  let chap_id = document.getElementById("chap_id").value;
  $.ajax({
    type: "POST",
    data: { chap_id: chap_id },
    url: "extra/questionForm.php",
    success: function (data) {
      document.getElementById("topic_select").innerHTML = data;
      // $(`#showSubject`).load(`extra/showTopic.php`);
      document.getElementById("form_show").className = "row";
    },
  });
}
function showSolution(a) {
  let x = "sol" + a;
  let y = "show" + a;
  document.getElementById(x).classList.toggle("noShow");

  const z = document.getElementById(x).className;
  if (z === "noShow") {
    document.getElementById(y).innerHTML =
      " Show Solution <i class='fas fa-angle-down'></i>";
  } else {
    document.getElementById(y).innerHTML =
      "Hide Solution <i class='fas fa-angle-up'></i>";
  }
}
