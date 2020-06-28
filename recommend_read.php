<?php
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
    <link rel="stylesheet" href="./public/css/recommend_css/recommend.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./src/js/includeHtml.js"></script>
    <script type="text/javascript" src="./src/js/completed.js"></script>
</head>

<body>
    <include-html target="./header.php" completed="headerCompleted"></include-html>

    <div id="recommend">
        <h1>독립출판물 추천</h1>
        <hr>
        <p>독립서점 사장님들이 추천한 독립출판물들을 소개합니다.<br>책을 클릭하면, 독립서점 사장님들이 추천한 이유와 책 설명을 볼 수 있습니다.</p>

        <td class="title"><a href="./activity_read.php?a_no=<?php echo $board['a_no'];?>">
            
        <table>
            <tr>
                <td>
                    <img src="./public/img/book1.jpg" class="web" alt="나는 너를 영원히 오해하기로 했다">
                </td>
                <td>
                    <img src="./public/img/book2.jpg" class="web" alt="느려도 괜찮아 여기는">
                </td>
                <td>
                    <img src="./public/img/book3.png" class="web" alt="도쿄규림일기">
                </td>
            </tr>
            <tr>
                <td class="line">나는 너를 영원히 오해하기로 했다<br>(손민지)</td>
                <td class="line">느려도 괜찮아 여기는 코스타리카!<br>(어다은)</td>
                <td class="line">도쿄규림일기<br>(김규림)</td>
            </tr>

            <tr>
                <td>
                    <img src="./public/img/book5.png" class="web" alt="모든 시도는 따뜻할 수밖에">
                </td>
                <td>
                    <img src="./public/img/book4.jpg" class="web" alt="이슬아수필집">
                </td>
                <td>
                    <img src="./public/img/book6.jpg" class=" web" alt="저 청소일 하는데요.">
                </td>
            </tr>
            <tr>
                <td class="line">모든 시도는 따뜻할 수밖에<br>(이내)</td>
                <td class="line">일간 이슬아 수필집<br>(이슬아)</td>
                <td class="line">저 청소일 하는데요.<br>(코피루왁)</td>
            </tr>
        </table>
    </div>

    <include-html target="./footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();</script>

</body>

</html>