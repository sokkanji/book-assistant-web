<?php
    session_start();
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
    <link rel="stylesheet" href="./public/css/base_css/animation.css">
    <link rel="stylesheet" href="./public/css/recommend_css/book_test.css">
    <link rel="stylesheet" href="./public/fonts/font.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/completed.js"></script>
    <script type="text/javascript" src="./public/js/test.js"></script>
</head>

<body>
    <?php 
        require "./header.php"; 
    ?>

    <script>
        test();
    </script>

    <div id="book_test">
        <h1>인생 책 찾기 테스트</h1>
        <hr>
        <div class="test-wrap">
            <div class="progressBar">
                <div class="bar"></div>
            </div>

            <img img src="./public/img/test1.jpg" class="test-img" alt="테스트시작사진1">
            <img img src="./public/img/icon_q.png" class="test-img2" alt="질문이미지">

            <div class="wrap">
                <div class="startQuestion">질문들을 통해 당신에게<br> 어울리는 책을 추천해드려요.<br><br>
                    질문은 총 20문항이고<br>소요시간은 약 3분정도 입니다.
                </div>

                <div class="question"></div>

                <ul class="options0">
                    <li><input type="radio" name="op0" id="test1" class="option1" onclick="test('b')">
                        <label for="test1">전체적으로</label>
                    </li>
                    <li><input type="radio" name="op0" id="test2" class="option2" onclick="test('c')">
                        <label for="test2">중요한 부분만</label>
                    </li>
                </ul>

                <ul class="options1">
                    <li><input type="radio" name="op1" id="test3" class="option1" onclick="test('d')">
                        <label for="test3">Yes12이나 말라딘와 같은 책 사이트에 들어간다.</label>
                    </li>
                    <li><input type="radio" name="op1" id="test4" class="option2" onclick="test('a')">
                        <label for="test4">동네도서관이나 학교도서관에 간다.</label>
                    </li>
                </ul>

                <ul class="options2">
                    <li><input type="radio" name="op2" id="test5" class="option1" onclick="test('a')">
                        <label for="test5">떡볶이나 먹자</label>
                    </li>
                    <li><input type="radio" name="op2" id="test6" class="option1" onclick="test('b')">
                        <label for="test6">다음 시험 때는 같은 결과를 반복하지 않도록 계획을 세운다.</label>
                    </li>
                </ul>

                <ul class="options3">
                    <li><input type="radio" name="op3" id="test7" onclick="test('a')">
                        <label for="test7" class="option1">묵묵히 위로를 해준다.</label>
                    </li>
                    <li><input type="radio" name="op3" id="test8" onclick="test('b')">
                        <label for="test8" class="option2">무슨 일 있었어?</label>
                    </li>
                </ul>

                <ul class="options4">
                    <li><input type="radio" name="op4" id="test9" onclick="test('b')">
                        <label for="test9" class="option1">베네딕트 컴버배치가 나오는 셜록홈즈</label>
                    </li>
                    <li><input type="radio" name="op4" id="test10" onclick="test('c')">
                        <label for="test10" class="option2">천둥의 신 토르가 나오는 어벤져스</label>
                    </li>
                </ul>

                <ul class="options5">
                    <li><input type="radio" name="op5" id="test11" onclick="test('a')">
                        <label for="test11" class="option1">집에서 잠이나 자자</label>
                    </li>
                    <li><input type="radio" name="op5" id="test12" onclick="test('c')">
                        <label for="test12" class="option2">친구들이랑 오랜만에 놀아야지.</label>
                    </li>
                </ul>

                <ul class="options6">
                    <li><input type="radio" name="op6" id="test13" onclick="test('b')">
                        <label for="test13" class="option1">구매 후기</label>
                    </li>
                    <li><input type="radio" name="op6" id="test14" onclick="test('d')">
                        <label for="test14" class="option2">가성비</label>
                    </li>
                </ul>

                <ul class="options7">
                    <li><input type="radio" name="op7" id="test15" onclick="test('a')">
                        <label for="test15" class="option1">눈이 즐거운 그림체지</label>
                    </li>
                    <li><input type="radio" name="op7" id="test16" onclick="test('b')">
                        <label for="test16" class="option2">스토리가 탄탄해야해</label>
                    </li>
                </ul>

                <ul class="options8">
                    <li><input type="radio" name="op8" id="test17" onclick="test('c')">
                        <label for="test17" class="option1">양이 많은 초코과자 A</label>
                    </li>
                    <li><input type="radio" name="op8" id="test18" onclick="test('d')">
                        <label for="test18" class="option2">A보다 더 맛있는 초코과자 B</label>
                    </li>
                </ul>

                <ul class="options9">
                    <li><input type="radio" name="op9" id="test19" onclick="test('a')">
                        <label for="test19" class="option1">좋아하는 감독님 작품이니까, 믿고 본다</label>
                    </li>
                    <li><input type="radio" name="op9" id="test20" onclick="test('c')">
                        <label for="test20" class="option2">다른 영화를 본다.</label>
                    </li>
                </ul>

                <ul class="options10">
                    <li><input type="radio" name="op10" id="test21" onclick="test('b')">
                        <label for="test21" class="option1">책상부터</label>
                    </li>
                    <li><input type="radio" name="op10" id="test22" onclick="test('c')">
                        <label for="test22" class="option2">방바닥부터</label>
                    </li>
                </ul>

                <ul class="options11">
                    <li><input type="radio" name="op11" id="test23" onclick="test('a')">
                        <label for="test23" class="option1">어떤 엔딩일지 궁금해한다.</label>
                    </li>
                    <li><input type="radio" name="op11" id="test24" onclick="test('b')">
                        <label for="test24" class="option2">이게 뭐지? 채널를 돌린다.</label>
                    </li>
                </ul>

                <ul class="options12">
                    <li><input type="radio" name="op12" id="test25" onclick="test('d')">
                        <label for="test25" class="option1">오늘 있었던 일을 잊지 않도록 일기 써야지</label>
                    </li>
                    <li><input type="radio" name="op12" id="test26" onclick="test('c')">
                        <label for="test26" class="option2">피곤하다, 얼른 씻고 자자</label>
                    </li>
                </ul>

                <ul class="options13">
                    <li><input type="radio" name="op13" id="test27" onclick="test('d')">
                        <label for="test27" class="option1">괜찮아? 안 다쳤어?</label>
                    </li>
                    <li><input type="radio" name="op13" id="test28" onclick="test('b')">
                        <label for="test28" class="option2">갑자기 왜 넘어진거야?</label>
                    </li>
                </ul>

                <ul class="options14">
                    <li><input type="radio" name="op14" id="test29" onclick="test('c')">
                        <label for="test29" class="option1">앞으로 쓸 지출들을 계산해본다.</label>
                    </li>
                    <li><input type="radio" name="op14" id="test30" onclick="test('a')">
                        <label for="test30" class="option2">사고 싶었던 물건들을 산다.</label>
                    </li>
                </ul>

                <ul class="options15">
                    <li><input type="radio" name="op15" id="test31" onclick="test('a')">
                        <label for="test31" class="option1">남 눈치를 많이 보는 것 같아</label>
                    </li>
                    <li><input type="radio" name="op15" id="test32" onclick="test('b')">
                        <label for="test32" class="option2">너무 내 생각만 하나?</label>
                    </li>
                </ul>

                <ul class="options16">
                    <li><input type="radio" name="op16" id="test33" onclick="test('c')">
                        <label for="test33" class="option1">알 때까지 인터넷 검색을 한다.</label>
                    </li>
                    <li><input type="radio" name="op16" id="test34" onclick="test('d')">
                        <label for="test34" class="option2">선생님께 여쭤본다.</label>
                    </li>
                </ul>

                <ul class="options17">
                    <li><input type="radio" name="op17" id="test35" onclick="test('d')">
                        <label for="test35" class="option1">감상평</label>
                    </li>
                    <li><input type="radio" name="op17" id="test36" onclick="test('b')">
                        <label for="test36" class="option2">줄거리요약</label>
                    </li>
                </ul>

                <ul class="options18">
                    <li><input type="radio" name="op18" id="test37" onclick="test('a')">
                        <label for="test37" class="option1">말을 잘 들어주고 공감해주는 사람</label>
                    </li>
                    <li><input type="radio" name="op18" id="test38" onclick="test('c')">
                        <label for="test38" class="option2">현실적인 조언을 해주는 사람</label>
                    </li>
                </ul>

                <ul class="options19">
                    <li><input type="radio" name="op19" id="test39" onclick="test('b'); MaxResult();">
                        <label for="test39" class="option1">배달 앱을 본다</label>
                    </li>
                    <li><input type="radio" name="op19" id="test40" onclick="test('d'); MaxResult();">
                        <label for="test40" class="option2">얼마 전에 집 앞에 생긴 치킨집에서 치킨을 산다.</label>
                    </li>
                </ul>

                <button class="startbtn">시작하기</button>

                <div class="arrow">
                    <div class="editbtn" style="display:none;"><img src="./public/img/arrow_left.png"
                            class="arrow_left">
                    </div>
                    <div class="editbtn" style="display:none;"><img src="./public/img/arrow_right.png"
                            class="arrow_right">
                    </div>
                </div>

                <div class="result" style="display:none;">
                    <img src="#" id="img">
                    <strong id="hashtag"></strong>
                    <strong id="result-title"></strong>
                    <span id="txt"></span>
                    <div><strong>당신에게 추천하는 독립출판물,</strong></div>
                    <div class="recoomend">
                        <img src="#" id="recommend-book">
                        <div>
                            <strong id="book-tit"></strong>
                            <a href="#" id="book-read"></a>
                        </div>
                    </div>
                    <div id="book-story"></div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require "./footer.php"; 
    ?>

    <script>
        headerCompleted();
        test_result();
    </script>
</body>

</html>