@extends('front.layout')
@section('title', '繪初畫廊')
@section('content')






<!-- 老師作品 -->

<div class="container-fluid pic" style="background-image: url(/front/about/scrollspy/img/top_img.jpg);"></div>

<!-- 標題 start -->
<div class="info wow fadeInRight" data-wow-delay="1s">
  <h2 style="text-align: center; font-size: 28px; font-weight: bold;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 繪初畫廊
  </h2>
</div>
<!-- 標題 end -->


<!-- myScrollspy 側選單 -->
<nav class="col-sm-3" id="myScrollspy">
  <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="500">
    <li><a href="#section1">2024年<span class="small">●</span></a></li>
    <li><a href="#section2">2023年<span class="small">●</span></a></li>
    <li><a href="#section3">2022年<span class="small">●</span></a></li>
    <li><a href="#section4">2021年<span class="small">●</span></a></li>
  </ul>
</nav>
<!-- myScrollspy 側選單 -->


<!-- myScrollspy start -->
<div class="row scrollspy_con">

  <div class="col-sm-9">
    <div id="section1">
      <div class="row">
        <div class="info_left wow fadeInRight" data-wow-delay="1s">
          <img src="/front/about/scrollspy/img/01.jpg">
        </div>
        <div class="info_right wow fadeInLeft" data-wow-delay="1s">
          <p><span class="title">《草泥馬歪頭殺》<br></span>有沒有覺得牠的眼神就是滿滿「傲嬌感」？
            靈感就是來自生活裡那些搞怪又無厘頭的瞬間。
            把這種幽默感放到 T-shirt 上，讓人穿著的時候也能帶著一點小壞笑，
            就像在日常裡偷偷放了顆笑點炸彈～
          </p>
        </div>
      </div>
    </div>


    <div id="section2">
      <div class="row row_flex">
        <div class="info_left wow fadeInRight" data-wow-delay="0.5s" style="order: 2;">
          <p><span class="title">《時間賽跑》<br></span>在緊湊的時鐘齒輪間，我在鍵盤上狂奔，
            程式碼像是滿天飛的紙片題目，雖然總是追著、拉扯著，
            有時候甚至快要崩潰，
            但每一次小小的 debug 都像暗夜裡的亮光。
            這幅作品就是我和時間的角力，
            不只是壓力，
            更像是一場跟自己賽跑的冒險！
          </p>
        </div>
        <div class="info_right wow fadeInLeft" data-wow-delay="0.5s" style="order: 1;">
          <img src="/front/about/scrollspy/img/02.jpg">
        </div>
      </div>
      <div class="row">
        <div class="info_left wow fadeInRight" data-wow-delay="0.5s">
          <img src="/front/about/scrollspy/img/03.jpg">
        </div>
        <div class="info_right wow fadeInLeft" data-wow-delay="0.5s">
          <p><span class="title">《魔羯座 · Capricorn》<br></span>魔羯是努力與堅毅的象徵，
            在這幅作品裡，我把牠化為一個擁有魚尾的少女，
            她懷抱著夢想與星辰，靜靜守護著屬於自己的小宇宙。

            紫色和粉色的層疊，
            是夜空與夢境交織的顏色；
            繁複的魚鱗與流動的髮絲，
            象徵魔羯雖然沉穩，卻依然擁有澎湃的靈魂。

            在創作這張插畫的過程中，
            我希望每個看見它的人，
            都能感受到魔羯那份「努力卻溫柔」的力量，
            提醒自己：走得慢也沒關係，
            只要不停止，就會離夢想越來越近。</p>
        </div>
      </div>
    </div>

    <div id="section3">
      <div class="row row_flex">
        <div class="info_left wow fadeInRight" data-wow-delay="0.5s" style="order: 2;">
          <p><span class="title">《每日時光》<br></span>什麼時候會覺得最幸福？
            對我來說，是那些看似平凡的日子：陪伴孩子、一起笑鬧、
            看見他們單純的笑容。
            所以我用泡泡來構圖，把這些親子相處的片刻都藏進去～
            創作這幅插畫的時候，自己也會被療癒，
            每次看到就忍不住嘴角上揚。</p>
        </div>
        <div class="info_right wow fadeInLeft" data-wow-delay="0.5s" style="order: 1;">
          <img src="/front/about/scrollspy/img/04.jpg">
        </div>
      </div>
    </div>

    <div id="section4">
      <div class="row">
        <div class="info_left wow fadeInRight" data-wow-delay="0.5s">
          <img src="/front/about/scrollspy/img/06.jpg">
        </div>
        <div class="info_right wow fadeInLeft" data-wow-delay="0.5s">
          <p><span class="title">《魔法雜貨鋪》<br></span>這是一家隱藏在黑夜裡的小店，
            裡頭擺滿了奇奇怪怪的瓶瓶罐罐、蠟燭、藥草，
            還有骨頭和看起來會自己動的玩偶。

            老闆是誰？
            是一個戴著高帽、總是笑得神祕的人，
            好像什麼都能賣給你，
            但真正要的是什麼……只有他自己知道。

            把插畫做成拼圖，
            就像真的「拼湊」一個魔法世界一樣。
            每一片拼好，故事就更完整一點，
            拼到最後，你也成了這家店的常客
          </p>
        </div>
      </div>
    </div>


    <div id="section5">
      <div class="row row_flex">
        <div class="info_left wow fadeInRight" data-wow-delay="0.5s" style="order: 2;">
          <p><span class="title">《守護之鳥》<br></span>這隻金黃色的鳥，不只是鳥。
            牠像是一台奇妙的機械，也像是一位沉默的守護者，
            背著小小的秘密、帶著其他小鳥一起飛翔。

            我用了誇張的比例和亮眼的顏色，
            想讓牠看起來「笨重卻又溫柔」。
            就像我們生活裡遇到的人或角色——
            外表可能呆呆的，但心裡卻裝著最溫暖的力量。

            看著牠，會覺得好像也有什麼在默默守護著自己。</p>
        </div>
        <div class="info_right wow fadeInLeft" data-wow-delay="0.5s" style="order: 1;">
          <img src="/front/about/scrollspy/img/05.jpg">
        </div>
      </div>
    </div>


  </div>


</div>
<!-- myScrollspy end -->




@endsection