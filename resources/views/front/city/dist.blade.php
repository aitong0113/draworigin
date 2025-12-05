<option value="">請選擇</option>
@foreach($list as $data)
<option value="{{ $data->dist }}">{{ $data->dist }}</option>
@endforeach