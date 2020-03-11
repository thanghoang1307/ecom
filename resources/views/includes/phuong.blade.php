<option value="0" disabled selected>Phường/Xã</option>
@foreach ($items as $item)
<option value="{{$item->maphuong}}">{{$item->name}}</option>
@endforeach