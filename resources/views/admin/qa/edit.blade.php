@extends("admin.layout")
@section("title", "修改Ｑ＆Ａ")
@section("content")

<!-- 自己加的回上頁+標題 -->
<div>
  <div class="card-header">
    <div class="row">
      <div class="col-2">
        <a href="{{ url('/admin/qa/list') }}" class="btn btn-secondary">回上頁</a>
      </div>
      <div class="col-10 d-flex align-items-center">
        <span class="fw-bold fs-5 text-dark">{{ $qa->title }}</span>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.min.js"></script>

<script>
  $(function() {
    $("#tabs").tabs();
  });
</script>

<div id="tabs" class="mt-3">
  <ul>
    <li><a href="#tab1">標題</a></li>
  </ul>

  <!-- Tab 1 -->
  <div id="tab1">
    <form method="post" action="../update" enctype="multipart/form-data">
      <input type="hidden" name="id" value="{{ $id }}">
      @csrf
      <div class="row">
        <div class="col-1 text-end">日期</div>
        <div class="col-3">
          <input type="date" class="form-control border-dark" name="dates" value="{{ $qa->dates }}">
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-1 text-end">問題</div>
        <div class="col-10">
          <textarea class="form-control border-dark" rows="5" name="title">{{ $qa->title }}</textarea>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-1 text-end">回覆</div>
        <div class="col-10">
          <textarea class="form-control border-dark" rows="5" name="content">{{ str_replace("<br/>", "\n", $qa->content) }}</textarea>
        </div>
      </div>

      <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary btn-lg">確 定</button>
      </div>
    </form>
  </div>

  @foreach(($newsId ?? collect()) as $data)
  <tr>
    <td class="text-center border border-dark align-middle">
      <input type="checkbox" name="id[]" value="{{ $data->id }}" class="form-check-input border-dark chk">
    </td>
    <td class="align-middle border border-dark text-center">
      {{ $data->content }}
    </td>
    <td class="text-center border border-dark align-middle">
      <a href="/admin/qa/edit/{{ $id }}/{{ $data->id }}" class="btn btn-success text-white">修改</a>
    </td>
  </tr>
  @endforeach
  </table>
  </form>
</div>
</div>
@endsection