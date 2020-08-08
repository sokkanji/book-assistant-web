book_search = () => {
    let ajax_last_num = 0;
    let current_ajax_num = ajax_last_num;
    let isRun = false;

    $(".searchBtn").click(() => {
        ajax_last_num = 0;
        current_ajax_num = ajax_last_num;
        if (!isRun) {
            alert("검색중입니다. 잠시만 기다려주세요.");
            isRun = true;
        } else if (isRun) {
            return;
        }
        let _keyword = $("#keyword").val();

        if (_keyword.length == 0) {
            alert("키워드를 입력해주세요.");
        } else {
            $.ajax({
                type: "GET",
                url: "./book_result.php",
                timeout: 10000,
                data: ({
                    keyword: _keyword
                }),
                cache: false,
                dataType: "json",
                beforeSend: (request) => {
                    ajax_last_num = ajax_last_num + 1;
                    $(".result li").remove();
                },
                success: (data) => {
                    isRun = false;
                    if (current_ajax_num == ajax_last_num - 1) {
                        if (data.length != 0) {
                            $.each(data, (key, val) => {
                                let str = "<li><dl><dt>" +
                                    "<a href='./recommend_read.php?b_no=" + val.b_no + "'>" +
                                    "<img src='./public/img/" + val.img + "'></a>" +
                                    "</dt>" +
                                    "<dd><p class='title'></a>" + val.b_title + "</p><p>" + val.writer + "</p>" +
                                    "</dd></dl></li>"
                                $(".result").append(str);
                                $(".answer div").html("<div>" + data.length + "개의 검색결과</div>");
                            });
                        } else if (data.length == 0) {
                            alert("검색결과가 없습니다.");
                            $(".answer div").html("0개의 검색결과");
                        }
                    }
                },
                error: (xhr, textStatus, errorThrown) => {
                    alert("검색 실패했습니다.");
                }
            });
        }
        return false;
    });
}