<!DOCTYPE html>
<html>

<head>
    <title>책잡이</title>

    <link rel="stylesheet" href="..\..\..\public\css\reset.css">
    <link rel="stylesheet" href="..\..\..\public\css\header.css">
    <link rel="stylesheet" href="..\..\..\public\css\footer.css">
    <link rel="stylesheet" href="..\..\..\public\fonts\font.css">
    <link rel="stylesheet" href="..\..\..\public\css\signup.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="..\..\js\includeHtml.js"></script>
    <script type="text/javascript" src="..\..\js\completed.js"></script>
</head>

<body>
    <include-html target="..\base\header.php" completed="headerCompleted"></include-html>

    <div id="signup">
        <h1>회원가입</h1>
        <hr>

        <p>이미 회원이신가요?&nbsp<a href="login.php">로그인하기</a></p>

        <form method="post" action="signup.php">
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
                    <td><input type="password" class="pw" required placeholder="비밀번호">
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
                    <td><input type="password" class="pw" name="pw" required placeholder="비밀번호 확인">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="result3_div"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="signOk_btn" OnClick="javascript:email_check()">회원가입 하기</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <include-html target="..\base\footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();

    function chkname(name) {    
        var regex=/^[가-힣|a-z|A-Z|0-9|\*]+$/;
        return (name != '' && name != 'undefined' && regex.test(name)); 
    }

    $(".name").blur(function() {
        var name = $(this).val();
        if( name == '' || name == 'undefined') return;

        if (! chkname(name)) {
            $('.result_div').text('이름을 확인해주세요.');
            return false;
        } else {            
            $('.result_div').text('');
        }
    });

    function chkemail(email) {    
        var regex=/([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return (email != '' && email != 'undefined' && regex.test(email)); 
    }

    $(".email").blur(function() {
        var email = $(this).val();
        if( email == '' || email == 'undefined') return;

        if(! chkemail(email) ) {
            $('.result2_div').text('유효하지 않은 이메일입니다.');
            return false;
        }
        else {
            $('.result2_div').text('사용할 수 있는 이메일입니다.');
            $('.result2_div').css('color','blue');
            return false;
        }
    });

    $('.pw').blur(function() { 
        var pw = $(".pw").val();
        var num = pw.search(/[0-9]/g);
        var eng = pw.search(/[a-z]/ig);
        var spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

        if(pw.length < 8 || pw.length > 20){
            $('.result3_div').text('8자리 ~ 20자리 이내로 입력해주세요.');
            return false;
        }else if(pw.search(/\s/) != -1){
            $('.result3_div').text('공백 없이 입력해주세요.');
            return false;
        }else if( (num < 0 && eng < 0) || (eng < 0 && spe < 0) || (spe < 0 && num < 0) ){
            $('.result3_div').text('영문, 숫자, 특수문자 중 2가지 이상을 혼합하여 입력해주세요.');
             return false;
        }
    });
    </script>
</body>

</html>