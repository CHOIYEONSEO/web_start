<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/common/session.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/log/memberLog.php';

  class likes extends memberLog{
    //데이터베이스 접속 정보를 대입할 프라퍼티
    protected $dbConnection = null;
    //mode
    protected $mode;

    protected function dbConnection(){
      include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/connect/connect.php';
    }

    function __construct(){
      if(isset($_POST['mode'])) {
        //댓글 등록
        if($_POST['mode'] == 'save'){
          $this->likesSave($_POST['contentsID']);
        }
      }
    }

    //공감 저장 메소드
    protected function likesSave($contentsID) {
      //게시물 번호 추출
      $contentsID = (int) str_replace('likes','', $contentsID);

      //유효성 확인
      if($contentsID != 0) {
        //공감 정보 저장


        //회원번호
        $myMemberID = $_SESSION['myMemberSes']['myMemberID'];

        //회원번호와 게시물 번호가 일치하는 레코드를 찾음
        $sql = "select * from likes where contentsID = {$contentsID}";
        $sql .= " and myMemberID = {$myMemberID}";
        $this->dbConnection();
        $res = $this->dbConnection->query($sql);

        //myLike는 해당 게시물의 공감 여부 정보를 대입할 변수
        $myLike = '';
        //확인 후 레코드가 없다면 공감하기이므로 레코드 추가
        if($res->num_rows == 0){
          //공감한 시간
          $time = time();

          $sql = "insert into likes (contentsID, myMemberID, regTime)";
          $sql .= " values ({$contentsID}, {$myMemberID}, {$time})";
          $this->dbConnection->query($sql);
          //공감했다는 뜻으로 $myLike에 true 대입
          $myLike = true;

        }
        //확인 후 레코드가 있다면 공감 취소이므로 레코드 삭제
        else{
          $sql = "delete from likes where contentsID = {$contentsID}";
          $sql .= " and myMemberID = {$myMemberID}";//AND 앞 띄어쓰기 있습니다.
          $this->dbConnection->query($sql);

          //공감 취소했으므로 $myLike에 false 대입
          $myLike = false;
        }

        //나중에 공감 기능의 로그를 이곳에 만듦
        //memberLog에 전달할 로그 정보를 배열로 전달
        $myLog = array();
        //로그 번호
        $myLog['logNum'] = 5;
        //게시물 등록 시간
        $myLog['regTime'] = $time;
        //공감하기인지 공감취소인지 구분
        $myLog['myLike'] = $myLike;
        //대상 게시물 번호
        $myLog['contentsID'] = $contentsID;
        //로그 정보 전달
        $this->writeMemberLog($myLog);

        //해당 게시물의 최신 공감 수를 구해서 최신 값 갱신 위해 AJAX에 같이 보냄
        $sql = "select * from likes where contentsID = {$contentsID}";
        $res = $this->dbConnection->query($sql);
        $count = $res->num_rows;

        echo json_encode(array(
          'result' => true,
          'count' => $count,
          'myLike' => $myLike
        ));

      }else{
        echo json_encode(array(
          'result' => false
        ));
      }

    }

  }

  $likes = new likes;
?>
