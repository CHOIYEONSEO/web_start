<?php
  include_once './connectDB.php';

  $linkNum = (int) $_GET['linkNum'];

  if($linkNum == 0){
    exit;
  }

  $sql = "insert into linkClickCount(linkNum, regTime)";
  $sql .= "values ({$linkNum}, now())";
  $dbConnect->query($sql);
?>
