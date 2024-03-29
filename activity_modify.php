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
    <link rel="stylesheet" href="./public/css/review_css/activity_modify.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>
    <div id="activity_modify">
        <h1>활동 기록하기</h1>
        <hr>

        <?php
            $sql = "SELECT * FROM activity WHERE a_no = '".$_GET['a_no']."'";
            $result = mysqli_query($con, $sql);
            $activity = mysqli_fetch_array($result);

            echo "<script>alert(" . $activity["a_title"] . ");</script>";
            if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        ?>

        <form method="post" action="./activity_modifyOk.php?a_no=<?php echo $_GET['a_no'];?>">
            <table>
                <tr>
                    <td>
                        <div class="activity_write_title">제목</div>
                        <input type="text" value="<?php echo $activity['a_title']?>" name="a_title">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="activity_write_contents">내용</div>
                        <textarea rows="14" cols="100" name="a_content"><?php echo $activity["a_content"]?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>사진</div>
                        <input type="file" class="image_input" accept="img/*" multiple>
                        <button class="photo_btn">사진업로드</botton>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="activity_modify_btn">수정하기</button>
                    </td>
                </tr>
            </table>
    </div>
    <?php 
        require "./footer.php"; 
    ?>

    <script>
        headerCompleted();
    </script>
</body>

</html>