@extends("admin.layout")
@section("title", "新增 Ｑ＆Ａ")
@section("content")

<!-- 自己加的回上頁 -->
<div class="container-fluid px-3">
  <div class="row">
    <div class="col-sm-12">
      <a href="{{ url('/admin/qa/list') }}" class="btn btn-secondary mb-2">回上頁</a>
    </div>
  </div>
</div>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script>
  $(function() {
    $("#tabs").tabs();
  });
</script>
<form method="post" action="insert" enctype="multipart/form-data">

  @csrf
  <div id="tabs">
    <ul>
      <li><a href="#tab1">Ｑ＆Ａ</a></li>

    </ul>
    <div id="tab1">
      <div class="row mt-3">
        <div class="col-1 text-end">日期</div>
        <div class="col-3">
          <input type="date" class="form-control border-dark" name="dates">
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-1 text-end">問題</div>
        <div class="col-10">
          <textarea class="form-control border-dark" rows="5" name="title"></textarea>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-1 text-end">回覆</div>
        <div class="col-10">
          <textarea class="form-control border-dark" rows="5" name="content"></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center mt-3">
    <button type="submit" class="btn btn-primary btn-lg">確 定</button>
  </div>
</form>
@endsection