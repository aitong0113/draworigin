@extends('admin.layout')
@section('title', '修改產品標籤')
@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-2">
        <a href="../list" class="btn btn-secondary">回上頁</a>
      </div>
    </div>
  </div>

  <form method="post" action="../update" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $label->id }}">
    @csrf

    <div class="row mt-3">
      <div class="col-1 text-end">標籤圖檔</div>
      <div class="col-3">
        <input type="file" class="form-control border-dark" name="label" required>
        <div class="mt-3">
          <img src="/images/label/{{ $label->label }}">
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-1 text-end">使用中</div>
      <div class="col-1">
        <input type="checkbox"
          class="form-check-input border-dark"
          name="active" value="Y"
          {{ $label->active == 'Y' ? 'checked' : '' }}>
      </div>
    </div>

    <div class="text-center mt-3">
      <button type="submit" class="btn btn-primary btn-lg">確 定</button>
    </div>
  </form>
</div>
@endsection