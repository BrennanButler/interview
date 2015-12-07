<?php

if(!isset($_POST['qa'])) exit;

include("inc/database.php");

$data = array();
$totalCorrect = 0;

foreach($_POST['qa'] as $key)
{
  $temp = explode("% ", $key);
  array_push($data, array($temp[0], $temp[1]));
}

$obj = new Database("localhost", 3306, "interview", "root", "");

for($i = 0; $i < count($data); $i++)
{
  $query = $obj->getConnection()->prepare("SELECT answer FROM `answers` WHERE `question_id`=?");
  $query->bindParam(1, $data[$i][0], PDO::PARAM_INT);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);

  if(!strcmp($data[$i][1], $result['answer']))
  {
    $totalCorrect++;
  }
}

echo $totalCorrect;


?>
