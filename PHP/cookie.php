<?php
  //쿠키 이름은 myCookie, 쿠키 값은 itIsCookie, 현재시간으로부터 10000초간 유지됨, 쿠키적용경로: 최상단 경로부터 하위 모든 폴더에 쿠키 적용.
  setcookie('myCookie', 'itIsCookie', time()+10000, '/');

  //isset함수는 쿠키의 존재 여부를 파악하는 함수.
  //쿠키를 사용하는 방법은 $_COOKIE['myCookie']로 접근함.
  if(isset($_COOKIE['myCookie'])) {
    echo "쿠키 생성 완료 쿠키의 값은 {$_COOKIE['myCookie']}";
  } else{
    echo '쿠키 생성 실패';
  }
?>
