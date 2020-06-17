<!DOCTYPE html>
<html>

<head>
    <title>책잡이</title>

    <link rel="stylesheet" href="..\..\..\public\css\base_css\reset.css">
    <link rel="stylesheet" href="..\..\..\public\css\base_css\header.css">
    <link rel="stylesheet" href="..\..\..\public\css\base_css\footer.css">
    <link rel="stylesheet" href="..\..\..\public\css\serach_css\book_search.css">
    <link rel="stylesheet" href="..\..\..\public\fonts\font.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="..\..\js\includeHtml.js"></script>
    <script type="text/javascript" src="..\..\js\completed.js"></script>
</head>

<body>
    <include-html target="..\base\header.php" completed="headerCompleted"></include-html>

    <div id="book_search">
        <h1>독립출판물 검색</h1>
        <hr>
        <p>
        도서명, 저자, 출판사, 키워드, 판매 서점명 등으로 도서를 검색할 수 있습니다.<br>
        특수문자는 "검색어"에서 제외되어서 검색됩니다.
        </p>

        <div class="find">
            <input type="text" placeholder="검색어를 입력해주세요.">
            <button>검색하기</button>
            <button>상세검색</button>
        </div>
        

    </div>
    <include-html target="..\base\footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();</script>



</body>

</html>