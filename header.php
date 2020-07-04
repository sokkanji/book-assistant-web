<html>
<div id="header">
   
        <div class="menubar">
            <a href="./index.php" id="logo-img"><img src="./public/img/logo-img2.png" alt="책잡이로고"></a>
            
                <div class="gnb">
                    <ul class="dropdown">
                        <li class="mb01">
                            <a href="./store_search.php" class="m1">검색</a>
                            <ul class="m2">
                                <li><a href="./store_search.php">독립서점 검색</a></li>
                                <li><a href="./book_search.html">독립출판물 검색</a></li>
                            </ul>
                        </li>
                        <li class="mb02">
                            <a href="./book_test.html" class="m1">추천</a>
                            <ul class="m2">
                                <li><a href="./book_test.html">인생책 찾기 테스트</a></li>
                                <li><a href="./recommend.php">독립출판물 추천</a></li>
                            </ul>
                        </li>
                        <li class="mb03">
                            <a href="./watching.html" class="m1">소식</a>
                            <ul class="m2">
                                <li><a href="./watching.html">독립서점 구경하기</a></li>
                                <li><a href="./news.php">뉴스레터</a></li>
                            </ul>
                        </li>
                        <li class="mb04">
                            <a href="./activity.php" class="m1">리뷰</a>
                            <ul class="m2">
                                <li><a href="./activity.php">활동 기록하기</a></li>
                                <li><a href="./report.html">제보하기</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>


            <?php
            if(!isset($_SESSION['email'])) { 
                echo '<div><a href="./login.html" id="login-img"><img src="./public/img/login_icon.png" 
                    alt="로그인 이미지"></a></div>';
            }
            else{
                echo '<div><a href="./login_info.php" id="login-img"><img src="./public/img/login_icon.png" 
                alt="로그인 이미지"></a></div>';
            }
            ?>
    </div>
</div>

</html>