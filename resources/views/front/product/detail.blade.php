@extends("front.layout")
@section("title", $product->itemName ?? "產品內容")

{{-- ✅ body 加 class --}}
@section("bodyClass", "product-detail")

{{-- ✅ 引用專用 CSS --}}
@section("css")
<link rel="stylesheet" href="{{ asset('front/product/product_detail/css/product_detail.css') }}">
<link rel="stylesheet" href="{{ asset('front/commons/page/css/page.css') }}">

<style>
  /* 只在產品頁生效：放大內距 */
  #product-detail {
    padding: 200px 100px 120px 100px !important;
    box-sizing: border-box;
  }

  @media (max-width: 991.98px) {
    #product-detail {
      padding: 120px 20px 80px !important;
    }
  }

  /* 標題換行 */
  #product-detail .product_header h2 {
    white-space: normal !important;
    word-break: keep-all !important;
    overflow-wrap: break-word !important;
    line-height: 1.5 !important;
  }

  /* 圖片防爆版 */
  #product-detail .bx_pic img,
  #product-detail .recommend-list img,
  #product-detail .thumb .imgs {
    max-width: 100%;
    height: auto;
    display: block;
  }

  /* 推薦商品圖片 */
  .recommend-img img {
    width: 100%;
    height: auto;
    border-radius: 8px;
  }
</style>
@endsection

@section("content")
<div id="product-detail" class="content">
  <div class="container py-5">

    <!-- main_info start -->
    <div class="main_info row align-items-start">

      <!-- 左邊圖片 -->
      <div class="col-md-6">
        <div id="product_img" class="mb-4">
          <ul class="bx_pic">
            @if (!empty($photos) && count($photos) > 0)
            @foreach ($photos as $photo)
            <li>
              <a class="jump_pic" href="{{ asset('images/product/' . $photo->photo) }}">
                <img src="{{ asset('images/product/' . $photo->photo) }}" alt="{{ $product->itemName }}">
              </a>
            </li>
            @endforeach
            @elseif (!empty($product->photo))
            <li>
              <a class="jump_pic" href="{{ asset('images/product/' . $product->photo) }}">
                <img src="{{ asset('images/product/' . $product->photo) }}" alt="{{ $product->itemName }}">
              </a>
            </li>
            @else
            <li><img src="{{ asset('images/no-image.png') }}" alt="暫無圖片"></li>
            @endif
          </ul>

          @if ($product->isNew == "Y")
          <img class="mark_act" src="{{ asset('front/product/product_detail/img/mark_act.png') }}">
          @endif
        </div>

        <!-- 縮圖 -->
        <div class="thumb">
          <ul class="thumb-pager">
            @if (!empty($photos) && count($photos) > 0)
            @foreach ($photos as $photo)
            <li>
              <div class="imgs" style="background-image:url({{ asset('images/product/' . $photo->photo) }})"></div>
            </li>
            @endforeach
            @elseif (!empty($product->photo))
            <li>
              <div class="imgs" style="background-image:url({{ asset('images/product/' . $product->photo) }})"></div>
            </li>
            @else
            <li>
              <div class="imgs" style="background-image:url({{ asset('images/no-image.png') }})"></div>
            </li>
            @endif
          </ul>
        </div>

        <!-- 社群分享 -->
        <div class="share_link mt-3">
          <span>分享至&nbsp;&nbsp;</span>
          <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank">
            <img src="{{ asset('front/product/product_detail/img/icon_fb.svg') }}" width="30" height="30" alt="Facebook 分享">
          </a>
          <a href="http://line.naver.jp/R/msg/text/?{{ urlencode(request()->fullUrl()) }}" target="_blank">
            <img src="{{ asset('front/product/product_detail/img/icon_line.svg') }}" width="30" height="30" alt="LINE 分享">
          </a>
          <a style="cursor: pointer;" onclick="Copy();Swal.fire('已複製網址')">
            <img src="{{ asset('front/product/product_detail/img/icon_link.svg') }}" width="30" height="30" alt="複製連結">
          </a>
          <textarea id="paste-box" style="display:none;"></textarea>
        </div>
      </div>
      <!-- 左側圖片 End -->

      <!-- 右側商品資訊 -->
      <div class="col-md-6">
        <div class="product_header mb-3">
          <h2 class="fw-bold">{{ $product->itemName }}</h2>
          <p class="text-muted">{{ $product->title }}</p>
        </div>

        <div class="product_info">
          <dl class="full clearfix">
            <dt>產品描述</dt>
            <dd>{{ $product->content }}</dd>
          </dl>

          <dl class="full noline price-origin">
            <dt>原價</dt>
            <dd>NT$.{{ number_format($product->price) }}</dd>
          </dl>
          <dl class="full noline price">
            <dt>售價</dt>
            <dd>NT$.{{ number_format($product->salePrice ?? $product->price) }}</dd>
          </dl>

          @if (!empty($colors) && count($colors) > 0)
          <dl class="full noline">
            <dt>顏色</dt>
            <dd>
              <div class="spec">
                @foreach($colors as $color)
                <input type="radio" id="color{{ $color->id }}" name="color" value="{{ $color->id }}">
                <label for="color{{ $color->id }}">{{ $color->colorName }}</label>
                @endforeach
              </div>
            </dd>
          </dl>
          @endif

          @if (!empty($sizes) && count($sizes) > 0)
          <dl class="full noline">
            <dt>尺寸</dt>
            <dd>
              <div class="spec">
                @foreach($sizes as $size)
                <input type="radio" id="size{{ $size->id }}" name="size" value="{{ $size->id }}">
                <label for="size{{ $size->id }}">{{ $size->size }}</label>
                @endforeach
              </div>
            </dd>
          </dl>
          @endif

          <dl class="full noline">
            <dt>數量</dt>
            <dd>
              <span class="qty">
                <span class="minus bt">-</span>
                <span class="qty_num bt" id="qty">1</span>
                <span class="add bt">+</span>
              </span>
            </dd>
          </dl>

          <dl class="full noline">
            <div class="shop_bar">
              <a href="javascript:void(0)" onclick="buyNow('{{ $product->id }}')" class="shop_btn buy">直接購買</a>
              <a href="javascript:void(0)" onclick="addCart('{{ $product->id }}')" class="shop_btn cart cd-add-to-cart">
                <i class="fa fa-shopping-cart"></i>&nbsp;加入購物車
              </a>
              <a href="#" class="shop_btn wish"><i class="fa fa-heart"></i>&nbsp;加入追蹤</a>
            </div>
          </dl>
        </div>
      </div>
      <!-- 右側商品資訊 End -->
    </div>
    <!-- main_info End -->

    <!-- ✅ 強制空白 -->
    <div style="height:60px;"></div>

    <!-- Tabs + 推薦商品統一在 container 裡 -->
    <div class="container-fluid px-5 mt-5">

      <!-- Tabs -->
      <div class="product-tabs mb-5 text-start">
        <div class="tab">
          <button class="tablinks active" onclick="openTab(event, 'detail')">產品介紹</button>
          <button class="tablinks" onclick="openTab(event, 'spec')">規格說明</button>
        </div>

        <!-- 產品介紹 -->
        <div id="detail" class="tabcontent" style="display:block;">
          <div class="info">{!! $product->content !!}</div>
        </div>

        <!-- 規格說明 -->
        <div id="spec" class="tabcontent">
          <div class="info">暫無規格說明</div>
        </div>
      </div>

      <!-- 推薦商品 -->
      @if (!empty($recommend) && count($recommend) > 0)
      <div class="product-tabs recommend text-start">
        <div class="tab">
          <button>推薦商品</button>
        </div>

        <div class="recommend-content" style="display:block;">
          <div class="row">
            @foreach($recommend as $item)
            <div class="col-6 col-md-4 col-lg-3 mb-4">
              <a href="{{ url('product/detail/'.$item->id) }}">
                <div class="recommend-img">
                  <img src="{{ asset('images/product/' . ($item->photo ?? 'no-image.png')) }}" alt="{{ $item->itemName }}">
                </div>
                <p class="product_tit mt-2 text-center">{{ $item->itemName }}</p>
                <p class="price text-danger text-center">
                  NT$.{{ number_format($item->salePrice ?? $item->price) }}
                </p>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @endif

    </div> <!-- ✅ container 收好 -->



  </div> <!-- ✅ container 收在這裡 -->
</div> <!-- ✅ #product-detail 收在這裡 -->
@endsection

{{-- ✅ JS --}}
@section("scripts")
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Swiper -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  function addCart(productId) {
    let color = $("input[name='color']:checked").val() || null;
    let size = $("input[name='size']:checked").val() || null;
    let qty = $("#qty").text() || 1;

    $.ajax({
      url: "/shopCart/addCart",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        productId: productId,
        colorId: color,
        sizeId: size,
        qty: qty
      },
      success: function(res) {
        if (res.status === "success") {
          Swal.fire({
            icon: 'success',
            title: '加入成功',
            text: '已加入購物車'
          });
          if (typeof getCart === "function") getCart();
        } else {
          Swal.fire({
            icon: 'error',
            title: '加入失敗',
            text: res.message || "未知錯誤"
          });
        }
      },
      error: function() {
        Swal.fire({
          icon: 'error',
          title: '系統錯誤',
          text: '請稍後再試'
        });
      }
    });
  }

  function buyNow(productId) {
    let color = $("input[name='color']:checked").val() || null;
    let size = $("input[name='size']:checked").val() || null;
    let qty = $("#qty").text() || 1;

    $.ajax({
      url: "/shopCart/addCart",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        productId: productId,
        colorId: color,
        sizeId: size,
        qty: qty
      },
      success: function(res) {
        if (res.status === "success") {
          Swal.fire({
            icon: 'success',
            title: '處理中',
            text: '即將前往購物車',
            timer: 1500,
            showConfirmButton: false
          }).then(() => {
            window.location.href = "/shopCart/list";
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: '無法直接購買',
            text: res.message || "未知錯誤"
          });
        }
      },
      error: function() {
        Swal.fire({
          icon: 'error',
          title: '系統錯誤',
          text: '請稍後再試'
        });
      }
    });
  }
</script>
@endsection