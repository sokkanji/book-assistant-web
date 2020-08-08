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
    <link rel="stylesheet" href="./public/css/login_css/user_del.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="user_del">
        <h1>회원탈퇴</h1>
        <hr>
        <p>탈퇴한 후에 복구할 수 없습니다. 신중히 선택해주세요.</p>

        <form method="post" action="./user_del.php">
            <table>
                <tr>
                    <td>비밀번호</td>
                </tr>
                <tr>
                    <td class="table_row"><input type="password" class="pw1" required placeholder="비밀번호">
                    </td>
                </tr>
                <tr>
                    <td>비밀번호 확인</td>
                </tr>
                <tr>
                    <td><input type="password" class="pw2" name="pw" required placeholder="비밀번호 확인">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="result_div"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="user_del_btn">회원탈퇴 하기</button>
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
        $(".pw2").blur(() => {
            const pw1 = $(".pw1").val();
            const pw2 = $(".pw2").val();
            if (pw1 != pw2) {
                $(".result_div").text("비밀번호가 일치하지 않습니다.");
            } else {
                $(".result_div").text("");
            }
        });
    </script>
</body>

</html>