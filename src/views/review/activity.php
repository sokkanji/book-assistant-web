<?php
require_once("../base/dbconfig.php");
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
    <include-html target="..\base\header.php" completed="headerCompleted"></include-html>

    <div id="activity">
        <h1>활동 기록하기</h1>
        <hr>
        <p>자신의 독립서점 또는 독립출판물 이야기를 공유해주세요 :)</p>

        <table>
            <thead>
                <tr>
                    <th class="table_row">번호</th>
                    <th class="title">제목</th>
                    <th class="table_row">작성자</th>
                    <th class="table_row">작성일</th>
                    <th class="table_row">조회수</th>
                </tr>
            </thead>

            <?php
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    echo "<script>console.log('1>>'+".$page.");</script>";
                }else{
                    $page = 1;
                }
    
    
                $sql = "SELECT * FROM activity";
                $result = mysqli_query($con, $sql);
                $num_row = mysqli_num_rows($result);
    
                $list = 10; 
                $block_ct = 5; 
    
                $block_num = ceil($page/$block_ct); 
                echo "<script>console.log('2>>'+".$page.");</script>";
                $block_start = (($block_num - 1) * $block_ct) + 1; 
                $block_end = $block_start + $block_ct - 1; 
    
                $total_page = ceil($num_row / $list); 
                if($block_end > $total_page) $block_end = $total_page; 
                $total_block = ceil($total_page/$block_ct); 
                $start_num = ($page-1) * $list;
    
                $sql2 = "SELECT * FROM activity ORDER BY a_no DESC LIMIT $start_num, $list";  
                $result = mysqli_query($con, $sql2);
                while($board = mysqli_fetch_array($result)){
                    $title=$board['a_title']; 
                        if(strlen($title)>30)
                        { 
                            $title=str_replace($board["a_title"], substr($board["a_title"], 0, 30) . "...", $board["a_title"]);
                        }
                    $sql3 = "SELECT * FROM activity WHERE a_no='".$board['a_no']."'";
                    $result3 = mysqli_query($con, $sql3);
                    $rep_count = mysqli_num_rows($result3);
            ?>

            <tbody>
                <tr>
                    <td class="num"><?php echo $board['a_no']?></td>
                    <td class="title"><a href="activity_read.php?a_no=<?php echo $board['a_no'];?>">
                            <?php echo $board['a_title']?></a></td>
                    <td><?php echo $board['u_name']?></td>
                    <td><?php echo $board['a_date']?></td>
                    <td><?php echo $board['a_hit']?></td>
                </tr>
            </tbody>

            <?php } ?>

        </table>

        <div class="activity_btn"><a href="activity_write_html.php">글쓰기</a></div>

        <!-- page part -->
        <div class="page">
            <ul>
                <?php
                for($i=$block_start; $i<=$block_end; $i++){ 
                    if($page == $i){ 
                    echo "<li class='page_num'>[$i]</li>"; 
                    }else{
                    echo "<li><a href='?page=$i'>[$i]</a></li>"; 
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <include-html target="..\base\footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();</script>
</body>

</html>