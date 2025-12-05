@extends("admin.layout")
@section("title", "插畫課程管理")
@section("content")

<!-- 自己加的回上頁 -->
<div class="container-fluid px-3">
  <div class="row">
    <div class="col-sm-12">
      <a href="{{ url('/admin/news/list') }}" class="btn btn-secondary mb-2">回上頁</a>
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
      <li><a href="#tab1">標題</a></li>
      <li><a href="#tab2">內文</a></li>
    </ul>
    <div id="tab1">
      <div class="row mt-3">
        <div class="col-1 text-end">日期</div>
        <div class="col-3">
          <input type="date" class="form-control border-dark" name="dates">
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-1 text-end">標題</div>
        <div class="col-10">
          <input type="title" class="form-control border-dark" name="title">
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-1 text-end">內容</div>
        <div class="col-10">
          <textarea class="form-control border-dark" rows="5" name="content"></textarea>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-1 text-end">圖檔</div>
        <div class="col-3">
          <input type="file" class="form-control border-dark" name="photo">
        </div>
      </div>
    </div>

    <div id="tab2">
      <!-- @foreach(range(1, 5) as $seq)
      <div class="row mt-3">
        <div class="col-1 text-end">內文{{ $seq }}</div>
        <div class="col-5">
          <textarea class="form-control border-dark" rows="3" name="content{{ $seq }}"></textarea>
        </div>
        <div class="col-1 text-end">圖檔{{ $seq }}</div>
        <div class="col-3">
          <input type="file" class="form-control border-dark" name="photo{{ $seq }}">
        </div>
      </div>
      @endforeach -->
      <div class="row">
        @foreach(range(1, 5) as $seq)
        <div class="col-md-6 mb-4"> {{-- 每欄一組，組與組之間有間距 --}}
          <div class="p-3 border rounded shadow-sm"> {{-- 每組包起來 --}}

            <label class="form-label">內文{{ $seq }}</label>
            <textarea class="form-control border-dark mb-3" rows="3" name="content{{ $seq }}"></textarea>

            <label class="form-label">圖檔{{ $seq }}</label>
            <input type="file" class="form-control border-dark" name="photo{{ $seq }}">

          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="text-center mt-3">
      <button type="submit" class="btn btn-primary btn-lg">確 定</button>
    </div>
</form>
@endsection