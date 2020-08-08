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
    <link rel="stylesheet" href="./public/fonts/font.css">
    <link rel="stylesheet" href="./public/css/login_css/change_pw.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
    <script type="text/javascript" src="./public/js/check.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="change_pw">
        <h1>비밀번호 변경</h1>
        <hr>
        <p>기존 비밀번호를 확인합니다.</p>

        <form method="post" action="./change_chk_pw.php">
            <table>
                <tr>
                    <td>비밀번호</td>
                </tr>
                <tr>
                    <td class="table_row">
                        <input type="password" class="pw1" name="pw1" required placeholder="비밀번호">
                    </td>
                </tr>
                <tr>
                    <td>비밀번호 확인</td>
                </tr>
                <tr>
                    <td class="table_row">
                        <input type="password" class="pw2" name="pw2" required placeholder="비밀번호 확인">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="result_div"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="change_pw_btn">입력 완료</button>
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
        chk_pw();
    </script>
</body>

</html>