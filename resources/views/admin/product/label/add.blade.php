@extends("admin.layout")
@section("title", "新增產品顏色")
@section("content")
<script src="/admin/js/jscolor.min.js"></script>
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-2">
        <a href="list" class="btn btn-secondary">回上頁</a>
      </div>
    </div>
  </div>
</div>

<form method="post" action="insert" enctype="multipart/form-data">
  @csrf
  <div class="row mt-3">
    <div class="col-1 text-end">標籤圖檔</div>
    <div class="col-3">
      <input type="file" class="form-control border-dark" name="label" required>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-1 text-end">使用中</div>
    <div class="col-1">
      <input type="checkbox" class="form-check-input border-dark" name="active" value="Y">
    </div>
  </div>

  <div class="text-center mt-3">
    <button type="submit" class="btn btn-primary btn-lg">確定</button>
  </div>
</form>
</div>
@endsection