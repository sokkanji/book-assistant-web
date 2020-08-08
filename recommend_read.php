<?php
    session_start();
    require_once("./dbconfig.php");
        $sql = "SELECT * FROM book_search WHERE b_no= '".$_GET['b_no']."' ";
        $result = mysqli_query($con, $sql);

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $book = mysqli_fetch_array($result);
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
    <link rel="stylesheet" href="./public/css/recommend_css/recommend_read.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="recommend_read">
        <h1>독립출판물 추천</h1>
        <hr>
        <div class="bookdetail_wr">
            <div class="info_top">
                <h3><?php echo $book["b_title"]?></h3>
                <p><a href="./recommend.php">목록</a></p>
            </div>

            <div style="position: relative;">
                <div class="detail_left">
                    <div class="dt_box01">
                        <p>
                            <img src="./public/img/<?php echo $book["img"];?>">
                        </p>
                        <ul>
                            <li>
                                <span>저자</span>
                                <strong>
                                    <?php 
                                        echo $book["writer"];
                                    ?>
                                </strong>
                            </li>
                            <li>
                                <span>출판사</span>
                                <strong>
                                    <?php 
                                        if(!isset($book["publisher"])) { 
                                            echo "<strong>--</strong></li>";
                                        }
                                        else{
                                            echo $book["publisher"];
                                        }
                                    ?>
                                </strong>
                            </li>
                            <li>
                                <span>ISBN</span>
                                <strong>
                                    <?php 
                                    if(!isset($book["ISBN"])) { 
                                        echo "<strong>--</strong></li>";
                                    }
                                    else{
                                        echo $book["ISBN"];
                                    }
                                    ?>
                                </strong>
                            </li>
                            <li>
                                <span>페이지</span>
                                <strong>
                                    P<?php echo $book["page"];?>
                                </strong>
                            </li>
                            <li>
                                <span>판매가</span>
                                <strong>
                                    <?php echo number_format($book["price"]);?>
                                </strong>
                            </li>
                            <li>
                                <span>판매서점</span>
                                <strong>
                                    <a href="<?php echo $book["url"];?>"
                                        style="color:#6B5AE4;"><?php echo $book["bookstore"];?></a>
                                </strong>
                            </li>
                        </ul>
                    </div>
                    <div class="dt_box02">
                        <h3>책소개</h3>
                        <p><?php echo $book["intro"];?></p>
                    </div>
                </div>

                <div class="detail_right">
                    <div class="smae_box">
                        <h3>다른 독립출판물</h3>
                        <ul>
                            <?php 
                                $sql = "SELECT * FROM book_search WHERE NOT(b_no = '".$_GET['b_no']."' OR b_no in (1, 4))";
                                
                                $result = mysqli_query($con, $sql);
                                
                                if (mysqli_connect_errno()){
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }
                                $i=0;
                                while($i<4){
                                    $board = mysqli_fetch_array($result);
                                    
                                    $title=$board["b_title"]; 
                                    if(strlen($title)>10)
                                    { 
                                        $title=str_replace($board["b_title"], iconv_substr($board["b_title"], 0, 10, "utf-8") . "...", $board["b_title"]);
                                    }     
                                $i++;
                            ?>
                            <li>
                                <p><a href="./recommend_read.php?b_no=<?php echo $board["b_no"];?>"><img
                                            src="./public/img/<?php echo $board['img'];?>"></a></p>
                                <dl>
                                    <dt><?php echo $title;?></dd>
                                    <dd><?php echo $board["writer"];?></dd>
                                    <dd><?php echo $board["publisher"];?></dd>
                                    <dd><?php echo $board["ISBN"];?></dd>
                                </dl>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require "./footer.php"; 
    ?>

    <script>
        headerCompleted();
    </script>
</body>

</html>