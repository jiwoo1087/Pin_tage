<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAP</title>



    <!-- 부트스트랩 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <!-- 산돌구름 폰트 -->
    <script type="module"
        src="https://8fl3k30sy0.execute-api.ap-northeast-2.amazonaws.com/v1/api/fontstream/djs/?sid=gAAAAABlsHgJBHM1QHBIdMVd5ZQPii4NpDMf_Qs3jmFS5yt3_xJpQkJWj6G4pOi1XU3WVZc8ZhL3cnzME82ZgdxRheBEr_edqd3mvpja2g5UTyMvZ318m8QKGy0DEWyKHFL-owjPot0HXKViPw61I1yvg8SFrLRXb6LRnB1r-ASpwdwYSk-pKFR-AjjyUsNHhQgwKXdTXRNZSYBwdzD0lf0j2hJLR33glHxsMjxgxz0UXtK6u34ulMFFJsj03iwd21meQBSKY7Ax"
        charset="utf-8"></script>

    <!-- 구글폰트 -->
    <link href="https://fonts.googleapis.com/css?family=Cherry+Bomb" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre&family=Sniglet:wght@800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/map.css">

    <!--favicon-->
    <link rel="icon" href="./favicon.png">

    <style>
        .hashtag {
            display: none;
        }
    </style>

</head>

<body>

    <!--상단 nav-->
    <nav>
        <logo>
            <a href="./index.html">
                <img src="./assets/logo2.png">
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
        <button type="submit" class="login-Btn">
            <a href="login.html" style="color: #FF47CB; text-decoration: none;">
                LOGIN
            </a>
        </button>
    </nav>
    <!--메인-->
    <main>
        <div class="title">
            <h1>지도</h1>
            <p style="margin: 10px;">핀으로 설정한 매장을 간편하게 모아 보세요.</p>
        </div>
        <div class="brandshop-box">

        </div>

        <!-- 지도 이미지 -->
        <div class="map-img" style="margin-left: -50px;">
            <img id="hokkaido-img" src="./assets/Hokkaido_off.png" alt="">
            <img id="honshu-img" src="./assets/Honshu_off.png" alt="">
            <img id="shikoku-img" src="./assets/Shikoku_off.png" alt="">
            <img id="kyushu-img" src="./assets/Kyushu_off.png" alt="">
        </div>

        <!-- 해시태그 -->
        <div class="hashtag-container">
            <div>
                <span class="hashtag" id="hokkaido-hashtag">#훗카이도</span>
                <span class="hashtag" id="honshu-hashtag">#혼슈</span>
                <span class="hashtag" id="shikoku-hashtag">#시코쿠</span>
                <span class="hashtag" id="kyushu-hashtag">#규슈</span>

            </div>
            <div style="text-align: right;">
                <span class="pinCount" style="font-size: 24px;">나의 핀 <span style="color: #FF47CB;">15개</span></span>
            </div>

        </div>

        <!-- 회색 점선 -->
        <br>
        <div class="grey-line"></div> <br>

        <?php
include ('db_conn.php');

// 데이터베이스 연결 오류 확인
if ($conn->connect_error) {
    die("<script>console.error('데이터베이스 연결 실패: " . addslashes($conn->connect_error) . "');</script>");
}

$sql = "SELECT shop_name, tag_region, tag_location, tag_style, tag_brand, shop_img_path, price_min, price_max FROM vintageshop";
$result = $conn->query($sql); // 쿼리 실행

if (!$result) {
    die("<script>console.error('쿼리 실행 실패: " . addslashes($conn->error) . "');</script>");
}

$allRows = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $allRows[] = $row;
    }
    $jsonAllRows = json_encode($allRows);
} else {
    $jsonAllRows = json_encode([]);
}
?>

<!-- 결과 -->
<div class="center-container">
    <!-- Cards container -->
    <div class="card-container" id="card-container">
        <?php
        foreach ($allRows as $index => $row) {
            ?>
            <div class="card" data-index="<?php echo $index + 1; ?>">
                <div class="heart">
                    <i class="bi bi-heart-fill" style="color: red;"></i>
                </div>
                <div class="cardImg">
                    <a href="#">
                        <img src="<?php echo $row["shop_img_path"]; ?>" alt="">
                    </a>
                </div>
                <div class="cardTitle"><?php echo $row["shop_name"]; ?></div>
                <div class="cardHashtag_container">
                    <div class="cardHashtag">#<?php echo $row["tag_location"]; ?></div>
                    <div class="cardHashtag">#<?php echo $row["tag_style"]; ?></div>
                    <div class="cardHashtag">#<?php echo $row["tag_brand"]; ?></div>
                </div>
                <div class="price">
                    <img src="" alt="">
                    <p><?php echo $row["price_min"]; ?>¥ ~ <?php echo $row["price_max"]; ?>¥</p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const regions = [
        {
            name: 'hokkaido',
            img: document.getElementById('hokkaido-img'),
            hashtag: document.getElementById('hokkaido-hashtag'),
            imgOn: './assets/Hokkaido_on.png',
            imgOff: './assets/Hokkaido_off.png',
            clicked: false,
            filter: (index) => (index % 2 === 1) // 홀수 인덱스 (1의 배수)
        },
        {
            name: 'honshu',
            img: document.getElementById('honshu-img'),
            hashtag: document.getElementById('honshu-hashtag'),
            imgOn: './assets/Honshu_on.png',
            imgOff: './assets/Honshu_off.png',
            clicked: false,
            filter: (index) => (index % 3 === 0) // 3의 배수
        },
        {
            name: 'shikoku',
            img: document.getElementById('shikoku-img'),
            hashtag: document.getElementById('shikoku-hashtag'),
            imgOn: './assets/Shikoku_on.png',
            imgOff: './assets/Shikoku_off.png',
            clicked: false,
            filter: (index) => (index % 4 === 0) // 4의 배수
        },
        {
            name: 'kyushu',
            img: document.getElementById('kyushu-img'),
            hashtag: document.getElementById('kyushu-hashtag'),
            imgOn: './assets/Kyushu_on.png',
            imgOff: './assets/Kyushu_off.png',
            clicked: false,
            filter: (index) => (index % 5 === 0) // 5의 배수
        }
    ];

    function filterCards() {
        const cards = document.querySelectorAll('.card');
        const anyRegionClicked = regions.some(region => region.clicked);
        cards.forEach(card => {
            const index = parseInt(card.getAttribute('data-index'), 10);
            const showCard = regions.some(region => region.clicked && region.filter(index));
            if (anyRegionClicked) {
                card.style.display = showCard ? 'block' : 'none';
            } else {
                card.style.display = 'block'; // 모든 이미지가 Off일 때는 모든 카드 보이기
            }
        });
    }

    function handleClick(region) {
        region.clicked = !region.clicked;
        region.img.src = region.clicked ? region.imgOn : region.imgOff;
        region.hashtag.style.display = region.clicked ? 'inline' : 'none';
        filterCards();
    }

    regions.forEach(region => {
        region.img.addEventListener('click', () => handleClick(region));
        region.hashtag.addEventListener('click', () => handleClick(region));
    });
});
</script>

    </main>

    <!-- 푸터 -->
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
            <div class="goeun">
                <ul>
                    <li>고은</li>
                    <li>📖 Frontend Developer</li>
                    <li>🛠️ VScode / Github</li>
                    <li><a href="https://github.com/Silversi06">😺 깃허브</a></li>
                    <li>📩 w2219@e-mirim.hs.kr</li>
                </ul>
            </div>
            <div class="hyobeen">
                <ul>
                    <li>홍효빈</li>
                    <li>📖 Frontend Developer</li>
                    <li>🛠️ VScode / Github</li>
                    <li><a href="https://github.com/honghyobin">😺 깃허브</a></li>
                    <li>📩 w234@e-mirim.hs.kr</li>
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

    <script src="./js/map.js"></script>
</body>

</html>