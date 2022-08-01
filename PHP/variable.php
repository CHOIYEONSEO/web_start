<?php
  $greeting = 'hello world';
  $birthMonth = 4;

  echo $greeting;

  //연결자(.) 사용해서 문자열과 변수 한줄로 출력하기.
  echo '저는 '.$birthMonth.'월에 태어났습니다.<br/>';

  //연결자를 사용하지 않고 변수를 텍스트 안에 넣어 출력하기.
  echo "저는 $birthMonth 월에 태어났습니다.<br/>";
  //변수명 보호하기 위해 뒤에 생기는 띄어쓰기를 없애기 위해 변수를 중괄호로 감싸주기.
  echo "저는 {$birthMonth}월에 태어났습니다.<br/>";

  //큰따옴표 역슬래시 사용
  echo "교수님이 말씀하셨다. \"이번 과제는 팀 프로젝트로 하겠습니다.\" <br />";
  echo "\$15를 지불하세요.";
?>
