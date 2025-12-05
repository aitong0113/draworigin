@extends("front.layout")
@section("title","最新消息")
@section("content")
<link rel="stylesheet" href="/front/news/news.css">
<div class="content">
  @if (!empty($list) && sizeof($list) > 0)
  @foreach($list as $data)
  <section class="news_section">
    <div class="img-wrapper wow fadeInRight">
      @if (!empty($data->photo))
      <a href="/news/detail/{{ $data->id }}">
        <img src="/images/news/{{ $data->photo }}">
      </a>
      @endif
    </div>

    <div class="item-wrapper wow fadeInLeft">
      <div class="date">{{ $data->dates }}</div>
      <h3>{{ $data->title }}</h3>
      <p class="news_text">{!! $data->content !!}</p>
      <a href="/news/detail/{{ $data->id }}">
        <div class="set_2_button color1 set_2_btn-1 icon-forward">
          <span>More</span>
        </div>
      </a>
    </div>
  </section>
  @endforeach
  @endif
</div>
@endsection