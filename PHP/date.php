<?php
  ini_set('date.timezone', 'Asia/Seoul');
  echo "현재 시간은 ".date("Y년 m월 d일 H시 i분 s초", time());

  echo "<br/><br/>";

  echo date("Y", time());//연도만 알고 싶을때.
?>
