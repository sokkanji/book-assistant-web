<?php 
require_once("./dbconfig.php");
$catagory = $_GET['catgo'];
$search_con = $_GET['search'];
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
    <link rel="stylesheet" href="./public/css/review_css/activity.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./src/js/includeHtml.js"></script>
    <script type="text/javascript" src="./src/js/completed.js"></script>
</head>

<body>
  <include-html target="./header.php" completed="headerCompleted"></include-html>

  <div id="activity">
    <h1>‘<?php echo $search_con; ?>’&nbsp검색결과</h1>
    <hr>
    <p></p>

      <form method="get" action="./activity_search.php">
        <select name="catgo">
          <option value="a_title">제목</option>
          <option value="u_name">작성자</option>
        </select>
        <input type="text" name="search" size="40" required="required"><button>검색</button>
      </form>

    <table>
      <thead>
        <tr>
          <th class="table_row">번호</th>
          <th class="title">제목</th>
          <tH class="table_row">글쓴이</tH>
          <th class="table_row">작성일</th>
          <th class="table_row">조회수</th>
        </tr>
      </thead>
  
      <?php

          $sql2 = "SELECT * FROM activity WHERE $catagory LIKE '%$search_con%' ORDER BY a_no DESC";
          $result = mysqli_query($con, $sql2);
          if (mysqli_connect_errno()){
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          while($board = mysqli_fetch_array($result)){
           
          $title=$board['a_title']; 
          if(strlen($title)>30)
            {        
              $title=str_replace($board['a_title'], iconv_substr($board['a_title'], 0, 25, 'utf-8') . '...', $board['a_title']);
            }
          $sql3 = "SELECT * FROM activity WHERE a_no =" . $board['a_no'];
        ?>
      <tbody>
        <tr>
          <td class="num"><?php echo $board['a_no']; ?></td>
          <td><a href="./activity_read.php?a_no=<?php echo $board['a_no'];?>">
                          <?php echo $title?></a></td>
          <td><?php echo $board['u_name']?></td>
          <td><?php echo $board['a_date']?></td>
          <td><?php echo $board['a_hit']; ?></td>
        </tr>
      </tbody>

      <?php } ?>
    </table>
  </div>

  <include-html target="./footer.html" completed="footerCompleted"></include-html>

  <script>includeHtml();
        console.log("%c안녕하세요:) 혹시 오류를 발견하거나 피드백을 주고 싶으시다면, sskkanji@gmail.com로 메일을 주시면 정말 감사합니다! 많이 미숙하지만, 저의 Github는 https://github.com/sokkanji 입니다@.@", "font-size: 15px; font-weight: 700; font-family: 'NotoSansKR-Bold'; color: #6B5AE4;");
</script>
</body>

</html>