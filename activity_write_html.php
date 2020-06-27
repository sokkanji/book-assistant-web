<?php
    if(!isset($_SESSION['email'])) { 
        echo "<script> alert('로그인 해주세요.'); 
        location.href='./login.html';</script>"; 
    }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="./public/img/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="./public/img/favicon.ico" type="image/x-icon" />

    <title>책잡이</title>
    
    <link rel="stylesheet" href="./public/css/base_css/reset.css">
    <link rel="stylesheet" href="./public/css/base_css/header.css">
    <link rel="stylesheet" href="./public/css/base_css/footer.css">
    <link rel="stylesheet" href="./public/css/review_css/activity_write.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./src/js/includeHtml.js"></script>
    <script type="text/javascript" src="./src/js/completed.js"></script>
</head>

<body>
    <include-html target="./header.php" completed="headerCompleted"></include-html>

    <div id="activity_write">
        <h1>활동 기록하기</h1>
        <hr>
        <p>독립서점 또는 독립서적물에 대한 자신만의 이야기를 적어주세요!</p>
        <form method="post" action="./activity_write.php">
            <table>
                <tr>
                    <td>
                        <div class="activity_write_title">제목</div>
                        <input type="text" placeholder="제목" name="a_title">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="activity_write_contents">내용</div>
                        <textarea rows="14" cols="100" placeholder="내용" name="a_content"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>사진</div>
                        <input type="file" class="image_input" accept="img/*" multiple>
                        <button class="photo_btn">사진업로드</botton>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="activity_write_btn">작성완료</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <include-html target="./footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();</script>
</body>

</html>