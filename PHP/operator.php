<?php
  $num = 20;
  $num2 = 3;

  echo "변수 \$num의 값은 {$num} 이며 변수 \$num2의 값은 {$num2}입니다. <br/>";

  $plus = $num+$num2;
  $minus = $num - $num2;
  $mul = $num * $num2;
  $division = $num / $num2;
  $rest = $num % $num2;

  echo "{$num} 더하기 {$num2}는 ". $plus ."입니다. <br/>";
  echo "{$num} 빼기 {$num2}는 ".$minus."입니다. <br/>";
  echo "{$num} 곱하기 {$num2}는 ".$mul."입니다. <br/>";
  echo "{$num} 나누기 {$num2}는 ".$division."입니다. <br/>";
  echo "{$num} 나누기 {$num2}의 나머지 값은 ".$rest."입니다. <br/><br/>";

  // += 활용
  $num = 10;
  $num += 2;
  echo "[+=사용] 변수 num의 값은 ".$num."<br/>";

  // -= 활용
  $num = 10;
  $num -= 2;
  echo "[-=사용] 변수 num의 값은 ".$num."<br/>";

  // *=활용
  $num = 10;
  $num *= 2;
  echo "[*=사용] 변수 num의 값은 ".$num."<br/>";

  // /=활용
  $num = 10;
  $num /= 2;
  echo "[/=사용] 변수 num의 값은 ".$num."<br/>";

  // %= 활용
  $num = 10;
  $num %= 3;
  echo "[%=사용] 변수 num의 값은 ".$num."<br/>";

  // .=활용
  $city = "서울";
  $city .= "특별시";
  echo "[.=사용] 변수 city의 값은 ".$city."<br/><br/>";


  //증감 연산자
  $num = 10;
  //++가 변수 뒤에 위치하므로 10을 반환(출력) 후 ++가 작동하여 변수 num의 값은 11이 됨
  echo "++가 변수 뒤에 붙어 10을 반환 후 증가하므로 num의 값은 ".$num++;
  //줄 바꿈
  echo "<br/>";
  //값이 11이 되었는지 확인
   echo "앞에서 num의 값이 출력되고 ++가 작동했으므로 num의 값은 ".$num."<br/><br/>";

   $num = 10;
   //++가 변수 앞에 위치하므로 1 증가하여 11을 반환(출력)
   echo "++가 변수 앞에 붙어 1증가한 값을 반환 num의 값은 ".++$num;


?>
