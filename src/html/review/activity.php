<?php
    require_once("..\..\php\dbconfig.php");
?>

<html>

<head>
    <title>책잡이</title>

    <link rel="stylesheet" href="..\..\..\public\css\reset.css">
    <link rel="stylesheet" href="..\..\..\public\css\header.css">
    <link rel="stylesheet" href="..\..\..\public\css\footer.css">
    <link rel="stylesheet" href="..\..\..\public\css\activity.css">
    <link rel="stylesheet" href="..\..\..\public\fonts\font.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="..\..\js\includeHtml.js"></script>
    <script type="text/javascript" src="..\..\js\completed.js"></script>
</head>

<body>
    <include-html target="..\base\header.html" completed="headerCompleted"></include-html>

    <div id="activity">
        <h1>활동 기록하기</h1>
        <hr>
        <p>자신의 독립서점 또는 독립출판물 이야기를 공유해주세요 :)</p>

        <table>
            <thead>
                <tr>
                    <th>번호</th>
                    <th class="title">제목</th>
                    <th>작성자</th>
                    <th>날짜</th>
                </tr>
            </thead>

            <?php
                $sql = 'SELECT a_title, a_id, a_date, a_no FROM activity ORDER BY a_no DESC LIMIT 0, 10;';
                $result = mysqli_query($con, $sql);
                while($board = mysqli_fetch_array($result)){
            ?>

            <tbody>
                <tr>
                    <td class="num"><?php echo $board['a_no']?></td>
                    <td class="title"><a herf=#><?php echo $board['a_title']?></a></td>
                    <td><?php echo $board['a_id']?></td>
                    <td><?php echo $board['a_date']?></td>
                </tr>
            </tbody>

            <?php } ?>

        </table>

        <div class="activity_btn"><a href="activity_write.html">글쓰기</a></div>
    </div>

    <include-html target="..\base\footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();</script>
</body>

</html>