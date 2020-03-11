<option value="0" disabled selected>Quận/Huyện</option>
@foreach ($items as $item)
<option value="{{$item->maqh}}">{{$item->name}}</option>
@endforeach