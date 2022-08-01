<?php
  class operation{
    function plus($num1, $num2){
      $result = $num1 + $num2;
      return "{$num1} + {$num2} = ".$result;
    }
  }

/*
//1.
  class load extends operation{}

  //load 클래스의 인스턴스 생성
  $load = new load;

  //load 클래스의 plus 메소드
  echo $load->plus(1,2);
*/


//2. 클래스 operation을 상속 받은 2개의 클래스 생성
  class load extends operation{}
  class load2 extends operation{}

  //load 클래스의 인스턴스 생성
  $load2 = new load2;
  //load 클래스의 plus 메소드
  echo $load2->plus(12,2);

?>
