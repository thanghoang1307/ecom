@if(count($topPrds))
    @foreach ($topPrds as $prd)
    <div class="item row">
        <div class="col-md-3 col-12 thumb-image">
            <div class="text-center wrap-img">
                <img src="{{ $prd->thumb }}" width="100%">
            </div>
        </div>
        <div class="col-md-9 col-12">
            <a class="pre-line" href="{{ route('admin.prd.edit',$prd->id)}}" target="_blank">{{ $prd->name }}</a>
            <div class="sold">Đã bán {{ $prd->total }} sản phẩm</div>
        </div>
    </div>
    @endforeach

    @else
    <div class="no-bestsale">Không có sản phẩm bán ra trong phạm vi ngày này.</div>
    @endif
