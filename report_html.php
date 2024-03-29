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
    <link rel="stylesheet" href="./public/css/review_css/report.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="report">
        <h1>제보하기</h1>
        <hr>
        <p>책잡이에 있지 않은 독립서점이나 신규 독립서점을 알고 계시다면 제보해주세요!<br>* 표시는 필수 입력란이라는 뜻입니다 :)</p>

        <form method="post" action="./report.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <div>독립서점 이름*</div>
                        <input type="text" placeholder="한글(영어)" name="s_store" maxlength="40" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>주소*</div>
                        <input type="text" placeholder="주소" name="s_addr01" required><br>
                        <input type="text" placeholder="상세주소" name="s_addr02" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>전화번호</div>
                        <input type="text" placeholder="전화번호" maxlength="12" name="s_tel">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>홈페이지</div>
                        <input type="text" placeholder="http://" maxlength="90" name="s_web">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>소개</div>
                        <textarea rows="12" cols="100" placeholder="300자 이내 간략히 작성해주세요." maxlength="500"
                            name="s_intro"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>의견 및 기타</div>
                        <textarea rows="12" cols="100" placeholder="자유롭게 의견을 작성해주세요." maxlength="500"
                            name="s_etc"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>사진</div>
                        <input type="file" class="image_input" accept="img/*" name="s_photo">
                        <button class="photo_btn">사진업로드</botton>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="report_btn">작성완료</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php 
        require "./footer.php"; 
    ?>

    <script>
        headerCompleted();
    </script>
</body>

</html>