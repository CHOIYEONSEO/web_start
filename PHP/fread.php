<?php
  $filePathName = './myFiles/helloWorld.txt';

  //파일 존재 여부 확인
  if(file_exists($filePathName)) { //file_exists()함수는 파일경로를 아규먼트로 받아서 파일이 존재하면 true를 반환하는 함수.
    //파일 열기
    $fp = fopen($filePathName, 'r');

    if($fp) {
      //파일 읽기
      //fread()함수는 파일 내용을 읽는 함수로,
      //첫번째 아규먼트는 파일정보 = fopen()함수고,
      //두번째 아규먼트는 불러올 용량(byte)(ie. 5를 입력하면 파일 내용중 5byte만큼만 내용을 불러옴.). 보통은 filesize()함수를 사용해서 전체 내용을 불러옴.
      $fr = fread($fp, filesize($filePathName)); //filesize()함수는 파일용량을 확인하는 함수. 파일경로를 아규먼트로 가지고, 바이트 단위의 용량을 반환함.
      if($fr) {
        echo $fr; //내용 출력
        fclose($fp); //파일 닫기
      } else {
        echo '파일 읽기에 실패했습니다.';
      }
    } else {
      echo '파일 열기에 실패했습니다.';
    }
  } else {
    echo '파일이 존재하지 않습니다.';
  }
?>
