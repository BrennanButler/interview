$(function() {

  $('#submitAnswers').click(function(a) {

    var Answers = [];
    var qID;

    $("form[id*='question_']").each(function(i, el){
      qID = $(this).attr("id").substring(9, 15);
      $(this).children('p').each(function() {
        $(this).children('input:checked').each(function() {
          Answers.push(qID + "%" + this.value);
        });
      });


    });

    $.ajax({
      type: "POST",
      url: "checkanswers.php",
      data: {'qa':Answers},
      success: function(msg) {
        $("#question_container").html("<h1>Congratulations you got <strong style=\"color:green;\">" + msg + "</strong> correct!</h1>");
      }

    });
  });
});
