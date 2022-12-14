<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/common/session.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/log/memberLog.php';

class contents extends memberLog{
  //데이터베이스 접속 정보를 대입할 프라퍼티
  protected $dbConnection = null;
  //mode
  protected $mode;

  protected function dbConnection(){
    include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/connect/connect.php';
  }


  //생성자
  function __construct(){
    //mode값에 따라 메소드 호출
    if(isset($_POST['mode'])) {
      $this->mode = $_POST['mode'];

      if($this->mode == 'save'){
        //게시물 저장 메소드 호출
        $this->contentsSave($_POST['meContent']);
      } else if($this->mode == 'loadMore') {
        //게시물 더 불러오기
        $this->contentsLoadMore($_POST['contentsLoadType'], $_POST['page']);
      }
    }
  }

  //게시물 저장 메소드
  function contentsSave($content){
    //게시물 등록 시간
    $time = time();

    //데이터베이스 연결
    $this->dbConnection();

    //게시물 등록하는 사용자의 회원번호
    $myMemberID = $_SESSION['myMemberSes']['myMemberID'];

    //게시물 real_escape_string 처리
    $content = $this->dbConnection->real_escape_string($content);

    //입력 쿼리문
    $sql = "insert into contents(myMemberID, content, regTime) values ('{$myMemberID}', '{$content}', {$time})";

    //질의
    $res = $this->dbConnection->query($sql);

    //결과값 초기화
    $result = false;

    //질의 성공 시 결과값 변경
    if($res){
      //나중에 게시물 등록 로그 남김
      $result = true;
      //memberLog에 전달할 로그 정보를 배열로 전달
      $myLog = array();
      //로그 번호
      $myLog['logNum'] = 4;
      //게시물 등록 시간
      $myLog['regTime'] = $time;
      //게시물 내용
      $myLog['contents'] = $content;
      //로그 정보 전달
      $this->writeMemberLog($myLog);
    }

    //요청한 AJAX에 전달
    echo json_encode(array(
      'result' => $result
    ));

  }

  //게시물 불러오는 메소드
  function contentsLoad($contentsLoadType){
    //$contentsLoadType의 값이 올바른지 확인
    //me도 all도 아니면 작동 중지
    if($contentsLoadType != 'me' && $contentsLoadType != 'all') {
      echo '잘못된 정보가 입력되어 기능이 정지됩니다.';
      exit;
    }

    //contentsType의 값에 따라 쿼리문이 달라지므로 달라지는 쿼리문의 일부를 sqlMake r변수에 대입
    $sqlMaker = "";

    //현재 로그인 상태인 회원번호 대입
    $myMemberID = $_SESSION['myMemberSes']['myMemberID'];

    //$contentsLoadType의 값이 me이면 나의 페이지에 게시물을 노출하므로 나의 게시물만 가져오도록 조건문 설정
    if($contentsLoadType == 'me'){
      $sqlMaker = "where c.myMemberID = ".$myMemberID;
    }

    //게시물을 가져오는 쿼리문
    //join문을 사용하는 이유는 게시물 작성자의 이름 정보와 프로필 사진 정보를 가져오기 위함.
    //limit이 있는 이유는 최초 등록된 20개의 게시물만 출력하기 위함
    //첫번째 게시물이 먼저 나오게하려면 책과 다르게 asc(오름차순)으로 써야됨. 책에서는 내림차순=desc 로 적어놨음. 근데 desc로 하면 25번째 게시물이 먼저 나옴.
    $sql = "select c.contentsID, c.myMemberID, c.content, c.regTime, m.userName, m.profilePhoto,
            (select count(*) from likes l where l.contentsID = c.contentsID) as likesCount,
            (select count(*) from likes l where l.contentsID = c.contentsID and l.myMemberID = {$myMemberID}) as myLike
            from contents c join mymember m on (c.myMemberID = m.myMemberID) {$sqlMaker} order by c.regTime asc limit 20";

    $this->dbConnection();
    $res = $this->dbConnection->query($sql);

    $content = array();

    //하나씩 불러온 데이터를 array_push를 이용하여 배열 $content에 데이터를 하나씩 추가
    while($row = $res->fetch_array(MYSQLI_ASSOC)) {
      //나중에 이곳에 댓글 불러오기 기능 구현
      //댓글을 반환하는 메소드를 호출함, 아규먼트로 게시물 번호 전달
      $commentLoad = $this->commentLoad($row['contentsID']);

      //게시물의 댓글을 담는 배열을 생성, 댓글은 여러 개일 수 있으므로 배열로 생성
      $row['comment'] = array();

      //댓글을 $row['comment']에 저장
      while ($comments = $commentLoad->fetch_array(MYSQLI_ASSOC)) {
        array_push($row['comment'], $comments);
      }

      array_push($content, $row);
    }

    //게시물 데이터 반환
    return $content;

  }

  //게시물을 더 불러오는 메소드
  function contentsLoadMore($contentsLoadType, $page){
    //파라미터 유효성 확인
    $errorCheck = false;
    //contentsLoadType의 값이 me도 아니고 all도 아니면 잘못된 접근
    if($contentsLoadType != 'me' && $contentsLoadType != 'all'){
      //에러 표시
      $errorCheck = true;
    }

    //페이지 값이 유효한지 확인
    $page = (int) $page;
    if($page == 0){
      $errorCheck = true;
    }

    if($errorCheck == true){
      echo json_encode(array(
        'result' => false,
      ));
    }

    //불러오는 데이터 수
    $dataCount = 20;

    //페이지에 따른 LIMIT의 첫번째 값 계산
    $limitFirstValue = $page * $dataCount;

    //contentsType의 값에 따라 쿼리문이 달라지므로 달라지는 쿼리문의 일부를 sqlMaker 변수에 대입
    $sqlMaker = '';

    //현재 로그인 상태인 회원번호 대입
    $myMemberID = $_SESSION['myMemberSes']['myMemberID'];

    //$contentsLoadType의 값이 me이면 나의 페이지에 게시물을 노출하므로 나의 게시물만 가져오도록 조건문 설정
    if($contentsLoadType == 'me') {
      $sqlMaker = 'where c.myMemberID = '.$myMemberID;
    }

    //게시물을 가져오는 쿼리문
    //join문을 사용하는 이유는 사용자의 이름 정보와 프로필 사진 정보를 가져오기 위함
    //$sqlMaker에는 나의 페이지의 경우 where문이 추가됨

    //limit이 있는 이유는 최초 등록된 20개의 게시물만 출력하기 위함
    //첫번째 게시물이 먼저 나오게하려면 책과 다르게 asc(오름차순)으로 써야됨. 책에서는 내림차순=desc 로 적어놨음. 근데 desc로 하면 25번째 게시물이 먼저 나옴.
    $sql = "SELECT c.contentsID, c.myMemberID, c.content, c.regTime, m.userName, m.profilePhoto,
            (select count(*) from likes l where l.contentsID = c.contentsID) as likesCount,
            (select count(*) from likes l where l.contentsID = c.contentsID and l.myMemberID = {$myMemberID}) as myLike
            FROM contents c JOIN mymember m ON (c.myMemberID = m.myMemberID) {$sqlMaker} ORDER BY c.regTime ASC LIMIT {$limitFirstValue}, {$dataCount}";
    $this->dbConnection();
    $res = $this->dbConnection->query($sql);

    //하나의 배열에 담기 위해 변수 $content를 선언 후 배열 타입으로 변경
    $content = array();

    //하나씩 불러온 데이터를 array_push를 이용하여 $content에 데이터를 하나씩 추가
    while($row = $res->fetch_array(MYSQLI_ASSOC)) {
      //나중에 이곳에 댓글 불러오기 기능 구현
      //댓글을 반환하는 메소드 호출 아규먼트로 게시물 번호 전달
      $commentLoad = $this->commentLoad($row['contentsID']);

      //게시물의 댓글을 담는 배열 생성, 댓글은 여러 개일 수 있으므로 배열로 생성
      $row['comment'] = array();

      //댓글을 $row['comment']에 저장
      while ($comments = $commentLoad->fetch_array(MYSQLI_ASSOC)){
        array_push($row['comment'], $comments);
      }



      array_push($content, $row);
    }

    //호출한 곳으로 가공한 정보를 전달.
    echo json_encode(array(
      'result' => true,
      'content' => $content
    ));
  }

  function commentLoad($contentsID){
    $sql = "select c.contentsID, c.commentsID, c.comment, c.regTime, m.userName, m.profilePhoto from comments c ";
    $sql .= "inner join mymember m on (c.myMemberID = m.myMemberID) where contentsID = {$contentsID}";
    $this->dbConnection();
    $res = $this->dbConnection->query($sql);
    return $res;
  }


}
$contents = new contents;

?>
