<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8" />
<title>for문을 이용한 select 태그</title>
</head>
<body>
  <!--select 태그 사용 방법 (반복문 사용하지 않았을 때)
      ie. <select name = "birthMonth">
            <option value = "1">1</option>
            <option value = "2">2</option>
            <option value = "3">3</option>
            ...
          </select> -->
  <select id = "birthMonth" name = "birthMonth">
<?php
  for($i = 1; $i <= 12; $i++) { ?>
    <option value = "<?=$i?>"><?=$i?></option> <!--"<//?=$i?>"는 <//?php echo $i;?>와 같음.-->
<?php } ?>
  </select>
  <label for = "birthMonth">월</label>


  <select id = "birthMonth" name = "birthMonth">
<?php
  //4월에 기본 선택되도록 변수 선언
  $selectdMonth = 4;

  for($i = 1; $i <= 12; $i++) {
    //selected 입력할 값 선언
    $selected = "";

    if($i == $selectdMonth) {
      $selected = "selected";
    }
?>
  <option value = "<?=$i?>" <?=$selected?>><?=$i?></option>
<?php  }?>
  </select>
<label for = "birthMonth">월</label>
</body>
</html>
