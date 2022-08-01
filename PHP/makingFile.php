<?php
  $filePathName = './myFiles/largeRow.php';//기존에 파일이 없으면 새로 만드는거.

  $content = $_POST['myInputText'];

  $fp = fopen($filePathName, 'w'); 

  if($fp) {
    $fw = fwrite($fp, $content);
    if($fw) {
      echo '파일 쓰기 완료';
    }
  }
?>
