@component('mail::message')
# Đơn hàng của bạn đã được đặt thành công tại {{ config('app.name') }}

## Chi tiết đơn hàng

@component('mail::table')
| Sản phẩm | Số lượng | Đơn giá | Tổng tiền |
|----------|:--------:|--------:|----------:|
@foreach($order->prds as $prd)
|{{$prd->name}}|{{$prd->pivot->qty}}|{{number_format($prd->pivot->price,",",".")}}|{{number_format($prd->pivot->total,",",".")}}|
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent