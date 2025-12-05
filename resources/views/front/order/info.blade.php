@extends("front.layout")
@section("content")



<!-- tw-city-selector -->
<script src="/front/commons/shopcart/js/tw-city-selector.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    new TwCitySelector({
      el: '#twzipcode', // 外層容器
      elCounty: '#city', // 縣市 select
      elDistrict: '#district', // 區域 select
      elZipcode: '#zipcode' // 郵遞區號 input
    });
  });
</script>

<!-- content's start -->
<div class="content">

  <!-- 訂單流程步驟start -->
  <div class="stepbox row">
    <div class="col-sm-3">
      <span class="step">1</span>
      <p>訂單明細確認</p>
    </div>
    <div class="col-sm-1 arrow">
      <i class="fa fa-angle-right"></i>
      <i class="fa fa-angle-right"></i>
    </div>
    <div class="col-sm-4 now">
      <span class="step">2</span>
      <p>配送資訊</p>
      <p class="pc">、</p>
      <p>付款資訊</p>
    </div>
    <div class="col-sm-1 arrow">
      <i class="fa fa-angle-right"></i>
      <i class="fa fa-angle-right"></i>
    </div>
    <div class="col-sm-3">
      <span class="step">3</span>
      <p>完成訂單</p>
    </div>
  </div>
  <!-- 訂單流程步驟end -->

  <!-- 主表單開始 -->
  <form class="cd-form" method="post" action="{{ route('order.saveAddress') }}">
    @csrf

    <!-- 取貨人資訊 -->
    <div class="purchase_info">
      <h3>取貨人資訊</h3>
      <div class="form-group row">
        <label class="col-sm-1 col-form-label">帳號</label>
        <div class="col-sm-11">
          <label id="inputEmail" class="col-form-label firLabel">
            {{ $member->email ?? session('memberEmail') }}
          </label>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputName" class="col-sm-1 col-form-label">姓名</label>
        <div class="col-sm-11">
          <input type="text" class="form-control" id="inputName" name="name" placeholder="請輸入您的姓名" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="identity" class="col-sm-1 col-form-label">聯絡電話</label>
        <div class="col-sm-11">
          <input type="tel" class="form-control" id="identity" name="phone" placeholder="請輸入您的聯絡電話" required>
        </div>
      </div>

      <!-- 地址 -->
      <div class="form-group row">
        <label for="address" class="col-sm-1 col-form-label">地址</label>
        <div class="col-sm-11" id="twzipcode">
          <div class="row">
            <!-- 縣市 -->
            <div class="col-md-4 mb-2">
              <select class="county form-control" name="city" id="city" required></select>
            </div>
            <!-- 區域 -->
            <div class="col-md-4 mb-2">
              <select class="district form-control" name="district" id="district" required></select>
            </div>
            <!-- 郵遞區號 -->
            <div class="col-md-4 mb-2">
              <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="郵遞區號" readonly>
            </div>
          </div>
          <br>
          <!-- 詳細地址 -->
          <div class="mt-2" style="margin-top:10px;">
            <input type="text" class="form-control" name="address" id="address" placeholder="請輸入詳細地址" required>
          </div>
        </div>
      </div>
    </div>

    <!-- 發票資訊 -->
    <div class="purchase_info">
      <h3>發票資訊</h3>
      <fieldset class="form-group row radio">
        <label class="col-sm-1 col-form-label">發票類型</label>
        <ul class="cd-form-list col-sm-11">
          <li>
            <input type="radio" name="invoice" value="bOne" id="invoice-1" checked>
            <label for="invoice-1">個人發票</label>
          </li>
          <li>
            <input type="radio" name="invoice" value="bTwo" id="invoice-2">
            <label for="invoice-2">公司發票</label>
          </li>
        </ul>

        <!-- 個人發票不用填 -->
        <div class="bS01 box"></div>


        <!-- 公司發票區塊，預設隱藏 -->
        <div id="invoice-company" class="bS02 box" style="display:none;">
          <div class="form-group row">
            <label for="company" class="col-sm-1 col-form-label">公司抬頭</label>
            <div class="col-sm-11">
              <input type="text" class="form-control" id="company" name="company" placeholder="請輸入公司抬頭">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputNum" class="col-sm-1 col-form-label">統一編號</label>
            <div class="col-sm-11">
              <input type="text" class="form-control" id="inputNum" name="tax_id" placeholder="請輸入公司統一編號">
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group row radio">
        <label class="col-sm-1 col-form-label">寄送地址</label>
        <ul class="cd-form-list col-sm-11">
          <li>
            <input type="radio" name="invoiceAddr" id="invoiceAddr-1" checked>
            <label for="invoiceAddr-1">同訂購人</label>
          </li>
          <li>
            <input type="radio" name="invoiceAddr" id="invoiceAddr-2">
            <label for="invoiceAddr-2">同收件人</label>
          </li>
        </ul>
      </fieldset>
    </div>

    <!-- 備註 -->
    <div class="purchase_info">
      <h3>備註</h3>
      <div class="form-group row">
        <div class="col-sm-12">
          <textarea class="form-control" id="inputMessage" name="remark" placeholder="請輸入您的訊息"></textarea>
        </div>
      </div>
    </div>

    <!-- 金額明細 -->
    <div class=".shop-wrapper-righ">
      <div class="shop-wrapper-right text-right ms-auto">
        <h3>金額明細</h3>
        <table class="table text-right">
          <tr>
            <td class="text-left">金額小計</td>
            <td>NT$ {{ number_format($totals['subtotal'] ?? 0) }}</td>
          </tr>
          <tr>
            <td class="text-left">VIP會員折扣</td>
            <td>- NT$ {{ number_format($totals['vipDiscount'] ?? 0) }}</td>
          </tr>
          <tr>
            <td class="text-left">折價券</td>
            <td>- NT$ {{ number_format($totals['coupon'] ?? 0) }}</td>
          </tr>
          <tr>
            <td class="text-left">運費</td>
            <td>NT$ {{ number_format($totals['shipping'] ?? 0) }}</td>
          </tr>
          <tr>
            <td class="text-left">貨到付款手續費</td>
            <td>NT$ {{ number_format($totals['codFee'] ?? 0) }}</td>
          </tr>
          <tr>
            <td class="detail total text-left"><strong>合計</strong></td>
            <td class="total"><strong>NT$ {{ number_format($totals['grandTotal'] ?? 0) }}</strong></td>
          </tr>
        </table>

        <div class="cart-nav">
          <button type="button" onclick="window.location.href ='/shopCart/list'" class="cart-btn sec">回上一頁</button>
          <button type="submit" onclick="window.location.href ='/shopCart/finish'" class="cart-btn pri">確認付款</button>
        </div>
      </div>
    </div>
  </form>
  <!-- 主表單結束 -->

</div>
<!-- content's end -->

@endsection

@section("scripts")
<script>
  function toggleInvoiceBox() {
    if ($("#invoice-2").is(":checked")) {
      $("#invoice-company").slideDown();
    } else {
      $("#invoice-company").slideUp();
    }
  }
</script>

@endsection