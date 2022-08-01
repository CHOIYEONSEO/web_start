<?php
  class hello{
    protected function say($word) {
      echo $word;
    }

    //2. protected로 생성된 메소드를 public이 선언된 메소드로 호출하여 사용할 수 있음
    public function say2($word) {
      //같은 클래스의 say 메소드 선언
      //say 메소드는 protected로 선언되어 같은 클래스 안에서 접근 가능
      $this->say($word); //$this는 클래스 입장에서 자기 자신을 의미함. 즉, $this->say($word)는 자기 자신=클래스 안에 있는 메소드 say를 사용한다는 의미.
    }
  }

/*
//1. 에러 발생하는 클래스 외부에서 protected로 생성된 메소드 호출하기
  $hello = new hello;
  $hello->say('Hello World');
*/

  $hello = new hello;
  //public으로 선언된 say2 메소드 호출
  $hello->say2('Hello World');


?>
