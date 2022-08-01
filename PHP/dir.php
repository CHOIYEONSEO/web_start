<?php
  //체크할 디렉터리를 대입
  $dir = './images/'; //현재 위치의 images 폴더를 의미함.

  //폴더가 있는지 확인
  if(is_dir($dir)) { //is_dir() 함수는 해당 위치에 images 폴더가 있다면 true를 반환.
    $opendir = opendir($dir); //opendir()함수는 해당위치에서 images 폴더를 여는데 성공했으면 true를 반환.

    if($opendir == true) {
      while(($file = readdir($opendir)) != false) { //readdir()함수는 폴더안의 파일명을 반환.
        echo $file."<br/>";
      }
    }
    //폴더를 열지 못했을 때
    else {
      echo '해당 폴더를 열지 못했습니다.';
      exit;
    }
  }
  //폴더가 없을 경우
  else {
    echo '해당 폴더가 없습니다.';
    exit;
  }
?>
