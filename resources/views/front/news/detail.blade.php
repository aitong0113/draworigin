@extends("front.layout")
@section("title", "最新消息")
@section("content")



<link rel="stylesheet" href="/front/commons/page/css/page_detail.css" type="text/css">



<!-- content'start -->
<div class="content">
  @if(!empty($list) && sizeof($list) > 0)
  <!-- page介紹 start -->

  <!-- 標題 start -->
  <div class="info wow fadeInRight" >
    <h2 style="text-align: center; font-size: 28px; font-weight: bold;">
      王同學作品
    </h2>
    <p style="text-align: center; font-size: 18px; margin-top: 10px;">
      三天各3小時的 Procreate 蛇年插畫課超好玩！第一天像開新遊戲，學兩指復原、圖層跟對稱，把彎彎小金蛇畫出來。第二天上色加陰影、高光，做了三張小小新年圖：抱紅包、探出春聯、掛燈籠，畫面留空白更好看。第三天把尺寸調成明信片，邊邊留白、加祝福字，輸出印出來，熱熱的紙超香，剪好送爸媽和阿公阿嬤。我覺得自己不是只會畫，而是能把年味變成禮物，超有成就感！
    </p>
  </div>
  <!-- 標題 end -->

  <div class="page">
    @php $cnt = 0; @endphp
    @foreach($list as $data)
    @if(!empty($data->content) && !empty($data->photo))
    @php $cnt++; @endphp
    @if($cnt % 2 == 1)
    <div class="row">
      <div class="info_left">
        <img src="/images/news/{{ $data->photo }}">
      </div>
      <div class="info_right">
        <p>{!! $data->content !!}</p>
      </div>
    </div>
    @else
    <div class="row">
      <div class="info_left">
        <p>{!! $data->content !!}</p>
      </div>
      <div class="info_right">
        <img src="/images/news/{{ $data->photo }}">
      </div>
    </div>
    @endif
    @else
    @if(!empty($data->photo))
    <div class="info">
      <img src="/images/news/{{ $data->photo }}">
    </div>
    @endif

    @if(!empty($data->content))
    <div class="info">
      <p>{!! $data->content !!}</p>
    </div>
    @endif
    @endif
    @endforeach
  </div>
  <!-- page介紹 end -->
  @endif
</div>
<!-- content'end -->

@endsection