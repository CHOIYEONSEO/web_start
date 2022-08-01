<?PHP

  /*
  //이름 검증
  //패턴 대입
  //패턴은 '/패턴 입력할 곳/' 이렇게 작은따옴표와 슬래시 사이에 입력함.
  //^는 문자 시작.
  //[]는 문자 간격 지정할 때 사용.
  //-는 시작할 문자와 끝날 문자의 간격 사이에 사용.
  //+는 1회 이상 패턴 실행.
  //$는 문자 끝.

  $pattern = '/^[가-힣]+$/';

  $myName = '김태영';
  //$myName = '김태영!';

  //preg_match 함수는 두번째 아규먼트가 첫번째 아규먼트(=패턴)에 부합하는지 확인할 수 있는 함수. 정규식을 검사할 수 있도록 하는 기능을 갖고 있음.
  //따라서 일치하면 true, 일치하지 않으면 false를 반환. 또한 일치해서 일치하는 문구를 찾으면 변수 matches(=세번째 아규번트)에 값을 전달함.
  if (preg_match($pattern, $myName, $matches)) {
    echo "값 {$myName}은 정규식 표현에 적합한 값입니다. ";
    echo "<pre>";
    var_dump($matches);
  } else{
    echo "이름에 특수 문자, 영문 또는 숫자가 있는지 확인 요망";
  }
  */


  /*
  //아이디 검증 - 첫번째 자리에 _가 오지 않고, a~z, 0~9, _ 사용 가능한 패턴 생성
  //패턴 대입
  $pattern = '/^[^_][a-z0-9_]+$/';

  $myId = 'everdevel_12';

  if (preg_match($pattern, $myId, $matches)) {
    echo "값 {$myId}은 정규식 표현에 적합한 값입니다.";
    echo "<pre>";
    var_dump($matches);
  } else{
    echo '사용 불가한 아이디입니다.';
  }
  */


  /*
  //휴대전화번호 검증 - or조건 사용하여 패턴 생성
  $pattern = '/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/';

  //$myPhone = '010-1234-5678';
  $myPhone = '010-1234-56789';

  if(preg_match($pattern, $myPhone, $matches)) {
    echo "휴대폰 번호로 입력된 값 {$myPhone}는 유효성에 일치합니다."; //중간에 변수 넣어서 같이 출력할거면 "" 큰따옴표 사용해야됨.
    echo '<pre>';
    var_dump($matches);
  } else{
    echo "사용 불가한 번호입니다.";
  }
  */


  /*
  //이메일 검증
  //패턴 대입
  $pattern = '/^[a-zA-Z0-9_\-\.]+@[a-zA-Z\-]+\.[\.a-zA-Z]+$/';   //+는 1회 이상 패턴 실행.

  $myEmail = 'everdevel@icloud.com.kr';

  if(preg_match($pattern, $myEmail, $matches)) {
    echo "입력한 이메일 주소 {$myEmail}는 사용가능한 이메일 주소입니다.";
    echo '<pre>';
    var_dump($matches);
  } else{
    echo "사용 불가한 이메일 주소입니다.";
  }
  */



  //정규 표현식에서 .의 기능
  //패턴 대입
  $pattern = '/.verdevel/';

  $myWebServiceName = 'everdevel';

  if(preg_match($pattern, $myWebServiceName, $matches)) {
    echo "값 {$myWebServiceName}은 올바른 이름입니다. ";
    echo '<pre>';
    var_dump($matches);
  } else{
    echo "사용 불가한 이름입니다.";
  }
?>
