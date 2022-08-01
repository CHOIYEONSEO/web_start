<?php
  include_once "./connectDB.php";

  $sql = "select * from mymember";
  $res = $dbConnect->query($sql);

  $numView = 50;

  $totalRecord = $res->num_rows;

  //페이지 수
  $numPage = ceil($totalRecord / $numView); //ceil은 소수값 올림 함수.

  for($i = 1; $i <= $numPage; $i++) {?>
    <a href = "http://localhost/PHP/selectLimit.php?page=<?=$i?>">
      <?=$i?>
    </a>
<?php  }?>
