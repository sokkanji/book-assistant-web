<?php
    session_start();
?>
<html>
<meta charset="UTF-8">

<head>
    <link rel="shortcut icon" href="./public/img/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="./public/img/favicon.ico" type="image/x-icon" />

    <title>책잡이</title>

    <link rel="stylesheet" href="./public/css/base_css/reset.css">
    <link rel="stylesheet" href="./public/css/base_css/header.css">
    <link rel="stylesheet" href="./public/css/base_css/footer.css">
    <link rel="stylesheet" href="./public/css/login_css/login.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
    <script type="text/javascript" src="./public/js/kakaoLogin.js"></script>
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="login">
        <h1>로그인</h1>
        <form method="POST" action="./login_Ok.php">
            <table>
                <tr>
                    <td class="name_row">이메일</td>
                </tr>
                <tr>
                    <td class="table_row">
                        <input type="email" class="email" name="email" autocomplete="off" maxlength="50"
                            placeholder="user@email.com">
                    </td>
                    <td rowspan="3" class="table_row">
                        <input type="submit" class="login_btn" value="로그인">
                    </td>
                </tr>
                <tr>
                    <td class="name_row">비밀번호</td>
                </tr>
                <tr>
                    <td class="table_row"><input type="password" class="pw" name="pw" maxlength="16"
                            placeholder=" 비밀번호">
                    </td>
                </tr>
                <tr>
                    <td class="table_row"><a href="#" class="find_pw">비밀번호 찾기</a></td>
                </tr>
                <tr>
                    <td class="table_row">
                        <div><a href="./signup_html.php" class="signup_btn">회원가입 하기</a></div>
                    </td>
                </tr>
                <tr>
                    <td class="table_row" onclick="loginWithKakao()">
                        <img src="./public/img/kakao_login_btn_medium_wide.png" style="cursor:pointer" alt="카카오로 로그인하기">
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
        Kakao.init("");
    </script>
</body>

</html>