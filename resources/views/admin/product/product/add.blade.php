@extends("admin.layout")
@section("title", "產品管理")
@section("content")

<!-- 自己加的回上頁 -->
<div class="container-fluid px-3">
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ url('/admin/product/product/list') }}" class="btn btn-secondary mb-2">回上頁</a>
        </div>
    </div>
</div>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script>
    $(function() {
        $("#tabs").tabs();
    });
</script>
<form method="post" action="insert" enctype="multipart/form-data">

    @csrf
    <div id="tabs">
        <ul>
            <li><a href="#tab1">基本資料</a></li>
            <li><a href="#tab2">顏色</a></li>
            <li><a href="#tab3">尺寸</a></li>
            <li><a href="#tab4">標籤</a></li>
            <li><a href="#tab5">規格</a></li>
            <li><a href="#tab6">產品圖</a></li>
            <li><a href="#tab7">產品介紹</a></li>
            <li><a href="#tab8">規格說明</a></li>
        </ul>
        <div id="tab1">
            <div class="row">
                <div class="col-1 text-end">類別</div>
                <div class="col-3">
                    <select name="layer" class="form-select border-dark" required>
                        <option value="">請選擇</option>
                        @foreach($layer as $data)
                        <option value="{{ $data->id }}">{{ $data->layer_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-1 text-end">產品編號</div>
                <div class="col-2">
                    <input type="text" class="form-control border-dark" name="itemNo">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-1 text-end">產品名稱</div>
                <div class="col-2">
                    <input type="text" class="form-control border-dark" name="itemName">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-1 text-end">標題</div>
                <div class="col-2">
                    <input type="text" class="form-control border-dark" name="title">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-1 text-end">產品描述</div>
                <div class="col-11">
                    <input type="text" class="form-control border-dark" name="content">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-1 text-end">定價</div>
                <div class="col-2">
                    <input type="number" class="form-control border-dark" name="price">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-1 text-end">售價</div>
                <div class="col-2">
                    <input type="number" class="form-control border-dark" name="salePrice">
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-1 text-end">數量</div>
                <div class="col-2">
                    <input type="number" class="form-control border-dark" name="qty">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-1 text-end">最新產品</div>
                <div class="col-2">
                    <input type="checkbox" class="form-check-input border-dark" name="isNew" value="Y">
                </div>
            </div>

            
            <div class="row mt-3">
                <div class="col-1 text-end">使用中</div>
                <div class="col-2">
                    <input type="checkbox" class="form-check-input border-dark" name="active" value="Y">
                </div>
            </div>
        </div>

        <div id="tab2">
            @foreach($color as $data)
            <div class="mt-3">
                <input type="checkbox"
                    name="color{{ $data->id }}"
                    value="{{ $data->id }}"
                    class="form-check-input border-dark">
                <font style="background-color: {{ $data->color }};">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                {{ $data->colorName }}
            </div>
            @endforeach
        </div>


        <div id="tab3">
            @foreach($size as $data)
            <div class="mt-3">
                <input type="checkbox"
                    name="size{{ $data->id }}"
                    value="{{ $data->id }}"
                    class="form-check-input border-dark">
                {{ $data->size }}
            </div>
            @endforeach
        </div>


        <div id="tab4">
            @foreach($label as $data)
            <div class="mt-3 mb-3">
                <input type="checkbox"
                    name="label{{ $data->id }}"
                    value="{{ $data->id }}"
                    class="form-check-input border-dark">
                <img src="/images/label/{{ $data->label }}">
            </div>
            @endforeach
        </div>



        <div id="tab5">
            @foreach(range(1, 10) as $seq)
            <div class="row mt-3">
                <div class="col-1 form-label text-end">規格名稱{{ $seq }}</div>
                <div class="col-2">
                    <input type="text" name="title{{ $seq }}" class="form-control border-dark">
                </div>
                <div class="col-1 form-label text-end">規格內容{{ $seq }}</div>
                <div class="col-5">
                    <input type="text" name="content{{ $seq }}" class="form-control border-dark">
                </div>
            </div>
            @endforeach
        </div>



        <div id="tab6">
            @foreach(range(1, 8) as $seq)
            <div class="row mt-3">
                <div class="col-3">
                    <input type="file" name="photo{{ $seq }}" class="form-control border-dark">
                </div>
            </div>
            @endforeach
        </div>




        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary btn-lg">確 定</button>
        </div>
</form>
@endsection