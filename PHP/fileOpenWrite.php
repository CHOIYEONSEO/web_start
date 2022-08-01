<?php
  //파일에 쓸 내용
  $content = 'Hello World!';

  //내용을 저장할 파일명
  $fileName = 'helloWorld.txt';

  //파일 열기
  //fopen()함수는 파일 경로에 파일이 존재하지 않으면 실행되지 않음.
  //첫번째 아규먼트는 열고 싶은 파일 경로, 두번째 아규먼트는 열기 옵션으로 w는 쓰기전용 옵션으로 내용이 이미 있다면 삭제하고 씀.
  $fp = fopen('./myFiles/'.$fileName, 'w');

  //파일 쓰기
  //fwrite()함수는 파일쓰기 실패시 false를 반환.
  //첫번째 아규먼트는 파일정보 = fopen()함수.
  //두번째 아규먼트는 파일에 쓸 내용.
  $fw = fwrite($fp, $content);

  //파일 쓰기 성공 여부 확인
  if($fw == false) {
    echo "파일 쓰기에 실패했습니다. ";
  } else{
    echo "파일 쓰기 완료";
  }

  //파일 닫기
  //fclose()함수는 fopen()함수를 아규먼트로하는 열었던 파일을 닫는 함수.
  fclose($fp);
?>
