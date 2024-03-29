<?php
    session_start();
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
    <link rel="stylesheet" href="./public/fonts/font.css">
    <link rel="stylesheet" href="./public/css/news_css/watching.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="watching">
        <h1>독립서점 구경가기</h1>
        <hr>
        <p>이미지를 클릭하면 가지각색 매력을 지닌 독립서점 웹사이트로 이동합니다.</p>

        <table>
            <tr>
                <td>
                    <a href="http://www.your-mind.com/" target="_blank">
                        <img src="./public/img/bookstore.png" class="web" alt="유어마인드 독립서점">
                    </a>
                </td>
                <td>
                    <a href="https://byeolcheck.kr/" target="_blank">
                        <img src="./public/img/bookstore2.png" class="web" alt="별책부록 독립서점">
                    </a>
                </td>
            </tr>
            <tr>
                <td class="line">유어마인드</td>
                <td class="line">별책부록</td>
            </tr>
            <tr>
                <td>
                    <a href="https://smartstore.naver.com/justorage" target="_blank">
                        <img src="./public/img/bookstore6.png" class="web" alt="스토리지북앤필름 독립서점">
                    </a>
                </td>
                <td>
                    <a href="http://shop.zine-pages.com/shop/main/index.php" target="_blank">
                        <img src="./public/img/bookstore3.png" class="web" alt="Zize Pages Shop">
                    </a>
                </td>
            </tr>
            <tr>
                <td class="line">스토리지북앤필름</td>
                <td class="line">Zine pages Shop</td>
            </tr>
            <tr>
                <td>
                    <a href="https://dasibookshop.com/" target="_blank">
                        <img src="./public/img/bookstore5.png" class="web" alt="다시서점">
                    </a>
                </td>
                <td>
                    <a href="http://www.gongsangondo.com/" target="_blank">
                        <img src="./public/img/bookstore4.png" class="web" alt="공상온도">
                    </a>
                </td>
            </tr>
            <tr>
                <td class="line">다시서점</td>
                <td class="line">공상온도</td>
            </tr>
        </table>
    </div>
    <?php 
        require "./footer.php"; 
    ?>

    <script>
        headerCompleted();
    </script>
</body>

</html>