<?php
  $content = '이 내용은 앞의 내용의 뒤에 붙어 저장됩니다.';
  $fileName = 'helloWorld.txt';

  //파일 열기 옵션으로 a+ 입력 - a+는 읽고 쓸수 있고, 쓸때는 덧붙임.
  $fp = fopen('./myFiles/'.$fileName, 'a+');
  $fw = fwrite($fp, $content);

  //파일 쓰기 성공 여부 확인
  if($fw == false) {
    echo '파일 쓰기에 실패했습니다. ';
  } else {
    echo '파일 쓰기 완료';
  }

  fclose($fp);

?>
