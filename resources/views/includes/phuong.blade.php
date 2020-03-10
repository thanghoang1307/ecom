<option value="0">Phường/Xã</option>
@foreach ($items as $item)
<option value="{{$item->maphuong}}">{{$item->name}}</option>
@endforeach