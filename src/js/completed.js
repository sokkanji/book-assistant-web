function headerCompleted() {
    $("#header").html();
    $(document).on('mouseover', '.dropdown>li', function () {
        $('.m2').slideDown(200);
        $('.menubar').css('height', '225px').css('border-bottom', 'none');
    });
    $(document).on('mouseover', '.m2', function () {
        $('.m2').stop().slideDown(200);
    });
    $(document).on('mouseout', '.m2', '.dropdown>li', function () {
        $('.m2').stop().slideUp(170);
        $('.menubar').css('height', '110px').css('border-bottom', '1px solid #E6E6E6');
    });
}

function contentsCompleted() {
    $("#contents").html();
}

function footerCompleted() {
    $("#footer").html();
}