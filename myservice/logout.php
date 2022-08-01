<?php
  session_start();
  //나중에 로그 기능 구현

  //세션 제거
  unset($_SESSION['myMemberSes']);

  //세션 제거 확인 후 메인페이지로 이동
  if(!isset($_SESSION['myMemberSes'])) {
    header('Location:./index.php');
  }
?>
