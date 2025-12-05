function login() {
  let email = $("#email").val().trim();
  let pwd = $("#pwd").val().trim();
  let code = $("#code").val().trim();

  // 清除舊訊息
  $("#msg1, #msg2, #msg3").html("");

  if (!email) {
    $("#msg1").html("<font color='red'>請輸入 Email</font>");
    $("#email").focus();
    return;
  }
  let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
    $("#msg1").html("<font color='red'>Email 格式不正確</font>");
    $("#email").focus();
    return;
  }

  if (!pwd) {
    $("#msg3").html("<font color='red'>請輸入密碼</font>");
    $("#pwd").focus();
    return;
  }

  if (!code) {
    $("#msg2").html("<font color='red'>請輸入驗證碼</font>");
    $("#code").focus();
    return;
  }

  $("#btnLogin").hide();
  $("#wait").show();

  $.ajax({
    url: "/member/doLogin",
    type: "post",
    data: $("#loginForm").serialize(),
    success: function (msg) {
      msg = msg.trim();
      if (msg === "error") {
        $("#msg1").html("<font color='red'>帳號或密碼錯誤</font>");
        $("#email").focus();
      } else if (msg === "code") {
        $("#msg2").html("<font color='red'>驗證碼錯誤</font>");
        $("#captcha").trigger("click");
        $("#code").val("").focus();
      } else {
        // 後端回傳的網址
        location.href = msg.startsWith("http") ? msg : window.location.origin + msg;
      }
      $("#btnLogin").show();
      $("#wait").hide();
    },
    error: function () {
      $("#msg1").html("<font color='red'>伺服器錯誤，請稍後再試</font>");
      $("#btnLogin").show();
      $("#wait").hide();
    }
  });
}

function doLogout() {
  Swal.fire({
    title: "確定登出?",
    showDenyButton: true,
    confirmButtonText: "確定登出",
    denyButtonText: "不要登出"
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = "/member/logout";
    }
  });
}