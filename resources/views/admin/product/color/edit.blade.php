@extends("admin.layout")
@section("title", "修改顏色類別")
@section("content")
<script src="/admin/js/jscolor.min.js"></script>
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-2">
        <a href="../list" class="btn btn-secondary">回上頁</a>
      </div>
    </div>
  </div>

  <form method="post" action="../update">
    <input type="hidden" name="id" value="{{ $color->id }}">
    @csrf

    <div class="row mt-3">
      <div class="col-1 text-end">顏色名稱</div>
      <div class="col-3">
        <input type="text" class="form-control border-dark"
          name="colorName" required
          value="{{ $color->colorName }}">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-1 text-end">顏色</div>
      <div class="col-3">
        <input type="text" class="form-control border-dark"
          name="color" required data-jscolor="{}"
          value="{{ $color->color }}">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-1 text-end">使用中</div>
      <div class="col-1">
        <input type="checkbox" class="form-check-input border-dark"
          name="active" value="Y"
          {{ $color->active == "Y" ? "checked" : "" }}>
      </div>
    </div>

    <div class="text-center mt-3">
      <button type="submit" class="btn btn-primary btn-lg">確定</button>
    </div>
  </form>
</div>
@endsection