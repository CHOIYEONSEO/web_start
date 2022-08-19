<!DOCTYPE html>
<html>
<head>
  <!--viewport : 아이폰 액정 화면 해상도와 사파리 웹브라우저의 해상도가 다른것처럼
  모바일폰에서 사용하는 웹브라우저는 실제 모바일폰의 해상도값이 아닌 설정된 기본값을 갖고 있음.
  따라서 웹브라우저에 실제 화면 해상도를 적용하려면 viewport를 적용해야 함.-->
<meta name = "viewport" content = "width = device-width" />
<meta charset = "utf-8" />
<title>여행은 살아보는 거야 - 에어비앤비 - 에어비앤비</title>
<link rel = "stylesheet" href = "./css/cssReset.css?cssVer=1.0" />
<link rel = "stylesheet" href = "./css/header.css?cssVer=0.5" />
<!--<link rel = "stylesheet" href = "./css/homepage.css?cssVer=1.0" />
<link rel>-->
</head>
<body>
  <!--우선 여기에 header만들고 나중에 include하겠음-->
  <header>
    <div class = logoAirbnb>
      <!--target은 이동방식. _self는 현재 창에서 바로 이동, _blank는 새 창 열어서 해당 페이지로 이동-->
      <a href = "/airbnb/homepage.php" target = "_self">
        <!--원래는 로고로 이미지 삽입한게 아니고 svg태그로 로고를 직접 선을 그려서 만든거임.-->
        <!--alt 속성 사용시 웹페이지의 글을 읽어주는 기계가 alt속성에 적힌 글을 읽어줘 어떤 이미지인지 알려주고, 구글 검색 엔진 최적화에 더 높은 점수를 받게되어 검색 결과 노출 확률이 높아짐.-->
        <!--width = "가로 길이 숫자", 단위는 px로 적용되므로 단위 없이 숫자만 입력, width와 height가 있는데 둘 중 하나만 적용하면 나머지는 비율에 맞춰 자동으로 조정됨.-->
        <img src = "/airbnb/images/airbnb_logo.png" width = "40" alt = "airbnb" />
        <!--원래는 airbnb도 svg태그로 만든거.-->
        <p id = "textLogo">airbnb</p>
      </a>
    </div>

    <div class = search>
      <!--원래는 다 button태그 사용함.-->
      <!--input태그에 type=button을 사용했었는데, 이후에 나온 button태그를 사용하는것이 더 선호된다고 함. <button>의 레이블 텍스트는 여는 태그와 닫는 태그 사이에 넣기 때문에, 심지어 이미지까지도 포함할 수 있다함.-->
      <!--button태그의 type 속성 : submit = 폼 제출, submit = 폼 제출, button: 버튼 형태만을 만듦.-->
      <button type = "button">어디든지</button>
      <button type = "button">언제든 일주일</button>
      <button type = "button">게스트 추가</button>
      <!--돋보기 아이콘도 원래는 svg태그임-->
      <button type = "button">
        <img src = "/airbnb/images/search.png" width = "25" alt = "search" />
      </button>
    </div>

    <div>
      <a target = "_blank">
        호스트되기
      </a>

      <button type = "button">
        <!--지구본 아이콘도 원래는 svg태그.-->
        <img src = "/airbnb/images/globe.png" width = "20" alt = "language change" />
      </button>

      <div>
        <!--원래는 button 태그 사용함.-->
        <button type = "button">
          <div>
            <img src = "/airbnb/images/menu.png" width = "20" alt = "account menu" />
          </div>
          <div>
            <img src = "/airbnb/images/account.png" width = "20" alt = "account" />
          </div>
        </button>
      </div>
    </div>
  </header>

  <!--container-->
  <div>
    <!--filter-->
    <section>
      <div>
        <button type = "button">
          <!--원래는 svg태그-->
          <img src = "/airbnb/images/left.png" width = "20" alt = "filter icon left" />
        </button>
        <button type = "button">
          <img src = "https://a0.muscache.com/pictures/c5a4f6fc-c92c-4ae8-87dd-57f1ff1b89a6.jpg" width = "30" alt>
          <p>기상천외한 숙소</p>
        </button>
        <button type = "button">
          <img src = "https://a0.muscache.com/pictures/c0a24c04-ce1f-490c-833f-987613930eca.jpg" width = "30" alt>
          <p>국립공원</p>
        </button>
        <button type = "button">
          <img src = "https://a0.muscache.com/pictures/732edad8-3ae0-49a8-a451-29a8010dcc0c.jpg" width = "30" alt>
          <p>통나무집</p>
        </button>
        <button type = "button">
          <img src = "https://a0.muscache.com/pictures/8e507f16-4943-4be9-b707-59bd38d56309.jpg" width = "30" alt>
          <p>섬</p>
        </button>
        <button type = "button">
          <img src = "https://a0.muscache.com/pictures/10ce1091-c854-40f3-a2fb-defc2995bcaf.jpg" width = "30" alt>
          <p>해변 근처</p>
        </button>



        <button type = "button">
          <!--원래는 svg태그-->
          <img src = "/airbnb/images/right.png" width = "20" alt = "filter icon right" />
        </button>

      </div>

      <div>
        <button type = "button">
          <!--원래는 svg태그-->
          <img src = "/airbnb/images/option.png" width = "20" alt = "filter option" />
          <p>필터</p>
        </button>
      </div>
    </section>

    <div>
      숙소사진<br/>
      나라, 별점<br/>
      거리<br/>
      체크인~체크아웃<br/>
      1박당 가격<br/>
    </div>


  </div><!--container div 끝-->

  <button type = "button">
    <p>지도 표시하기</p>
    <!--원래는 svg태그-->
    <img src = "/airbnb/images/map.png" width = "20" alt = "map" />
  </button>


  <footer>
    <div>
      ⓒ2022 Airbnb, Inc.
      <!--div태그 vs span태그 : span태그는 내용만큼(inline형식)만 자신의 영역을 지정함. div태그는 자신의 영역을 가로로 길게(block형식) 지정함.-->
      <span>·</span>
      <a href target = "_self">개인정보 처리방침</a>
      <span>·</span>
      <a href target = "_self">이용약관</a>
      <span>·</span>
      <a href target = "_self">사이트맵</a>
      <span>·</span>
      <a href target = "_self">한국의 변경된 환불 정책</a>
      <span>·</span>
      <a href target = "_self">회사 세부정보</a>
    </div>

    <button type = "button">
      <!--원래는 svg태그.-->
      <img src = "/airbnb/images/globe.png" width = "20" alt = "language change" />
      <span>한국어 (KR)</span>
    </button>

    <button type = "button">
      <span>₩</span>
      <span>KRW</span>
    </button>

    <button type = "button">
      <span>지원 및 참고 자료</span>
      <!--원래는 svg태그.-->
      <img src = "/airbnb/images/up.png" width = "20" alt = "support data" />
    </button>
  </footer>

</body>
</html>
