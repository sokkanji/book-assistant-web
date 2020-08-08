test = () => {
    let cnt = -1;
    let temp = 0;
    let sum = 0;

    let question = ["책을 훑어볼 때", "책 좀 읽어볼까?", "시험 망했네..", "갑자기 친구가 울면",
        "영화 뭐 볼까?", "그토록 기다리던 휴일날이네", "물건을 살 때, 중요한 게 생각하는 건?", "만화를 볼 때 중요한 건?", "비슷한 초코과자가 있네",
        "평소 좋아하는 감독님의 새로운 영화가 개봉했다.<br> 근데 내가 싫어하는 장르네?", "오랜만에 청소 좀 해볼까, 뭐 부터 치우지?",
        "드라마 시청 중에 말도 안 되는 막장 전개가 이어질 때", "친구들이랑 하루종일 놀고 집에 도착했다",
        "친구와 같이 길을 걸어가다가, <br> 갑자기 친구가 넘어졌다", "용돈을 받았다", "나는 평소에", "모르는 문제가 생겼네",
        "심혈을 기울여서 쓰는 부분은?", "나에게 좋은 사람은", "오늘 저녁 뭐 먹지"
    ];

    $(() => {
        $(".startbtn").on("click", () => {
            $(".startbtn").remove(".startbtn");
            $(".test-img").css("display", "none");
            $(".test-img2").css("display", "block");
            $(".editbtn").css("display", "block");
            $(".startQuestion").css("display", "none");
            $(".progressBar").css("display", "block");
            $(".question").css("display", "block");

            cnt++;
            temp = cnt;
            $(`.options${cnt}`).css("display", "block");

            $(".question").html(question[cnt]);
            $(".option1").click(() => {
                if (cnt < 19) {
                    cnt++;
                    sum = (5 * cnt);
                    $(".bar").css("width", sum + "%");
                    temp = cnt - 1;
                    $(`.options${temp}`).css("display", "none");
                    $(`.options${cnt}`).css("display", "block");
                    $(".question").html(question[cnt]);
                } else if (cnt > 18) {
                    $(".test-img2").remove(".test-img2");
                    $(".editbtn").remove(".editbtn");
                    $(".startQuestion").remove(".startQuestion");
                    $(".progressBar").remove(".progressBar");
                    $(".question").remove(".question");
                    $(".option1").remove("option1");
                    $(".option2").remove("option2");
                    $(".options19").css("display", "none");
                    $(".result").css("display", "block");
                }
            })


            $(".option2").click(() => {
                if (cnt < 19) {
                    cnt++;
                    sum = (5 * cnt);
                    $(".bar").css("width", sum + "%");

                    temp = cnt - 1;
                    $(`.options${temp}`).css("display", "none");
                    $(`.options${cnt}`).css("display", "block");
                    $(".question").html(question[cnt]);
                } else if (cnt > 18) {
                    $(".test-img2").remove(".test-img2");
                    $(".editbtn").remove(".editbtn");
                    $(".startQuestion").remove(".startQuestion");
                    $(".progressBar").remove(".progressBar");
                    $(".question").remove(".question");
                    $(".option1").remove("option1");
                    $(".option2").remove("option2");
                    $(".options19").css("display", "none");
                    $(".result").css("display", "block");
                }
            })
        })

        $(".arrow_right").on("click", () => {
            if (!($(`input:radio[name=op${cnt}]`).is(":checked"))) {
                alert("문항을 선택해주세요.");
            } else if (cnt < 19) {
                sum += 5;
                $(".bar").css("width", sum + "%");
                cnt++;
                temp = cnt - 1;

                $(`.options${temp}`).css("display", "none");
                $(`.options${cnt}`).css("display", "block");
                $(".question").html(question[cnt]);
            }
        })

        $(".arrow_left").on("click", () => {

            if (cnt > 0) {
                sum -= 5;
                $(".bar").css("width", sum + "%");

                cnt--;
                temp = cnt + 1;

                $(`.options${temp}`).css("display", "none");
                $(`.options${cnt}`).css("display", "block");
                $(".question").html(question[cnt]);

            } else if (cnt <= 0) {
                $(".menubar").css("height", "200px").css("box-shadow", "none");
                alert("첫번째 전은 없습니다.");
            }
        });

    })
}

test_result = () => {
    let result = [];

    test = (num) => {
        result.push(num);
        return result;
    }

    MaxResult = () => {
        let resultA = 0,
            resultB = 0,
            resultC = 0,
            resultD = 0;

        for (let i = 0; i < 20; i++) {
            if (result[i] == "b") {
                resultB++;
            } else if (result[i] == "a") {
                resultA++;
            } else if (result[i] == "c") {
                resultC++;
            } else if (result[i] == "d") {
                resultD++;
            }
        }

        let max = Math.max(resultA, resultB, resultC, resultD);

        let txt = document.getElementById("txt");
        let img = document.getElementById("img");
        let img2 = document.getElementById("recommend-book");

        if (max == resultB) {
            img.src = "./public/img/test2.jpg";
            document.getElementById("hashtag").innerText =
                "#논리적인 #한곳만보는 #꼼꼼이 #노력제일";
            document.getElementById("result-title").innerText =
                "당신은 두뇌회전이 빠르고 관찰력이 뛰어나 이해력이 높습니다.";
            document.getElementById("txt").innerText =
                "처음 보는 문제도 척척 곧 잘 풀어냅니다. 이런 당신은 페이지수가 많고 주제가 어려운 책이라더도 한 문장씩 읽으면 이해할 수 있다는 것을 스스로 인지하고 있습니다. 반대로, 어떻게 접근해야할지 감을 잡지 못하면 좀 처럼 손이 안 가는 에세이와 같은 감성적인 책은 이해하기 힘들 수 있습니다.";
            img2.src = "./public/img/공동주택_28-16.png";
            document.getElementById("book-tit").innerText = "공동주택_28-16.png";
            document.getElementById("book-story").innerText = "서울시 마포구 상수역 근처의 한 빌라, 공동주택 28-16 . 총 열 두세대의 청년들이 거주중인 공동주거 공간이다. 분리된 동시에 합쳐진, 이웃이지만 남인 이들의 각 대문 속 이야기를 들어본다. 마치 다양한 사람이 입주하는 빌라처럼, 프로젝트  공동주택 28-16은 여러 참여 작가들이 한공간을 배경으로 다양한 스토리텔링을 할 수 있는 곳이기도 합니다. 장소와 지역의 공유를 통해 화의 현실성을 높이고, 옛 만화잡지처럼 다양한 만화를 하나 번에 감상할 수 있는 기회도 제공합니다. 첫 기획으로 20대 초의 여성작가들을 선정하여 이들이 빌라라는 공간에 부여하는 감정과 상상력을 보여줍니다.";
        } else if (max == resultA) {
            max = "resultA";
            img.src = "./public/img/test5.png";
            document.getElementById("hashtag").innerText =
                "#정많은 #친화력좋은 #능글맞은 #감성적인";
            document.getElementById("result-title").innerText =
                "당신은 평범한 사람들의 이야기를 좋아하는 타입입니다.";
            document.getElementById("txt").innerText =
                "일상에서 볼 수 있는 사람들이 솔직하게 자신의 마음을 털어두고 이야기를 하는 것을 즐깁니다. 당신에게 어울리는 장르는 에세이입니다. 반대로 더 멋진 삶을 위해 노력하라는 메세지가 담긴 자기계발서는 잘 맞지 않을 수 있습니다.";
            img2.src = "./public/img/지금여기를놓친채그때거기를말한들.png";
            document.getElementById("book-tit").innerText = "지금, 여기를 놓친 채 그때, 거기를 말한들";
            document.getElementById("book-story").innerText = "『사춘기 시절, 숱한 밤을 종이와 펜을 붙들고 보냈다. 자신을 위로하기 위한 글들이 다른 이들을 위로하기 시작한다는 것을 알게 되던 열일곱의 여름밤, 글을 쓰며 그들의 그늘을 지켜내겠다고 결심했다. 다시 수계절을 돌아, 여전히 그늘이 있는 사람들을 사랑한다고 말한다. 그리고 그들의 삶에 서서히 스며들고 싶다고그 언제, 어디보다도 소중한 지금, 여기 순간에 대한 기록 나 그리고 당신의 이야기』";
            document.getElementById("book-read").attr = ""
        } else if (max == resultC) {
            max = "resultC";
            img.src = "./public/img/test4.jpg";
            document.getElementById("hashtag").innerText =
                "#조용한 #한곳만보는 #소확행 #집중력";
            document.getElementById("result-title").innerText =
                "당신은 자신이 관심 있는 분야를 확고하게 정하고 파고드는 타입입니다.";
            document.getElementById("txt").innerText =
                "책의 형식보다는 소재를 더 중요하게 여깁니다. 관심 분야라면, 소설부터 자기계발서까지 가리지 않습니다. 하지만 하나만 바라보는 당신은 예상외로 시야가 좁지 않은 편입니다. 자신이 좋아하는 분야에서 한 관점에 얽매이지 않는 편이라고 말할 수 있습니다. 다양한 시선은 같은 상황이더라도 더 나은 해결법을 생각할 수 있는 재능입니다.";
            img2.src = "./public/img/비밀기지_만들기.png";
            document.getElementById("book-tit").innerText = "비밀기지_만들기";
            document.getElementById("book-story").innerText = "일본의 젊은 건축가이자 ‘일본기지학회’라는 단체의 설립자인 오가타 다카히로가 쓴 이 책은 우리 시대가 잃어버린 ‘비밀기지’의 낭만과 가치를 돌아보고, 어린이나 어른 누구라도 비밀기지를 만들어 볼 것을 권유합니다. 또 비밀기지에서 할 수 있는 여러 활동과 어른들이 만들 수 있는 비밀기지, 마지막으로 ‘비밀기지적’ 상상력을 토대로 펼치는 일련의 활동을 소개합니다. 비밀기지는 우리가 잊고 있었던 진정한 휴식, 피안의 자유를 선사할 것이라고 독자들에게 말하고 있습니다.";
        } else if (max == resultD) {
            max = "resultD";
            img.src = "./public/img/test3.jpg";
            document.getElementById("hashtag").innerText =
                "#사람우선 #친화력좋은 #따뜻한 #공감";
            document.getElementById("result-title").innerText =
                "마음씨가 따뜻해서 언제나 당신 근처에 사람들이 모여듭니다.";
            document.getElementById("txt").innerText =
                "당신의 주변 사람들은 당신의 따뜻한 기운에 행복감을 느낍니다. 이런 당신은 자신과 닮은 따뜻한 글을 좋아합니다. 작가의 솔직한 문장에 감동을 받을 때도 있습니다. 당신은 자신이 받은 영감을 다른 사람들과 공유를 하고 싶어합니다. 인상깊은 구절을 메모해두었다가 힘든 친구에게 건네주거나 또는 친구가 건네준 구절에 큰 감동을 받기도 합니다.";
            img2.src = "./public/img/book7.png";
            document.getElementById("book-tit").innerText = "스친 것들에 대한 기록물";
            document.getElementById("book-story").innerText = "사랑, 이별, 방황, 삶의 위트가 짙게 담긴<strong>스친 것들에 대한 기록물</strong>은 독립출판 작가로 꾸준하게 활동하고 있는 김은비 작가가 첫 번째로 펴낸 시집입니다. 자신의 경험을 담은 사랑 이야기로 많은 공감을 얻고 있는 김은비작가의 첫 번째 시집 『스친 것들에 대한 기록물』은 사랑이 스쳐 지나간 자리에 남은 것들에 대한 그녀의 솔직한 이야기를 담았습니다. 시집 군데군데에서 볼 수 있는 작가의 진솔한 모습은 많은 독자들의 사랑 이야기와 맞닿아있습니다. 스쳐 지나가서 아프더라도 사랑은 계속되어야 한다고 말하는 김은비작가를 통해 사랑의 가치를 생각해 볼 수 있습니다.";
        }
    }
}