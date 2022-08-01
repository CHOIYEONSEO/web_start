<?PHP

/*
  //변수 $_FILES가 갖고 있는 정보를 보기위한 코드.
  echo '<pre>';
  var_dump($_FILES);

  //$_FILES에는 myImage가 인덱스로 존재하고 있는데, 이것은 파일업로드 페이지의 file 타입의 input 태그('파일선택' 버튼을 만듦)의 name 속성에 넣은 값임.
  //따라서 $_FILES가 갖고 있는 여러 정보를 myImage를 인덱스로 적용하여 접근할 수 있는데,
  //$_FILES['myImage']['name'] : 업로드한 파일명. ie. happyCat.png
  //$_FILES['myImage']['type'] : 파일 속성 및 확장자. ie. image/png - 이미지 파일이고 확장자 png라는 의미.
  //$_FILES['myImage']['tmp_name'] : 업로드한 파일이 임시로 저장된 폴더와 파일명. ie. /Applications/MAMP/tmp/php/phpX31KNY
*/

  //임시 저장된 정보
  $myTempFile = $_FILES['myImage']['tmp_name'];

  //파일 타입 및 확장자 구하기
  //explode는 특정한 문자열(=첫번째 아규먼트)를 기준으로 배열(=두번째 아규먼트)을 나누는 함수임.
  $fileTypeExtension = explode('/', $_FILES['myImage']['type']); //'/'를 기준으로 앞에는 파일타입, 뒤에는 확장자.

  //파일 타입
  $fileType = $fileTypeExtension[0];
  //파일 확장자
  $extension = $fileTypeExtension[1];

  //이미지 파일이 맞는지 확인
  if($fileType == 'image') {
    //허용할 확장자를 jpeg, bmp, gif, png로 정함. 그 외는 업로드 불가
    if($extension == 'jpeg' || $extension == 'bmp' || $extension == 'gif' || $extension == 'png') {
      //임시 파일을 옮길 저장 위치와 파일명
      $myFile = "./images/happyCat.{$extension}";
      //임시 저장된 파일을 우리가 저장할 위치와 파일명으로 옮김
      //move_uploaded_file은 업로드한 파일을 원하는 폴더에 옮기는 함수임. 정상적으로 작동시 true를 반환한다.
      //첫번째 아규먼트는 업로드한 파일 = 옮기고 싶은 파일의 현재 임시 위치.
      //두번째 아규먼트는 옮길 위치 및 파일명. 그 위치에 이미 같은 파일명의 파일이 있다면 덮어 씌워진다.
      $imageUpload = move_uploaded_file($myTempFile, $myFile);

      //업로드 성공 여부 확인
      if($imageUpload == true) {
        echo '파일이 정상적으로 업로드되었습니다. ';
        echo "<img src = '{$myFile}' width = '100'/>"; //성공 시에 해당 파일을 보여주도록 이미지 태그 사용.
      } else{
        echo '파일 업로드에 실패했습니다.';
      }
    }
    //확장자가 jpeg, bmp, gif, png가 아닐 때
    else {
      echo '허용하는 확장자는 jpg, bmp, gif, png입니다.';
      exit;
    }
  }
  //type이 image가 아닐 때
  else{
    echo '이미지 파일이 아닙니다. ';
    exit;
  }

?>
