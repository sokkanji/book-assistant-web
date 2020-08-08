<?php
    session_start();
?>

<html>
    <meta charset="UTF-8">
    <meta name="author" content="MinjiSo">
    <meta name="generator" content="vscode">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>책잡이</title>

    <link rel="shortcut icon" href="./public/img/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="./public/img/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="./public/css/base_css/reset.css">
    <link rel="stylesheet" href="./public/css/base_css/header.css">
    <link rel="stylesheet" href="./public/css/base_css/footer.css">
    <link rel="stylesheet" href="./public/css/base_css/index.css">
    <link rel="stylesheet" href="./public/css/base_css/animation.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="contents">
        <div class="wrap">
            <div class="content-top">
                <img src="./public/img/point.png" class="point1" id="swing-in-left-fwd">
                <img src="./public/img/point.png" class="point2" id="swing-in-right-bck">
                <div class="mungu">
                    <p id="swing-in-top-bck">테스트를 통해 자신의 독서타입에 맞는 &nbsp<span>독립출판물</span>&nbsp을 추천받고,</p>
                    <p id="swing-in-top-bck">가까운 <span>&nbsp독립서점&nbsp</span>을 검색해보세요.</p>
                    <div class="testBtn"><a href="./book_test.php" id="swing-in-top-bck">테스트 하러가기</a></div>
                </div>
                <img src="./public/img/메인표지.png" class="main-img">
                <img src="./public/img/girlsboy.png" class="girlsboy" id="swing-in-top-bck">
            </div>
        </div>
    </div>
    
    <script>
        headerCompleted();
    </script>
    <script id="embeddedChatbot" data-botId="B1lkr3" src="https://www.closer.ai/js/webchat.min.js"> </script>
</body>

</html>