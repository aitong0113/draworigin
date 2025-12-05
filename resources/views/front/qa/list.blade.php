@extends("front.layout")
@section("title", "Ｑ＆Ａ")
@section("content")

<link rel="stylesheet" type="text/css" href="/front/qa/qa.css">

<div class="content">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @if (!empty($list)) <!-- 判斷資料是否存在 -->
                @foreach($list as $cnt => $data) <!-- 假設$list是問題列表 -->
                <div class="panel panel-default wow fadeInUp">
                    <div class="panel-heading" role="tab" id="heading{{ $cnt }}">
                        <h4 class="panel-title">
                            <a href="javascript:void(0);" role="button"
                                data-toggle="collapse"
                                data-parent="#accordion"
                                data-target="#collapse{{ $cnt }}"
                                aria-expanded="false"
                                aria-controls="collapse{{ $cnt }}">
                                問題{{ $cnt + 1 }}：{{ $data->title }}
                            </a>
                        </h4>
                    </div>
                    <div id="collapse{{ $cnt }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $cnt }}">
                        <div class="panel-body">
                            <p>{{ $data->content }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection