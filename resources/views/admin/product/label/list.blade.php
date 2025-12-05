@extends("admin.layout")
@section("title","產品標籤管理")
@section("content")



<style>
  thead th {
    background-color: rgb(230, 207, 207) !important;
    text-align: center;
  }
</style>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-2">
            <a href="add" class="btn btn-primary">新增</a>
          </div>
          <div class="col-2">
            <a href="javascript:doDelete('list')" class="btn btn-danger">刪除</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <form name="list" id="list" method="post" action="delete">
            @csrf
            <table class="table border border-dark">
              <thead>
                <tr>
                  <th class="col-1 text-center border border-dark">
                    <input type="checkbox" class="form-check-input border-dark" id="all">
                  </th>
                  <th class="col-7 text-center border border-dark">標籤分類</th>
                  <th class="col-2 text-center border border-dark">使用中</th>
                  <th class="col-2 text-center border border-dark">修改</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list as $data)
                <tr>
                  <td class="text-center border border-dark align-middle">
                    <input type="checkbox" name="id[]" value="{{ $data->id }}" class="form-check-input border-dark chk">
                  </td>
                  <td class="border border-dark align-middle text-center">
                    <img src="/images/label/{{ $data->label }}">
                  </td>
                  <td class="border border-dark align-middle text-center">
                    @if($data->active == "Y")
                    <span class="fw-bold" style="color:rgb(80,105,74);">是</span>
                    @else
                    <span class="fw-bold" style="color:rgb(146,92,92);">否</span>
                    @endif
                  </td>
                  <td class="text-center border border-dark align-middle">
                    <a href="edit/{{ $data->id }}" class="btn btn-success">修改</a>
                  </td>
                </tr>
                @endforeach
            </table>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection