@extends("admin.layout")
@section("title", "會員管理")
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
            <a href="javascript:doDelete('list')" class="btn btn-secondary">刪除</a>
          </div>
          <div class="col-2">
            <a href="export" class="btn btn-secondary">匯出</a>
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
                  <input type="checkbox" class="form-check-input" id="all">
                </th>
                <th class="col-3 text-center">帳號</th>
                <th class="col-3 text-center">姓名</th>
                <th class="col-3 text-center">密碼</th>
                <th class="col-3 text-center">修改密碼</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $data)
              <tr>
                <td class="text-center">
                  <input type="checkbox" name="id[]" value="{{ $data->id }}" class="form-check-input chk">
                </td>
                <td class="text-center">{{ $data->email }}</td>
                <td class="text-center">{{ $data->userName }}</td>
                <td class="text-center">{{ $data->pwd }}</td>
                <td class="text-center align-middle">
                  <a href="{{ route('admin.member.changePwd', $data->id) }}" class="btn btn-secondary btn-sm">修改密碼</a>
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