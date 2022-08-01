<?php
  //배열 선언
  $earth = array();

  //earth의 0 인덱스에 'korea' 대입
  $earth[0] = 'korea';

  //earch 배열의 0 인덱스를 출력
  echo "earth 배열의 0인덱스는 ".$earth[0]."<br/>";


  //인덱스를 숫자가 아닌 문자로도 지정할 수 있음.
  //earth의 nation 인덱스에 'korea' 대입
  $earth['nation'] = 'korea';

  //earth 배열의 nation 인덱스 출력
  echo "earth 배열의 nation 인덱스는 ".$earth['nation'];
?>
