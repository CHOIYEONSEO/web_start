<?php
  include_once "./connectDB.php";

  $sql = "delete from mymember where myMemberID = 21";
  $res = $dbConnect->query($sql);

  if($res) {
    echo "21번 회원의 정보가 삭제되었습니다. "; //이미 삭제해서 데이터가 남아있지 않아도 다시 코드 돌려보면 '21번 회원의 정보가 삭제되었습니다.' 뜸.
  } else {
    echo "삭제 실패";
  }
?>
