<?php
require_once("../base/dbconfig.php");
?>

<html>

<head>
    <title>책잡이</title>

    <link rel="stylesheet" href="..\..\..\public\css\reset.css">
    <link rel="stylesheet" href="..\..\..\public\css\header.css">
    <link rel="stylesheet" href="..\..\..\public\css\footer.css">
    <link rel="stylesheet" href="..\..\..\public\css\activity_read.css">
    <link rel="stylesheet" href="..\..\..\public\fonts\font.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="..\..\js\includeHtml.js"></script>
    <script type="text/javascript" src="..\..\js\completed.js"></script>
</head>

<body>
    <include-html target="..\base\header.php" completed="headerCompleted"></include-html>

    <div id="activity_read">
        <h1>활동 기록하기</h1>
        <hr>

        <?php
        $sql = "UPDATE activity SET a_hit = a_hit + 1 WHERE a_no = '".$_GET['a_no']."'";
        $result = mysqli_query($con, $sql);

        $sql = "SELECT * FROM activity WHERE a_no= '".$_GET['a_no']."' ";
        $result = mysqli_query($con, $sql);
        $activity = mysqli_fetch_array($result);
        ?>

        <h2><?php echo $activity['a_title']?></h2>
        <table>
            <tr>
                <td class="r_th">작성일</td>
                <td class="r_td"><?php echo $activity['a_date']?></td>
            </tr>
            <tr>
                <td class="r_th">조회수</td>
                <td class="r_td"><?php echo $activity['a_hit']?></td>
            </tr>
        </table>

        <div class="r_content"><?php echo $activity['a_content']?></div>
        
        <div class="activity_list_btn"><a href="activity.php">목록</a></div>
        <div class="activity_list_btn"><a href="activity.php">삭제</a></div>
        <div class="activity_list_btn"><a href="activity.php">수정</a></div>
    </div>

    <include-html target="..\base\footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();</script>
</body>

</html>