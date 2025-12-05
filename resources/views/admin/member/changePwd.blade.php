@extends('admin.layout')
@section('title', '修改密碼')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">修改會員密碼：</div>
    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form action="{{ route('admin.member.changePwd.update', $member->id) }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="password" class="form-label">新密碼</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">確認新密碼</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">更新密碼</button>
        <a href="{{ route('admin.member.list') }}" class="btn btn-secondary">返回</a>
      </form>
    </div>
  </div>
</div>
@endsection