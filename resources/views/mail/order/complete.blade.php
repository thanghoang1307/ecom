@component('mail::message')
@if($order->customer_id)
## Cảm ơn {{$order->customer->gender == 'male' ? 'anh' : 'chị'}} {{$order->customer->name}} đã mua sắm tại {{ config('app.name') }},

## Đơn hàng của {{$order->customer->gender == 'male' ? 'anh' : 'chị'}} {{$order->customer->name}} đã được đặt thành công tại {{ config('app.name') }}

# Chi tiết đơn hàng số #{{$order->order_number}}

@component('mail::table')
| Sản phẩm | Số lượng | Đơn giá | Tổng tiền |
|----------|:--------:|--------:|----------:|
@foreach($order->prds as $prd)
|{{$prd->name}}|{{$prd->pivot->qty}}|{{str_replace(".00", "",number_format($prd->pivot->price,2))}}|{{str_replace(".00", "", number_format($prd->pivot->total,2))}}|
@endforeach
|**Phương thức thanh toán**	||					|{{$order->payment_type == '0' ? 'COD' : 'Chuyển khoản'}}|
|**Tổng**	||					|{{str_replace(".00", "",number_format($order->total,2))}}|
@endcomponent

@if($order->is_vat)
# Yêu cầu xuất hoá đơn cho công ty {{$order->company->name}}

**Địa chỉ công ty**: {{$order->company->address}}

**Mã số thuế**: {{$order->company->mst}}

**Lời nhắn**: {{$order->company->note}}
@endif

# Thông tin nhận hàng
Nhận hàng tại địa chỉ: *{{$order->shipment->address}}, {{$order->shipment->ward->name}}, {{$order->shipment->district->name}}, {{$order->shipment->city->name}}*

Cảm ơn {{$order->guest->gender == 'male' ? 'anh' : 'chị'}} {{$order->guest->name}},<br>
{{ config('app.name') }}
@else
## Cảm ơn {{$order->guest->gender == 'male' ? 'anh' : 'chị'}} {{$order->guest->name}} đã mua sắm tại {{ config('app.name') }},

## Đơn hàng của {{$order->guest->gender == 'male' ? 'anh' : 'chị'}} {{$order->guest->name}} đã được đặt thành công tại {{ config('app.name') }}

# Chi tiết đơn hàng số #{{$order->order_number}}

@component('mail::table')
| Sản phẩm | Số lượng | Đơn giá | Tổng tiền |
|----------|:--------:|--------:|----------:|
@foreach($order->prds as $prd)
|{{$prd->name}}|{{$prd->pivot->qty}}|{{str_replace(".00", "",number_format($prd->pivot->price,2))}}|{{str_replace(".00", "", number_format($prd->pivot->total,2))}}|
@endforeach
|**Phương thức thanh toán**	||					|{{$order->payment_type == '0' ? 'COD' : 'Chuyển khoản'}}|
|**Tổng**	||					|{{str_replace(".00", "",number_format($order->total,2))}}|
@endcomponent

@if($order->is_vat)
# Yêu cầu xuất hoá đơn cho công ty {{$order->company->name}}

**Địa chỉ công ty**: {{$order->company->address}}

**Mã số thuế**: {{$order->company->mst}}

**Lời nhắn**: {{$order->company->note}}
@endif

# Thông tin nhận hàng
Nhận hàng tại địa chỉ: *{{$order->shipment->address}}, {{$order->shipment->ward->name}}, {{$order->shipment->district->name}}, {{$order->shipment->city->name}}*

Cảm ơn {{$order->guest->gender == 'male' ? 'anh' : 'chị'}} {{$order->guest->name}},<br>
@endif
@endcomponent
