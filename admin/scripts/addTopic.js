$(document).ready(function () {
  $(`#showSubject`).load(`extra/showTopic.php`);

  $("#sub_class").change(function () {
    let sub_id = document.getElementById("sub_class").value;
    $.ajax({
      type: "POST",
      data: { sub_id: sub_id },
      url: "extra/topicForm.php",
      success: function (data) {
        document.getElementById("add_topic_form").innerHTML = data;
      },
    });
  });
});

function add_btn() {
  let topic_name = document.getElementById("topic_name").value;
  let chap_id = document.getElementById("chap_id").value;
  $.ajax({
    type: "POST",
    data: { chap_id: chap_id, topic_name: topic_name },
    url: "extra/addTopic.php",
    success: function (data) {
      document.getElementById("add_message").innerHTML = data;
      $(`#showSubject`).load(`extra/showTopic.php`);
    },
  });
}
