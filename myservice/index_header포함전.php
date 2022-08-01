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
  <!--로그인 후-->
  <div id = "viewType">
    <!--a = anchor tag = 하이퍼링크 태그. / : 최상위 폴더로 이동. ./ : 같은 폴더-->
    <a href = "./me.html" id = "meLink">me</a> <!--me.html은 이후에 나올 나의 페이지임. 나의 페이지는 내가 작성한 글만 모아서 보는 페이지. 사진 업로드 기능 등을 갖고 있음.-->
    <a href = "./all.html" id = "allLink">all</a> <!--all.html은 이후에 나올 모두의 페이지임. 모두의 페이지는 현재 만들고 있는 프로젝트에 가입한 사람들이 작성한 글을 보는 페이지. 사진 업로드 기능 등이 제외됨.-->
  </div>

  <header>
    <div id = "myService">My First Web Service</div>

    <!--로그인 후-->
    <div id = "myName">
      <p>안녕하세요. 최연서 님</p>
      <div id = "logoutBox">
        <!--input 태그는 type의 값이 무엇이냐에 따라 많은 기능을 제공함. 여기서는 type이 button이므로 버튼박스의 기능을 함. 즉 웹페이지에 버튼을 만듦.-->
        <input type = "button" id = "logoutBtn" value = "로그아웃" / >
      </div>
    </div>

    <!--로그인 전-->
    <div id = "loginForm">
      <!--form 태그 안에 아이디, 비밀번호, 고객 문의 글 등의 정보가 서버 사이드 프로그램을 통해 DB에 저장됨.-->
      <!--name 속성은 "폼 태그 이름". 예를 들어 회원가입 폼이라면 signUp 또는 join. 설문조사 폼이라면 poll 이런식으로 그냥 짓는것.-->
      <!--method 속성은 "데이터 전송 방식". 작성한 정보들을 '어떠한' 방식으로 보낼 것인지 정함. GET 방식과 POST 방식이 있음.-->
      <!--action 속성은 "정보를 보낼 주소". 작성한 정보들을 '어디로' 보낼 것인지를 정함. 해당하는 정보들은 'php' 파일로 전송하며, 해당 php 파일에 작성한 프로그래밍 소스가 이 정보들을 처리함.-->
      <form name = "loginForm" method = "post" action = "./login.php">
        <div id = "loginEmailArea">
          <!--input 태그와 짝을 이루어 사용하는 label 태그. 예를 들어 어떤 라디오박스가 무엇을 의미하는지 사용자가 볼 수 있는 명칭을 부여할 때 label 태그를 사용함.
          label 태그에서 사용한 for 속성의 값과 input 태그의 id 속성의 값을 일치시켜서 사용함.-->
          <label for = "loginEmail">E-Mail</label> <!--짝을 이루는 input태그 밑에 나옴.-->
          <div class = "loginInputBox">
            <!--input 태그의 type 속성값이 email이면 email 입력에 사용.-->
            <!--input 태그의 id 값은 위의 label 태그의 for 값과 일치시켰음.-->
            <!--input 태그의 name 속성은 "입력 폼의 이름". 서버사이드 언어에서 name 값으로 전달된 정보들을 구분함.-->
            <!--input 태그의 placeholder 옵션은 입력 창에 어떠한 내용을 입력해야 하는지 알려주는 기능.-->
            <input type = "email" id = "loginEmail" name = "email" placeholder = "이메일" />
          </div>
        </div>
        <div id = "loginPwArea">
          <!--밑에 나올 input 태그와 짝을 이룸.-->
          <label for = "loginPw">Password</label>
          <div class = "loginInputBox">
            <input type = "password" name = "userPw" id = "loginPw" placeholder = "비밀번호 8자 이상 입력" />
          </div>
        </div>
        <div class = "loginSubmitBox">
          <!--input 태그의 type 속성값이 submit면 폼의 입력값 전송. 입력한 여러 값들을 action 속성(form 태그의 속성)에 입력된 페이지=php 파일로 전송함. -->
          <input type = "submit" id = "loginSubmit" value = "로그인" />
        </div>
      </form>
    </div>

    <!--로그인 전과 로그인 후는 다른 화면에 위치하는건데 이렇게 html만 적어놓은 상태(css도 안들어간 상태. 걍 버튼과 텍스트만 있는 상태.)로는 아직까지는 로그인 후와 로그인 전 화면이 같은 화면에 위 아래로 위치하고 있음.-->

  </header>

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

  <footer>
    <p>My First Web Service</p>
  </footer>
  <!--body안에 header랑 footer도 위치함.-->
</body>
</html>
