<option value="0">Quận/Huyện</option>
@foreach ($items as $item)
<option value="{{$item->maqh}}">{{$item->name}}</option>
@endforeach