@extends("front.layout")

@section("content")

<style>
  #finish-page {
    text-align: center;
    padding: 300px 20px;
    font-family: "Microsoft JhengHei", sans-serif;
  }

  #finish-page h1 {
    font-size: 2rem;
    font-weight: bold;
    color:rgb(82, 86, 92);
    /* ← 改這裡：藍色 */
    margin-bottom: 20px;
  } 

  #finish-page h4 {
    font-size: 1.2rem;
    color: #555;
    /* 副標題深灰色 */
    margin-bottom: 30px;
  }

  #finish-page button {
    padding: 10px 20px;
    background:rgb(116, 123, 131);
    /* 藍色按鈕 */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  #finish-page button:hover {
    background:rgb(84, 87, 90);
    /* 滑過時更深的藍色 */
  }
</style>


<div id="finish-page">
  <h1>感謝您的訂購！</h1>
  <h4>我們已經收到您的訂單，會盡快處理。</h4>
  <button onclick="window.location.href='/'">回首頁</button>
</div>

@endsection