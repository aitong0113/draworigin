 @extends("front.layout")
 @section("content")
 <!--Start Banner -->
 <div class="flexslider">
   <ul class="slides">
     <li class="item_1 item">
       <div class="masking_w">
         <div class="text layout_r_2 right">
           <div class="mainimg_video wow fadeInUp"><a href="sale_detail.html"><img src="/front/index/banner_2/img/img1_word.png"></a></div>
           <p class="wow fadeInUp" data-wow-delay="0.5s">提到花總是令人聯想到春天來了或是朝氣蓬勃的感覺<br>
             花總是能讓一個平凡無其的空間或環境<br>
             增添一些色彩跟活力。
           </p>
         </div>
       </div>
     </li>
     <li class="item_2 item">
       <div class="masking_w">
         <div class="text layout_l_3 left">
           <div class="subtitle">百花爭艷,繁花似錦</div>
           <p>提到花總是令人聯想到春天來了或是朝氣蓬勃的感覺<br>
             花總是能讓一個平凡無其的空間或環境<br>
             增添一些色彩跟活力。
           </p>
         </div>
       </div>
     </li>
     <li class="item_3 item">
       <div class="masking_w">
         <div class="text layout_l_2 left">
           <h2 class="maintitle">經營者的話</h2>
           <div class="subtitle">百花爭艷,繁花似錦</div>
           <p>提到花總是令人聯想到春天來了或是朝氣蓬勃的感覺<br>
             花總是能讓一個平凡無其的空間或環境<br>
             增添一些色彩跟活力。
           </p>
         </div>
       </div>
     </li>
     <li class="item_4 item">
       <div class="masking_w">
         <div class="text layout_l_2 left">
           <h2 class="maintitle">經營者的話</h2>
           <div class="subtitle">百花爭艷,繁花似錦</div>
           <p>提到花總是令人聯想到春天來了或是朝氣蓬勃的感覺<br>
             花總是能讓一個平凡無其的空間或環境<br>
             增添一些色彩跟活力。
           </p>
         </div>
       </div>
     </li>
   </ul>
 </div>
 <!--End Banner -->

 <section class="info">
   <p class="wow fadeInDown2" data-wow-delay="0.2s" style="left: 50%"><span class="big">花 </span>是一個偉大的美化者,我們希望藉由花改變人們的生活方式,<br>
     並藉由花來將平凡無其的每一天變得更加精采,繽紛。<br>
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
       <p class="b_info wow fadeInDown2" data-wow-delay="0.3s">Flower is a great Beautifier</p>
     </a>
   </div>
   <div class="col-md-6 item">
     <a href="#">
       <img src="/front/index/img/index_s1.jpg" class="img-responsive wow fadeInLeft" data-wow-delay="0.5s">
       <p class="s_info_l wow fadeInDown2" data-wow-delay="0.3s">每年外銷國外花卉不下百萬支<br>但我們願意<br>將好的留給你們</p>
     </a>
   </div>
   <div class="col-md-6 item">
     <a href="#">
       <img src="/front/index/img/index_b2.jpg" class="img-responsive wow fadeInLeft" data-wow-delay="0.3s">
       <p class="b_info wow fadeInDown2" data-wow-delay="0.3s">Life with Flower</p>
     </a>
   </div>
   <div class="col-md-6 item">
     <a href="#">
       <img src="/front/index/img/index_s2.jpg" class="img-responsive wow fadeInRight" data-wow-delay="0.3s">
       <p class="s_info_r wow fadeInDown2" data-wow-delay="0.3s">每支花<br>都是為你/妳而種</p>
     </a>
   </div>
 </div>
 <!-- 瀑布流 end-->

 <section class="info info_2 wow fadeInUp" data-wow-delay="0.5s">
   <p><span class="big">花 </span>的種類百百種，但每支花卻都是獨一無二。商品是制式的，但每支花卻都蘊含著不同的生長歷程及故事，有的花短有的花長，有的花朵大有的花朵小，這都代表著他們經歷著不同的過去，擁有著不同的特色，這些都是為了獻給最獨特的你。</p>
 </section>


 <!-- 推薦商品 start-->
 <div class="index_slider wow fadeIn" data-wow-delay="0.5s">
   <div class="rec-list slider">
     <a href="#">
       <img src="/front/product/productlist/img/01.jpg">
     </a>
     <a href="#">
       <img src="/front/product/productlist/img/02.jpg">
     </a>
     <a href="#">
       <img src="/front/product/productlist/img/03.jpg">
     </a>
     <a href="#">
       <img src="/front/product/productlist/img/04.jpg">
     </a>
     <a href="#">
       <img src="/front/product/productlist/img/05.jpg">
     </a>
     <a href="#">
      
       <img src="/front/product/productlist/img/03.jpg">
     </a>
   </div>
 </div>
 <!-- 推薦商品 end-->
  @endsection