loginWithKakao = () => {
    Kakao.Auth.loginForm({
        success: (authObj) => {
            const accessToken = JSON.stringify(authObj);
            console.log(accessToken);
            Kakao.API.request({
                url: "/v2/user/me",
                success: (res) => {
                    const userId = res.id;
                    const userEmail = res.kakao_account.email;
                    const userNickName = res.properties.nickname;
                    console.log(userId);
                    console.log(userEmail);
                    console.log(userNickName);

                    location.href = "./kakaoLogin.php?userId=" +
                        userId + "&userNickName=" + userNickName +
                        "&userEmail=" + userEmail;
                },
                fail: (error) => {
                    alert(JSON.stringify(error));
                }
            });
        }
    })
}

kakaoLogout = () => {
    Kakao.API.request({
        url: "/v1/user/unlink",
        success: (res) => {
            console.log(res);
            location.href = "./logout.php";
        },
        fail: (error) => {
            console.log(error);
        },
    });
}