<!DOCTYPE html>
<html lang="zh" class="no-js">

<head>


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>繪初 · Draw Origin</title>
  <meta name="description" content="網站描述">
  <meta name="keywords" content="關鍵字;關鍵字;關鍵字;關鍵字;關鍵字;關鍵字">
  <!--header's CSS-->
  <link href="/front/commons/header/css/bootstrap.min.css" rel="stylesheet">
  <link href="/front/commons/header/css/animate.css" rel="stylesheet">
  <link href="/front/commons/page/css/animate_new.css" rel="stylesheet">
  <link href="/front/commons/header/css/bootsnav.css" rel="stylesheet">
  <link href="/front/commons/header/css/overwrite.css" rel="stylesheet">
  <link href="/front/commons/header/css/color.css" rel="stylesheet">
  <link href="/front/commons/header/fonts/FontAwesome/font-awesome.css" rel="stylesheet">
  <link href="/front/commons/content/css/content.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <style type="text/css">
    @import url(http://fonts.googleapis.com/earlyaccess/cwtexhei.css);
  </style>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <script>
    // AJAX 取得購物車
    function getCart() {
      $.ajax({
        url: "/shopCart/getCart",
        type: "get",
        success: function(msg) {
          $("#cartList").html(msg.html);
          $("#cartNum").text(msg.cartNum);
        },
        error: function() {
          console.warn("getCart AJAX error");
        }
      });
    }

    $(document).ready(function() {
      getCart(); // 每頁載入時更新購物車
    });
  </script>


  <!--footer's CSS-->
  <link href="/front/commons/footer/css/footer.css" rel="stylesheet">
  <!-- GotoTop's CSS-->
  <link rel="stylesheet" href="/front/commons/gototop/css/gototop.css">

  <!--shopcart's CSS-->
  <link rel="stylesheet" href="/front/commons/shopcart/css/shopcart.css">

  <!--scrollspy's CSS-->
  <link rel="stylesheet" href="about/scrollspy/css/scrollspy.css">

  <link rel="stylesheet" href="commons/page/css/page.css" type="text/css">

  <!--banner_2's CSS-->
  <link rel="stylesheet" type="text/css" href="/front/index/banner_2/css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="/front/index/banner_2/css/banner_2.css">

  <!--index's CSS-->
  <link rel="stylesheet" type="text/css" href="/front/index/css/index.css">

  <!-- slickSlider's CSS -->
  <link rel="stylesheet" href="/front/commons/slickSlider/css/slick.css" type="text/css">
  <link rel="stylesheet" href="/front/commons/slickSlider/css/slick-theme.css" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.3/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.3/dist/sweetalert2.min.css" rel="stylesheet">

  @if(Request::is(''))
  <script src="/front/js/common.js"></script>
  @endif



  <!--about's CSS-->
  @if (request()->is(['story', 'teacher', 'introduce', 'about*']))
  <link rel="stylesheet" href="/front/about/fullPage/css/about.css" type="text/css">
  <link rel="stylesheet" href="/front/about/fullPage/css/button.css" type="text/css">
  <link rel="stylesheet" href="/front/about/scrollspy/css/scrollspy.css">
  <link rel="stylesheet" href="/front/commons/page/css/page.css" type="text/css">
  @endif



  @if(Request::is(''))
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
<script src="/front/commons/header/js/html5shiv.min.js"></script>
<script src="/front/commons/header/js/respond.min.js"></script>
<![endif]-->
  <!--footer's CSS-->
  <link href="/front/commons/footer/css/footer.css" rel="stylesheet">
  <!-- GotoTop's CSS-->
  <link rel="stylesheet" href="/front/commons/gototop/css/gototop.css">

  <!--shopcart's CSS-->
  <link rel="stylesheet" href="/front/commons/shopcart/css/shopcart.css">
  @endif


  @if(Request::is('teacher'))
  <link rel="stylesheet" href="/front/about/aboutus_1/css/teacher.css">
  @endif


  <!--shopcart's CSS-->
  <link rel="stylesheet" href="commons/shopcart/css/shopcart.css">

  <script>
    function login() {
      const email = $("#email").val();
      const pwd = $("#pwd").val();
      const code = $("#code").val();

      $("#msg1, #msg2, #msg3").html("");

      if (!email) {
        $("#msg1").html("<font color='red'>請輸入Email</font>");
        $("#email").focus();
        return;
      }
      if (!pwd) {
        $("#msg3").html("<font color='red'>請輸入密碼</font>");
        $("#pwd").focus();
        return;
      }
      if (!code) {
        $("#msg2").html("<font color='red'>請輸入驗證碼</font>");
        $("#code").focus();
        return;
      }

      $("#btn1").hide();
      $("#wait").show();

      $.ajax({
        url: "/member/doLogin",
        type: "post",
        data: $("#loginForm").serialize(),
        success: function(msg) {
          const t = msg.trim();
          if (t === "error") {
            $("#msg1").html("<font color='red'>帳號或密碼錯誤</font>");
            $("#email").focus();
          } else if (t === "code") {
            $("#msg2").html("<font color='red'>驗證碼錯誤</font>");
            $("#captcha").trigger("click");
            $("#code").val("").focus();
          } else {
            location.href = t;
          }
          $("#wait").hide();
          $("#btn1").show();
        },
        error: function(xhr) {
          console.error("Login AJAX Error:", xhr.status, xhr.statusText);
          $("#msg1").html("<font color='red'>伺服器錯誤，請稍後再試</font>");
          $("#wait").hide();
          $("#btn1").show();
        }
      });
    }



    function doLogout() {
      Swal.fire({
        title: "確定登出?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "確定登出",
        denyButtonText: "不要登出"
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = "/member/logout";
        }
      });
    }
  </script>


</head>

<body>


  <!-- 再載入依賴 jQuery 的外掛 -->
  <script src="/front/commons/slickSlider/js/slick.js"></script>
  <script src="/front/commons/wow/js/wow.min.js"></script>


  <script src="/front/product/productlist/js/jquery.lazyload.js" type="text/javascript"></script>
  <!-- Start Navigation -->
  <nav class="navbar navbar-default navbar-fixed dark bootsnav">
    <!-- Start Top Search -->
    <div class="top-search">
      <div class="container">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-search"></i></span>
          <input type="text" class="form-control" placeholder="Search products...">
          <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
      </div>
    </div>
    <!-- End Top Search -->
    <div class="container">
      <!-- Start Atribute Navigation -->
      <div class="attr-nav">
        <ul>
          <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>

          <li class="dropdown lang">
            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i></a>
            <ul class="dropdown-menu animated" style="left:-30px;">
              <li class="act"><a href="#">中文</a></li>
              <li><a href="#">English</a></li>
            </ul>
          </li>

          <!-- User -->
          @if (empty(session()->get('memberId')))
          <li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-user"></i></a></li>
          @else
          <li><a href="/member/logout"><i class="fa fa-sign-out-alt"></i></a></li>
          @endif


          <!-- Cart -->
          <li class="dropdown">
            <a href="/shopCart/list" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="badge" id="cartNum"
                style="background:red;color:white;border-radius:50%;padding:2px 6px;font-size:12px;position:relative;top:-5px;left:-10px;">

              </span>
            </a>
            <ul class="dropdown-menu cart-list" id="cartList">
              <!-- AJAX 填充 -->
            </ul>
          </li>



      </div>
      <!-- End Atribute Navigation -->
      <!-- Start Header Navigation -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="/"><img src="/front/commons/header/img/brand/logo-black.png" class="logo" alt=""></a>
      </div>
      <!-- End Header Navigation -->
      <!-- #navbar-menu start -->
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
          <li class="lang">
            <span class="act"><a href="#">中文</a></span>
            <span><a href="#">English</a></span>
          </li>
          <li class="search"><a href="#"><i class="fa fa-search">&nbsp;Search products</i></a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">關於繪初</a>
            <ul class="dropdown-menu">
              <li><a href="/story">品牌故事</a></li>
              <li><a href="/teacher">師資陣容</a></li>
              <li><a href="/introduce">繪初畫廊</a></li>
            </ul>
          </li>


          <!-- 改了這裡 -->
          @if (!empty(session()->get("layer")))
          <li class="dropdown">
            <a href="/product/list" class="dropdown-toggle" data-toggle="dropdown">產品服務</a>
            <ul class="dropdown-menu">
              @foreach(session()->get("layer") as $data)
              <li>
                <a href="/product/list/{{ $data->id }}">{{ $data->layer_name }}</a>
              </li>
              @endforeach
            </ul>
          </li>
          @else
          <li><a href="/product/list">產品介紹</a></li>
          @endif


          <li><a href="/news">學員作品</a></li>
          <li><a href="/qa">Q&A</a></li>
          <li><a href="/contact">聯絡我們</a></li>
        </ul>
      </div>
      <!-- #navbar-menu END -->
    </div>
  </nav>
  <!-- End Navigation -->
  <div class="clearfix"></div>

  <!-- login start -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="modal-title logo" id="exampleModalLongTitle"><img src="/front/commons/header/img/brand/logo-black.png"></div>
        </div>
        <div class="modal-body">
          <form method="post" id="loginForm">
            @csrf
            <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="請輸入您的E-mail">
                <div id="msg1"></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">密碼</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="請輸入您的密碼">
                <div id="msg3"></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputCaptcha" class="col-sm-2 col-form-label">驗證碼</label>
              <div class="col-sm-7">
                <input class="form-control" name="code" id="code" placeholder="請輸入驗證碼">
                <div id="msg2"></div>
              </div>
              <img src="/captcha/flat" class="col-sm-3" onclick="this.src='/captcha/flat?' + Math.random()" style="cursor:pointer">
            </div>
            <div class="form-group row link">
              <span class="col-sm-9">
                <a href="/member/forget"><i class="fa fa-question-circle"></i>忘記密碼&nbsp;/&nbsp;</a>
                <a href="/member/verifi"><i class="fa fa-envelope"></i>重寄驗證信</a>
              </span>
              <span class="col-sm-3">
                <a href="/member/join"><i class="fa fa-user"></i>立即註冊</a>
              </span>
            </div>



            <button type="button" id="btn1" class="btn-basic btn-submit"
              style="background:rgb(216, 220, 221);border:1px solid #dadce0;color: #3c4043;border-radius:9999px;padding:.55rem 1rem;" onclick="login(); return false">登入</button>
            <div id="wait" class="text-center" style="display: none" ;>
              <img src="/images/loading.gif" width="100">
            </div>

            <button type="button" class="btn-basic"
              style="background:#f1f3f4;border:1px solid #dadce0;color:#3c4043;border-radius:9999px;padding:.55rem 1rem;">
              <img src="/images/Google.png" alt="" style="width:18px;height:18px;margin-right:8px;vertical-align:middle;">
              以 Google 登入
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  login end
  @yield("content")
  <div class="footer">
    <div class="footer_l">
      <ul class="info">
        <li><a href="tel:+886-4-2258-6601">Tel.：0976891598</a></li>
        <li><a href="https://maps.app.goo.gl/psCax3dRnf1ddv89A" target="_blank">Addr.：台中市南屯區春安三街197號</a></li>
        <li> <a href="mailto:aitong0113@gmail.com?subject=Abbie您好" class="left">E-mail：aitong0113@gmail.com</a></li>
      </ul>
    </div>

    <div class="footer_r">
      <ul class="f_nav">
        <li><a href="/story">關於繪初</a></li>
        <li><a href="/product/list">產品服務</a></li>
        <li><a href="/news">學員作品</a></li>
        <li><a href="/qa">Q&A</a></li>
        <li><a href="/contact">聯絡我們</a></li>
      </ul>
      <ul class="icon">
        <li><a href="#" target="_blank"><img src="/front/commons/footer/img/icon_fb.svg"></a></li>
        <li><a href="#" target="_blank"><img src="/front/commons/footer/img/icon_line.svg"></a></li>
        <li><a href="#" target="_blank">
            <img src="/front/commons/footer/img/icon_ig.svg">
          </a></li>
        <li><a href="#" target="_blank"><img src="/front/commons/footer/img/icon_twitter.svg"></a></li>
        <li><a href="#" target="_blank"><img src="/front/commons/footer/img/icon_youtube.svg"></a></li>
        <li><a href="#" target="_blank"><img src="/front/commons/footer/img/icon_weibo.svg"></a></li>
        <li><a href="#" target="_blank"><img src="/front/commons/footer/img/icon_wechat.svg"></a></li>
        <li><a href="#" target="_blank"><img src="/front/commons/footer/img/icon_pinterest.svg"></a></li>
      </ul>
      <div class="copyright"> © 2018 IDEAMAX. All Rights Reserved | <a href="http://ideamax.com.tw/" target="_blank">Design by Abbie Lin</a></div>
    </div>
  </div>


  <!-- Scroll to Top button selector-->
  <div><a class="to-top"><img src="/front/commons/gototop/img/arrow-up.svg"></a></div>
  <div><a class="to-top-s"><img src="/front/commons/gototop/img/arrow-up.svg"></a></div>
  <!--header's JS-->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="/front/commons/header/js/bootstrap.min.js"></script>
  <script src="/front/commons/header/js/bootsnav.js"></script>
  <!-- GotoTop's JS-->
  <script src="/front/commons/gototop/js/jquery.toTop.min.js"></script>

  <!--banner_2's JS-->
  <script type="text/javascript" src="/front/index/banner_2/js/jquery.flexslider-min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.flexslider').flexslider({
        directionNav: true,
        pauseOnAction: false
      });
    });
  </script>

  <!-- masonry -->
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  <script>
    if ($(window).width() < 990) {
      $(function() {
        $('').masonry({
          itemSelector: ''
        });
      });
    } else {
      jQuery(window).on('load', function() {
        $('.masonry').masonry({
          itemSelector: '.item'
        });
      });
    }
  </script>

  <!-- slickSlider's JS -->
  <script src="/front/commons/slickSlider/js/slick.js"></script>

  <!-- wow's JS -->
  <script src="/front/commons/wow/js/wow.min.js"></script>

  <script src="/front/product/productlist/js/jquery.lazyload.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(function() {
      $(".masonry").lazyload();
      $(".content img").lazyload();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#fullpage').fullpage({
        anchors: ['firstPage', 'secondPage', 'thirdPage']
      });
    });
  </script>



  <script type="text/javascript">
    $(document).ready(function() {
      $('#fullpage').fullpage({
        anchors: ['firstPage', 'secondPage', 'thirdPage']
      });
    });
  </script>



  <script>
    function getCart() {
      $.ajax({
        url: "/shopCart/getCart",
        type: "get",
        success: function(msg) {
          $("#cartList").html(msg.html);
          $("#cartNum").text(msg.cartNum);
        }
      });
    }

    $(document).ready(function() {
      getCart(); // 每頁一載入就更新購物車
    });
  </script>



  <!-- Scroll to Top button selector-->
  <div><a class="to-top"><img src="/front/commons/gototop/img/arrow-up.svg"></a></div>
  <div><a class="to-top-s"><img src="/front/commons/gototop/img/arrow-up.svg"></a></div>



  <!-- wow.js (動畫效果) -->
  <script src="/front/commons/wow/js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>

  <!-- scrollspy -->
  <script>
    $("a[href^='#']").on('click', function(e) {

      // prevent default anchor click behavior
      e.preventDefault();

      // store hash
      var hash = this.hash;

      // animate
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function() {

        // when done, add hash to url
        // (default click behaviour)
        window.location.hash = hash;
      });

    });
  </script>


  @if(Request::is('story'))
  <!-- fullPage.js -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#fullpage').fullpage({
        autoScrolling: true,
        scrollHorizontally: true
      });
    });
  </script>
  @endif



  @if(Request::is('teacher'))
  <!-- aboutus_1's js-->
  <script type="text/javascript" src="/front/about/aboutus_1/js/custom.modernizr.min.js"></script>
  <script src="/front/about/aboutus_1/js/jquery.parallux.js"></script>
  <script>
    $(function() {
      $(".parallux").parallux({
        onMobile: 'fixed',
        fullHeight: true
      });
    });
  </script>
  @endif

  <!--bgPosition垂直滾動-->
  <script type="text/javascript" src="/front/about/aboutus_1/js/jquery.backgroundpos.js"></script>



</body>

</html>