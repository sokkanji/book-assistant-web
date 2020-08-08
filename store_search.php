<?php
    session_start();
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
    <script type="text/javascript" src="./public/js/completed.js"></script>
    <script type="text/javascript" src="./public/js/store_search.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="store_search">
        <h1>독립서점 검색</h1>
        <hr>
        <script type="text/javascript"
            src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8db120071616bb6456be718062f2b41e&libraries=services,clusterer">
        </script>

        <div class="map_wrap">
            <div id="map" style="width:100%;height:100%;position:relative;overflow:hidden;"></div>

            <div id="menu_wrap" class="bg_white">
                <div class="option">
                    <input type="text" placeholder="순정책방(독립서점 이름)" id="keyword" name="keyword">
                    <button name="searchBtn" class="searchBtn">검색</button>
                    <!-- <button class="selectBtn">세부선택</button> -->

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
                    <li><span id="title"><?php echo $board["b_title"]; ?></span>
                        <a class="Blike">♥ <?php echo $board["b_like"];?></a></li>
                    <li class="li2">
                        <a class="Baddress"><?php echo $board["b_address"];?></a></li>
                    <?php   
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php 
        require "./footer.php"; 
    ?>

    <script>
        headerCompleted();
        store_search();
    </script>
</body>

</html>