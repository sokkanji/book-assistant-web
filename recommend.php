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
    <link rel="stylesheet" href="./public/css/recommend_css/recommend.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="recommend">
        <h1>독립출판물 추천</h1>
        <hr>
        <p>독립서점 사장님들이 추천한 독립출판물들을 소개합니다.<br>책을 클릭하면, 판매서점 같은 책정보를 볼 수 있습니다.</p>

        <table>
            <tr>
                <td>
                    <a href="./recommend_read.php?b_no=2">
                        <img src="./public/img/book1.jpg" class="web" alt="나는 너를 영원히 오해하기로 했다">
                    </a>
                </td>
                <td>
                    <a href="./recommend_read.php?b_no=3">
                        <img src="./public/img/book2.jpg" class="web" alt="느려도 괜찮아 여기는">
                    </a>
                </td>
                <td>
                    <a href="./recommend_read.php?b_no=4">
                        <img src="./public/img/book3.png" class="web" alt="도쿄규림일기">
                    </a>
                </td>
            </tr>
            <tr>
                <td class="line">나는 너를 영원히 오해하기로 했다<br>(손민지)</td>
                <td class="line">느려도 괜찮아 여기는 코스타리카!<br>(어다은)</td>
                <td class="line">도쿄규림일기<br>(김규림)</td>
            </tr>
            <tr>
                <td>
                    <a href="./recommend_read.php?b_no=5">
                        <img src="./public/img/book5.png" class="web" alt="모든 시도는 따뜻할 수밖에">
                    </a>
                </td>
                <td>
                    <a href="./recommend_read.php?b_no=6">
                        <img src="./public/img/book4.jpg" class="web" alt="이슬아수필집">
                    </a>
                </td>
                <td>
                    <a href="./recommend_read.php?b_no=7">
                        <img src="./public/img/book6.jpg" class=" web" alt="저 청소일 하는데요.">
                    </a>
                </td>
            </tr>
            <tr>
                <td class="line">모든 시도는 따뜻할 수밖에<br>(이내)</td>
                <td class="line">일간 이슬아 수필집<br>(이슬아)</td>
                <td class="line">저 청소일 하는데요.<br>(코피루왁)</td>
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