<?php
require_once("./dbconfig.php");
?>
<!DOCTYPE html>
<html>

<meta charset="UTF-8">

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
            </div>
        </div>

        <script>

            // 마커 클러스터러를 생성합니다 
            var clusterer = new kakao.maps.MarkerClusterer({
                map: map, // 마커들을 클러스터로 관리하고 표시할 지도 객체 
                averageCenter: true, // 클러스터에 포함된 마커들의 평균 위치를 클러스터 마커 위치로 설정 
                minLevel: 10 // 클러스터 할 최소 지도 레벨 
            });
            
            $("body").load(function () {
        
                $.ajax({
                    type: "GET",
                    url: "./store_result.php",
                    timeout: 10000,
                    data: ({ keyword: _keyword }),
                    cache: false,
                    dataType: "json",
                    success: function (data) {
                        if (data.length != 0) {
                            $.get(data, ()=>{
                            // 데이터에서 좌표 값을 가지고 마커를 표시합니다
                            // 마커 클러스터러로 관리할 마커 객체는 생성할 때 지도 객체를 설정하지 않습니다
                                var markers = $(data).map(function (i, position) {
                                    return new kakao.maps.Marker({
                                    position: new kakao.maps.LatLng(data.lat, data.lng)
                                    });
                                });
                            })
                        } else if (data.length == 0) {
                            alert('검색결과가 없습니다.');
                                $('#store_search p').html('<p>0개의 검색결과</p>');
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert("검색 실패했습니다.");
                    }
                });
             });


            // 지도 위에 표시되고 있는 마커를 모두 제거합니다
            function removeMarker() {
                for ( var i = 0; i < markers.length; i++ ) {
                    markers[i].setMap(null);
                }   
                markers = [];
            }

            var infowindow = new kakao.maps.InfoWindow({zIndex:1});

            function displayMarker(data) {
    
                // 마커를 생성하고 지도에 표시합니다
                var marker = new kakao.maps.Marker({
                    map: map,
                    position: new kakao.maps.LatLng(data.lat, data.lng) 
                });
                
                // 마커에 클릭이벤트를 등록합니다
                kakao.maps.event.addListener(marker, 'click', function() {
                    // 마커를 클릭하면 장소명이 인포윈도우에 표출됩니다
                    infowindow.setContent('<div style="padding:5px;font-size:12px;">' + data.b_title + '<br>'+data.b_address+'<br></div>');
                    infowindow.open(map, marker);
                });
            }


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
                            $('#placesList li').remove();
                            if (data.length != 0) {
                                removeMarker();
                                var bounds = new kakao.maps.LatLngBounds();

                                for (var i=0; i<data.length; i++) {
                                    displayMarker(data[i]);    
                                    bounds.extend(new kakao.maps.LatLng(data[i].lat, data[i].lng));
                                }       
                                map.setBounds(bounds);

                                console.log(data[0].lat);

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

            $(document).on("click",".backBtn",function(){
              $("#menu_wrap>div, #menu_wrap a").remove();
              $("")
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

                                $('#menu_wrap').append('<div><button class="backBtn">뒤로가기</button></div>');
                            });
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert("데이터 불러오는데 실패했습니다.");
                    }
                });
                return false;
            });

            var markers = [];

            var mapContainer = document.getElementById('map'),
                mapOption = {
                    center: new kakao.maps.LatLng(37.566826, 126.9786567),
                    level: 3
                };

            var map = new kakao.maps.Map(mapContainer, mapOption);

            addMarker=()=>{
                var bounds = new kakao.maps.LatLngBounds();

                for (var i=0; i<data.length; i++) {
                    displayMarker(data[i]);    
                    bounds.extend(new kakao.maps.LatLng(data[i].y, data[i].x));
                }       
                console.log('data[i]>>'+data[i]);
            }



        </script>
    </div>
    <include-html target="./footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();
        console.log("%c안녕하세요:) 혹시 오류를 발견하거나 피드백을 주고 싶으시다면, sskkanji@gmail.com로 메일을 주시면 정말 감사합니다! 많이 미숙하지만, 저의 Github는 https://github.com/sokkanji 입니다@.@", "font-size: 15px; font-weight: 700; font-family: 'NotoSansKR-Bold'; color: #6B5AE4;");
    </script>
</body>

</html>