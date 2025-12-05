@extends("admin.layout")
@section("title", "修改插畫課程")
@section("content")

<!-- 自己加的回上頁+標題 -->
<div>
  <div class="card-header">
    <div class="row">
      <div class="col-2">
        <a href="{{ url('/admin/news/list') }}" class="btn btn-secondary">回上頁</a>
      </div>
      <div class="col-10 d-flex align-items-center">
        <span class="me-2 fw-semibold text-secondary">最新消息標題：</span>
        <span class="fw-bold fs-5 text-dark">{{ $news->title }}</span>
      </div>
    </div>
  </div>
</div>

<!-- 老師本來的回上頁 -->
<!-- <div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-2">
        <a href="/admin/news/edit/{{ $news->id }}#tab2" class="btn btn-secondary">回上頁</a>
      </div>
      <div class="col-10">
        {{ $news->title }}
      </div>
    </div>
  </div>
</div> -->

<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.min.js"></script>

<script>
  $(function() {
    $("#tabs").tabs();
  });
</script>

<div id="tabs" class="mt-3">
  <ul>
    <li><a href="#tab1">標題</a></li>
    <li><a href="#tab2">內文</a></li>
  </ul>

  <!-- Tab 1 -->
  <div id="tab1">
    <form method="post" action="../update" enctype="multipart/form-data">
      <input type="hidden" name="id" value="{{ $id }}">
      @csrf
      <div class="row">
        <div class="col-1 text-end">日期</div>
        <div class="col-3">
          <input type="date" class="form-control border-dark" name="dates" value="{{ $news->dates }}">
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-1 text-end">標題</div>
        <div class="col-10">
          <input type="title" class="form-control border-dark" name="title" value="{{ $news->title }}">
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-1 text-end">內容</div>
        <div class="col-10">
          <textarea class="form-control border-dark" rows="5" name="content">{{ str_replace("<br/>", "\n", $news->content) }}</textarea>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-1 text-end">圖檔</div>
        <div class="col-3">
          <input type="file" class="form-control border-dark" name="photo">
          <div class="row mt-3">
            @if (!empty($news->photo))
            <img src="/images/news/{{ $news->photo }}" width="80">
            @endif
          </div>
        </div>
      </div>
      <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary btn-lg">確 定</button>
      </div>
    </form>
  </div>

  <!-- Tab 2 -->
  <div id="tab2">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-2">
                <a href="/admin/news/detail/add/{{ $id }}" class="btn btn-primary text-white">新增</a>
              </div>
              <div class="col-2">
                <a href="javascript:doDelete('list')" class="btn btn-danger text-white">刪除</a>
              </div>
            </div>
          </div>

          <div class="row">
            <form method="post" action="/admin/news/detail/delete" enctype="multipart/form-data" name="list" id="list">
              @csrf
              <input type="hidden" name="newsId" value="{{ $id }}">
              <table class="table border border-dark">
                <tr class="border border-dark table-warning">
                  <th class="col-1 text-center border border-dark">
                    <input type="checkbox" class="form-check-input border-dark" id="all">
                  </th>
                  <th class="col-7 text-center border border-dark">內容</th>
                  <th class="col-3 text-center border border-dark">圖檔</th>
                  <th class="col-1 text-center border border-dark">修改</th>
                </tr>


                @foreach(($newsId ?? collect()) as $data)
                <tr>
                  <td class="text-center border border-dark align-middle">
                    <input type="checkbox" name="id[]" value="{{ $data->id }}" class="form-check-input border-dark chk">
                  </td>
                  <td class="align-middle border border-dark text-center">
                    {{ $data->content }}
                  </td>
                  <td class="text-center border border-dark align-middle">
                    @if (!empty($data->photo))
                    <img src="/images/news/{{ $data->photo }}" width="80">
                    @endif
                  </td>
                  <td class="text-center border border-dark align-middle">
                    <a href="/admin/news/detail/edit/{{ $id }}/{{ $data->id }}" class="btn btn-success text-white">修改</a>
                  </td>
                </tr>
                @endforeach
              </table>
            </form>
          </div>
        </div>
        @endsection