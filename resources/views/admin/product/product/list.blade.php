@extends("admin.layout")
@section("title","產品管理")
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
          <div class="col-2">
            <a href="export" class="btn btn-info">匯出Excel</a>
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
                  <th class="col-2 text-center border border-dark">類別</th>
                  <th class="col-1 text-center border border-dark">產品編號</th>
                  <th class="col-2 text-center border border-dark">產品名稱</th>
                  <th class="col-1 text-center border border-dark">數量</th>
                  <th class="col-1 text-center border border-dark">原價</th>
                  <th class="col-1 text-center border border-dark">售價</th>
                  <th class="col-1 text-center border border-dark">使用中</th>
                  <th class="col-1 text-center border border-dark">匯出產品</th>
                  <th class="col-1 text-center border border-dark">修改</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list as $data)
                <tr>
                  <td class="text-center border border-dark align-middle">
                    <input type="checkbox" name="id[]" value="{{ $data->id }}" class="form-check-input border-dark chk">
                  </td>
                  <td class="border border-dark align-middle text-center">{{ $data->layer_name }}</td>
                  <td class="border border-dark align-middle text-center">{{ $data->itemNo }}</td>
                  <td class="border border-dark align-middle text-center">{{ $data->itemName }}</td>
                  <td class="border border-dark align-middle text-center">{{ $data->qty }}</td>
                  <td class="border border-dark align-middle text-center">{{ number_format($data->price) }}</td>
                  <td class="border border-dark align-middle text-center">{{ number_format($data->salePrice) }}</td>
                  <td class="border border-dark align-middle text-center">
                    @if($data->active === "Y")
                    <span style="color:#2a5caa;">是</span>
                    @else
                    <span style="color:#813333;">否</span>
                    @endif
                  </td>
                  <td class="text-center border border-dark align-middle">
                    <a href="word/{{ $data->id }}" class="btn btn-warning">Word</a>
                  </td>
                  <td class="text-center border border-dark align-middle">
                    <a href="edit/{{ $data->id }}" class="btn btn-success">修改</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection