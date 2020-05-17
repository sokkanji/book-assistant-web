<!DOCTYPE html>
<html>

<head>
    <title>책잡이</title>

    <link rel="stylesheet" href="..\..\..\public\css\base_css\reset.css">
    <link rel="stylesheet" href="..\..\..\public\css\base_css\header.css">
    <link rel="stylesheet" href="..\..\..\public\css\base_css\footer.css">
    <link rel="stylesheet" href="..\..\..\public\css\login_css\login_Ok.css">
    <link rel="stylesheet" href="..\..\..\public\fonts\font.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="..\..\js\includeHtml.js"></script>
    <script type="text/javascript" src="..\..\js\completed.js"></script>
</head>

<body>
    <include-html target="..\base\header.php" completed="headerCompleted"></include-html>

    <div id="login_Ok">
        <h1>회원 정보</h1>
        <table>
            <tr>
                <td rowspan="4"><img src="..\..\..\public\img\user_icon.png" class="user-img" alt="회원정보이미지"></td>
            </tr>
            <tr>
                <td class="t1">이름</td>
                <td class="t2"><?php echo $_SESSION['u_name']?></td>
            </tr>
            <tr>
                <td class="t1">이메일</td>
                <td class="t2"><?php echo $_SESSION['email']?></td>
            </tr>
        </table>

        <div class="btns">
            <div><a href="./logout.php" class="btn2">로그아웃 하기</a></div>
            <div><a href="change_chk_pw.html" class="btn2">비밀번호 변경</a></div>
            <div><a href="./user_del.html" class="btn2">회원탈퇴 하기</a></div>
        </div>

    </div>

    <include-html target="..\base\footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();</script>
</body>

</html>