<?php
  //mysql 접속 소스를 include함
  include_once "./connectDB.php";

  //입력할 데이터를 변수에 대입
  $userId = "carebear2";
  $name = "어베어";
  $userPW = "care2";
  $phone = "010-1234-5678";
  //$email = "kmu07@everdevel.com";
  $email = "carebear@everdevel.com";
  $birthday = "2022-07-14";
  $gender = "w";

  //쿼리문 작성
  //$sql = "insert into myMember(userId, name, password, phone, email, birthday, gender, regTime) values";
//  $sql .= "('{$userId}', '{$name}', '{$userPW}', '{$phone}', '{$email}', '{$birthday}', '{$gender}', now())";

  //$sql = "INSERT INTO testtable(userId, name, password, gender, email) VALUES";
  //$sql .= "('{$userId}', '{$name}', , '{$gender}', '{$email}')";

  $sql = "INSERT INTO myMember(userId, name, password, gender, email) VALUES";
  $sql .= "('{$userId}', '{$name}', '{$userPW}', '{$gender}', '{$email}')";

/*
  //쿼리문 전송 및 전송값을 result 변수에 대입
  $result = $dbConnect->query($sql);

  //데이터 입력이 완료되었는지 확인
  if($result){
    echo "데이터 입력 완료";
  } else{
    echo "데이터 입력 실패";
  }
  */

  $res = $dbConnect->query($sql);

  if($res){
    echo '회원가입 정보 입력 완료';
  } else{
    echo '회원가입 정보 입력 실패';
  }
  
?>
