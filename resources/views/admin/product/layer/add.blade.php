@extends("admin.layout")
@section("title","新增產品類別")
@section("content")
<form method="post" action="insert">
    @csrf
    <div class="row mt-3">
        <div class="col-1 text-end">類別名稱</div>
        <div class="col-3">
            <input type="text" class="form-control border-dark" name="layer_name" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-1 text-end">使用中</div>
        <div class="col-1">
            <input type="checkbox" class="form-check-input border-dark" name="active" value="Y">
        </div>
    </div>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary btn-lg">確 定</button>
    </div>
</form>
@endsection
