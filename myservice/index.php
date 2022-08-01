<!DOCTYPE html>
<html>
<head>
 <!--viewport : 아이폰 액정 화면 해상도와 사파리 웹브라우저의 해상도가 다른것처럼
 모바일폰에서 사용하는 웹브라우저는 실제 모바일폰의 해상도값이 아닌 설정된 기본값을 갖고 있음.
따라서 웹브라우저에 실제 화면 해상도를 적용하려면 viewport를 적용해야 함.-->
<meta name = "viewport" content = "width = device-width" />
<meta charset = "utf-8" /> <!--언어 설정-->
<title>My First Web Service</title>
<link rel = "stylesheet" href = "./css/cssReset.css" />
<link rel = "stylesheet" href = "./css/header.css" />
<link rel = "stylesheet" href = "./css/index.css" />
<link rel = "stylesheet" href = "./css/footer.css" />
<script type = "text/javascript" src = "./js/jquery-3.1.0.min.js"></script>
<script type = "text/javascript" src = "./js/index.js"></script>
<script type = "text/javascript" src = "./js/valueCheck.js"></script>
</head>
<body>
  <!--삭제한부분에 header inlcude하기-->
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/include/header.php';
?>
  <!-- container -->
  <!--회원가입 폼이 들어가며 jQuery를 이용하여 [가입하기] 버튼을 누르면 회원가입 폼이 표시되도록 설계.-->
  <div id = "container">
    <!--section 태그는 서브 제목과 관련된 내용을 표시할 때 사용. 서브 제목과 내용을 하나의 섹션으로 묶는 것.-->
    <section id = "introSite">
      <div id = "siteComment">
        내가 만드는<br/>
        첫 웹서비스에<br/>
        어서오세요.
      </div>
      <div id = "signUpBtn">
        <p>가입하기</p>
      </div>
    </section>
    <section id = "signup">
      <div id = "signupCenter">
        <form id = "signUpForm" method = "post" action = "./database/myMember.php">

          <div class = "row">
            <div class = "inputBox">
              <input type = "text" name = "userName" id = "userName" placeholder = "이름" />
            </div>
          </div>

          <div class = "row">
            <div class = "inputBox">
              <input type = "email" name = "userEmail" id = "userEmail" placeholder = "이메일" />
            </div>
          </div>

          <div class = "row">
            <div class = "inputBox">
              <input type = "password" name = "userPw" id = "userPw" placeholder = "비밀번호" />
            </div>
          </div>

          <div class = "row">
            <label>생일</label>
            <div class = "selectBox">
              <select name = "birthYear" id = "birthYear">
                <option value = "">연도</option>
                <!--<option value = "2016">2016</option>
                <option value = "2015">2015</option>
                <option value = "2014">2014</option>
                <option value = "2013">2013</option>-->
                <?php
                  //현재 연도를 구함
                  $nowYear = date('Y', time());
                  //현재 연도부터 1900년도까지 내림차순으로 option태그 생성
                  for($i = $nowYear; $i >= 1900; $i--){?>
                    <option value = "<?=$i?>"><?=$i?></option>
                <?php
                  }
                ?>
              </select>
            </div>

            <div class = "selectBox selectBoxMargin">
              <select name = "birthMonth" id = "birthMonth">
                <!--<option value = "">월</option>
                <option value = "1">1</option>
                <option value = "2">2</option>
                <option value = "3">3</option>-->
                <option value = "">월</option>
                <?php
                  for($i = 1; $i <= 12; $i++) { ?>
                    <option value = "<?=$i?>"><?=$i?></option>
                <?php
                  }
                ?>
              </select>
            </div>

            <div class = "selectBox">
              <select name = "birthDay" id = "birthDay">
                <!--<option value = "">일</option>
                <option value = "1">1</option>
                <option value = "2">2</option>
                <option value = "3">3</option>-->
                <option value = "">일</option>
                <?php
                  for($i = 1; $i <= 31; $i++) {?>
                    <option value = "<?=$i?>"><?=$i?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          </div>

          <div class = "row genderRow">
            <div id = "genderLabel">
              <!--label 태그 for 속성값은 밑에 나올 input 태그 id 속성값과 일치시키고,
                  label 태그에도 속성으로 id 사용 가능.-->
              <label for = "gW" id = "gMW">여성</label>
              <label for = "gM" id = "gMM">남성</label>
            </div>
            <!--input 태그 type 속성값이 radio이면 라디오 버튼. 라디오 버튼은 나열된 보기 중 단 1개만 선택할 수 있음.
                따라서 다수의 선택지에서 1개만 선택할수 있도록 하려면 name 값을 일치시켜야함.-->
            <!--value 속성: 라디오 버튼일때 값을 입력하는 것이 아니라 단순히 체크박스를 체크하는거라서 그 체크박스가 어떠한 값을 갖는지 모름. 그래서 value 속성이 필요함. value 속성을 명시하지 않으면 빈 값 전송됨.-->
            <input type = "radio" name = "gender" class = "gender" id = "gW" value = "w" />
            <input type = "radio" name = "gender" class = "gender" id = "gM" value = "m" />
          </div>

          <div class = "row">
            <p id = "valueError"></p>
          </div>

          <div class = "row">
            <div class = "submitBox">
              <!--type이 submit면 value 값이 버튼 이름으로 들어감.-->
              <input type = "submit" id = "signUpSubmit" value = "가입하기" />
            </div>
          </div>

          <!--input type이 hidden. 사용자에게는 보이지 않는 숨겨진 입력 필드를 정의함. 숨겨진 입력 필드는 렌더링이 끝난 웹 페이지에서는 전혀 보이지 않으며, 페이지 콘텐츠 내에서 그것을 볼 수 있게 만드는 방법도 없음.
              따라서 숨겨진 입력 필드는 폼 제출 시 사용자가 변경해서는 안 되는 데이터를 함께 보낼 때 유용하게 사용됨. 보내려는 데이터가 value 값.-->
          <!--input 태그의 type 속성값이 hidden이면 화면에 표시하지 않으면서 값을 대입할 수 있음.-->
          <input type = "hidden" name = "mode" value = "save" />
        </form>
        <div id = "goToLoginBtn">
          <p>로그인하기</p>
        </div>
      </div>
    </section>
  </div>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/include/footer.php';
?>
  <!--body안에 header랑 footer도 위치함.-->
</body>
</html>
