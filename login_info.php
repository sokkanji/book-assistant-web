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
    <link rel="stylesheet" href="./public/css/login_css/login_info.css">
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
    <div id="login_info">
        <h1>회원 정보</h1>
        <table>
            <tr>
                <td rowspan="4"><img src="./public/img/user_icon.png" class="user-img" alt="회원정보이미지"></td>
            </tr>
            <tr>
                <td class="t1">이름</td>
                <td class="t2"><?php echo $_SESSION["u_name"]?></td>
            </tr>
            <tr>
                <td class="t1">이메일</td>
                <td class="t2"><?php echo $_SESSION["email"]?></td>
            </tr>
        </table>
        <div class="btns">
            <?php 
            if(isset($_SESSION["userId"])){
                echo "<div onclick='kakaoLogout()'><a class='btn2' style='cursor:pointer'>로그아웃 하기</a></div>";
            }
            else{
                echo "<div><a href='./logout.php' class='btn2'>로그아웃 하기</a></div>";
                echo "<div><a href='./change_chk_pw_html.php' class='btn2'>비밀번호 변경</a></div><div><a href='./user_del_html.php' class='btn2'>회원탈퇴 하기</a></div>";
            }
        ?>
        </div>
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