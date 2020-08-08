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
    <link rel="stylesheet" href="./public/css/serach_css/book_search.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
    <script type="text/javascript" src="./public/js/book_search.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="book_search">
        <h1>독립출판물 검색</h1>
        <hr>
        <p>도서명, 저자, 출판사, 판매 서점명 등으로 도서를 검색할 수 있습니다.</p>
        <div class="find">
            <input type="text" id="keyword" placeholder="검색어를 입력해주세요.">
            <button class="searchBtn">검색하기</button>
        </div>
        <div class="answer">
            <div></div>
            <img href="./public/img/findbook.jpg"></img>
            <ul class="result"></ul>
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