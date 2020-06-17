<?php
require_once("../base/dbconfig.php");
$keyword = $_GET['keyword'];
?>

<html>

<head>
    <title>책잡이</title>

    <link rel="stylesheet" href="..\..\..\public\css\base_css\reset.css">
    <link rel="stylesheet" href="..\..\..\public\css\base_css\header.css">
    <link rel="stylesheet" href="..\..\..\public\css\base_css\footer.css">
    <link rel="stylesheet" href="..\..\..\public\css\find_css\store_search.css">
    <link rel="stylesheet" href="..\..\..\public\fonts\font.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="..\..\js\includeHtml.js"></script>
    <script type="text/javascript" src="..\..\js\completed.js"></script>
</head>

<body>
    <include-html target="..\base\header.php" completed="headerCompleted"></include-html>

    <div id="store_search">
        <h1>독립서점 검색</h1>
        <hr>
        <script type="text/javascript"
            src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8db120071616bb6456be718062f2b41e&libraries=services,clusterer"></script>

        <div class="map_wrap">
            <div id="map" style="width:100%;height:100%;position:relative;overflow:hidden;"></div>

            <div id="menu_wrap" class="bg_white">
                <div class="option">
                    <div>
                        <form method="get" action="store_result.php">
                            <input type="text" placeholder="독립서점 또는 독립출판물 이름" value="<?php echo $keyword; ?>" id="keyword" name="keyword"
                                size="15">
                            <button type="submit">검색</button>
                          
                        </form>
                        <button class="selectBtn">세부선택</button>
                        <select name="catgo">
                            <option value="a_title" selected>최신
                            <option value="u_name">인기
                        </select>
                    </div>
                </div>
                <p>
                <?php
                    $sql = "SELECT * FROM bookstore WHERE b_title LIKE '%$keyword%'";  
                    $result = mysqli_query($con, $sql);
                    if (mysqli_connect_errno()){
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $total = mysqli_num_rows($result);
                    echo $total;
                ?>개의 검색결과</p>

                <hr class="result_hr">
                <ul id="placesList">
                <?php                                
                    if(mysqli_num_rows($result) == 0){
                        echo "<script>alert('검색결과가 없습니다.');</script>";
                        return;
                    } else{
                        while($board = mysqli_fetch_array($result)){
                ?>      
                        <li><a><?php echo $board['b_title']; ?></a><a style="float:right; font-size:12px; font-family:NotoSansKR-Light;"><?php echo $board['like'];?>명이 좋아합니다.</a></li> 
                        <li><a><?php echo $board['b_address']; ?></a></li> 
                <?php   }
                    }
                ?>
                </ul>
            </div>
        </div>

        <script>

            var markers = [];

            var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
                mapOption = {
                    center: new kakao.maps.LatLng(37.566826, 126.9786567), // 지도의 중심좌표
                    level: 3 // 지도의 확대 레벨
                };

            // 지도를 생성합니다    
            var map = new kakao.maps.Map(mapContainer, mapOption);

            // 장소 검색 객체를 생성합니다
            var ps = new kakao.maps.services.Places();

            // 검색 결과 목록이나 마커를 클릭했을 때 장소명을 표출할 인포윈도우를 생성합니다
            var infowindow = new kakao.maps.InfoWindow({ zIndex: 1 });

            //검색 결과 목록과 마커를 표출하는 함수입니다
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
            //         var placePosition = new kakao.maps.LatLng(test, test2),
            //             marker = addMarker(placePosition); // 검색 결과 항목 Element를 생성합니다
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

            // 검색결과 항목을 Element로 반환하는 함수입니다
            // function getListItem(index, places) {

            //     var el = document.createElement('li'),
            //     itemStr = '<span class="markerbg marker"></span>' +
            //                 '<div class="info">' +
            //                 '   <h5>' + places.place_name + '</h5>';

            //     if (places.road_address_name) {
            //         itemStr += '    <span>' + places.road_address_name + '</span>' +
            //                     '   <span class="jibun gray">' +  places.address_name  + '</span>';
            //     } else {
            //         itemStr += '    <span>' +  places.address_name  + '</span>'; 
            //     }

            //     itemStr += '  <span class="tel">' + places.phone  + '</span>' +
            //                 '</div>';           

            //     el.innerHTML = itemStr;
            //     el.className = 'item';

            //     return el;
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

            // 지도 위에 표시되고 있는 마커를 모두 제거합니다
            // function removeMarker() {
            //     for ( var i = 0; i < markers.length; i++ ) {
            //         markers[i].setMap(null);
            //     }   
            //     markers = [];
            // }


            // 검색결과 목록 또는 마커를 클릭했을 때 호출되는 함수입니다
            // // 인포윈도우에 장소명을 표시합니다
            // function displayInfowindow(marker, title) {
            //     var content = '<div style="padding:5px;z-index:1;">' + title + '</div>';

            //     infowindow.setContent(content);
            //     infowindow.open(map, marker);
            // }

            // // 검색결과 목록의 자식 Element를 제거하는 함수입니다
            // function removeAllChildNods(el) {
            //     while (el.hasChildNodes()) {
            //         el.removeChild(el.lastChild);
            //     }
            // }

            // 마커 클러스터러를 생성합니다 
            var clusterer = new kakao.maps.MarkerClusterer({
                map: map, // 마커들을 클러스터로 관리하고 표시할 지도 객체 
                averageCenter: true, // 클러스터에 포함된 마커들의 평균 위치를 클러스터 마커 위치로 설정 
                minLevel: 10 // 클러스터 할 최소 지도 레벨 
            });

            // 데이터를 가져오기 위해 jQuery를 사용합니다
            // 데이터를 가져와 마커를 생성하고 클러스터러 객체에 넘겨줍니다
            $.get("./bookstore.json", function (data) {
                // 데이터에서 좌표 값을 가지고 마커를 표시합니다
                // 마커 클러스터러로 관리할 마커 객체는 생성할 때 지도 객체를 설정하지 않습니다
                var markers = $(data.positions).map(function (i, position) {
                    return new kakao.maps.Marker({
                        position: new kakao.maps.LatLng(position.lat, position.lng)
                    });
                });

                // 클러스터러에 마커들을 추가합니다
                clusterer.addMarkers(markers);
            });

        </script>
    </div>
    <include-html target="..\base\footer.html" completed="footerCompleted"></include-html>


    <script>includeHtml();</script>
</body>

</html>