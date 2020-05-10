function email_check(str) {
     var reg_email = /^([0-9a-zA-Z_\.-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;

     if (!reg_email.test(str)) {
          return false;
     }
     else {
          alert("이메일 유효성 검사 성공");
          return true;
     }
}                                