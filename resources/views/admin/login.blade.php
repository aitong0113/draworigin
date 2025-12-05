<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <title>登入頁面</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, .1);
      width: 300px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
    }

    .captcha-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .submit-btn {
      width: 100%;
      padding: 10px;
      background: #007BFF;
      color: #fff;
      border: 0;
      border-radius: 4px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background: #0056b3;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2>登入系統</h2>

    <form action="/myadmin/login" method="POST">
      @csrf

      <div class="form-group">
        <label for="userId">帳號</label>
        <input type="text" id="userId" name="userId" required value="{{ old('userId') }}" autofocus>
        @if ($errors->has('err'))
        <div style="color:red">{{ $errors->first('err') }}</div>
        @endif
      </div>

      <div class="form-group">
        <label for="pwd">密碼</label>
        <input type="password" id="pwd" name="pwd" required>
      </div>

      <div class="form-group">
        <label for="code">驗證碼</label>
        <div class="captcha-container">
          <input type="text" id="code" name="code" required>
          <img src="/captcha/flat" width="120"
            onclick="this.src='/captcha/flat?'+Math.random()"
            style="cursor:pointer;">
        </div>
        @if ($errors->has('code'))
        <div style="color:red">{{ $errors->first('code') }}</div>
        @endif
      </div>

      <button type="submit" class="submit-btn">登入</button>
    </form>
  </div>
</body>

</html>