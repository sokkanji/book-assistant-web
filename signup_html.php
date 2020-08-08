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
    <link rel="stylesheet" href="./public/css/login_css/signup.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
    <script type="text/javascript" src="./public/js/check.js"></script>
    <script type="text/javascript" src="./public/js/signup.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="signup">
        <h1>회원가입</h1>
        <hr>

        <p>이미 회원이신가요?&nbsp<a href="./login.php">로그인하기</a></p>

        <form method="post" action="./signup.php">
            <table>
                <tr>
                    <td>이름</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="name" name="u_name" autocomplete="off" required placeholder="이름">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="result_div"></div>
                    </td>
                </tr>
                <tr>
                    <td>이메일</td>
                </tr>
                <tr>
                    <td>
                        <input type="email" class="email" name="email" autocomplete="off" required
                            placeholder="user@email.com">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="result2_div"></div>
                    </td>
                </tr>
                <tr>
                    <td>비밀번호</td>
                </tr>
                <tr>
                    <td><input type="password" id="pw" class="pw1" name="pw1" maxlength="16" required
                            placeholder="비밀번호">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="result3_div"></div>
                    </td>
                </tr>
                <tr>
                    <td>비밀번호 확인</td>
                </tr>
                <tr>
                    <td><input type="password" id="pw" class="pw2" name="pw2" maxlength="16" required
                            placeholder="비밀번호 확인">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="result3_div" id="result3_div"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="signOk_btn" onclick="chk_name(name); chk_email(email);">회원가입 하기</button>
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
        signup();
    </script>
</body>

</html>