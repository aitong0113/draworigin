@if (!empty($list) && sizeof($list) > 0)
@php $total = 0; @endphp
@foreach($list as $data)
@php $total += $data->qty * $data->salePrice; @endphp
<li>
  <a href="/product/detail/{{ $data->productId }}" class="photo">
    <img src="/images/product/S/{{ $data->photo }}" class="cart-thumb" alt="" />
  </a>
  <h6>
    <a href="/product/detail/{{ $data->productId }}">
      {{ $data->itemName }}
    </a>
  </h6>
  <p>
    <span class="price">${{ number_format($data->salePrice) }}</span>
    &nbsp;x&nbsp;{{ $data->qty }}
  </p>
</li>
@endforeach

<li class="total">
  <span class="pull-right">
    <strong>Total</strong>: ${{ number_format($total) }}
  </span>
  <a href="/shopCart/list" class="btn btn-default btn-cart">結 帳</a>
</li>
@endif