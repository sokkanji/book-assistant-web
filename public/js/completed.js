headerCompleted = () => {
    $("#header").html();
    $(document).on("mouseover", ".dropdown>li", () => {
        $(".m2").slideDown(200);
        $("#header").css("height", "165px").css("box-shadow", "none");
    });
    $(document).on("mouseover", ".m2", () => {
        $(".m2").stop().slideDown(200);
    });
    $(document).on("mouseout", ".m2", ".dropdown>li", () => {
        $(".m2").stop().slideUp(170);
        $("#header").css("height", "90px").css("box-shadow", "0px 1.4px 0px 0px rgba(0, 0, 0, 0.08)");
    });
    console.log("%c안녕하세요:) 혹시 오류를 발견하거나 피드백을 주고 싶으시다면, sskkanji@gmail.com로 메일을 주시면 정말 감사합니다! 저의 Github는 https://github.com/sokkanji 입니다.",
        "font-size: 15px; font-weight: 700; font-family: 'NotoSansKR-Bold'; color: #6B5AE4;");
}