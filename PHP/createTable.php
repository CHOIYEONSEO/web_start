<?php
  include_once './connectDB.php';

  //테이블 생성을 위한 쿼리문
  $sql = "create table linkClickCount(";
  $sql .= "linkClickCountID int unsigned not null auto_increment,";
  $sql .= "linkNum int unsigned not null comment '링크 고유 번호',";
  $sql .= "regTime datetime not null comment '클릭한 시간',";
  $sql .= "primary key (linkClickCountID))";
  $sql .= "charset=utf8 comment = '링크 클릭 수 집계'";

  $res = $dbConnect->query($sql);

  if($res) {
    echo '테이블 생성 완료';
  } else{
    echo '테이블 생성 실패';
  }
?>
