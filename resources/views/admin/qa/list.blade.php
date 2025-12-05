@extends("admin.layout")
@section("title", "Ｑ＆Ａ管理")
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

      <div class="row">
        <form name="list" id="list" method="post" action="delete">
          @csrf
          <table class="table table-bordered border-dark">
            <thead>
              <tr>
                <th class="col-1 text-center">
                  <input type="checkbox" class="form-check-input border-dark" id="all">
                </th>
                <th class="col-2 text-center">日期</th>
                <th class="col-3 text-center">問題</th>
                <th class="col-3 text-center">回覆</th>
                <th class="col-1 text-center">修改</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $data)
              <tr>
                <td class="text-center border border-dark align-middle">
                  <input type="checkbox" name="id[]" value="{{ $data->id }}"
                    class="form-check-input border-dark chk">
                </td>
                <td class="border border-dark align-middle">{{ $data->dates }}</td>
                <td class="border border-dark align-middle">{{ $data->title}}</td>
                <td class="border border-dark align-middle">{{ $data->content }}</td>
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
@endsection