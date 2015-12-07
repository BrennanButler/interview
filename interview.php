<?php
include("inc/database.php");
?>

<!doctype html>

<html lang="en">

  <head>
      <meta charset="utf-8">
      <title>Interview questions</title>

      <!-- Stylesheet -->
      <link href="css/style.css" rel="stylesheet" type="text/css"/>
      <!-- Javascript -->
      <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src="js/site.js"></script>
  </head>

  <body>

    <div class="container">

      <header>
        <div class="logo"><a href="index.php"><h1>Interview questions</h1></a></div>
      </header>

      <main class="main-content">
        <div class="content">
          <div class="question_container" id="question_container">
          <ul class="questions">
          <?php

          $obj = new Database("localhost", 3306, "interview", "root", "");
          $query = $obj->getConnection()->prepare("SELECT question.question_id, question.question_title, answers.answer, answers.fake_answers FROM `question` INNER JOIN `answers` ON question.question_id = answers.question_id WHERE question.language_id=?");
          $query->bindParam(1, $_GET['l'], PDO::PARAM_INT);
          $query->execute();

          if($query->rowCount() < 1)
          {
            echo '<h3>There was a problem loading the interview questions or there was none found for this language</h3>';
          }
          else
          {
            while($row = $query->fetch(PDO::FETCH_ASSOC))
            {
              $fakeAnswers = explode(", ", $row['fake_answers']);
              $randomAnswers = array($row['answer']);

              $qString = "<li><form action=\"\" method=\"post\" id=\"question_" . $row['question_id'] . "\"><h4>" . $row['question_title'] . "</h4>";
              for($i = 0; $i < count($fakeAnswers); $i++)
              {
                array_push($randomAnswers, $fakeAnswers[$i]);
              }

              shuffle($randomAnswers);

              for($i = 0; $i < count($randomAnswers); $i++)
              {
                $qString .= "<p><input type=\"radio\" name=\"answer\" value=\" " . $randomAnswers[$i] . "\"/> " . $randomAnswers[$i] . "</p>";
              }
              $qString .= "</li></form>";
              echo($qString);
            }
            ?>
            <button type="submit" id="submitAnswers">Submit</button>
            <?php
          }

          ?>
          </ul>
        </div>

        </div>
      </main>
    </div>

  </body>

</html>
