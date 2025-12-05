@extends("front.layout")
@section("content")

<style>
  .login-logo {
    width: 200px !important;
    height: auto !important;
    margin-bottom: 40px;
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
</style>

<div class="content">
  <div class="modal-title text-center">
    <img src="/front/commons/header/img/brand/logo-black.png" class="login-logo">
  </div>

  <form method="post" id="loginFormMain" action="/member/doLogin" onsubmit="return false;">
    @if (!empty($cart))
    <input type="hidden" name="cart" value="Y" id="cart">
    @endif
    @csrf

    <div class="form-group row">
      <label for="loginEmail" class="col-sm-2 col-form-label">E-mail</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" id="loginEmail" placeholder="請輸入您的E-mail" required>
        <div id="msg1"></div>
      </div>
    </div>

    <div class="form-group row">
      <label for="loginPwd" class="col-sm-2 col-form-label">密碼</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="pwd" id="loginPwd" placeholder="請輸入您的密碼" required>
        <div id="msg3"></div>
      </div>
    </div>

    <div class="form-group row">
      <label for="loginCode" class="col-sm-2 col-form-label">驗證碼</label>
      <div class="col-sm-7">
        <input class="form-control" name="code" id="loginCode" placeholder="請輸入驗證碼" required>
        <div id="msg2"></div>
      </div>
      <img src="/captcha/flat" id="captcha" class="col-sm-3"
        onclick="this.src='/captcha/flat?' + Math.random()" style="cursor: pointer">
    </div>

    <div class="form-group row link">
      <span class="col-sm-9">
        <a href="/member/forget"><i class="fa fa-question-circle"></i>忘記密碼&nbsp;/&nbsp;</a>
        <a href="/member/verifi"><i class="fa fa-envelope"></i>重寄驗證信</a>
      </span>
      <span class="col-sm-3 text-right">
        <a href="/member/join"><i class="fa fa-user"></i>立即註冊</a>
      </span>
    </div>

    <button type="button" id="btnLogin" class="btn-basic btn-submit"
      style="background:rgb(216,220,221);border:1px solid #dadce0;color:#3c4043;border-radius:9999px;padding:.55rem 1rem;">
      登入
    </button>

    <div id="wait" class="text-center" style="display:none;">
      <img src="/images/loading.gif" width="100">
    </div>

    <button type="button" class="btn-basic"
      style="background:#f1f3f4;border:1px solid #dadce0;color:#3c4043;border-radius:9999px;padding:.55rem 1rem;">
      <img src="/images/Google.png" alt="" style="width:18px;height:18px;margin-right:8px;vertical-align:middle;">
      以 Google 登入
    </button>
  </form>
</div>

<script>
  $(function() {
    $("#btnLogin").on("click", function() {
      const email = $("#loginEmail").val();
      const pwd = $("#loginPwd").val();
      const code = $("#loginCode").val();

      $("#msg1, #msg2, #msg3").html("");

      if (!email) {
        $("#msg1").html("<font color='red'>請輸入Email</font>");
        $("#loginEmail").focus();
        return;
      }
      if (!pwd) {
        $("#msg3").html("<font color='red'>請輸入密碼</font>");
        $("#loginPwd").focus();
        return;
      }
      if (!code) {
        $("#msg2").html("<font color='red'>請輸入驗證碼</font>");
        $("#loginCode").focus();
        return;
      }

      $("#btnLogin").hide();
      $("#wait").show();

      $.ajax({
        url: "/member/doLogin",
        type: "post",
        data: $("#loginFormMain").serialize(),
        success: function(msg) {
          const t = msg.trim();
          if (t === "error") {
            $("#msg1").html("<font color='red'>帳號或密碼錯誤</font>");
            $("#loginEmail").focus();
          } else if (t === "code") {
            $("#msg2").html("<font color='red'>驗證碼錯誤</font>");
            $("#captcha").trigger("click");
            $("#loginCode").val("").focus();
          } else {
            window.location.href = t;
          }
          $("#wait").hide();
          $("#btnLogin").show();
        },
        error: function(xhr) {
          console.error("Login AJAX Error:", xhr.status, xhr.statusText);
          $("#msg1").html("<font color='red'>伺服器錯誤，請稍後再試</font>");
          $("#wait").hide();
          $("#btnLogin").show();
        }
      });
    });
  });
</script>
@endsection