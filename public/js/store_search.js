store_search = () => {
    let markers = [],
        str;

    let mapContainer = document.getElementById("map"),
        mapOption = {
            center: new kakao.maps.LatLng(37.549731, 127.069849),
            level: 9
        };

    let map = new kakao.maps.Map(mapContainer, mapOption);

    let clusterer = new kakao.maps.MarkerClusterer({
        map: map,
        averageCenter: true,
        minLevel: 5
    });

    let infowindow = new kakao.maps.InfoWindow({
        zIndex: 1
    });

    removeMarker = () => {
        for (let i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }

    displayMarker = (data) => {
        let marker = new kakao.maps.Marker({
            map: map,
            position: new kakao.maps.LatLng(data.lat, data.lng)
        });

        kakao.maps.event.addListener(marker, "click", () => {
            str = "<div style='padding:5px;font-size:12px;'>" + data.b_title + "<br>" + data.b_address + "<br></div>";
            infowindow.setContent(str);
            infowindow.open(map, marker);
        });
    }

    addMarker = () => {
        let bounds = new kakao.maps.LatLngBounds();

        for (let i = 0; i < data.length; i++) {
            displayMarker(data[i]);
            bounds.extend(new kakao.maps.LatLng(data[i].y, data[i].x));
        }
    }

    $.get("./bookstore.json", (data) => {
        let markers = $(data.positions).map((i, position) => {
            return new kakao.maps.Marker({
                position: new kakao.maps.LatLng(position.lat, position.lng)
            });
        });
        clusterer.addMarkers(markers);
    });

    $("body").load(() => {
        $.ajax({
            type: "GET",
            url: "./store_result.php",
            timeout: 10000,
            data: ({
                keyword: _keyword
            }),
            cache: false,
            dataType: "json",
            success: (data) => {
                if (data.length != 0) {
                    $.get(data, () => {
                        let markers = $(data).map((i, position) => {
                            return new kakao.maps.Marker({
                                position: new kakao.maps.LatLng(data.lat, data.lng)
                            });
                        });
                    })
                } else if (data.length == 0) {
                    alert("검색결과가 없습니다.");
                    $("#store_search p").html("<p>0개의 검색결과</p>");
                }
            },
            error: (xhr, textStatus, errorThrown) => {
                alert("검색 실패했습니다.");
            }
        });
    });

    $(".searchBtn").click(() => {
        let _keyword = $("#keyword").val();
        if (_keyword.length == 0) {
            alert("키워드를 입력해주세요.");
        } else {
            $.ajax({
                type: "GET",
                url: "./store_result.php",
                timeout: 10000,
                data: ({
                    keyword: _keyword
                }),
                cache: false,
                dataType: "json",
                beforeSend: (request) => {
                    $("#placesList li").remove();
                },
                success: (data) => {
                    if (data.length != 0) {
                        removeMarker();
                        let bounds = new kakao.maps.LatLngBounds();

                        for (let i = 0; i < data.length; i++) {
                            displayMarker(data[i]);
                            bounds.extend(new kakao.maps.LatLng(data[i].lat, data[i].lng));
                        }
                        map.setBounds(bounds);

                        $.each(data, (key, val) => {
                            str =  "<li>"+
                                        "<span id='title'>" + val.b_title + "</span>"+
                                        "<a class='Blike'>♥ " + val.b_like + "</a>"+
                                    "</li>"+
                                    "<li class='li2'>"+
                                        "<a class='Baddress'>" + val.b_address + "</a>"+
                                    "</li>";
                            $("#placesList").append(str);
                            $("#store_search p").html("<p>" + data.length + "개의 검색결과</p>");
                        });
                    } else if (data.length == 0) {
                        alert("검색결과가 없습니다.");
                        $("#store_search p").html("<p>0개의 검색결과</p>");
                    }
                },
                error: (xhr, textStatus, errorThrown) => {
                    alert("검색 실패했습니다.");
                }
            });
        }
        return false;
    });

    $(document).on("click", ".backBtn", () => {
        $("#menu_wrap>div, #menu_wrap>a").css("display", "none");
        $(".option").css("display", "block");
        $("#menu_wrap>p").css("display", "block");
        $(".result_hr").css("display", "block");
        $("#placesList").css("display", "block");
    });

    $('#placesList').on('click', '#title', function () {
        let _keyword = $(this).text();
        $.ajax({
            type: "GET",
            url: "./store_result.php",
            timeout: 10000,
            data: ({
                keyword: _keyword
            }),
            cache: false,
            dataType: "json",
            beforeSend: (request) => {
                $(".option").css("display", "none");
                $("#menu_wrap>p").css("display", "none");
                $(".result_hr").css("display", "none");
                $("#placesList").css("display", "none");
            },
            success: (data) => {
                if (data.length != 0) {
                    $.each(data, (key, val) => {
                        str =   "<div><img src='./public/img/store_search.png'></div>"+
                                "<div class='b_title'>" + val.b_title + "</div>"+
                                "<div class='b_address'><strong>주소</strong>" + val.b_address + "</div>"+
                                "<div class='b_connect'><strong>연락처</strong>" + val.b_connect +"</div>";
                        $("#menu_wrap").append(str);
                        if (val.b_site != null) {
                            str = "<a href='" + val.b_site + "'target='_blank'>"+
                                    "<img class='sns' src='./public/img/site_icon.png'>"+
                                  "</a>"
                            $("#menu_wrap").append(str);
                        }
                        if (val.b_insta != null) {
                            str = "<a href='" + val.b_insta + "'target='_blank'>"+
                                    "<img class='sns' src='./public/img/insta_icon.png'>"+
                                  "</a>"
                            $("#menu_wrap").append(str);
                        }
                        if (val.b_face != null) {
                            str = "<a href='" + val.b_face + "'target='_blank'>"+
                                    "<img class='sns' src='./public/img/face_icon.png'>"+
                                  "</a>"
                            $("#menu_wrap").append(str);
                        }
                        if (val.b_blog != null) {
                            str = "<a href='" + val.b_blog + "'target='_blank'>"+
                                    "<img class='sns' src='./public/img/blog_icon.png'>"+
                                  "</a>"
                            $("#menu_wrap").append(str);
                        }
                        $("#menu_wrap").append("<div><button class='backBtn'>뒤로가기</button></div>");
                    });
                }
            },
            error: (xhr, textStatus, errorThrown) => {
                alert("데이터 불러오는데 실패했습니다.");
            }
        });
        return false;
    });
}