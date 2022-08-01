<?php
  $email = "everdevel@icloud.com";
  $emailArray = explode("@", $email);

  //html에 pre태그: <pre> 요소 내의 텍스트는 시스템에서 미리 지정된 고정폭 글꼴(fixed-width font)을 사용하여 표현되며, 텍스트에 사용된 여백과 줄바꿈이 모두 그대로 브라우저 화면에 나타남.
  echo "<pre>";
  var_dump($emailArray);

  echo "이메일의 호스트 출력 <br/>";
  echo $emailArray[1];
  //echo gettype($emailArray);
?>
