<!DOCTYPE html>
<html>
<head>
<meta charset = 'utf-8'/>
<title>화면 전환 없이 아이디 중복 체크</title>
<script type = 'text/javascript' src = ../jQuery/js/jquery-3.1.0.min.js></script>
<script>
//페이지를 모두 불러오면 작동
$(document).ready(function() {
  //[중복 확인] 버튼 클릭 이벤트
  $('#idCheckBtn').click(function(){
    //AJAX 통신 시작
    $.ajax({
      type: 'post', //post 전송 방식으로 전달 - get 방식인지 post 방식인지 입력.
      dataType: 'json', //json 언어로 전달 - json 언어를 사용할 것인지, xml 언어를 사용할 것인지르 기입함.
      url: './idCheck.php', //- 데이터를 전달할 페이지의 경로 기입.
      data: {userId: $('#userId').val()}, //전달할 데이터 - url로 데이터를 기입함. 두번 json이 중첩되어 있음. 'data 변수'의 값은 'userId 변수'의 값 '$('#userId').val()'임.
      //$('#userId').val()는 아이디 입력 칸에 적한 값을 가져옴.
      async: false, //값을 전달 받은 후 실행 - 비동기 방식이냐 동기 방식이냐를 기입. 디폴트가 비동기처리 방식이라서 async 기본값이 true로 되어 있음.
      //비동기화(true)는 데이터를 전달하고 그에 대한 결과가 나타날 때까지 기다리지 않는 방식. ie. ping속성처럼 클릭 정보를 기입하고 그에 따른 결과가 어떻든 필요가 없을 때.
      //동기화(false)는 결과가 나타날때까지 기다린후 그 결과에 따라 무언가를 처리해야 할 때 사용하는 방식. ie. 아이디의 중복 여부에 따라 사용자에게 어떤한 상황을 알려줘야 할 때.

      //AJAX 통신이 성공할 경우의 코드.
      success: function(data) { //data에는 아이디의 중복 여부에 대한 리턴 값이 대입됨.
        //변수 word의 값 초기화
        var word = '이미 존재하는 아이디입니다.';
        //해당 아이디가 없으면
        if(data.result == 'good') { //json의 값에 접근할 때는 .을 이용해서 값에 접근함. ie. 변수 data가 갖는 json데이터가 {result:'good'}이라면 good이란 값에 data.result로 접근.
          word = '입력하신 아이디를 사용해도 좋습니다.';
        }
        $('#idCheckComment').text(word); //아이디값이 idCheckComment인 태그에 변수 word의 값을 출력함.
      },
      //AJAX 통신 중 에러 발생 시 에러 문구를 확인하는 용도. 
      error: function (request, status, error) {
        console.log('request'+request);
        console.log('status'+status);
        console.log('error'+error);
      }
    });
  });
});
</script>
</head>
<body>
  <input type = 'text' name = 'userId' id = 'userId' placeholder = '아이디 입력'/>
  <input type = "button" id = "idCheckBtn" value = '중복 확인'/>
  <div id = "idCheckComment"></div>
</body>
</html>
