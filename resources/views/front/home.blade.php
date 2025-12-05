@extends("front.layout")
@section("content")

<!--Start Banner -->
<div class="flexslider">
  <ul class="slides">
    <li class="item_1 item">
      <div class="masking_w">
        <div class="text layout_r_2 right">
          <div class="mainimg_video wow fadeInUp">
            <a href="sale_detail.html"><img src="/front/index/banner_2/img/img1_word.png"></a>
          </div>
          <p class="wow fadeInUp" data-wow-delay="0.5s">
            提到插畫，總是會讓人想到童年的塗鴉、腦海裡的奇妙世界。<br>
            一張小小的畫，就能讓平凡的日子多一點色彩，<br>
            也能讓心情變得輕盈而溫暖。
          </p>
        </div>
      </div>
    </li>
    <li class="item_2 item">
      <div class="masking_w">
        <div class="text layout_l_3 left">
          <h3 class="subtitle">繽紛筆觸，描繪日常</h3>
          <p>
            每一筆線條，都是心情的延伸；<br>
            每一抹色彩，都藏著故事的秘密。<br>
            繪初相信，插畫能讓生活閃閃發光。
          </p>
        </div>
      </div>
    </li>
    <li class="item_3 item">
      <div class="masking_w">
        <div class="text layout_l_2 left">
          <h2 class="maintitle">創作者的話</h2>
          <div class="subtitle">畫下想像，留下感動</div>
          <p>
            我們用插畫記錄生活的美好，<br>
            有時是簡單的線條，有時是繽紛的色塊。<br>
            無論形式，都蘊含著獨一無二的故事。
          </p>
        </div>
      </div>
    </li>
    <li class="item_4 item">
      <div class="masking_w">
        <div class="text layout_l_2 left">
          <h2 class="maintitle">創作者的話</h2>
          <div class="subtitle">插畫是生活的魔法</div>
          <p>
            我們希望藉由插畫，為日常添上亮亮的顏色，<br>
            讓平凡的一天，也能繽紛又充滿小小驚喜。<br>
            這就是繪初存在的意義。
          </p>
        </div>
      </div>
    </li>
  </ul>
</div>
<!--End Banner -->


<section class="info" data-wow-delay="0.5s">
  <p class="wow fadeInDown2" data-wow-delay="0.2s" style="left: 50%">
    <span class="big">想像力</span>，是一種神奇的魔法，繪初相信，每一筆線條、每一抹色彩，都能把日常變得不一樣。能裝進孩子的想像力、藏著大人的溫柔心意。讓平凡的一天，也能閃閃發光，充滿驚喜與笑容。
  </p>
  <div class="wow fadeInUp" data-wow-delay="0.6s"><a href="story.html">
      <div id="first" class="buttonBox">
        <button>品牌故事</button>
        <div class="border"></div>
        <div class="border"></div>
      </div>

    </a></div>
  </p>
</section>


<!-- 瀑布流 start-->
<div class="index_masonry row masonry">
  <div class="col-md-6 item">
    <a href="#">
      <img src="/front/index/img/index_b1.jpg" class="img-responsive wow fadeInRight" data-wow-delay="0.5s">
      <!-- <p class="b_info wow fadeInDown2" data-wow-delay="0.3s">Flower is a great Beautifier</p> -->
    </a>
  </div>
  <div class="col-md-6 item">
    <a href="#">
      <img src="/front/index/img/index_s1.jpg" class="img-responsive wow fadeInLeft" data-wow-delay="0.5s">
      <p class="s_info_l wow fadeInDown2" data-wow-delay="0.3s">把塗鴉變成故事<br>把故事變成回憶</p>
    </a>
  </div>
  <div class="col-md-6 item">
    <a href="#">
      <img src="/front/index/img/index_b2.jpg" class="img-responsive wow fadeInLeft" data-wow-delay="0.3s">
      <!-- <p class="b_info wow fadeInDown2" data-wow-delay="0.3s">Life with Flower</p> -->
    </a>
  </div>
  <div class="col-md-6 item">
    <a href="#">
      <img src="/front/index/img/index_s2.jpg" class="img-responsive wow fadeInRight" data-wow-delay="0.3s">
      <p class="s_info_r wow fadeInDown2" data-wow-delay="0.3s">想像力<br>就是我們的超能力</p>
    </a>
  </div>
</div>
<!-- 瀑布流 end-->

<section class="info" data-wow-delay="0.5s">
  <p><span class="big">畫 </span>的方式千千萬萬，但每一筆卻都是獨一無二。作品可能看似相似，但每一幅畫都藏著不同的心情與故事，有的線條俐落、有的顏色繽紛，有的構圖簡單、有的細膩繁複，這些都代表著創作者經歷的時刻與感受。繪初相信，每一幅畫，都是為了成就最獨特的你。</p>
</section>

<!-- 標題 start -->
<h2 style="text-align: center; font-size: 28px; font-weight: bold; margin: 40px 0 20px;">
  Abbie老師作品
</h2>
<!-- 標題 end -->

<!-- 推薦商品 start-->
<div class="index_slider wow fadeIn" data-wow-delay="0.5s">
  <div class="rec-list slider">
    <a href="#">
      <img src="/front/product/productlist/img/00.jpg">
    </a>
    <a href="#">
      <img src="/front/product/productlist/img/01.jpg">
    </a>
    <a href="#">
      <img src="/front/product/productlist/img/02.jpg">
    </a>
    <a href="#">
      <img src="/front/product/productlist/img/05.jpg">
    </a>
    <a href="#">
      <img src="/front/product/productlist/img/06.jpg">
    </a>
    <a href="#">
      <img src="/front/product/productlist/img/07.jpg">
    </a>
  </div>
</div>
<!-- 推薦商品 end-->
@endsection