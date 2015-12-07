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

    if(Answers.length <= 0) {
      return 0;
    }

    $.ajax({
      type: "POST",
      url: "checkanswers.php",
      data: {'qa':Answers},
      success: function(msg) {
        if(msg > 0)
          $("#question_container").html("<h1>Congratulations you got <strong style=\"color:green;\">" + msg + "</strong> correct!</h1>");
        else {
          $("#question_container").html("<h1>You got <strong style=\"color:red;\">" + msg + "</strong> correct!</h1>");
        }
      }

    });
  });
});
