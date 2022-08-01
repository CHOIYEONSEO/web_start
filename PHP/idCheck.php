<?php
/*
  //result의 값이 good으로 고정되어 있기 때문에 항상 아이디를 사용해도 좋다는 결과가 나타남.
  echo json_encode(array('result' => 'good')); //AJAX 통신에서 사용할 언어를 json으로 정하면 json_encode() 함수 처리를 해야 함.
  //array('result' => 'good')은 'result' 문자열을 인덱스로 갖는 배열을 만들어서 그 값으로 'good'을 대입하라는 의미.
  //출력 결과는 {'result':'good'}이다.
*/

  //데이터(아이디)를 받아 데이터베이스를 통해 중복 여부를 체크하고 중복인지를 전달해줄 소스.
  include_once './connectDB.php';

  //중복 확인 요청 받은 아이디
  //real_escape_string은 특정 기능을 할수도 있는 특수문자 앞에 \를 붙여서 그저 문자로 기능할 수 있도록 처리해주는 함수.
  //trim은 양 끝 공백 제거.
  //$_POST 변수의 인덱스로 'userId'를 지정한 이유는 AJAX 코드에서 data 항목에 userId를 사용했기 때문.
  $userId = $dbConnect->real_escape_string(trim($_POST['userId']));
  //쿼리문 생성
  $sql = "select userId from mymember where userId = '{$userId}'";
  //쿼리문 질의
  $res = $dbConnect->query($sql);

  //전달할 데이터
  $jsonResult = 'bad';
  //해당하는 레코드 수가 0이라면 중복되는 아이디가 없다는 뜻이므로
  if($res->num_rows == 0) { //num_rows를 이용해 찾아낸 레코드 수가 있는지 확인함. 
    //good을 대입
    $jsonResult = 'good';
  }

  //전달할 수 있도록 json 형태로 값 출력
  echo json_encode(array('result' => $jsonResult));
?>
