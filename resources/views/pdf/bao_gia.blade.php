<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="assets/img/favicon.ico">

  <title>Báo giá - OneStopShop.vn - Ngày: {{\Carbon\Carbon::now()->format('d/m/Y')}}</title>
</head>
<body style="line-height: 17px; color: #333; font-size: 14px; padding:10px;">
	<table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
		<tbody>
			<tr>
				<td width="50%"><p style="text-align: left;"><a style="text-decoration: none;" href="https://onestopshop.vn/" target="_blank"><img style="height: 100px;" src="https://onestopshop.vn/assets/img/logo-color.png" alt="" /></a></p>
				</td>
				<td width="50%">
					<p style="font-size: 20px; color: #3e9ef3; text-align: right; font-weight: bold;">CÔNG TY TNHH DỊCH VỤ UM</p>
					<p style="font-size: 14px; color: #333; text-align: right;">Khu đô thị Vinhomes, Số 208 Nguyễn Hữu Cảnh, <br />
						Phường 22, Quận Bình Thạnh, TP. HCM, Vietnam. <br />
						Tel : 0837.000.247 – Fax : 0837.000.247
					</p>
				</td>
				<tr>
					<td style="50%" style="text-align: left;"><p style="text-align: left;">{{Auth::guard('customer')->check() ? 'Khách hàng: '.Auth::guard('customer')->user()->name : ''}}</p></td>
				<td style="50%" style="text-align: right;"><p style="text-align: right;">Ngày: {{\Carbon\Carbon::now()->format('d/m/Y')}}</p></td>
				</tr>
				<tr>
					<td colspan="2">
						<p style="font-weight: bold;">Bảng chào giá các thiết bị và dịch vụ Công Nghệ Thông Tin</p>
						<p style="padding: 0; margin: 3px 0;">Kính gửi: Quý khách hàng,<br />
						<a style="color: #962d91; text-decoration: none;" href="https://onestopshop.vn/" target="_blank">One-Stop-Shop</a> xin gửi đến Quý khách hàng bảng chào giá các thiết bị và dịch vụ Công Nghệ Thông Tin như sau:</p>
					</td>
				</tr>
				<tr>
					<td colspan="2"><p style="padding: 0; margin: 3px 0;"><strong>a).</strong> <strong style="text-decoration: underline;">Sản phẩm và dịch vụ:</strong></p>
					</td>
				</tr>
				<tr>
					<!-- inner table -->
					<td colspan="2">
						<table cellpadding="0" cellspacing="" border="1" style="width: 100%; -webkit-border-horizontal-spacing: 0; -webkit-border-vertical-spacing: 0;">
							<tbody>
								<tr style="background-color: #dedede;">
									<td style="width: 2%"><p style="text-align: center; padding: 5px; margin: 3px 0; font-weight: bold;">STT</p></td>
									<td style="width: 12%"><p style="text-align: center; padding: 5px; margin: 3px 0; font-weight: bold;">Mã thiết bị &amp; dịch vụ</p></td>
									<td style="width: 40%"><p style="text-align: center; padding: 5px; margin: 3px 0; font-weight: bold;">Mô tả thiết bị &amp; dịch vụ</p></td>
									<td style="width: 8%"><p style="text-align: center; padding: 5px; margin: 3px 0; font-weight: bold;">Bảo hành</p></td>
									<td style="width: 7%"><p style="text-align: center; padding: 5px; margin: 3px 0; font-weight: bold;">SL</p></td>
									<td style="width: 12%"><p style="text-align: right; padding: 5px; margin: 3px 0; font-weight: bold;">Đơn giá</p></td>
									<td style="width: 20%"><p style="text-align: right; padding: 5px; margin: 3px 0; font-weight: bold;">Thành tiền</p></td>
								</tr>
								@foreach($prds as $prd)
								<tr>
									<td style="width: 2%"><p style="text-align: center; padding: 5px; margin: 3px 0;">{{$loop->iteration}}</p></td>
									<td style="width: 12%"><p style="text-align: center; padding: 5px; margin: 3px 0;"><a style="color: #333; text-decoration: none;" href="{{route('front.product-detail',$prd->slug)}}" target="_blank">{{$prd->sku}}</a></p></td>
									<td style="width: 40%"><p style="text-align: center; padding: 5px; margin: 3px 0;"><a style="color: #333; text-decoration: none;" href="{{route('front.product-detail',$prd->slug)}}" target="_blank">{{$prd->name}}</a></p></td>
									<td style="width: 8%"><p style="text-align: center; padding: 5px; margin: 3px 0;">{{$prd->attrs()->where('code','bao-hanh')->first()->pivot->text_val ?? ''}}</p></td>
									<td style="width: 7%"><p style="text-align: center; padding: 5px; margin: 3px 0;">{{$carts[$prd->id]}}</p></td>
									<td style="width: 12%"><p style="text-align: right; padding: 5px; margin: 3px 0;">{{str_replace(".00", "",number_format($prd->current_price))}}<sup>đ</sup></p></td>
									<td style="width: 20%"><p style="text-align: right; padding: 5px; margin: 3px 0; font-weight: bold;">{{str_replace(".00", "",number_format($carts[$prd->id]*$prd->current_price))}}<sup>đ</sup></p></td>
								</tr>
								@endforeach
								
								<tr style="background-color: #dedede;">
									<td colspan="6"><p style="text-align: right; padding: 5px; margin: 3px 0; font-weight: bold;">Tổng</p></td>
									<td><p style="text-align: right; padding: 5px; margin: 3px 0; font-weight: bold;">{{str_replace(".00", "",number_format($total))}}<sup>đ</sup></p></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				
				
				<tr>
					<td colspan="2"><p style="padding: 0; margin: 3px 0;"><strong>b).</strong> <strong style="text-decoration: underline;"> Thời hạn hiệu lực của báo giá:</strong> Báo giá trên có hiệu lực trong vòng 07 ngày</p>
					</td>
				</tr>
				<tr>
					<td colspan="2"><p style="padding: 0; margin: 3px 0;"><strong>c).</strong> <strong style="text-decoration: underline;">Hình thức thanh toán:</strong>  Bằng tiền mặt hoặc chuyển khoản</p>
					</td>
				</tr>
				<tr>
					<td colspan="2"><p style="padding: 0; margin: 3px 0;"><strong>d).</strong> <strong style="text-decoration: underline;">Thời gian giao hàng:</strong>  Từ 01 đến 03 ngày khi nhận được thông báo chuyển tiền</p>
					</td>
				</tr>
				<tr>
					<td colspan="2"><p style="padding: 0; margin: 3px 0;"><strong>e).</strong> <strong style="text-decoration: underline;">Điều kiện chung:</strong> Áp dụng theo chính sách bán hàng và quy định chung của One-Stop-Shop</p>
					</td>
				</tr>
				<tr>
					<td colspan="2"><p style="padding: 0; margin: 3px 0;">Chân thành cảm ơn và trân trọng kính chào!</p>
					</td>
				</tr>
			</tr>
		</tbody>
	</table>
</body>
</html>