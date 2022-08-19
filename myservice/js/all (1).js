$(document).ready(function() {

  //게시물 입력 공간의 게시글 입력 폼
  var meContent = $("#meContent");

  //게시물 입력 공간의 게시 버튼
  var mePostBtn = $("#mePostBtn");

  //[게시] 버튼 클릭 이벤트
  mePostBtn.click(function() {
    if(meContent.val() == "") {
      alert("내용을 입력하세요.");
      //'내용을 입력하세요' 창이 뜨고 확인 버튼 누르고나면 바로 커서가 textarea=meContent칸에 깜빡이도록하기 위해 meContent에 focus 주기.
      meContent.focus();
      return false;
    }
    //백엔드 프로젝트에서 게시물 등록 기능 구현
  })
})
