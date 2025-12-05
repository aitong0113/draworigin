@extends("front.layout")
@section("content")
<link href="/front/commons/sidebar/css/sidebar.css" rel="stylesheet">
<link rel="stylesheet" href="/front/product/productlist/css/product.css">
<link rel="stylesheet" type="text/css" href="/front/product/productlist/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/front/product/productlist/css/overlay.css">
<link rel="stylesheet" href="/front/product/productlist/css/style.css" />

<!-- shopcart's CSS -->
<link rel="stylesheet" href="/front/commons/shopcart/css/shopcart.css">
<!-- flexCart's CSS -->
<link rel="stylesheet" href="/front/product/flexCart/css/flexCart.css">

<script>
  function addCart(id) {
    var size = $("#size" + id).val();
    var color = $("#color" + id).val();
    var qty = $("#qty" + id).text() || 1;

    $.ajax({
      url: "/shopCart/addCart",
      type: "post",
      data: {
        productId: id,
        sizeId: size,
        colorId: color,
        qty: qty,
        _token: "{{ csrf_token() }}"
      },
      success: function(msg) {
        getCart();
      }
    });
  }

  function getCart() {
    $.ajax({
      url: "/shopCart/getCart",
      type: "get",
      data: {
        _token: "{{ csrf_token() }}"
      },
      success: function(msg) {
        $("#cartList").html(msg.html);
        $("#cartNum").text(msg.cartNum);
        $(".cd-cart-container .count li").text(msg.cartNum);

        if (msg.cartNum == 0) {
          $(".cd-cart-container").addClass("empty");
        } else {
          $(".cd-cart-container").removeClass("empty");
        }
      }
    });
  }

  $(document).ready(function() {
    getCart();

    $(document).on("click", ".checkout-btn", function(e) {
      e.preventDefault();
      var isLogin = "{{ session()->has('memberId') ? 'Y' : 'N' }}";
      if (isLogin === "N") {
        window.location.href = "/member/login";
      } else {
        window.location.href = "/shopCart/list";
      }
    });
  });
</script>

<div class="content con_list container-fluid">
  <div class="row">

    <!-- sidebar Start -->
    <div class="col-md-3">
      <div class="sidebar">
        @if (!empty($types) && sizeof($types) > 0)
        <div class="panel panel-default classbar">
          <div id="primaryOne" class="panel-collapse collapse in">
            @foreach ($types as $data)
            <a href="/product/list/{{ $data->id }}">
              <div class="secondary panel-body">
                <p>{{ $data->layer_name }}</p>
              </div>
            </a>
            @endforeach
          </div>
        </div>
        @endif

        @if (!empty($color) && sizeof($color) > 0)
        <div class="filterbar">
          <h5>依顏色篩選</h5>
          @foreach ($color as $data)
          <a href="/product/color/{{ $data->id }}" type="button" class="btn">
            <span class="choose" style="background-color: {{ $data->color }}"></span>
            {{ $data->colorName }}
          </a>
          @endforeach
        </div>
        @endif
      </div>
    </div>
    <!-- sidebar END -->

    <!-- product-list Start -->
    <div class="col-md-9">
      @if (!empty($list) && sizeof($list) > 0)
      <div id="effect-6" class="product-list row">
        @foreach($list as $data)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
          <div class="item">
            <div class="img">
              <img src="/images/product/{{ $data->photo }}" class="img-fluid" alt="{{ $data->itemName }}">
              <div class="overlay">
                <p href="#" class="expand"><i class="fa fa-search"></i></p>

                <!-- 加入購物車 -->
                <div class="add_cart">
                  @if (!empty($productColor[$data->id]))
                  <select name="color{{ $data->id }}" id="color{{ $data->id }}">
                    @foreach($productColor[$data->id] as $colors)
                    <option value="{{ $colors->colorId }}">{{ $colors->colorName }}</option>
                    @endforeach
                  </select>
                  @endif

                  @if (!empty($size[$data->id]))
                  <select name="size{{ $data->id }}" id="size{{ $data->id }}">
                    @foreach($size[$data->id] as $sizes)
                    <option value="{{ $sizes->sizeId }}">{{ $sizes->size }}</option>
                    @endforeach
                  </select>
                  @endif

                  <span class="qty">
                    <span class="minus bt">-</span>
                    <span class="qty_num bt" id="qty{{ $data->id }}">1</span>
                    <span class="add bt">+</span>
                  </span>
                  <a data-toggle="modal" data-target="#addCart" class="cd-add-to-cart" onclick="addCart('{{ $data->id }}')">
                    <button class="add_btn">
                      <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;加入購物車
                    </button>
                  </a>
                </div>
              </div>
              @if ($data->isNew == "Y")
              <img class="mark_act" src="/front/product/product_detail/img/mark_act.png">
              @endif
            </div>

            <!-- 商品資訊 -->
            <a href="{{ url('product/detail/'.$data->id) }}">
              <div class="info">
                <div class="num">{{ $data->itemNo }}</div>
                <div class="main_title">{{ $data->itemName }}</div>
                <div class="sub_title">{{ $data->title }}</div>
                <div class="price">
                  <span class="sale">NT$.{{ number_format($data->salePrice) }}</span>
                  <span class="origin">NT$.{{ number_format($data->price) }}</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        @endforeach
      </div>
      @endif
    </div>
    <!-- product-list end -->

  </div>
</div>

<!-- 加入購物車modal start -->
<div class="modal fade width-s" id="addCart" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-icon modal-success show-ani">
          <span class="line tip"></span>
          <span class="line long"></span>
          <div class="placeholder"></div>
        </div>
      </div>
      <div class="modal-body">
        <h3 class="title">加入成功</h3>
        <p class="subtitle">您的產品已加入購物車內</p>
        <button type="button" class="btn-basic btn-submit" data-dismiss="modal">確定</button>
      </div>
    </div>
  </div>
</div>
<!-- 加入購物車modal end -->

<!-- 跟隨購物車 start -->
<div class="cd-cart-container empty">
  <a href="#" class="cd-cart-trigger checkout-btn">
    <ul class="count">
      <li>0</li>
      <li>0</li>
    </ul>
  </a>
</div>
<!-- 跟隨購物車 end -->

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/front/product/productlist/js/modernizr.js"></script>
<script src="/front/product/productlist/js/overlay.js"></script>
<script src="/front/product/productlist/js/qty_num.js"></script>
<script src="/front/product/flexCart/js/main.js"></script>
@endsection