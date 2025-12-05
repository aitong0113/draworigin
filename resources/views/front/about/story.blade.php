@extends('front.layout')
@section('title','品牌故事')

@section('content')
<section class="story_section">
  <div class="about_con" id="fullpage">

    {{-- 第一屏：靠右對齊 --}}
    <div class="item img_1 section">
      <div class="text layout_r_r wow fadeIn">
        <h2 class="maintitle">繪初 · Draw Origin</h2>
        <div class="subtitle" data-wow-delay="0.3s">品牌理念 Brand Concept</div>
        <p class="pp" data-wow-delay="0.6s">
          「繪初」代表畫下第一筆的勇氣。<br>
          我們相信，每一筆都能開啟新的可能，<br>
          從日常生活的片刻，到無限的想像世界，<br>
          插畫是連結自我與世界的橋樑。
        </p>
      </div>
    </div>

    {{-- 第二屏：靠左對齊 --}}
    <div class="item img_2 section">
      <div class="text layout_l_l wow fadeIn">
        <h2 class="maintitle">教學特色</h2>
        <p class="pp" data-wow-delay="0.6s">
          在繪初，我們不只是學技巧，<br>
          更陪伴你找到屬於自己的插畫語言。<br><br>
          🎨 打造個人風格<br>
          📖 創作專屬故事<br>
          🌱 一步步耐心引導<br><br>
          讓每位學員都能畫出「自己」的故事。
        </p>
      </div>
    </div>

    {{-- 第三屏：靠右對齊 --}}
    <div class="item img_3 section">
      <div class="text layout_r_r wow fadeIn">
        <h2 class="maintitle">品牌願景</h2>
        <div class="subtitle" data-wow-delay="0.3s">From a single stroke, infinite stories</div>
        <p class="pp" data-wow-delay="0.6s">
          我們相信，插畫是一種生活態度。<br>
          它能療癒心靈，讓故事生長，讓世界更柔軟。<br><br>
          「繪初 Draw Origin」期許成為一個平台，<br>
          讓更多人透過插畫，<br>
          找回觀察生活、表達自我與創造想像的力量。
        </p>
      </div>
    </div>

  </div>
</section>
@endsection