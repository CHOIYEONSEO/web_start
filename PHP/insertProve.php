<?php
  include_once "./connectDB.php";

  //POST 방식으로 전달 받은 값 확인
  echo "<pre>"; //html에 pre태그: <pre> 요소 내의 텍스트는 시스템에서 미리 지정된 고정폭 글꼴(fixed-width font)을 사용하여 표현되며, 텍스트에 사용된 여백과 줄바꿈이 모두 그대로 브라우저 화면에 나타남.
  var_dump($_POST);

  //이름 검증
  if($_POST['userName'] == '' || $_POST['userName'] == null){
    echo "해당 값을 사용할 수 없습니다. 1";
    exit;
  }

  $userName = $_POST['userName'];
  //echo $userName."<br/>";
  //앞뒤 공백 제거
  $userName = trim($userName);
  //echo $userName."<br/>";
  //쿼리문의 따옴표 처리를 위해 real_escape_string 메소드 사용
  $userName = $dbConnect->real_escape_string($userName);
  //echo $userName."<br/>";

  //아이디 검증
  if($_POST['userId'] == '' || $_POST['userId'] == null){
    echo "해당 값을 사용할 수 없습니다. 2";
    exit;
  }

  $userId = $_POST['userId'];
  //echo $userId."<br/>";
  $userId = strtolower(trim($userId));
  //echo $userId."<br/>";
  $userId = $dbConnect->real_escape_string($userId);
  //echo $userId."<br/>";

  //비밀번호 검증
  if($_POST['userPw'] == '' || $_POST['userPw'] == null){
    echo "해당 값을 사용할 수 없습니다. 3";
    exit;
  }

  //비밀번호 암호화
  $userPw = sha1("everdevel".$_POST['userPw']); //sha1: 값을 암호화하는 함수
  //echo "everdevel".$_POST['userPw']."<br/>";
  //echo $userPw."<br/>"; //값을 sha1을 사용해서 암호화하게 되면 길이가 30이상이 됨. 따라서 password 필드 타입을 30보다 크게(ie.varchar(50))해줘야 됨.

  if($_POST['userGender'] == 'm' || $_POST['userGender'] == 'w'){
    $userGender = $_POST['userGender'];
  } else{
    echo "해당 값을 사용할 수 없습니다. 4";
    exit;
  }

  //이메일 유효성 검사
  $emailCheck = filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL);
  //echo $emailCheck."<br/>";
  if($emailCheck == false){
    echo "해당 값을 사용할 수 없습니다. 5";
    exit;
  }

  $email = $_POST['userEmail'];
  //echo $email."<br/>";

  $sql = "INSERT INTO myMember(userId, name, password, gender, email) VALUES";
  $sql .= "('{$userId}', '{$userName}', '{$userPw}', '{$userGender}', '{$email}')";
  $res = $dbConnect->query($sql);

  //var_dump($res); //boolean 값 출력하는 방법

  if($res){
    echo '회원가입 정보 입력 완료';
  } else{
    echo '회원가입 정보 입력 실패';

    //변수에 값을 대입까지는 성공하지만 맨 마지막에 '회원가입 정보 입력 실패'멘트가 뜰때
    //->즉, DB에 저장이 안될때
    //원인 4가지로 고려해보기 (참고 사이트 : https://onlyfor-me-blog.tistory.com/102)
    //1. DB 설정 오류(desc table - type이나 NULL 설정이나 unique같은 key설정) 
    //2. SQL문 오타(컬럼명과 값 이름 등)
    //3. php 변수 오타
    //4. DB 연결 안 됐는데 난 됐다고 생각한 걸지도?

  }


?>
