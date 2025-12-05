@extends("admin.layout")
@section("title", "插畫課程管理")
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
              <tr class="border border-dark table-warning">
                <th class="col-1 text-center border border-dark">
                  <input type="checkbox" class="form-check-input border-dark" id="all">
                </th>
                <th class="col-1 text-center border border-dark">日期</th>
                <th class="col-2 text-center border border-dark">標題</th>
                <th class="col-5 text-center border border-dark">內容</th>
                <th class="col-2 text-center border border-dark">圖檔</th>
                <th class="col-1 text-center border border-dark">修改</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $data)
              <tr>
                <td class="text-center border border-dark align-middle">
                  <input type="checkbox" name="id[]" value="{{ $data->id }}"
                    class="form-check-input border-dark chk">
                </td>
                <td class="text-center border border-dark align-middle">{{ $data->dates }}</td>
                <td class="border border-dark align-middle">{{ $data->title }}</td>
                <td class="border border-dark align-middle">{!! $data->content !!}</td>
                <td class="text-center border border-dark align-middle">
                  <img src="/images/news/{{ $data->photo }}" width="80">
                </td>
                <td class="text-center border border-dark align-middle">
                  <a href="edit/{{ $data->id }}" class="btn btn-success">修改</a>
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
        </form>
        {{ $list->links() }}
      </div>
    </div>
  </div>
</div>
@endsection