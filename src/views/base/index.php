<?php
require_once("../base/dbconfig.php");
?>
<html>

<meta charset="UTF-8">
<meta name="author" content="MinjiSo">
<meta name="generator" content="vscode">

<title>책잡이</title>

<!-- <link rel="shortcut icon" href="http:// /favicon.ico" type="image/x-icon" />
    <link rel="icon" href="http:// /favicon.ico" type="image/x-icon" /> -->
<!-- test http:// /favicon.ico -->

<link rel="stylesheet" href="..\..\..\public\css\base_css\reset.css">
<link rel="stylesheet" href="..\..\..\public\css\base_css\header.css">
<link rel="stylesheet" href="..\..\..\public\css\base_css\index.css">
<link rel="stylesheet" href="..\..\..\public\css\base_css\footer.css">
<link rel="stylesheet" href="..\..\..\public\fonts\font.css">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="..\..\js\includeHtml.js"></script>
<script type="text/javascript" src="..\..\js\completed.js"></script>

</head>

<body>
    <include-html target="header.php" completed="headerCompleted"></include-html>
    <div id="contents">

    <div class="sentence">
        <img src="..\..\..\public\img\point.png" class="point1" >
        <p id="swing-in-top-bck" >테스트를 통해 자신의 독서타입에 맞는 &nbsp<span>독립출판물</span>&nbsp을 추천받고,</p>
        <img src="..\..\..\public\img\point.png" class="point2" id="swing-in-top-bck">
        <p id="swing-in-top-bck">가까운 <span>&nbsp독립서점&nbsp</span>을 검색해보세요.</p>
        <div class="testBtn"><a href="..\find\book_test.html">테스트 하러가기</a></div>
    </div>

    <img src="..\..\..\public\img\메인표지3.jpg" class="main-img">
    <img src="..\..\..\public\img\girls_one.png" class="girls_one" id="swing-in-right-bck">
    <img src="..\..\..\public\img\girls_two.png" class="girls_two" id="swing-in-left-fwd">
    <img src="..\..\..\public\img\boy.png" class="boy" id="swing-in-top-bck">
     

    <div class="recommend3">
        <div class="icon">
            <div>
            <img src="..\..\..\public\img\icon_news.png">
            <p>뜻깊은 독립서점 <br>행사에 참여하세요</p>
            </div>
            <a href="..\news\news.php">소식 보러가기</a>
        </div>
        <div class="news">
            <form method="post" action="..\news\news_emailing.php">
                
            <p>독립서점의 소식을 편하게 이메일로 받아보세요!<br>
            <?php $sql = 'SELECT * FROM news';
                $data = mysqli_query($con, $sql);
                $total_rows = mysqli_num_rows($data);
                echo $total_rows;
                ?>명이 구독 중입니다.</p>
            <div class="inputs">
                <input type="text" name="u_name" placeholder="이름">
                <input type="text" id="email" name="email" placeholder="이메일">
                <button>구독하기</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    <include-html target="footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();</script>
    <script id="embeddedChatbot" data-botId="B1lkr3" src="https://www.closer.ai/js/webchat.min.js"> </script>
</body>
</html>