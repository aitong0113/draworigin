@extends("front.layout")
@section("title", "Ｑ＆Ａ")
@section("content")

<link rel="stylesheet" type="text/css" href="/front/contact/contact.css">

<div id="map" class="wow fadeIn" style="display: flex; justify-content: center; height: 800px; margin-top: 55px; margin-bottom: 80px; width: 100%; max-width: 100%;">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3641.0315763029703!2d120.6094818!3d24.1355292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34693fa51c7a4baf%3A0x55b9f666b92155f3!2zNDA45Y-w5Lit5biC5Y2X5bGv5Y2A5pil5a6J5LiJ6KGXMTk36Jmf!5e0!3m2!1szh-TW!2stw!4v1757576351574!5m2!1szh-TW!2stw"
        style="border:0; width: 100%; height: 100%;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

<!-- Contact -->
<section id="contact" class="py-5">
    <div class="container-fluid" style="padding-left: 100px; padding-right: 80px;">
        <div class="row align-items-center">

            <!-- 左邊：LINE QR -->
            <div class="col-lg-5 contact-left" style="padding-right: 30px;">
                <h2 class="h3 fw-bold mb-3">聯絡 / 合作</h2>
                <p class="text-secondary">歡迎課程邀約、品牌合作與插畫委託。</p>
                <img src="/front/contact/contact.png" alt="LINE QR Code" class="img-fluid" style="max-width:200px;">
                <p class="mt-2">掃描 QR Code 加入 LINE 聯絡</p>
            </div>

            <!-- 右邊：聯絡表單 -->
            <div class="col-lg-7 contact-right" style="padding-left: 30px;">
                <form id="contactForm" action="https://formspree.io/f/xkgvzglp" method="POST"
                    class="card border-0 shadow-sm rounded-4 p-3 p-md-4 bg-white" novalidate>
                    <div class="row g-3">

                        <!-- Honeypot 防機器人 -->
                        <input type="hidden" name="_gotcha" autocomplete="off">

                        <div class="col-md-6">
                            <label class="form-label">姓名</label>
                            <input type="text" name="name" class="form-control" placeholder="您的稱呼" required>
                            <div class="invalid-feedback">請輸入姓名</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                            <div class="invalid-feedback">請輸入有效的 Email</div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">訊息</label>
                            <textarea name="message" class="form-control" rows="4" placeholder="想合作的內容、檔期、預算…" required></textarea>
                            <div class="invalid-feedback">請填寫訊息</div>
                        </div>

                        <div class="col-md-12 d-flex align-items-center gap-4">
                            <button id="submitBtn" type="submit" class="btn btn-dark rounded-pill">送出</button>
                            <span id="formMsg" class="small"></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection