# interview
>Very simple website for quizzing yourself on interview questions.

## Setting up

- Place the files on a directory on your webserver 
- Upload the interview.sql file to your database
- Edit the files checkanswers.php, interview.php and index.php and insert your database information, for example:
```php
<?php
  $obj = new Database("database_host", port_number, "database_name", "database_user", "database_password");
?>
```
- The database provided comes with some default values and is practically empty, go into phpmyadmin (or through sql queries) and insert your interview questions/languages/answers into the respective tables. I plan on adding a large set of default questions in the future.

## Adding fake answers

In order to add fake answers to a question you need add them into the fake_answers field within the answers table with a commer and space after each fake answer (but not the last one).


The admin panel does not work as of yet.
