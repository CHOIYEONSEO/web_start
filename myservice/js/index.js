$(document).ready(function() { //이건 페이지의 로드가 완료되었을 때 jQuery가 작동하도록 하는 소스. 이거 없으면 작동하지 않는 경우가 있기 때문에 이 소스 안에 jQuery를 만든다
  //모바일에서 [가입하기] 버튼 누르면 로그인 폼이랑 웰컴문구는 사라지고 회원가입 폼이 나타나도록.
  //[가입하기] 버튼
  //함수내에서 var 붙이지 않으면 글로벌변수, var 붙이면 로컬변수.
  var signUpBtn = $("#signUpBtn");
  //회원가입 폼
  signup = $("#signup");
  //로그인 폼
  loginForm = $("#loginForm");
  //내가 만드는 첫 웹서비스에 어서오세요.
  introSite = $("#introSite");

  //[가입하기] 버튼 클릭 이벤트
  signUpBtn.click(function() {
    //로그인 폼 숨기기
    loginForm.slideUp();
    //회원가입 폼 보이기
    signup.slideDown();
    //내가 만드는 첫 웹서비스에 어서오세요. - 문구 숨기기
    introSite.slideUp();
  });


  //[로그인하기] 버튼
  var goToLoginBtn = $("#goToLoginBtn");

  //[로그인하기] 버튼 클릭 이벤트
  goToLoginBtn.click(function() {
    //첫 화면으로 돌아가게 됨.
    //로그인 폼 보이기
    loginForm.slideDown();
    //회원가입 폼 숨기기
    signup.slideUp();
    //내가 만드는 첫 웹서비스에 어서오세요. - 문구 보이기
    introSite.slideDown();
  });


  //성별 컨트롤
  //[여성] 버튼
  var genderWoman = $("#gMW");
  //[남성] 버튼
  var genderMan = $("#gMM");

  //[여성] 버튼 클릭 이벤트
  genderWoman.click(function() {
    //배경색과 텍스트의 색 초기화 함수 호출
    genderBgInit();
    $(this).css("background", "#B69F7D"); //배경색은 background, #64cbf9는 skyblue, #B69F7D는 탁한 베이지.
    $(this).css("color", "#fff"); //텍스트색은 color, #fff는 white
  });

  //[남성] 버튼 클릭 이벤트
  genderMan.click(function() {
    //배경색과 텍스트의 색 초기화 함수 호출
    genderBgInit();
    $(this).css("background", "#B69F7D");
    $(this).css("color", "#fff");
  })

  //배경색과 텍스트의 색 초기화 함수
  function genderBgInit() {
    genderMan.css("background", "#fff"); //배경색은 background, #fff는 white
    genderWoman.css("background", "#fff");
    genderMan.css("color", "#000"); //텍스트색은 color, #000은 black
    genderWoman.css("color", "#000");
  }
});

toGoToShort = false;
$(window).resize(function() {
  if(window.innerWidth >= 1200) {
    //로그인 폼 보이기
    loginForm.slideDown();
    //회원가입 폼 보이기
    signup.slideDown();
    //내가 만드는 첫 웹서비스에 어서오세요. - 문구 보이기
    introSite.slideDown();
    toGoToShort = true;
  } else {
    if(toGoToShort == true) {
      //모바일 버전이면 첫 화면에 회원가입 폼은 숨겨라
      signup.slideUp();
    }
  }
})
