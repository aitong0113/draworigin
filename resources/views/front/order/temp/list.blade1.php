@extends("front.layout")
@section("content")
<!-- content's start -->
<link rel="stylesheet" href="/front/product/product_detail/css/product_detail.css" type="text/css">
<script>
  // 手機版
  function doQty(id, plus, productId) {
    let qty = $("#qty" + id).text();
    qty = parseInt(qty, 10) + parseInt(plus, 10);
    if (qty < 1) qty = 1;
    $("#qty" + id).text(qty);
    let sizeId = $("#size" + productId).val();
    update(id, productId, sizeId, qty);
  }

  // 電腦版
  function doQty2(id, plus, productId) {
    let qty = $("#qty2" + id).text();
    qty = parseInt(qty, 10) + parseInt(plus, 10);
    if (qty < 1) qty = 1;
    $("#qty2" + id).text(qty);
    let sizeId = $("#size2" + productId).val();
    update(id, productId, sizeId, qty);
  }

  // 更新數量
  function update(id, productId, sizeId, qty) {
    $.ajax({
      url: "/shopCart/update",
      type: "post",
      dataType: "json",
      data: {
        id: id,
        productId: productId,
        sizeId: sizeId,
        qty: qty,
        _token: "{{ csrf_token() }}"
      },
      success: function(msg) {
        refreshTotals(msg);
      }
    });
  }

  // 刪除購物車
  function removeItem(id) {
    Swal.fire({
      title: "確定刪除此商品嗎？",
      text: "刪除後無法恢復",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "是的，刪除",
      cancelButtonText: "取消"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "/shopCart/remove",
          type: "post",
          dataType: "json",
          data: {
            id: id,
            _token: "{{ csrf_token() }}"
          },
          success: function(msg) {
            if (msg.status === "deleted") {
              $("#item" + id).remove();
              refreshTotals(msg);
              Swal.fire("已刪除！", "商品已從購物車移除。", "success");
            }
          },
          error: function() {
            Swal.fire("錯誤", "刪除失敗，請稍後再試", "error");
          }
        });
      }
    });
  }

  // 更新金額區塊
  function refreshTotals(msg) {
    if (msg.totals) {
      $("#subtotal").text(msg.totals.subtotal);
      $("#vipDiscount").text("-" + msg.totals.vipDiscount);
      $("#coupon").text("-" + msg.totals.coupon);
      $("#shipping").text(msg.totals.shipping);
      $("#codFee").text(msg.totals.codFee);
      $("#grandTotal").text(msg.totals.grandTotal);
    }
    if (msg.cartNum !== undefined) {
      $("#cartNum").text(msg.cartNum);
    }
  }
</script>

<div class="content">

  <!-- 訂單流程步驟 -->
  <div class="stepbox row">
    <div class="col-sm-3 now">
      <span class="step">1</span>
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

    @php $total = 0; @endphp
    @foreach($list as $data)
    @php $total += $data->qty * $data->price; @endphp
    <div id="item{{ $data->id }}" class="listCon">
      <div class="col-sm-1 listItem pic">
        <img src="/images/product/S/{{ $data->photo }}">
      </div>
      <div class="col-sm-3 listItem infolist">
        <p class="no">{{ $data->itemNo }}</p>
        <a href="/product/detail/{{ $data->productId }}">
          <p class="title">{{ $data->itemName }}</p>
        </a>
        <p class="storage mobile">常溫配送</p>
        <div class="spec mobile">
          @if (!empty($size[$data->productId]) && sizeof($size[$data->productId])>0)
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
            <span class="qty_num bt">{{ $data->qty }}</span>
            <span class="add bt">+</span>
          </span>
        </p>
        <p class="price mobile">NT$.{{ number_format($data->salePrice) }}</p>
      </div>
      <div class="col-sm-2 listItem storage pc">常溫配送</div>
      <div class="col-sm-2 listItem spec pc">
        @if (!empty($size[$data->productId]) && sizeof($size[$data->productId])>0)
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
          <span class="minus bt" onclick="doQty2('{{ $data->id }}', -1, '{{ $data->productId }}'); return false">-</span>
          <span class="qty_num bt" id="qty2{{ $data->id }}">{{ $data->qty }}</span>
          <span class="add bt" onclick="doQty2('{{ $data->id }}', 1, '{{ $data->productId }}'); return false">+</span>
        </span>
      </div>
      <div class="col-sm-1 listItem price pc">NT$.{{ number_format($data->salePrice) }}</div>
      <div class="col-sm-1 listItem delete">
        <button type="button" onclick="removeItem('{{ $data->id }}')"><i class="fas fa-trash-alt"></i></button>
      </div>
    </div>
    @endforeach
  </div>

  <!-- 金額區塊 -->
  <form class="shop-option-wrapper cd-form">
    <div class="shop-wrapper-bottom">
      <div class="notic-wrappe">
        <h3>溫馨提醒</h3>
        <p>※特惠活動商品，不再進行其他折扣。</p>
        <p>※單筆訂單滿3,000免運費。常溫、低溫需分開計算。</p>
      </div>

      <div class="shop-wrapper-right">
        <table class="pay-wrapper">
          <tr>
            <td class="detail">金額小計</td>
            <td>NT$</td>
            <td><span id="subtotal">{{ $totals['subtotal'] ?? $total }}</span></td>
          </tr>
          <tr>
            <td class="detail">VIP會員九折</td>
            <td>NT$</td>
            <td id="vipDiscount">-{{ $totals['vipDiscount'] ?? 0 }}</td>
          </tr>
          <tr>
            <td class="detail">折價券</td>
            <td>NT$</td>
            <td id="coupon">-{{ $totals['coupon'] ?? 0 }}</td>
          </tr>
          <tr>
            <td class="detail">運費</td>
            <td>NT$</td>
            <td id="shipping">{{ $totals['shipping'] ?? 0 }}</td>
          </tr>
          <tr>
            <td class="detail">貨到付款手續費</td>
            <td>NT$</td>
            <td id="codFee">{{ $totals['codFee'] ?? 0 }}</td>
          </tr>
          <tr>
            <td class="detail total">合計</td>
            <td class="total">NT$</td>
            <td class="total"><span id="grandTotal">{{ $totals['grandTotal'] ?? $total }}</span></td>
          </tr>
        </table>
        <div class="cart-nav">
          <button type="button" onclick="window.location.href='/product/list'" class="cart-btn sec">繼續選購</button>
          <button type="button" onclick="window.location.href='/shopCart/checkout'" class="cart-btn pri">確認購買</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection