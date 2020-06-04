<?php
require_once("../base/dbconfig.php");
?>
<html>

<meta charset="UTF-8">
<meta name="author" content="MinjiSo">
<meta name="generator" content="vscode">

<title>책잡이</title>

<!-- <link rel="shortcut icon" href="http:// /favicon.ico" type="image/x-icon" />
    <link rel="icon" href="http:// /favicon.ico" type="image/x-icon" /> -->
<!-- test http:// /favicon.ico -->

<link rel="stylesheet" href="..\..\..\public\css\base_css\reset.css">
<link rel="stylesheet" href="..\..\..\public\css\base_css\header.css">
<link rel="stylesheet" href="..\..\..\public\css\base_css\index.css">
<link rel="stylesheet" href="..\..\..\public\css\base_css\footer.css">
<link rel="stylesheet" href="..\..\..\public\fonts\font.css">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="..\..\js\includeHtml.js"></script>
<script type="text/javascript" src="..\..\js\completed.js"></script>
</head>

<body>
    <include-html target="header.php" completed="headerCompleted"></include-html>
    <div id="contents">
        <div class="slide">
            <ul>
                <li><img src="..\..\..\public\img\b4.jpg" class="bookstore-img" alt="책잡이배경4"></li>
                <li><img src="..\..\..\public\img\b2.jpg" class="bookstore-img2" alt="책잡이배경2"></li>
                <li><img src="..\..\..\public\img\b3.jpg" class="bookstore-img3" alt="책잡이배경3"></li>
                <li><img src="..\..\..\public\img\b1.jpg" class="bookstore-img4" alt="책잡이배경1"></li>
            </ul>
        </div>

        <div class="direct">
            <ul>
                <li class="t1"><a href="..\base\introduce.html">
                    <strong><img src="..\..\..\public\img\icon1.png" class="bookstore-img" alt="소개아이콘"></strong>
                <span>책잡이 소개<br>바로가기</span></a></li>
                <li class="t2"><a href="..\find\book_search.php">
                    <strong><img src="..\..\..\public\img\icon2.png" class="bookstore-img" alt="찾기아이콘"></strong>
                <span>독립서점<br>검색 하러가기</span></a></li>
                <li class="t3"><a href="..\find\book_test.html">
                    <strong><img src="..\..\..\public\img\icon3.png" class="bookstore-img" alt="테스트아이콘"></strong>
                    <span>인생책 테스트<br> 하러가기</span></a></li>
            </ul>
        </div>

        <div class="recommend1">
            <h3>독립출판물 추천</h3>
            <a class="puls" href="..\news\recommend.html">더보기 +</a>
            <ul>
                <li>
                    <dl>
                        <dt><a herf="#"><img src="..\..\..\public\img\book5.png" class="web" alt="모든 시도는 따뜻할 수밖에"></img></a></dt>
                        <dd>모든 시도는 따뜻할 수밖에</dd>
                        <dd>(이내)</dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><a herf="#"><img src="..\..\..\public\img\book2.jpg" class="web" alt="느려도 괜찮아 여기는"></a></dt>
                        <dd>느려도 괜찮아 여기는</dd>
                        <dd>(어다은)</dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><a herf="#"><img src="..\..\..\public\img\book3.png" class="web" alt="도쿄규림일기"></img></a></dt>
                        <dd>도쿄규림일기<br></dd>
                        <dd>(김규림)</dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><a herf="#"><img src="..\..\..\public\img\book4.jpg" class="web" alt="이슬아수필집"></img></a></dt>
                        <dd>이슬아수필집</dd>
                        <dd>(이슬아)</dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><a herf="#"><img src="..\..\..\public\img\book6.jpg" class=" web" alt="저 청소일 하는데요."></img></a></dt>
                        <dd>저 청소일 하는데요.</dd>
                        <dd>(코피루왁)</dd>
                    </dl>
                </li>
            </ul>     
        </div>

        <div class="recommend2">
        <h3>독립서점 웹사이트 구경가기</h3>
            <a class="puls" href="..\news\watching.html">더보기 +</a>
            <ul>
                <li>
                    <dl>
                        <dt><a href="http://www.your-mind.com/" target="_blank"><img
                                src="..\..\..\public\img\bookstore.png" class="web" alt="유어마인드 독립서점"></a></dt>
                        <dd>유어마인드 독립서점</dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><a href="https://byeolcheck.kr/" target="_blank"><img src="..\..\..\public\img\bookstore2.png"
                                class="web" alt="별책부록 독립서점"></dt>
                        <dd>별책부록 독립서점</dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><a href="http://www.gongsangondo.com/" target="_blank"><img src="..\..\..\public\img\bookstore4.png"
                            class="web" alt="공상온도"></a></dt>
                        <dd>공상온도 독립서점</dd>
                    </dl>
                </li>
            </ul>     
        </div>

        <div class="recommend3">
        <h3>뉴스레터</h3>
            <div class="icon">
                <div>
                <img src="..\..\..\public\img\icon_news.png">
                <p>뜻깊은 독립서점 <br>행사에 참여하세요</p>
                </div>
                <a href="..\news\news.php">소식 보러가기</a>
            </div>
            <div class="news">
                <form method="post" action="..\news\news_emailing.php">
                
                <p>독립서점의 소식을 편하게 이메일로 받아보세요!<br>
                <?php $sql = 'SELECT * FROM news';
                    $data = mysqli_query($con, $sql);
                    $total_rows = mysqli_num_rows($data);
                    echo $total_rows;
                    ?>명이 구독 중입니다.</p>
                <input type="text" name="u_name" placeholder="이름">
                <input type="text" id="email" name="email" placeholder="이메일">
                <button>구독하기</button>
            </form>
            </div>
        </div>
    </div>
    <include-html target="footer.html" completed="footerCompleted"></include-html>

    <script>includeHtml();</script>
</body>

</html>