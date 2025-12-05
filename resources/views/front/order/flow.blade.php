<html>

<head>
  <title>金流</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <script>
    setTimeout(function() {
      window.location.href = "/order/finish";
    }, 5000);

    function init() {
      // document.forms["form1"].submit();
    }
  </script>
</head>

<body onload="init()">
  <div class="spinner-border text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>

  <form method="post" action="https://xxx.xxx.com.tw/xxx" id="form1" name="form1">
    <input type="hidden" name="data1" value="data1">
    <input type="hidden" name="data2" value="data2">
    <input type="hidden" name="data3" value="data3">
  </form>
</body>

</html>