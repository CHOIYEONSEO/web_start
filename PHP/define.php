<?PHP
  echo "상수 MYSQLI_ASSOC의 값은 ".MYSQLI_ASSOC."<br/>";
  echo "상수 MYSQLI_NUM의 값은 ".MYSQLI_NUM."<br/>";
  echo "상수 MYSQLI_BOTH의 값은 ".MYSQLI_BOTH;

  echo "<br/><br/>";
  //상수 myRobot 선언
  define("myRobot", "AIBO");
  echo "상수 myRobot의 값은 ".myRobot."<br/>";

  //상수 myRobot의 값을 변경
  define("myRobot", "ASIMO");
  echo "값 변경 시도 후 상수 myRobot의 값은 ".myRobot."<br/>";
?>
