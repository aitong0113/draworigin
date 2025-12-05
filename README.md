
<img src="https://i.ibb.co/MkBD1mBS/SCR-20251205-sysr.jpg" width="100%">
---

## 繪初 DrawOrigin ｜插畫教學品牌網站

這是一個我在學習 Laravel 時製作的多頁式網站專案，主要目的是練習 MVC 架構、Blade 模板、前後端整合，以及了解 Laravel 專案的基本運作方式。
專案裡面包含前台頁面切版、簡單的資料模型，以及基本的 Controller 與路由設定。

---

## 專案內容簡介

這個專案主要包含：

* 多個前台頁面（首頁、商品頁、課程頁、聯絡頁等）
* Blade 模板拆分（layout、header、footer）
* 基本的 Controller 和 Route 設定
* 使用 Vite 編譯前端資源（CSS / JS）
* Model 只是用來示範資料結構（例如商品、購物車等）

專案目前沒有串接金流或完整會員系統，主要是練習架構與頁面切版。

---

## 使用的技術

* Laravel 10
* PHP 8.1+
* MySQL（或 SQLite）
* Blade 模板
* Vite
* Bootstrap / jQuery（部分前端互動）

---

## 專案資料夾大致說明

```
resources/views/front/    前台所有頁面
resources/views/layout/   共用的版型
app/Http/Controllers/     控制器
app/Models/               示範用資料模型
routes/web.php            路由設定
public/front/             圖片、CSS、JS
```

---

## 本地端執行方式

### 下載專案

```bash
git clone https://github.com/aitong0113/draworigin
cd draworigin
```

### 安裝 PHP 套件

```bash
composer install
```

### 安裝前端套件

```bash
npm install
```

### 建立環境設定並產生金鑰

```bash
cp .env.example .env
php artisan key:generate
```

### （可選）建立資料表

```bash
php artisan migrate
```

### 啟動本地伺服器

```bash
php artisan serve
```

---

## 這個專案對我來說的練習重點

* 練習了解 Laravel 的 MVC 架構
* 熟悉 Blade 模板如何拆分、繼承與引用
* 實際操作 routes / controllers 的流程
* 使用 Vite 管理前端資源
* 觀察頁面結構並思考哪些部分可以做成共用 layout

這個專案目前不是完整的商業系統，而是我學習 Laravel 過程中的示範作品，用來理解各部分如何串起來。

---

## 未來可以優化的方向

雖然目前專案以練習為主，但如果要讓它更完整，之後可以加入：

* 會員登入 / 註冊功能（含 Session 與驗證流程）
* 商品資料改由資料庫管理，而不是寫死在前端或 Model 裡
* 完整的購物流程（加入購物車、結帳頁、訂單紀錄）
* 後台介面（商品管理、訂單管理）
* API 版本（讓前後端分離也能使用）
* Blade 元件化（例如把 header、footer、card 做成 component）
* 更清楚的資料夾結構與命名規則

這些都是我下一步會持續練習與補強的部分。


⸻


👉 [專題簡報連結](https://docs.google.com/presentation/d/1Lpqgs3bcIqKAbA8s-pbgnELtAQdbmT_tH5S-UMGR6IY/edit?usp=drive_link)


⸻

✍️ 作者（Author）

Abbie Lin ｜ Frontend & UI/UX Designer

跨心理 × 設計 × 前端的創作者。

💌 GitHub: https://github.com/aitong0113
