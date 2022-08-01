<?php
  //문자열을 int 데이터형으로 변환했을 때
  $str = "문자열";
  echo "데이터형 변경전의 데이터형 ".gettype($str)."<br/>";

  $str = (int) $str;
  echo "데이터형 변경 후의 데이터형 ".gettype($str)." 값은 {$str} <br/><br/>";

  //숫자로 시작하는 문자열을 int 데이터형으로 변환했을 때 - 555됨.
  $str = "555문자열";
  echo "데이터형 변경전의 데이터형 ".gettype($str)."<br/>";

  $str = (int) $str;
  echo "데이터형 변경 후의 데이터형 ".gettype($str)." 값은 {$str} <br/><br/>";

  //숫자로 시작하지 않는 문자열을 int 데이터형으로 변환했을 때 - 0됨.
  $str = "문자열555";
  echo "데이터형 변경전의 데이터형 ".gettype($str)."<br/>";

  $str = (int) $str;
  echo "데이터형 변경 후의 데이터형 ".gettype($str)." 값은 {$str} <br/><br/>";

  //소수(double)형을 int 데이터형(정수)으로 변환했을 때 - 12됨.
  $double = 12.494;
  echo "데이터형 변경전의 데이터형 ".gettype($double)."<br/>";

  $double = (int) $double;
  echo "데이터형 변경 후의 데이터형 ".gettype($double)." 값은 {$double} <br/><br/>";

  //반올림인지 버림인지 확인
  $double = 12.7;
  echo "데이터형 변경전의 데이터형 ".gettype($double)."<br/>";

  $double = (int) $double;
  echo "데이터형 변경 후의 데이터형 ".gettype($double)." 값은 {$double}";
?>
