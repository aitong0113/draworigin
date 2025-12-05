@extends("front.layout")
@section("content")


<!--product_detail's CSS-->
<link rel="stylesheet" href="/front/product/product_detail/css/product_detail.css" type="text/css">
<link rel="stylesheet" href="/front/commons/page/css/page.css" type="text/css">
<!--shopcart's CSS-->
<link rel="stylesheet" href="/front/commons/shopcart/css/shopcart.css">


<div class="content">
  <!-- Tab links -->
  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'order')" id="defaultOpen">訂單查詢</button>
    <button class="tablinks" onclick="openCity(event, 'account')">帳戶管理</button>
    <button class="tablinks" onclick="openCity(event, 'wish')">我的追蹤</button>
    <button class="tablinks" onclick="openCity(event, 'coupon')">折價券查詢</button>
  </div>

  <!-- Tab content-1 訂單查詢 start-->
  <div id="order" class="tabcontent">

    <div class="shoplist">
      <table class="shopList-table">
        <tbody>
          <tr>
            <th>訂單日期</th>
            <th>訂單編號</th>
            <th>配送方式</th>
            <th>付款方式</th>
            <th>訂單狀態</th>
            <th>付款金額</th>
            <th>訂單明細</th>
          </tr>
          <tr>
            <td data-th="訂單日期">2018/08/13</td>
            <td data-th="訂單編號">123456789</td>
            <td data-th="配送方式">宅配</td>
            <td data-th="付款方式">ATM轉帳</td>
            <td data-th="訂單狀態">處理中</td>
            <td data-th="付款金額">NT.299</td>
            <td data-th="訂單明細" class="listBtn"><button onclick="openCity(event, 'shopDetail')"><i class="fas fa-clipboard-list"></i></button></td>
          </tr>
          <tr>
            <td data-th="訂單日期">2018/08/13</td>
            <td data-th="訂單編號">123456789</td>
            <td data-th="配送方式">宅配</td>
            <td data-th="付款方式">ATM轉帳</td>
            <td data-th="訂單狀態">處理中</td>
            <td data-th="付款金額">NT.299</td>
            <td data-th="訂單明細" class="listBtn"><button onclick="openCity(event, 'shopDetail')"><i class="fas fa-clipboard-list"></i></button></td>
          </tr>
          <tr>
            <td data-th="訂單日期">2018/08/13</td>
            <td data-th="訂單編號">123456789</td>
            <td data-th="配送方式">宅配</td>
            <td data-th="付款方式">ATM轉帳</td>
            <td data-th="訂單狀態">處理中</td>
            <td data-th="付款金額">NT.299</td>
            <td data-th="訂單明細" class="listBtn"><button onclick="openCity(event, 'shopDetail')"><i class="fas fa-clipboard-list"></i></button></td>
          </tr>
          <tr>
            <td data-th="訂單日期">2018/08/13</td>
            <td data-th="訂單編號">123456789</td>
            <td data-th="配送方式">宅配</td>
            <td data-th="付款方式">ATM轉帳</td>
            <td data-th="訂單狀態">處理中</td>
            <td data-th="付款金額">NT.299</td>
            <td data-th="訂單明細" class="listBtn"><button onclick="openCity(event, 'shopDetail')"><i class="fas fa-clipboard-list"></i></button></td>
          </tr>
      </table>
    </div>


  </div>
  <!-- Tab content-1 訂單查詢 end-->



  <!-- Tab content-2 訂單明細 start-->
  <div id="shopDetail" class="tabcontent">
    <!-- shoplist 購物車清單 start -->
    <div class="shoplist cd-form">

      <!-- 購買清單標題 start -->
      <div class="listTit">
        <div class="col-sm-1">產品縮圖</div>
        <div class="col-sm-3">產品資訊</div>
        <div class="col-sm-2 pc">配送條件</div>
        <div class="col-sm-2 pc">規格</div>
        <div class="col-sm-2 pc">數量</div>
        <div class="col-sm-2 pc">價格</div>
      </div>
      <!-- 購買清單標題 end -->

      <!-- 購買清單產品1 start-->
      <div id="item1" class="listCon">
        <div class="col-sm-1 listItem pic">
          <img src="/front/product/productlist/img/01.jpg">
        </div>
        <!-- 產品資訊 start -->
        <div class="col-sm-3 listItem infolist">
          <P class="no">b-23</P>
          <a href="/front/product_detail.html">
            <p class="title">五穀雜糧五穀雜糧饅頭</p>
          </a>
          <p class="actname">端午節2件500元</p>
          <!-- ↓↓↓有加上mobile的4個欄位，手機版才會出現↓↓↓ -->
          <p class="storage mobile">常溫配送</p>
          <div class="spec mobile">
            <p>黑糖紅豆</p>
            <p>M</p>
          </div>
          <p class="count mobile">
          <p>x1</p>
          </p>
          <p class="price mobile">NT$.39999</p>
          <!-- ↑↑↑有加上mobile的4個欄位，手機版才會出現↑↑↑ -->
        </div>
        <!-- 產品資訊 end -->

        <!-- ↓↓↓有加上pc的4個欄位，電腦版才會出現↓↓↓ -->
        <div class="col-sm-2 listItem storage pc">常溫配送</div>
        <div class="col-sm-2 listItem spec pc">
          <p>黑糖紅豆</p>
          <p>M</p>
        </div>
        <div class="col-sm-2 listItem count pc">
          <p>x1</p>
        </div>
        <div class="col-sm-2 listItem price pc">NT$.39999</div>
        <!-- ↑↑↑有加上pc的4個欄位，電腦版才會出現↑↑↑ -->

      </div>
      <!-- 購買清單產品1 end -->

      <div id="item2" class="listCon">
        <div class="col-sm-1 listItem pic">
          <img src="/front/product/productlist/img/02.jpg">
        </div>
        <div class="col-sm-3 listItem infolist">
          <P class="no">a-87</P>
          <a href="product_detail.html">
            <p class="title">蔓越莓饅頭</p>
          </a>
          <p class="actname">端午節2件500元</p>
          <p class="storage mobile">-</p>
          <div class="spec mobile">
            <p>蔓越莓</p>
          </div>
          <p class="count mobile">
          <p>x1</p>
          </p>
          <p class="price mobile">NT$.299</p>

        </div>



        <div class="col-sm-2 listItem storage pc">-</div>
        <div class="col-sm-2 listItem spec pc">
          <p>蔓越莓</p>
        </div>
        <div class="col-sm-2 listItem spec pc">
          <p>x1</p>
        </div>
        <div class="col-sm-2 listItem price pc">NT$.299</div>

      </div>

    </div>
    <!-- shoplist 購物車清單 end -->

    <form>
      <!-- shop-wrapper-bottom 底部start -->
      <div class="shop-wrapper-bottom">
        <div class="left-wrappe"></div>


        <!-- shop-wrapper-right 右側start -->
        <div class="shop-wrapper-right">
          <table class="pay-wrapper">
            <tr>
              <td class="detail">金額小計</td>
              <td>NT$</td>
              <td>1160</td>
            </tr>
            <tr>
              <td class="detail">VIP會員九折(不與活動優惠併用)</td>
              <td>NT$</td>
              <td>-58</td>
            </tr>
            <tr>
              <td class="detail">端午節2件500元</td>
              <td>NT$</td>
              <td>-80</td>
            </tr>
            <tr>
              <td class="detail">折價券686CP</td>
              <td>NT$</td>
              <td>-100</td>
            </tr>
            <tr>
              <td class="detail">運費</td>
              <td>NT$</td>
              <td>60</td>
            </tr>
            <tr>
              <td class="detail">常溫配送-運費</td>
              <td>NT$</td>
              <td>80</td>
            </tr>
            <tr>
              <td class="detail">低溫配送-運費</td>
              <td>NT$</td>
              <td>250</td>
            </tr>
            <tr>
              <td class="detail">貨到付款手續費</td>
              <td>NT$</td>
              <td>30</td>
            </tr>
            <tr>
              <td class="detail total">付款金額</td>
              <td class="total">NT$</td>
              <td class="total">1002</td>
            </tr>
          </table>


        </div>
        <!-- shop-wrapper-right 右側end -->

        <div class="purchase_info">
          <h3>配送方式、付款方式</h3>
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-1 col-form-label">帳號</label>
            <div class="col-sm-11">
              <label id="inputEmail" class="col-form-label firLabel">ginny@ideamax.com.tw</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="logis" class="col-sm-1 col-form-label">運送方式</label>
            <div class="col-sm-11">
              <label id="logis" class="col-form-label firLabel">宅配</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="pay" class="col-sm-1 col-form-label">付款方式</label>
            <div class="col-sm-11">
              <label id="pay" class="col-form-label firLabel">ATM轉帳</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="bankNum" class="col-sm-1 col-form-label">銀行代碼</label>
            <div class="col-sm-11">
              <label id="bankNum" class="col-form-label firLabel">700</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="payment" class="col-sm-1 col-form-label">繳款帳號</label>
            <div class="col-sm-11">
              <label id="payment" class="col-form-label firLabel">01487452365158</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="payDD" class="col-sm-1 col-form-label">繳款期限</label>
            <div class="col-sm-11">
              <label id="payDD" class="col-form-label firLabel red">2018/08/13 23:59</label>
            </div>
          </div>
        </div>
        <div class="purchase_info">
          <h3>訂購人資訊</h3>
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-1 col-form-label">帳號</label>
            <div class="col-sm-11">
              <label id="inputEmail" class="col-form-label firLabel">ginny@ideamax.com.tw</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputName" class="col-sm-1 col-form-label">姓名</label>
            <div class="col-sm-11">
              <label id="inputName" class="col-form-label firLabel">紀芝妮</label>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputTel" class="col-sm-1 col-form-label">聯絡電話</label>
            <div class="col-sm-11">
              <label id="inputTel" class="col-form-label firLabel">0911493159</label>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputAddr" class="col-sm-1 col-form-label">地址</label>
            <div class="col-sm-11">
              <label id="inputAddr" class="col-form-label firLabel">台中市南屯區河南路四段429-2號1F</label>
            </div>
          </div>
        </div>
        <div class="purchase_info">
          <h3>收件人資訊</h3>
          <div class="form-group row">
            <label for="inputName" class="col-sm-1 col-form-label">姓名</label>
            <div class="col-sm-11">
              <label id="inputName" class="col-form-label firLabel">紀芝妮</label>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputTel" class="col-sm-1 col-form-label">聯絡電話</label>
            <div class="col-sm-11">
              <label id="inputTel" class="col-form-label firLabel">0911493159</label>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputAddr" class="col-sm-1 col-form-label">地址</label>
            <div class="col-sm-11">
              <label id="inputAddr" class="col-form-label firLabel">台中市南屯區河南路四段429-2號1F</label>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputTel" class="col-sm-1 col-form-label">收件時段</label>
            <div class="col-sm-11">
              <label id="inputTel" class="col-form-label firLabel">12:00~17:00</label>
            </div>
          </div>
        </div>
        <div class="purchase_info">
          <h3>發票資訊</h3>
          <div class="form-group row">
            <label for="invoice" class="col-sm-1 col-form-label">發票種類</label>
            <div class="col-sm-11">
              <label id="invoice" class="col-form-label firLabel">公司發票</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="company" class="col-sm-1 col-form-label">公司抬頭</label>
            <div class="col-sm-11">
              <label id="company" class="col-form-label firLabel">極思數位商略有限公司</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputNum" class="col-sm-1 col-form-label">統一編號</label>
            <div class="col-sm-11">
              <label id="inputNum" class="col-form-label firLabel">80209656</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputAddr" class="col-sm-1 col-form-label">寄送地址</label>
            <div class="col-sm-11">
              <label id="inputAddr" class="col-form-label firLabel">同訂購人</label>
            </div>
          </div>
        </div>
        <div class="purchase_info">
          <h3>備註</h3>
          <div class="form-group row">
            <div class="col-sm-12">
              <label id="inputMessage" class="col-form-label firLabel">您好，我是備註的文字，我是備註的文字文字，我是備註，的文字。</label>
            </div>
          </div>
        </div>
      </div>
      <!-- shop-wrapper-bottom 底部end -->
    </form>

  </div>
  <!-- Tab content-2 訂單明細 end-->


  <!-- Tab content-3 帳戶管理 start-->
  <div id="account" class="tabcontent">
    <div style="margin: 20px 0;">
      <form class="cd-form">
        <div class="purchase_info">
          <h3>修改會員資料</h3>
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-1 col-form-label">帳號</label>
            <div class="col-sm-11">
              <label id="inputEmail" class="col-form-label firLabel">ginny@ideamax.com.tw</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="memeber" class="col-sm-1 col-form-label">會員身份</label>
            <div class="col-sm-11">
              <label id="memeber" class="col-form-label firLabel">VIP會員</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputName" class="col-sm-1 col-form-label">姓名</label>
            <div class="col-sm-11">
              <input type="text" class="form-control" id="inputName" placeholder="請輸入您的姓名">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputTel" class="col-sm-1 col-form-label">聯絡電話</label>
            <div class="col-sm-11">
              <input type="text" class="form-control" id="inputTel" placeholder="請輸入您的聯絡電話">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputAddr" class="col-sm-1 col-form-label">地址</label>
            <div class="col-sm-11">
              <div class="my-selector-1">
                <div class="addrTW">
                  <select class="county"></select>
                </div>
                <div class="addrTW">
                  <select class="district"></select>
                </div>
                <div class="addrTW">
                  <input type="text" class="zipcode">
                </div>
              </div>
              <input type="text" class="form-control" id="inputAddr" placeholder="請輸入您的聯絡地址">
            </div>
          </div>

          <button type="submit" class="btn-basic btn-submit">確認變更</button>
        </div>
        <div class="purchase_info">
          <h3>更改密碼</h3>
          <div class="form-group row">
            <label for="oldPwd" class="col-sm-1 col-form-label">舊密碼</label>
            <div class="col-sm-11">
              <input type="password" class="form-control" id="oldPwd" placeholder="請輸入您的原先密碼">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputTel" class="col-sm-1 col-form-label">新密碼</label>
            <div class="col-sm-11">
              <input type="password" class="form-control" id="oldPwd" placeholder="請輸入您的新密碼">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputTel" class="col-sm-1 col-form-label">密碼確認</label>
            <div class="col-sm-11">
              <input type="password" class="form-control" id="oldPwd" placeholder="請再次輸入您的新密碼">
            </div>
          </div>

          <button type="submit" class="btn-basic btn-submit">確認變更</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Tab content-3 帳戶管理 end-->


  <!-- Tab content-4 我的追蹤 start-->
  <div id="wish" class="tabcontent">

    <div class="shoplist cd-form">

      <!-- 購買清單標題 start -->
      <div class="listTit">
        <div class="col-sm-2">產品縮圖</div>
        <div class="col-sm-6">產品資訊</div>
        <div class="col-sm-2 pc">價格</div>
        <div class="col-sm-2 pc">操作</div>
      </div>
      <!-- 購買清單標題 end -->

      <!-- 購買清單產品1 start-->
      <div id="item1" class="listCon">
        <div class="col-sm-2 listItem pic">
          <img src="/front/product/productlist/img/01.jpg">
        </div>

        <div class="col-sm-6 listItem infolist">
          <P class="no">b-23</P>
          <a href="product_detail.html">
            <p class="title">五穀雜糧五穀雜糧饅頭</p>
          </a>
          <!-- ↓↓↓有加上mobile的個欄位，手機版才會出現↓↓↓ -->
          <p class="price mobile">NT$.399</p>
          <!-- ↑↑↑有加上mobile的個欄位，手機版才會出現↑↑↑ -->
        </div>

        <!-- ↓↓↓有加上pc的個欄位，電腦版才會出現↓↓↓ -->
        <div class="col-sm-2 listItem price pc">NT$.399</div>
        <!-- ↑↑↑有加上pc的個欄位，電腦版才會出現↑↑↑ -->


        <div class="col-sm-2 listItem delete">
          <button title="移除商品"><i class="fas fa-trash-alt"></i></button><br>
          <button title="加入購物車"><i class="fas fa-shopping-cart"></i></button>
        </div>
      </div>
      <!-- 購買清單產品1 end -->

      <div id="item1" class="listCon">
        <div class="col-sm-2 listItem pic">
          <img src="/front/product/productlist/img/06.jpg">
        </div>
        <div class="col-sm-6 listItem infolist">
          <P class="no">b-56</P>
          <a href="product_detail.html">
            <p class="title">芝麻饅頭</p>
          </a>
          <p class="price mobile">NT$.550</p>
        </div>
        <div class="col-sm-2 listItem price pc">NT$.550</div>
        <div class="col-sm-2 listItem delete">
          <button title="移除商品"><i class="fas fa-trash-alt"></i></button><br>
          <button title="加入購物車"><i class="fas fa-shopping-cart"></i></button>
        </div>
      </div>

    </div>

  </div>
  <!-- Tab content-4 我的追蹤 end-->

  <!-- Tab content-5 折價券查詢 start-->
  <div id="coupon" class="tabcontent">
    <div class="shoplist">
      <table class="shopList-table">
        <tbody>
          <tr>
            <th>折價券編號</th>
            <th>活動名稱</th>
            <th>折抵金額</th>
            <th>使用期間</th>
            <th>使用情形</th>
          </tr>
          <tr>
            <td data-th="折價券編號">686CP</td>
            <td data-th="活動名稱">中秋節全館88折</td>
            <td data-th="折抵金額">NT.100</td>
            <td data-th="使用期間">2018/08/01~2018/08/31</td>
            <td data-th="使用情形">未使用</td>
          </tr>
          <tr>
            <td data-th="折價券編號">5656123</td>
            <td data-th="活動名稱">中秋節全館88折</td>
            <td data-th="折抵金額">NT.100</td>
            <td data-th="使用期間">2018/08/01~2018/08/31</td>
            <td data-th="使用情形">未使用</td>
          </tr>
          <tr>
            <td data-th="折價券編號">5656123</td>
            <td data-th="活動名稱">中秋節全館88折</td>
            <td data-th="折抵金額">NT.100</td>
            <td data-th="使用期間">2018/08/01~2018/08/31</td>
            <td data-th="使用情形">已使用</td>
          </tr>
      </table>
    </div>
  </div>
  <!-- Tab content-5 折價券查詢 end-->


  <!--qty加總_ JS-->
  <script src="/front/product/productlist/js/qty_num.js"></script>

  <!-- Tab's JS-->
  <script src="/front/commons/page/js/tab.js"></script>
  </body>

  <!-- 台灣地址 -->
  <script src="/front/commons/shopcart/js/tw-city-selector.min.js"></script>

  </html>

  @endsection