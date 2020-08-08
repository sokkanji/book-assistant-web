chk_pw = () => {
    $(".pw2").blur(() => {
        const pw1 = $(".pw1").val();
        const pw2 = $(".pw2").val();
        if (pw1 != pw2) {
            $(".result_div").text("비밀번호가 일치하지 않습니다.");
        } else {
            $(".result_div").text("");
        }
    });
}

chk_email = (email) => {
    let regex = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return (email != "" && email != "undefined" && regex.test(email));
}

chk_name = (name) => {
    let regex = /^[가-힣|a-z|A-Z|0-9|\*]+$/;
    return (name != "" && name != "undefined" && regex.test(name));
}