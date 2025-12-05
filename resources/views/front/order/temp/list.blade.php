@extends("front.layout")
@section("content")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/front/product/product_detail/css/product_detail.css" type="text/css">

<script>
  // 共用：更新金額欄位
  function refreshTotals(totals) {
    $("#amount").text(totals.subtotal);
    $("#vipDiscount").text("-" + totals.vipDiscount);
    $("#coupon").text("-" + totals.coupon);
    $("#shipping").text(totals.shipping);
    $("#codFee").text(totals.codFee);
    $("#grandTotal").text(totals.grandTotal);
  }

  // 手機版數量更新
  function doQty(id, plus, productId) {
    let qty = parseInt($("#qty" + id).text(), 10) + parseInt(plus, 10);
    if (qty < 1) qty = 1;
    $("#qty" + id).text(qty);
    let sizeId = $("#size" + productId).val();
    update(id, productId, sizeId, qty);
  }

  // 電腦版數量更新
  function doQty2(id, plus, productId) {
    let qty = parseInt($("#qty2" + id).text(), 10) + parseInt(plus, 10);
    if (qty < 1) qty = 1;
    $("#qty2" + id).text(qty);
    let sizeId = $("#size2" + productId).val();
    update(id, productId, sizeId, qty);
  }

  // 更新數量 + 運費
  function update(id, productId, sizeId, qty) {
    let area = $("input[name='area']:checked").val();
    let logis = $("input[name='logis']:checked").val();

    $.ajax({
      url: "/shopCart/update",
      type: "post",
      dataType: "json",
      data: {
        id: id,
        productId: productId,
        sizeId: sizeId,
        qty: qty,
        area: area,
        logis: logis,
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: function(msg) {
        refreshTotals(msg.totals);
      },
      error: function() {
        Swal.fire('錯誤', '更新失敗', 'error');
      }
    });
  }

  // 刪除確認
  function doDelete(id, itemName) {
    Swal.fire({
      title: "確定刪除 [" + itemName + "]?",
      showDenyButton: true,
      confirmButtonText: "確定",
      denyButtonText: "我再想想"
    }).then((result) => {
      if (result.isConfirmed) {
        deleteTemp(id);
      }
    });
  }

  // 刪除
  function deleteTemp(id) {
    $.ajax({
      url: "/shopCart/delete",
      type: "post",
      dataType: "json",
      data: {
        id: id,
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: function(msg) {
        location.reload();
      },
      error: function() {
        Swal.fire('錯誤', '刪除失敗', 'error');
      }
    });
  }

  // 運費更新
  function changeShipping() {
    let area = $("input[name='area']:checked").val();
    let logis = $("input[name='logis']:checked").val();

    $.ajax({
      url: "{{ url('shopCart/calcShipping') }}",
      type: "post",
      dataType: "json",
      data: {
        area: area,
        logis: logis,
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: function(msg) {
        refreshTotals(msg.totals);
      },
      error: function(xhr) {
        console.error(xhr.responseText);
        Swal.fire('錯誤', '運費計算失敗', 'error');
      }
    });
  }

  $(document).ready(function() {
    // 頁面載入後先算一次
    changeShipping();

    // 綁定手機版數量按鈕
    $(".listCon").on("click", ".count.mobile .minus", function() {
      let row = $(this).closest(".listCon");
      let id = row.find(".qty_num").attr("id").replace("qty", "");
      let productId = row.find("select[id^='size']").attr("id").replace("size", "");
      doQty(id, -1, productId);
    });

    $(".listCon").on("click", ".count.mobile .add", function() {
      let row = $(this).closest(".listCon");
      let id = row.find(".qty_num").attr("id").replace("qty", "");
      let productId = row.find("select[id^='size']").attr("id").replace("size", "");
      doQty(id, 1, productId);
    });
  });
</script>

<div class="content">

  <!-- 訂單流程步驟 -->
  <div class="stepbox row">
    <div class="col-sm-3 now"><span class="step">1</span>
      <p>訂單明細確認</p>
    </div>
    <div class="col-sm-1 arrow"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></div>
    <div class="col-sm-4"><span class="step">2</span>
      <p>配送資訊</p>
      <p class="pc">、</p>
      <p>付款資訊</p>
    </div>
    <div class="col-sm-1 arrow"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></div>
    <div class="col-sm-3"><span class="step">3</span>
      <p>完成訂單</p>
    </div>
  </div>

  <!-- 購物車清單 -->
  <div class="shoplist cd-form">
    <div class="listTit">
      <div class="col-sm-1">產品縮圖</div>
      <div class="col-sm-3">產品資訊</div>
      <div class="col-sm-2 pc">配送條件</div>
      <div class="col-sm-2 pc">規格</div>
      <div class="col-sm-2 pc">數量</div>
      <div class="col-sm-1 pc">價格</div>
      <div class="col-sm-1 pc">刪除</div>
    </div>

    @foreach($list as $data)
    <div class="listCon">
      <div class="col-sm-1 listItem pic"><img src="/images/product/S/{{ $data->photo }}"></div>
      <div class="col-sm-3 listItem infolist">
        <p class="no">{{ $data->itemNo }}</p>
        <a href="/product/detail/{{ $data->productId }}">
          <p class="title">{{ $data->itemName }}</p>
        </a>
        <p class="storage mobile">常溫配送</p>
        <div class="spec mobile">
          @if (!empty($size[$data->productId]) && sizeof($size[$data->productId]) > 0)
          <div class="cd-select">
            <select class="spec2" id="size{{ $data->productId }}">
              <option value="0">請選擇尺寸</option>
              @foreach($size[$data->productId] as $sizes)
              <option value="{{ $sizes->id }}" {{ $data->sizeId == $sizes->id ? "selected" : "" }}>{{ $sizes->size }}</option>
              @endforeach
            </select>
          </div>
          @endif
        </div>
        <p class="count mobile">
          <span class="qty">
            <span class="minus bt">-</span>
            <span class="qty_num bt" id="qty{{ $data->id }}">{{ $data->qty }}</span>
            <span class="add bt">+</span>
          </span>
        </p>
        <p class="price mobile">NT$.{{ number_format($data->salePrice) }}</p>
      </div>

      <div class="col-sm-2 listItem storage pc">常溫配送</div>
      <div class="col-sm-2 listItem spec pc">
        @if (!empty($size[$data->productId]) && sizeof($size[$data->productId]) > 0)
        <div class="cd-select">
          <select class="spec2" id="size2{{ $data->productId }}">
            <option value="0">請選擇尺寸</option>
            @foreach($size[$data->productId] as $sizes)
            <option value="{{ $sizes->id }}" {{ $data->sizeId == $sizes->id ? "selected" : "" }}>{{ $sizes->size }}</option>
            @endforeach
          </select>
        </div>
        @endif
      </div>
      <div class="col-sm-2 listItem count pc">
        <span class="qty">
          <span class="minus bt" onclick="doQty2('{{ $data->id }}', -1, '{{ $data->productId }}');">-</span>
          <span class="qty_num bt" id="qty2{{ $data->id }}">{{ $data->qty }}</span>
          <span class="add bt" onclick="doQty2('{{ $data->id }}', 1, '{{ $data->productId }}');">+</span>
        </span>
      </div>
      <div class="col-sm-1 listItem price pc">NT$.{{ number_format($data->salePrice) }}</div>
      <div class="col-sm-1 listItem delete">
        <button type="button" onclick="doDelete('{{ $data->id }}', '{{ $data->itemName }}')"><i class="fas fa-trash-alt"></i></button>
      </div>
    </div>
    @endforeach
  </div>

  <!-- 表單區：運送 / 配送 / 付款 -->
  <form class="shop-option-wrapper cd-form">
    <!-- 運送地區 -->
    @csrf
    <fieldset class="form-group row">
      <p class="col-sm-2">運送地區</p>
      <ul class="cd-form-list col-sm-10">
        <li><input type="radio" name="area" value="main" onchange="changeShipping()" checked><label>台灣本島</label></li>
        <li><input type="radio" name="area" value="island" onchange="changeShipping()"><label>台灣外島</label></li>
      </ul>
    </fieldset>

    <!-- 配送方式 -->
    <fieldset class="form-group row">
      <p class="col-sm-2">配送方式</p>
      <ul class="cd-form-list col-sm-10">
        <li><input type="radio" name="logis" value="cvs_cod" onchange="changeShipping()" checked><label>超商取貨付款</label></li>
        <li><input type="radio" name="logis" value="cvs" onchange="changeShipping()"><label>超商純取貨</label></li>
        <li><input type="radio" name="logis" value="home" onchange="changeShipping()"><label>宅配</label></li>
        <li><input type="radio" name="logis" value="post" onchange="changeShipping()"><label>郵寄</label></li>
      </ul>
    </fieldset>

    <!-- 付款方式 -->
    <fieldset class="form-group row">
      <p class="col-sm-2">付款方式</p>
      <ul class="cd-form-list col-sm-10">
        @php $cnt = 0; @endphp
        @foreach($pay as $data)
        @php $cnt++; @endphp
        <li>
          <input type="radio" name="pay" id="pay-{{ $cnt }}" value="{{ $data->id }}" {{ $cnt == 1 ? 'checked' : '' }}>
          <label for="pay-{{ $cnt }}">{{ $data->payName }}</label>
        </li>
        @endforeach
      </ul>
    </fieldset>

    <!-- 金額計算 -->
    <div class="shop-wrapper-bottom">
      <div class="notic-wrappe">
        <h3>溫馨提醒</h3>
        <div>※特惠活動商品，不再進行其他折扣。</div>
        <p>※單筆訂單滿3,000免運費。<br>※常溫 / 低溫運費分開計算。<br>※若訂單中含常溫及低溫，則收兩趟運費450。</p>
      </div>

      <div class="shop-wrapper-right">
        <table class="pay-wrapper">
          <tr>
            <td class="detail">金額小計</td>
            <td>NT$</td>
            <td><span id="amount">{{ $totals['subtotal'] }}</span></td>
          </tr>
          <tr>
            <td class="detail">VIP會員折扣</td>
            <td>NT$</td>
            <td id="vipDiscount">-{{ $totals['vipDiscount'] }}</td>
          </tr>
          <tr>
            <td class="detail">折價券</td>
            <td>NT$</td>
            <td id="coupon">-{{ $totals['coupon'] }}</td>
          </tr>
          <tr>
            <td class="detail">運費</td>
            <td>NT$</td>
            <td id="shipping">{{ $totals['shipping'] }}</td>
          </tr>
          <tr>
            <td class="detail">貨到付款手續費</td>
            <td>NT$</td>
            <td id="codFee">{{ $totals['codFee'] }}</td>
          </tr>
          <tr>
            <td class="detail total">合計</td>
            <td class="total">NT$</td>
            <td class="total" id="grandTotal">{{ $totals['grandTotal'] }}</td>
          </tr>
        </table>

        <div class="cart-nav">
          <button type="button" onclick="window.location.href ='/product/list'" class="cart-btn sec">繼續選購</button>
          <button type="button" onclick="window.location.href ='/order/info'" class="cart-btn pri">確認購買</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection