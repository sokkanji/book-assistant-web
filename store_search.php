<?php
require_once("./dbconfig.php");
?>
<html>

<head>
    <link rel="shortcut icon" href="./public/img/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="./public/img/favicon.ico" type="image/x-icon" />

    <title>책잡이</title>

    <link rel="stylesheet" href="./public/css/base_css/reset.css">
    <link rel="stylesheet" href="./public/css/base_css/header.css">
    <link rel="stylesheet" href="./public/css/base_css/footer.css">
    <link rel="stylesheet" href="./public/css/serach_css/store_search.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./src/js/includeHtml.js"></script>
    <script type="text/javascript" src="./src/js/completed.js"></script>
</head>

<body>
    <include-html target="./header.php" completed="headerCompleted"></include-html>

    <div id="store_search">
        <h1>독립서점 검색</h1>
        <hr>
        <script type="text/javascript"
            src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8db120071616bb6456be718062f2b41e&libraries=services,clusterer"></script>

        <div class="map_wrap">
            <div id="map" style="width:100%;height:100%;position:relative;overflow:hidden;"></div>

            <div id="menu_wrap" class="bg_white">
                <div class="option">
                    <input type="text" placeholder="순정책방 (독립서점 이름)" id="keyword" name="keyword">
                    <button name="searchBtn" class="searchBtn">검색</button>
                    <button class="selectBtn">세부선택</button>

                    <select name="catgo">
                        <option value="a_title" selected>최신
                        <option value="u_name">인기
                    </select>
                </div>
                <p>
                    <?php
                        $sql = "SELECT * FROM bookstore";  
                        $result = mysqli_query($con, $sql);
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        $total = mysqli_num_rows($result);
                        echo $total;
                    ?>개의 독립서점
                </p>
                <hr class="result_hr">
                <ul id="placesList">
                    <?php                                
                        while($board = mysqli_fetch_array($result)){
                    ?>
                    <li><span id="title"><?php echo $board['b_title']; ?></span>
                        <a class="Blike">♥ <?php echo $board['b_like'];?></a></li>
                    <li class="li2">
                        <a class="Baddress"><?php echo $board['b_address'];?></a></li>
                    <?php   
                        }
                    ?>
                </ul>
                <div id="pagination"></div>
            </div>
        </div>

        <script>
            // let lat, lng;
            // let idx = 0;

            $(".searchBtn").click(function () {
                let _keyword = $("#keyword").val();
                if (_keyword.length == 0) {
                    alert("키워드를 입력해주세요.");
                } else {
                    $.ajax({
                        type: "GET",
                        url: "./store_result.php",
                        timeout: 10000,
                        data: ({ keyword: _keyword }),
                        cache: false,
                        dataType: "json",
                        success: function (data) {
                            // console.log(data.length);
                            $('#placesList li').remove();
                            if (data.length != 0) {
                                $.each(data, function (key, val) {
                                    $('#placesList').append(
                                        '<li><span id="title">' + val.b_title + '</span><a class="Blike">♥ ' + val.b_like + '</a></li><li class="li2"><a class="Baddress">' + val.b_address + '</a></li>');
                                    $('#store_search p').html('<p>' + data.length + '개의 검색결과</p>');
                                });
                            } else if (data.length == 0) {
                                alert('검색결과가 없습니다.');
                                $('#store_search p').html('<p>0개의 검색결과</p>');
                            }
                        },
                        error: function (xhr, textStatus, errorThrown) {
                            alert("검색 실패했습니다.");
                        }
                    });
                }
                return false;
            });

            //독립서점 li 클릭하면~
            $('#placesList').on('click', '#title', function () {
                let _keyword = $(this).text();
                // alert(_keyword);
                $.ajax({
                    type: "GET",
                    url: "./store_result.php",
                    timeout: 10000,
                    data: ({ keyword: _keyword }),
                    cache: false,
                    dataType: "json",
                    success: function (data) {
                        $('.option').remove();
                        $('#menu_wrap>p').remove();
                        $('.result_hr').remove();
                        $('#placesList').remove();
                        if (data.length != 0) {
                            $.each(data, function (key, val) {
                                $('#menu_wrap').append(
                                    '<div><img src="./public/img/store_search.png"></div><div class="b_title">'+val.b_title
                                    +'</div><div class="b_address">주소 '+val.b_address
                                    +'</div><div class="b_connect">연락처 '+val.b_connect
                                    +'</div><div class="intro">소개 '+val.intro
                                    );
                                if(val.b_site!=null){
                                    $('#menu_wrap').append('<a href="'+val.b_site+'" target="_blank"><img class="sns" src="./public/img/site_icon.png"></a>');
                                }

                                if(val.b_insta!=null){
                                    $('#menu_wrap').append('<a href="'+val.b_insta+'" target="_blank"><img class="sns" src=".public/img/insta_icon.png"></a>');
                                }

                                if(val.b_face!=null){
                                    $('#menu_wrap').append('<a href="'+val.b_face+'" target="_blank"><img class="sns" src="./public/img/face_icon.png"></a>');
                                }
                                if(val.b_blog!=null){
                                    $('#menu_wrap').append('<a href="'+val.b_blog+'" target="_blank"><img class="sns" src="./public/img/blog_icon.png"></a>');
                                }

                                $('#menu_wrap').append('<button class="backBtn">검색</button>');
                            });
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert("독립서점 데이터 불러오는데 실패했습니다.");
                    }
                });
                return false;
            });

            
            // $('.backBtn').on('click', '#title', function () {
            // });


            var markers = [];

            var mapContainer = document.getElementById('map'),
                mapOption = {
                    center: new kakao.maps.LatLng(37.566826, 126.9786567),
                    level: 3
                };

            var map = new kakao.maps.Map(mapContainer, mapOption);


            // 검색 결과 목록과 마커를 표출하는 함수입니다
            // function displayPlaces(places) {

            //     var listEl = document.getElementById('placesList'), 
            //     menuEl = document.getElementById('menu_wrap'),
            //     fragment = document.createDocumentFragment(), 
            //     bounds = new kakao.maps.LatLngBounds(), 
            //     listStr = '';

            //     // 검색 결과 목록에 추가된 항목들을 제거합니다
            //     removeAllChildNods(listEl);

            //     // 지도에 표시되고 있는 마커를 제거합니다
            //     removeMarker();

            //     for ( var i=0; i<places.length; i++ ) {

            //         // 마커를 생성하고 지도에 표시합니다
            //         var placePosition = new kakao.maps.LatLng(places[i].y, places[i].x),
            //         position = new kakao.maps.LatLng(position.lat, position.lng),
            //             marker = addMarker(placePosition), 
            //             itemEl = getListItem(i, places[i]); // 검색 결과 항목 Element를 생성합니다
            //         // 검색된 장소 위치를 기준으로 지도 범위를 재설정하기위해
            //         // LatLngBounds 객체에 좌표를 추가합니다
            //         bounds.extend(placePosition);

            //         // 마커와 검색결과 항목에 mouseover 했을때
            //         // 해당 장소에 인포윈도우에 장소명을 표시합니다
            //         // mouseout 했을 때는 인포윈도우를 닫습니다
            //         (function(marker, title) {
            //             kakao.maps.event.addListener(marker, 'mouseover', function() {
            //                 displayInfowindow(marker, title);
            //             });

            //             kakao.maps.event.addListener(marker, 'mouseout', function() {
            //                 infowindow.close();
            //             });

            //             itemEl.onmouseover =  function () {
            //                 displayInfowindow(marker, title);
            //             };

            //             itemEl.onmouseout =  function () {
            //                 infowindow.close();
            //             };
            //         })(marker, places[i].place_name);

            //         fragment.appendChild(itemEl);
            //     }

            //     // 검색결과 항목들을 검색결과 목록 Elemnet에 추가합니다
            //     listEl.appendChild(fragment);
            //     menuEl.scrollTop = 0;

            //     // 검색된 장소 위치를 기준으로 지도 범위를 재설정합니다
            //     map.setBounds(bounds);
            // }


            // 마커를 생성하고 지도 위에 마커를 표시하는 함수입니다
            // function addMarker(position) {

            //             marker = new kakao.maps.Marker({
            //             position: position, // 마커의 위치
            //         });

            //     marker.setMap(map); // 지도 위에 마커를 표출합니다
            //     markers.push(marker);  // 배열에 생성된 마커를 추가합니다

            //     return marker;
            // }

            // 마커 클러스터러를 생성합니다 
            var clusterer = new kakao.maps.MarkerClusterer({
                map: map, // 마커들을 클러스터로 관리하고 표시할 지도 객체 
                averageCenter: true, // 클러스터에 포함된 마커들의 평균 위치를 클러스터 마커 위치로 설정 
                minLevel: 10 // 클러스터 할 최소 지도 레벨 
            });


            // 데이터를 가져와 마커를 생성하고 클러스터러 객체에 넘겨줍니다
            $.get("./bookstore.json", function (data) {
                // 데이터에서 좌표 값을 가지고 마커를 표시합니다
                // 마커 클러스터러로 관리할 마커 객체는 생성할 때 지도 객체를 설정하지 않습니다
                var markers = $(data.positions).map(function (i, position) {
                    return new kakao.maps.Marker({
                        position: new kakao.maps.LatLng(position.lat, position.lng)
                    });
                });

                // // 마커가 지도 위에 표시되도록 설정합니다
                // markers.setMap(map);

                // var iwContent = '<div style="padding:5px;">Hello World! <br><a href="https://map.kakao.com/link/map/Hello World!,33.450701,126.570667" style="color:blue" target="_blank">큰지도보기</a> <a href="https://map.kakao.com/link/to/Hello World!,33.450701,126.570667" style="color:blue" target="_blank">길찾기</a></div>', // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
                //     iwPosition = new kakao.maps.LatLng(position.lat, position.lng); //인포윈도우 표시 위치입니다

                // // 인포윈도우를 생성합니다
                // var infowindow = new kakao.maps.InfoWindow({
                //     position : iwPosition, 
                //     content : iwContent 
                // });
                
                // // 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
                // infowindow.open(map, markers); 

                // 클러스터러에 마커들을 추가합니다
                clusterer.addMarkers(markers);
            });

        </script>
    </div>
    <include-html target="./footer.html" completed="footerCompleted"></include-html>


    <script>includeHtml();</script>
</body>

</html>