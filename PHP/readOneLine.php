<?php
  $filePathName = './myFiles/largeRow.php';

  if(file_exists($filePathName)) {
    $fp = fopen($filePathName, 'r');

    //읽어 올 용량 설정 상황에 따라 다른 값을 넣어야 함
    $readByte = 512;

    if($fp) {
      //fgets()는 파일을 한줄씩 읽고 싶을 때 사용하는 함수.
      //첫번째 아규먼트는 파일정보 = fopen()함수.
      //두번째 아규먼트는 불러올 용량. 어느정도 용량에서 줄바꿈하는지 알 수 없으므로 충분한 용량을 사용하는 것이 좋음.
      while(($fr = fgets($fp, $readByte)) != false) {
        echo $fr."<br/>";
      }
    }
  }
?>
