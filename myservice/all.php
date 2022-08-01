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
  <!-- 나중에 header 넣을 자리 -->
  <div id = "timeLine">
    <div id = "container">
      <div id = "writing">
        <div class = "me">
          <img src = "./images/me/cupCake.jpg" />
          <p>최연서</p>
        </div>

        <textarea maxlength = "500" id = "meContent"></textarea>
        <div id = "inputBox">
          <input type = "button" id = "mePostBtn" value = "게시" />
        </div>
      </div>
      <div class = "reading">
        <div class = "writerArea">
          <img src = "./images/me/cupCake.jpg" />
          <div class = "writingInfo">
            <p>최연서</p>
            <div class = "writingDate">2030년 12월 25일</div>
          </div>
        </div>

        <span class = "content">반갑습니다.</span>

        <div class = "likeArea">
          <!--#fff는 white-->
          <div class = "likeNum likes861225" style = "background: #fff">공감 수: 250</div>
          <div class = "likeBtn" id = "likes861225">공감하기</div>
          <div class = "contentsID">콘텐츠 번호: 861225</div>
        </div>

        <div class = "myCommentArea myCommentArea861225">
          <div class = "commentBox">
            <img src = "./images/me/cupCake.jpg" />
            <p class = "commentRegTime">2030년 12월 25일</p>
            <p class = "commentPoster">최연서</p>
            <p class = "writtenComment">반갑습니다.</p>
          </div>
        </div>

        <div class = "inputBox">
          <img src = "./images/me/cupCake.jpg" />
          <input type = "text" class = "inputComment comments861225" placeholder = "코멘트 입력" />
          <div class = "regCommentBox">
            <input type = "button" class = "regCommentBtn" id = "comments861225" value = "게시" />
          </div>
        </div>
      </div>
    </div>

    <div id = "noContents">
      더 이상 콘텐츠가 없습니다.
    </div>

    <input type = "hidden" name = "page" id = "page" value = "1" />
  </div>
  <aside id = "advertiseBox">
    Advertisement
  </aside>
  <!-- 나중에 footer 넣을 자리 -->
</body>
</html>
