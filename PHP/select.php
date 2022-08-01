<?php
  //하나의 레코드만 불러올때
  /*
  include_once "./connectDB.php";

  $myMemberID = 1; //불러올 회원번호
  $sql = "select * from mymember where mymemberid = {$myMemberID}"; //변수명은 대문자소문자 구분해야하는거 주의
  $result = $dbConnect->query($sql); //쿼리 송신

  $memberInfo = $result->fetch_array(MYSQLI_ASSOC);

  echo "<pre>";
  var_dump($memberInfo);

  echo "회원번호가 {$myMemberID}번인 회원의 이름은 ".$memberInfo['name'];
  */

  //두개 이상의 레코드를 불러올때
  /*
  include_once "./connectDB.php";

  $sql = "select name, userID from mymember"; //name과 userId는 필드명이라서 대문자소문자를 28줄과 동일하게 해줘야됨.
  $result = $dbConnect->query($sql); //쿼리 송신

  $numResult = $result->num_rows;
  if($numResult != 0) {
    for($i = 0; $i < $numResult; $i++) {
      $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
      echo "회원이름: ".$memberInfo['name'].", 회원 ID: ".$memberInfo['userID']."<br/>";
    }
  } else{
    echo "데이터가 없습니다.";
  }
  */

  //두개 이상의 레코드를 ㄱㄴㄷ순으로 불러오고 싶을 때
  include_once "./connectDB.php";

  $sql = "select name, userId from mymember order by name ASC";
  $result = $dbConnect->query($sql); //쿼리 송신

  $numResult = $result->num_rows;
  //echo $numResult."<br/>";
  if($numResult != 0) {
    for($i = 0; $i < $numResult; $i++) {
      $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
      echo "회원이름: ".$memberInfo['name'].", 회원 ID: ".$memberInfo['userId']."<br/>";
    }
  } else{
    echo "데이터가 없습니다.";
  }
?>
