<?php 
session_start();
include('db_conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.png"> <!--favicon-->
    <link href="https://fonts.googleapis.com/css?family=Cherry+Bomb" rel="stylesheet"> <!--상단 내비 폰트-->
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre&family=Sniglet:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>Pin!tage</title>
</head>
<body>
    <!--상단 nav-->
    <nav>
        <logo>
            <a href="./index.html">
                <img src="./assets/logo.png">
            </a>   
        </logo>
        <menu>
            <ul>
                <li><a href="./index.php" class="top-nav">MAIN</a></li>
                <li><a href="./search_test.php" class="top-nav">SEARCH</a></li>
                <li><a href="./map.php" class="top-nav">PIN!MAP</a></li>
                <li><a href="./mypage_H.php" class="top-nav">MYPAGE</a></li>
            </ul>
        </menu>
        <!-- <input type="button" value="LOGIN" class="login-Btn"> -->
        <?php if (isset($_SESSION['user_id']) && $_SESSION['loggedin'] === true ) { ?>
            <!-- 사용자가 로그인되어 있을 때는 로그아웃 버튼 표시 -->
            <a href="login.php?logout=true">
                <button type="button" class="logout-Btn">
                    LOGOUT
                </button>
            </a>
        <?php } else { ?>
            <!-- 사용자가 로그인되어 있지 않을 때는 로그인 버튼 표시 -->
            <a href="login.html">
                <button type="button" class="login-Btn">
                    LOGIN
                </button>
            </a>
        <?php } ?>

    </nav>

    <!--메인 area-->
    <main>
        <!--section-1-->
    <div class="section-1">

</div>

<!--section-2-->
<div class="section-2">
    <img src="assets/section2-background.png" style="width: 100%; display: block;">
    <div class="container-2">
        <h1 class="title-1">PIN<br>YOUR<br>VINTAGE!</h1>
        <p class="subtitle-1">일본 빈티지 쇼핑 여행의 필수 가이드, Pintage</p>
        <p class="paragraph-1">Pintage는 일본에서 더 저렴하게 구매할 수 있는 브랜드 정보와 인기 빈티지
            샵을 소개합니다. <br>원하는 가게를 검색하고 저장하여 나만의 핀맵을 만들어 보세요.
           <br>특별한 쇼핑 경험을 지금 바로 Pintage에서 시작해보세요.</p>
    </div>
</div>

<!--secion-3-->
<div class="section-3">
    <div class="container-3">
        <div class="title-container">
            <p class="paragraph-2">일본 빈티지 의류의 모든 것</p>
            <h2 class="title-2">핀티지에서 만나보세요</h3>
        </div>
       <!--auto-slide-->
        <div class="auto-slide">
            <div class="slide-track">
                <img src="assets/apc-icon.png">
                <img src="assets/asics-icon.png">
                <img src="assets/bape-icon.png">
                <img src="assets/beams-icon.png">
                <img src="assets/comde-icon.png">
                <img src="assets/gu-icon.png">
                <img src="assets/maison-icon.png">
                <img src="assets/onitsuka-icon.png">
                <img src="assets/porter-icon.png">
                <img src="assets/stussy-icon.png">
                <img src="assets/supreme-icon.png">
                <img src="assets/uniqlo-icon.png">
                <img src="assets/vivienne-icon.png">
                <!-- 슬라이드가 끊기지 않도록 이미지들을 한 번 더 반복 -->
                <img src="assets/apc-icon.png">
                <img src="assets/asics-icon.png">
                <img src="assets/bape-icon.png">
                <img src="assets/beams-icon.png">
                <img src="assets/comde-icon.png">
                <img src="assets/gu-icon.png">
                <img src="assets/maison-icon.png">
                <img src="assets/onitsuka-icon.png">
                <img src="assets/porter-icon.png">
                <img src="assets/stussy-icon.png">
                <img src="assets/supreme-icon.png">
                <img src="assets/uniqlo-icon.png">
                <img src="assets/vivienne-icon.png">
            </div>
        </div>
    </div>
</div>
    </main>

    <footer>
        <div class="contributor">
            <div class="jiwoo">
                <ul>
                    <li>김지우</li>
                    <li>📖 Backend Developer</li>
                    <li>🛠️ VScode / Github</li>
                    <li><a href="https://github.com/jiwoo1087">😺 깃허브</a></li>
                    <li>📩 s2205@e-mirim.hs.kr</li>
                </ul>
            </div>
            <div class="khyunji">
                <ul>
                    <li>김현지</li>
                    <li>📖 FullStack Developer</li>
                    <li>🛠️ VScode / FileZila / Github</li>
                    <li><a href="https://github.com/de-quei">😺 깃허브</a></li>
                    <li>📩 s2208@e-mirim.hs.kr</li>
                </ul>
            </div>
            <div class="heeyoung">
                <ul>
                    <li>김희영</li>
                    <li>📖 Frontend Developer</li>
                    <li>🛠️ VScode / Github</li>
                    <li><a href="https://github.com/gmldrnfl">😺 깃허브</a></li>
                    <li>📩 w2225@e-mirim.hs.kr</li>
                </ul>
            </div>
            <div class="nhyunji">
                <ul>
                    <li>노현지</li>
                    <li>📖 Designer</li>
                    <li>🛠️ Figma</li>
                    <li><a href="https://www.instagram.com/shgusw1/">🩷인스타그램</a></li>
                    <li>📩 d2204@e-mirim.hs.kr</li>
                </ul>
            </div>
        </div>
       
        <div class="footer-nav">
            <img src="./assets/logo2.png" style="width: 150px; margin-top: 20px;">
            <h4>TEAM カピバラ</h4>
        </div>
    </footer>
    
</body>
</html>