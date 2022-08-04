<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/common/session.php';
  //로그인하지 않은 상태에서 url로 접근하려할시 차단하도록 하는 코드.
  if(!isset($_SESSION['myMemberSes'])){
    header("Location:./index.php");
    exit;
  }

  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/database/contents.php';
  $ourContents = $contents->contentsLoad('all');
?>

<!DOCTYPE html>
<html>
<head>
  <!--viewport 메타태그를 설정하면 뷰포트의 너비와 크기를 제어해서 모든 기기에서 올바른 크기로 조정할수 있음.
      뷰포트 메타태그에는 content 속성이 포함되어 있고, content 속성 값에는 width= 텍스트가 포함됨.-->
  <!--content = "width=device-width"는 뷰포트의 너비를 장치의 너비로 설정하는거.-->
  <meta name = "viewport" content = "width=device-width" />
  <meta charset = "utf-8" />
  <title>My First Web Service</title>
  <link rel = "stylesheet" href = "./css/cssReset.css" />
  <link rel = "stylesheet" href = "./css/header.css" />
  <link rel = "stylesheet" href = "./css/all.css" />
  <link rel = "stylesheet" href = "./css/footer.css" />
  <script type = "text/javascript" src = "./js/jquery-3.1.0.min.js"></script>
  <script type = "text/javascript" src = "./js/all.js"></script>
</head>
<body>
  <!-- header 자리 -->
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/include/header.php';
  ?>
  <div id = "timeLine">
    <div id = "container">
      <div id = "writing">
        <div class = "me">
          <img src = "<?=$_SESSION['myMemberSes']['profilePhoto']?>" />
          <p><?=$_SESSION['myMemberSes']['userName']?></p>
        </div>

        <textarea maxlength = "500" id = "meContent"></textarea>
        <div id = "inputBox">
          <input type = "button" id = "mePostBtn" value = "게시" />
        </div>
      </div>
<?php
  foreach($ourContents as $oc) {
?>
      <div class = "reading">
        <div class = "writerArea">
          <img src = "<?=$oc['profilePhoto']?>" />
          <div class = "writingInfo">
            <p><?=$oc['userName']?></p>
            <div class = "writingDate"><?=date('Y년 m월 d일 H시 i분', $oc['regTime'])?></div>
          </div>
        </div>

        <span class = "content"><?=htmlspecialchars($oc['content'])?></span>

        <div class = "likeArea">
          <!--#fff는 white, #E9C083는 밝은 베이지.-->
          <div class = "likeNum likes<?=$oc['contentsID']?>" style = "background: <?=(($oc['myLike'] == 1) ? '#E9C083' : '#fff')?>">공감 수: <?=$oc['likesCount']?></div>
          <div class = "likeBtn" id = "likes<?=$oc['contentsID']?>">공감<?=(($oc['myLike'] == 1) ? '취소' : '하기')?></div>
          <div class = "contentsID">콘텐츠 번호: <?=$oc['contentsID']?></div>
        </div>

        <div class = "myCommentArea myCommentArea<?=$oc['contentsID']?>">
<?php
  foreach($oc['comment'] as $comment) {
?>
          <div class = "commentBox">
            <img src = "<?=$comment['profilePhoto']?>" />
            <p class = "commentRegTime"><?=date('Y년 m월 d일 H시 i분', $comment['regTime'])?></p>
            <p class = "commentPoster"><?=$comment['userName']?></p>
            <p class = "writtenComment"><?=htmlspecialchars($comment['comment'])?></p>
          </div>
<?php
  }
?>
        </div>
        <div class = "inputBox">
          <img src = "<?=$_SESSION['myMemberSes']['profilePhoto']?>" />
          <input type = "text" class = "inputComment comments<?=$oc['contentsID']?>" placeholder = "코멘트 입력" />
          <div class = "regCommentBox">
            <input type = "button" class = "regCommentBtn" id = "comments<?=$oc['contentsID']?>" value = "게시" />
          </div>
        </div>
      </div>
<?php
  }
?>
    </div>

    <div id = "noContents">
      더 이상 콘텐츠가 없습니다.
    </div>

    <input type = "hidden" name = "page" id = "page" value = "1" />
  </div>
  <aside id = "advertiseBox">
    Advertisement
  </aside>
  <!-- footer 자리 -->
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/include/footer.php';
  ?>
</body>
</html>
