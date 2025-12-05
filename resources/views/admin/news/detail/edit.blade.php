@extends("admin.layout")
@section("title", "修改最新消息內文")
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

<form method="post" action="/admin/news/detail/update" enctype="multipart/form-data">
  <input type="hidden" name="newsId" value="{{ $news->id }}">
  <input type="hidden" name="id" value="{{ $detail->id }}">
  @csrf

  <div class="row mt-3">
    <div class="col-1 text-end">內容</div>
    <div class="col-10">
      <textarea class="form-control border-dark" rows="5" name="content">{{ str_replace("<br/>", "\n", $detail->content) }}</textarea>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-1 text-end">圖檔</div>
    <div class="col-3">
      <input type="file" class="form-control border-dark" name="photo">
      @if (!empty($detail->photo))
      <div class="mt-3">
        <img src="/images/news/{{ $detail->photo }}" width="80">
      </div>
      @endif
    </div>
  </div>

  <div class="text-center mt-3">
    <button type="submit" class="btn btn-primary btn-lg">確 定</button>
  </div>
</form>


@endsection