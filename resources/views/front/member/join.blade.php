@extends("front.layout")
@section("content")

<div class="content">
  <h2>註冊會員</h2>
  <form class="cd-form" method="post" action="/member/save" id="form1" onsubmit="return false;">
    @csrf

    <div class="form-group row">
      <label class="col-sm-1 col-form-label">姓名</label>
      <div class="col-sm-11">
        <input type="text" class="form-control" name="userName" id="userName" placeholder="請輸入您的姓名">
        <div id="userNameMsg"></div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-1 col-form-label">Email</label>
      <div class="col-sm-11">
        <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="請輸入您的E-mail">
        <div id="userEmailMsg"></div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-1 col-form-label">密碼</label>
      <div class="col-sm-11">
        <input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="請輸入您的密碼">
        <div id="pwd1Msg"></div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-1 col-form-label">密碼確認</label>
      <div class="col-sm-11">
        <input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="請再次輸入密碼">
        <div id="pwd2Msg"></div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-1 col-form-label">驗證碼</label>
      <div class="col-sm-10">
        <input class="form-control" name="userCode" id="userCode" placeholder="請輸入驗證碼">
        <div id="userCodeMsg"></div>
      </div>
      <img src="/captcha/flat" id="img" class="col-sm-1"
        onclick="this.src='/captcha/flat?' + Math.random()" style="cursor: pointer">
    </div>

    <!-- ✅ 隱私權條款，改成 form-group row -->
    <div class="form-group row">
      <label class="col-sm-1"></label>
      <div class="col-sm-11">
        <ul class="cd-form-list privacy">
          <li>
            <input type="checkbox" name="read" id="read">
            <label for="read">
              我已詳細閱讀 <a href="/privacy/1" target="_blank">【隱私權保護政策】</a> 及
              <a href="/service" target="_blank">【服務條款】</a>
            </label>
          </li>
        </ul>
      </div>
    </div>

    <!-- ✅ 註冊按鈕，改成 form-group row -->
    <div class="form-group row text-center">
      <button type="button" class="btn btn-submit"
        style="background:#555;
           color:#fff;
           border-radius:8px;
           padding:.9rem 0;
           font-size:1.2rem;
           font-weight:bold;
           width:1200px;
           max-width:1110px;"
        onclick="register()">
        註冊
      </button>
    </div>

  </form>
</div>


<script>
  function register() {
    $("#btnRegister").hide();
    $("#wait").show();

    $.ajax({
      url: "/member/save",
      type: "post",
      data: $("#form1").serialize(),
      success: function(msg) {
        msg = msg.trim();
        if (msg === "exist") {
          $("#userEmailMsg").html("<font color='red'>Email 已存在</font>");
        } else if (msg === "code") {
          $("#userCodeMsg").html("<font color='red'>驗證碼錯誤</font>");
          $("#captchaImg").trigger("click");
        } else {
          location.href = msg; // ex: /member/home
        }
        $("#wait").hide();
        $("#btnRegister").show();
      },
      error: function(xhr) {
        console.error("Register AJAX Error:", xhr.status, xhr.statusText);
        $("#userEmailMsg").html("<font color='red'>伺服器錯誤，請稍後再試</font>");
        $("#wait").hide();
        $("#btnRegister").show();
      }
    });
  }
</script>

@endsection