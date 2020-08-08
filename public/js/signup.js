signup = () => {
    $(".name").blur(()=>{
        const name = $(this).val();
        if (name == "" || name == "undefined") return;
        if (!chk_name(name)) {
            $(".result_div").text("이름을 확인해주세요.");
        } else {
            $(".result_div").text("");
        }
    });

    $(".email").blur(()=>{
        const email = $(this).val();
        if (email == "" || email == "undefined") return;
        if (!chk_email(email)) {
            $(".result2_div").text("유효하지 않은 이메일입니다.");
        } else {
            $(".result2_div").text("사용할 수 있는 이메일입니다.");
            $(".result2_div").css("color", "blue");
        }
    });

    $("#pw").blur(() => {
        const pw = $("#pw").val();
        const num = pw.search(/[0-9]/g);
        const eng = pw.search(/[a-z]/ig);
        const spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

        if (pw.length < 8 || pw.length > 16) {
            $(".result3_div").text("8자리 ~ 16자리 이내로 입력해주세요.");
        } else if (pw.search(/\s/) != -1) {
            $(".result3_div").text("공백 없이 입력해주세요.");
        } else if ((num < 0 && eng < 0) || (eng < 0 && spe < 0) || (spe < 0 && num < 0)) {
            $(".result3_div").text("영문, 숫자, 특수문자 중 2가지 이상을 혼합하여 입력해주세요.");
        } else {
            $(".result3_div").text("");
        }
    });
}