<?php
    session_start();
    require_once("./dbconfig.php");
?>
<!DOCTYPE html>
<html>

<meta charset="UTF-8">

<head>
    <link rel="shortcut icon" href="./public/img/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="./public/img/favicon.ico" type="image/x-icon" />

    <title>책잡이</title>

    <link rel="stylesheet" href="./public/css/base_css/reset.css">
    <link rel="stylesheet" href="./public/css/base_css/header.css">
    <link rel="stylesheet" href="./public/css/base_css/footer.css">
    <link rel="stylesheet" href="./public/css/news_css\news.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="project">
        <h1>뉴스레터</h1>
        <hr class="p-hr">
        <p>독립서점뿐만 아니라 소규모 책방의 흥미로운 소식도 편하게 이메일로 받아보세요!</p>

        <form method="post" action="./news_emailing.php">
            <p>
                <?php
                $sql = "SELECT * FROM news";
                $data = mysqli_query($con, $sql);
                $total_rows = mysqli_num_rows($data);
                echo $total_rows;?>명이 구독 중입니다.
            </p>
            <input type="text" name="u_name" placeholder="이름">
            <input type="text" id="email" name="email" placeholder="이메일">
            <button>구독하기</button>
        </form>

        <div class="p-detail">
            <details>
                <summary>청계천 헌책방거리 살리기 프로젝트 - 설렘어함</summary>
                <img src="./public/img/project2.jpg" class="img2" alt="청계천 헌책방거리 이미지">
                <div class="content">1960-70년대에는 약 200개의 헌책방이 가득했고 하루 평균 2만명 사람들이 다녀갔던 헌책방 거리였다. 책과 참고서를 구하기 어렵던
                    시절 헌책방은 최고의 인기와 호황을 누렸다. 80년대 후반에 들어서자 수요가 줄기 시작했다. 80년대 대형서점의 출연으로 사람들이 헌책방에서 책을 살 필요가 없어졌고, 90년대
                    들어서는 교과서가 수시로 개정되기 때문에 헌책의 가치는 떨어졌기 때문이다.</div>
                <div class="content">전보다 눈에 띄게 매출이 줄어든 헌책방 그리고 헌책방 거리를 다시 활성화 시키겠다는 목표로 모인 '책 잇 아웃'이 있다.
                    '책 잇 아웃'의 대표적인 활동은 헌책 랜덤 박스 서비스 '설레어함'이다. 어떤 책을 받아볼지 몰라 설렌다는 의미에서 지어진 이름의 이 활동은 헌책방주인의 안목으로
                    직접 고른 책 3권을 박스에 담아 구매자에게 보내는 서비스로, 구매자가 온라인을 통해 큰 주제를 선택하면 책방 주인이
                    어울리는 책을 선별하는 프로젝트를 진행했다. 현재는 일시적으로 중단한 상태이다.
                </div>
                <span>출처 https://froma.co.kr/383</span>
            </details>
            <hr>
            <details>
                <summary>청계천 헌책방거리 살리기 프로젝트 - 설렘자판기</summary>
                <img src="./public/img/project4.jpg" class="img2" alt="설렘자판기 이미지">             
                <div class="content">현재 텐바이텐 대학로점에는 자판기는 없지만 라이브러리 컨셉으로 제품이 진열 판매되고 있으며, 비슷하게 현대백화점 신촌점에도 무인 서점
                    형태를 한 ‘설렘서점’이 운영 중이다. 모든 프로젝트로 얻은 수익은 입점 수수료를 제외하고는 전액 청계천 헌책방거리를 살리는 데에 사용되고 있다. 헌책방을 활성화시키는
                    한편으로, 사람들에게 일상의 설렘을 주고 싶다는 이들의 행보는 그 자체로 큰 선물 같은 존재다.
                    <div class="home_link">
                        <a href="https://oldbookbox.modoo.at/">설레어함/셀렘자판기 홈페이지 바로가기</a>
                    </div>
                </div>
                <span>출처 https://froma.co.kr/383</span>
            </details>
            <hr>
            <details>
                <summary>헌책방 축제</summary>
                <img src="./public/img/project5.jpg" class="img2" alt="헌책방 축제 이미지">
                <div class="content">서울 도서관은 헌책방 운영을 도와 지역경제를 활성화하고자, 2015년부터 매년 '청계천 헌책방거리 책 축제'를 개최한다. 2018년
                    6월에는
                    동대문디자인플라자(DDP) 디자인 거리에서 3일간 열렸다. 행사는 전시와 판매, 참여이벤트로 구성되어있고, 천게천 헌책방 사장님들의 이야기를 담는다.
                    서울광장에서는 매년 ‘한 평 시민 책 시장’이 열린다매년 4월부 11월까지 매주 토요일 헌책의 가치를 전하는 행사를 연다.
                    이뿐만 아니라, 매년 여름 한강에서 열리는 '한강 몽땅 여름축제'에서 '다리 밑 헌책방 축제'라는 이름의 헌책방 축제가 열린다. 헌책방 문화를 다시 활성화 시키고,
                    잊혀진 헌책방과 서울시민들의 접점을 늘리기 위한 서울시와 서울도서관들의 노력들이다.
                </div>
                <span>참고 https://froma.co.kr/383</span>
            </details>
            <hr>
            <details open>
                <summary>&lt;동네 서점 X 쏜살문고&gt; 민음사의 '쏜살문고 동네서점 에디션'</summary>
                <img src="./public/img/project3.png" class="img1" alt="민음사의'쏜살문고동네서점에디션'">
                <div class="content">
                    '동네 서점X쏜살문고' 프로젝트는 독립서점 '51페이지' 김종원 대표와 민음사가 '동네 서점에서만 살 수 있는 책'을 판매해보자며 출발한 프로젝트이다.
                    동네서점 살리자는 말은 많이 하면서도 정작 책 판매를 위한 이벤트는 대형 인터넷 서점을 통해서만 이뤄지는 출판계 세태에 대한 반발에서 시작한 것이다. 민음사의
                    쏜살문고가 '특별판'을 생산하고, 독립 서점들의, 의견을 물은 후 손해 볼 각오를 하고 동네 서점 특별판 프로젝트를 실험적으로 진행했다.
                    전국의 동네 서점 162곳이 연결돼 이벤트에 참여했고, 초판 2000부 팔기도 어렵다는 출판 시장에서 발간 3달 만에 두 권짜리 5000세트가 소진되었다.
                </div>
                <span>출처 민음사 공식 홈페이지 http://minumsa.com/</span>
            </details>
            <hr>
        </div>
    </div>
    <?php 
        require "./footer.php"; 
    ?>

    <script>
        headerCompleted();
    </script>
</body>

</html>