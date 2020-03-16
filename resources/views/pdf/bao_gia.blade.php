<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
    	table {border:0.5px solid #000;
    		border-bottom:none;
    		border-right:none;
    		}
    	table th, table td {
    		border-bottom:0.5px solid #000;
    		border-right:0.5px solid #000;
    		padding: 3px 3px;
    	}
    </style>
</head>
<body>
<div>File báo giá từ công ty One Stop Shop</div>
<div>
<table>
	<thead>
		<tr>
			<th>Tên sản phẩm</th>
			<th>Hình sản phẩm</th>
			<th>Số lượng</th>
			<th>Đơn giá</th>
			<th>Thành tiền</th>
		</tr>
	</thead>
<tbody>
@foreach($prds as $prd)
<tr>
	<td>{{$prd->name}}</td>
	<td><img src="{{$prd->thumb}}" width="100px" alt=""></td>
	<td style="text-align: center;">{{$carts[$prd->id]}}</td>
	<td style="text-align: right;">{{str_replace(".00", "",number_format($prd->current_price))}}</td>
	<td style="text-align: right;">{{str_replace(".00", "",number_format($carts[$prd->id]*$prd->current_price))}}</td>
</tr>
@endforeach
<tfoot>
	<tr>
		<td colspan="4"><strong>Tổng tiền</strong></td>
		<td style="text-align: right;"><strong>{{str_replace(".00", "",number_format($total))}}</strong></td>
	</tr>
</tfoot>
</tbody>
</table>
</div>
</body>
</html>