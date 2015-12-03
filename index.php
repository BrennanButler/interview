<?php

include("inc/database.php");


session_start();

session_regenerate_id();


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
        <div class="logo"><h1>Interview questions</h1></div>
      </header>

      <main class="main-content">
        <div class="content">
          <ul class="languages">

            <?php

            $obj = new Database("localhost", 3307, "interview", "root", "usbw");

            $query = $obj->getConnection()->query("SELECT * FROM `language`");

            if($query->rowCount() < 1)
            {
              echo '<h3>There are no languages in the database</h3>';
            }
            else
            {
              while($row = $query->fetch(PDO::FETCH_ASSOC))
              {
                echo "<li><a href=\"interview.php?l=" . $row["language_id"] . "\">" . $row["name"] . "</a></li>";
              }
            }

            ?>
          </ul>
        </div>
      </main>
    </div>

  </body>

</html>
