<?php
  include_once "./connectDB.php";

  //페이지값을 구함
  if(isset($_GET['page'])){
    $page = (int) $_GET['page'];
  } else{
    //페이지값이 없으면 1로 초기화
    $page = 1;
  }

  //페이지에 출력할 레코드 수
  $numView = 50;

  //변수 page값에 따른 LIMIT의 첫 번째 값 계산
  $firstLimitValue = ($numView * $page) - $numView;

  $sql = "select * from mymember limit {$firstLimitValue}, {$numView}";
  $result = $dbConnect->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8" />
  <title>고객 리스트</title>
  <style>
    table{font-size: 10px}
  </style>
</head>
<body>
  <h3>고객 리스트</h3>
  <table width = "100%" bgcolor = "skyblue" cellspacing = "1"> <!--cellspacing 속성은 셀과 셀의 간격 지정.-->
    <!--table 태그는 tr 태그, td 태그로 이루어져 있음. tr 태그는 새로운 줄 생성. -->
    <tr bgcolor = "white" align = "center"> <!--bgcolor 속성은 테이블의 배경색 지정.-->
      <td>번호</td> <!--td 태그는 새로운 칸 생성.-->
      <td>ID</td>
      <td>이름</td>
      <td>이메일</td>
      <td>성별</td>
      <td>가입</td>
    </tr>

<?php
  for($i = 0; $i < $result->num_rows; $i++) {
    //fetch_array는 가져온 결과를 array 형태로 보여줌.
    //MYSQLI_ASSOC은 필드명으로 값을 불러오고 MYSQLI_NUM은 인덱스로 값을 불러옴.
    $member = $result->fetch_array(MYSQLI_ASSOC);
?>
    <tr bgcolor = "white" align = "center">
      <td><?=$member['myMemberID']?></td>
      <td><?=$member['userId']?></td> <!--userId안됨. 대문자 소문자 구분해야됨.-->
      <td><?=$member['name']?></td>
      <td><?=$member['email']?></td>
      <!--삼항 연산자 형식 : (조건) ? 조건이 참이면 실행 : 조건이 거짓이면 실D-->
      <td><?=(($member['gender'] == 'w') ? '여성': '남성')?></td>
      <td><?=$member['regTime']?></td>
    </tr>
<?php  }?>
  </table>

</body>
</html>
