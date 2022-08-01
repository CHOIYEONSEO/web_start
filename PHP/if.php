<?php
  //변수 likeMusic에 문자열 대입
  $likeMusic = 'dream lights';

  //변수 likeMusic 값이 dream lights인지 확인
  if($likeMusic == "dream lights") {
    echo "태영이 좋아하는 음악은 dream lights입니다.";
  } else {
    echo "태영이 좋아하는 음악은 dream lights가 아닙니다.";
  }
  echo "<br/><br/>";


  $data = "데이터형";

  if(gettype($data) == "string") {
    echo "데이터형은 문자열 입니다.";
  } else if(gettype($data) == "integer") {
    echo "데이터형은 정수형 입니다.";
  } else {
    echo "데이터형은 문자열도 정수형도 아닙니다.";
  }

  
?>
