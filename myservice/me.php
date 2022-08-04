<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/common/session.php';
  //로그인하지 않은 상태에서 url로 접근하려할시 차단하도록 하는 코드.
  if(!isset($_SESSION['myMemberSes'])){
    header("Location:./index.php");
    exit;
  }
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/database/contents.php';

  $myContents = $contents->contentsLoad('me');
  //echo "<pre>";
  //var_dump($myContents); //입력순서 반대로 출력됨. ie. 미우야 안녕, 유나야 안녕 순으로 게시했었으면 여기서 배열로 출력해보면 유나야 안녕, 미우야 안녕 순으로 출력됨.
  //echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
<meta name = "viewport" content = "width=device-width" />
<meta charset = "utf-8" />
<title>My First Web Service</title>
<link rel = "stylesheet" href = "./css/cssReset.css" />
<link rel = "stylesheet" href = "./css/header.css" />
<link rel = "stylesheet" href = "./css/footer.css" />
<link rel = "stylesheet" href = "./css/me.css" />
<style>
/* ./images/me/happyCat.png는 백엔드 프로젝트에서 프로그래밍으로 처리할 예정 */
#myWallPhoto{background: url("<?=$_SESSION['myMemberSes']['coverPhoto']?>"); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%; border-bottom: 1px solid #ccc}
</style>
<script type = "text/javascript" src = "./js/jquery-3.1.0.min.js"></script>
<script type = "text/javascript" src = "./js/me.js"></script>
</head>
<body>
  <!--header-->
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/include/header.php';
?>
  <!--me.html은 나의 페이지로 내가 작성한 글만 모아서 보는 페이지. 사진 업로드 기능 등이 있음.-->
  <div id = "container">
    <div id = "center">
      <div id = "myWallPhoto"></div>
      <div id = "myProfilePhoto">
        <img src = "<?=$_SESSION['myMemberSes']['profilePhoto']?>" />
      </div>
      <p id = "name"><?=$_SESSION['myMemberSes']['userName']?></p>
      <div class = "myButtonBox">
        <!--a 태그의 download 속성: href에 지정된 파일을 다운로드해주는 기능.-->
        <a href = "./log/memberLogs/myLog_<?=$_SESSION['myMemberSes']['myMemberID']?>.txt" download>나의 로그 다운로드</a>
      </div>
      <div class = "myButtonBox">
        <!--form 태그의 enctype 속성: form 데이터가 서버로 제출될 때 해당 데이터가 인코딩되는 방법.
        method가 post일때만 enctype 속성 사용가능함.-->
        <!--enctype = "multipart/form-data"은 모든 문자를 인코딩하지 않음을 의미함.
        이 방식은 form 요소가 파일이나 이미지를 서버로 전송할 때 주로 사용함. 아마 여기서도 사진 업로드 기능이라.-->
        <form name = "photo" method = "post" action = "./database/myMember.php" enctype = "multipart/form-data">
          <div class = "photoBox">
            <!--input태그의 type이 file이면 파일을 업로드 할 수 있음. 파일 선택버튼이 만들어져서 파일 업로드하는거.-->
            <input type = "file" name = "myProfilePhoto" class = "photoSelectorBtn" />
          </div>

          <!--input type이 hidden. 사용자에게는 보이지 않는 숨겨진 입력 필드를 정의함. 숨겨진 입력 필드는 렌더링이 끝난 웹 페이지에서는 전혀 보이지 않으며, 페이지 콘텐츠 내에서 그것을 볼 수 있게 만드는 방법도 없음.
              따라서 숨겨진 입력 필드는 폼 제출 시 사용자가 변경해서는 안 되는 데이터를 함께 보낼 때 유용하게 사용됨. 보내려는 데이터가 value 값.-->
          <!--input 태그의 type 속성값이 hidden이면 화면에 표시하지 않으면서 값을 대입할 수 있음.-->
          <input type = "hidden" name = "mode" value = "photo" />

          <div class = "photoBox">
            <input type = "submit" id = "myProfilePhotoUploadBtn" value = "프로필 사진 변경" />
          </div>
        </form>
      </div>

      <div class = "myButtonBox">
        <form name = "photo" method = "post" action = "./database/myMember.php" enctype = "multipart/form-data">
          <div class = "photoBox">
            <input type = "file" name = "myCoverPhoto" class = "photoSelectorBtn" />
          </div>

          <input type = "hidden" name = "mode" value = "photo" />

          <div class= "photoBox">
            <!--type이 submit면 value 값이 버튼 이름으로 들어감.-->
            <input type = "submit" id = "myCoverPhotoUploadBtn" value = "커버 사진 변경" />
          </div>
        </form>
      </div>

      <div id = "myContent">
        <!-- timeline -->
        <div id = "writing">
          <div class = "me">
            <img src = "<?=$_SESSION['myMemberSes']['profilePhoto']?>" />
            <p><?=$_SESSION['myMemberSes']['userName']?></p>
          </div>
          <!--textarea는 여러 줄의 문자를 입력할 수 있는 양식.-->
          <!--textarea 태그의 maxlength 속성: textarea 요소 영역에 입력할 수 있는 최대 문자수.-->
          <textarea maxlength = "500" id = "meContent"></textarea>

          <div id = "inputBox">
            <!--input type이 button이면 value값이 버튼 이름으로 들어감.-->
            <input type = "button" id = "mePostBtn" value = "게시" />
          </div>
        </div>

<?php
  foreach($myContents as $mc) {
?>
        <div class = "reading">
          <div class = "writerArea">
            <img src = "<?=$mc['profilePhoto']?>" />
            <div class = "writingInfo">
              <p><?=$mc['userName']?></p>
              <div class = "writingDate">
                <?=date('Y년 m월 d일 H시 i분', $mc['regTime'])?>
              </div>
            </div>
          </div>

          <span class = "content"><?=nl2br(htmlspecialchars($mc['content']))?></span>

          <div class = "likeArea">
            <!--이렇게 html 코드에 style 속성 넣어주면 inline 방식으로 태그에 직접 CSS 적용한거.-->
            <div class = "likeNum likes<?=$mc['contentsID']?>" style = "background: <?=(($mc['myLike'] == 1)? '#f9d1e4' : '#fff')?>">공감 수 : <?=$mc['likesCount']?></div>
            <div class = "likeBtn" id = "likes<?=$mc['contentsID']?>">공감하기</div>
            <div class = "contentsID">콘텐츠 번호: <?=$mc['contentsID']?></div>
          </div>

          <div class = "myCommentArea myCommentArea<?=$mc['contentsID']?>">
          <?php
            foreach($mc['comment'] as $comment) { ?>
              <div class = "commentBox">
                <img src = "<?=$comment['profilePhoto']?>" />
                <p class = "commentRegTime"><?=date('Y년 m월 d일 H시 i분', $comment['regTime'])?></p>
                <p class = "commentPoster"><?=$comment['userName']?></p>
                <p class = "writtenComment"><?=nl2br(htmlspecialchars($comment['comment']))?></p>
              </div>
          <?php
            }
          ?>
          </div>

          <div class = "inputBox">
            <img src = "<?=$_SESSION['myMemberSes']['profilePhoto']?>" />
            <input type = "text" class = "inputComment comments<?=$mc['contentsID']?>" placeholder = "코멘트 입력" />
            <div class = "regCommentBox">
              <input type = "button" class = "regCommentBtn" id = "comments<?=$mc['contentsID']?>" value = "게시" />
            </div>
          </div>
        </div>
<?php
  }
?>

        <!-- end of timeline -->
      </div>
      <input type = "hidden" name = "page" id = "page" value = "<?=((count($myContents) >= 20) ? 1: 0)?>" />
    </div>
    <div id = "noContents">
      더 이상 콘텐츠가 없습니다.
    </div>
  </div>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/include/footer.php';
?>
</body>
</html>
