<?php

include("../inc/database.php");


session_start();

session_regenerate_id();


?>

<!doctype html>

<html lang="en">

  <head>
      <meta charset="utf-8">
      <title>Interview questions</title>

      <!-- Stylesheet -->
      <link href="../css/style.css" rel="stylesheet" type="text/css"/>
      <!-- Javascript -->
      <script src="../js/site.js"></script>
  </head>

  <body>

    <div class="container">

      <header>
        <div class="logo"><h1>Interview questions</h1></div>
      </header>

      <main class="main-content">
        <div class="content">
        <div class="question_container">
          <h2>Current languages</h2>
          <?php
          $obj = new Database("localhost", 3307, "interview", "root", "usbw");
          $query = $obj->getConnection()->prepare("SELECT * FROM `language`");
          $query->execute();
          echo '<ul class="list_admin">';
          while($row = $query->fetch(PDO::FETCH_BOTH))
          {
            echo '<li> [ID] <strong>' . $row['language_id'] . '</strong> ' . $row['name'] . '</li>';
          }
          echo '</ul>';
          ?>
          <h2>Current questions</h2>
          <?php
          $query = $obj->getConnection()->prepare("SELECT * FROM `question`");
          $query->execute();
          echo '<ul class="list_admin">';
          while($row = $query->fetch(PDO::FETCH_BOTH))
          {
            echo '<li> [ID] <strong>' . $row['question_id'] . '</strong> ' . $row['question_title'] . '</li>';
          }
          echo '</ul>';
          ?>
          <h2>Current answers</h2>
          <?php
          $query = $obj->getConnection()->prepare("SELECT * FROM `answers`");
          $query->execute();
          echo '<ul class="list_admin">';
          while($row = $query->fetch(PDO::FETCH_BOTH))
          {
            echo '<li> [ID] <strong>' . $row['answer_id'] . '</strong> ' . $row['answer'] . ' ' . $row['fake_answers'] . '</li>';
          }
          echo '</ul>';
          ?>
          <h3>Add a language</h3>
          <form action="" method="post">
          <input type="text" id="addLanguage"/>
          <button type="submit">Submit</button>
          </form>
          <h3>Add a question</h3>
          <form action="" method="post">
          <textarea id="addQuestion"></textarea>
          <input type="number"/>
          <button type="submit">Submit</button>
          </form>
          <h3>Add answers</h3>
          <form action="" method="post">
          <textarea id="correctAnswer">Correct answer</textarea>
          <textarea id="fakeAnswers">Fake Answers</textarea>
          <input type="number"/>
          <button type="submit">Submit</button>
          </form>
        </div>
      </div>
      </main>
    </div>

  </body>

</html>
