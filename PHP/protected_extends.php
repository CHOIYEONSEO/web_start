<?php
  class hello{
    protected function say($word) {
      echo $word;
    }
  }

  //클래스 hello를 상속받음
  class hello2 extends hello{
    public function say2($word) {
      //클래스 hello를 상속받았으므로 say 메소드에 접근 가능
      $this->say($word); //$this는 클래스 입장에서 자기 자신을 의미함. 여기서는 상속을 받았기 때문에 $this를 사용하여 상위 클래스의 메소드를 사용할 수 있음.
    }
  }

  $hello2 = new hello2;
  $hello2->say2('Hello World');
?>
