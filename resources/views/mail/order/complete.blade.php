<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<style>
		@media screen and (max-device-width:768px), screen and (max-width:768px) {
	table {
		font-size: 30px;
		line-height: 1.2em;
	}
	
	.hotline {
		font-size: 1.0em;
	}
}
		@media screen and (min-device-width:800px), screen and (min-width:800px) {
	table {
		font-size: 16px;
		line-height: 1.0em;
	}
	
	.hotline {
		font-size: 1.2em;
	}
}
	</style>
</head>
<body>
	<!-- mail bg -->
	<table style="text-align: center; width:100%; margin:0 auto; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif; background:#f8f9fa" width="100%" cellpadding="0" cellspacing="0" border="0">
		<tbody>
			<tr>
				<td>
					<!-- mail content -->
					<table style="text-align: center; margin:0 auto; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;" width="600px" cellpadding="0" cellspacing="0" border="0">
						<tbody>
							<tr>
								<td>
									<!-- header -->
									<table style="background:#962d91;" width="100%" cellpadding="0" cellspacing="0" border="0">
										<tbody>
											<tr>
												<td width="50%">
													<p style="padding: 10px 0 5px 10px; margin: 0;"><a href="https://onestopshop.vn" target="_blank">
														<a href="https://onestopshop.vn" target="_blank">
															<img style="border: none;" class="CToWUd" data-image-whitelisted="" src="https://onestopshop.vn/uploads/photos/shares/logo-w.png" width="100%" alt="" />
														</a>
														</a></p>
												</td>
												
												<td width="50%">
													<p style="padding: 0; margin-right:10px; text-align: right;"><a style="color: white; text-decoration: none;" href="tel:0837000247"><span style="font-size: 0.7em;">Hotline</span>
														
													<br /><span class="hotline" style="font-weight: bold;">0837.000.247</span></a></p>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							
							<tr>
								<td>
									<!-- body -->
									<table style="background:transparent;" width="100%" cellpadding="0" cellspacing="0" border="0">
										<tbody>
											<!-- welcome -->
											@if($order->customer_id)
											<tr>
												<td>
													<div style="margin: 0; padding: 30px; text-align: left; color: #666; background: white;">
														<p style="font-size: 1.0em;">Kính chào {{$order->customer->gender == 'male' ? 'anh' : 'chị'}} {{$order->customer->name}}</p>
														
														<p style="font-size: 1.0em;">Đơn hàng số <span style="color: #962d91;">#{{$order->order_number}}</span> của {{$order->customer->gender == 'male' ? 'anh' : 'chị'}} đã được {{ config('app.name') }} tiếp nhận xử lý. Chúng tôi sẽ tiến hành xác nhận và giao hàng đến {{$order->customer->gender == 'male' ? 'anh' : 'chị'}} trong thời gian sớm nhất. Vui lòng chú ý cuộc gọi từ nhân viên giao hàng.</p>
														
														<p style="font-size: 1.0em;">Để được hỗ trợ thêm thông tin về đơn hàng của mình, {{$order->customer->gender == 'male' ? 'anh' : 'chị'}} vui lòng liên hệ số hotline <a style="color:#962d91; text-decoration: none;" href="tel:0837000247">0837.000.247</a></p>
														
														<p style="font-size: 1.0em;">OneStopShop.vn xin chân thành cảm ơn và rất mong sẽ tiếp tục nhận được sự ủng hộ của anh trong tương lai!</p>
													</div>
												</td>
											</tr>
											@else
											
											<tr>
												<td>
													<div style="margin: 0; padding: 30px; text-align: left; color: #666; background: white;">
														<p style="font-size: 1.0em;">Kính chào {{$order->guest->gender == 'male' ? 'anh' : 'chị'}} {{$order->guest->name}}</p>
														
														<p style="font-size: 1.0em;">Đơn hàng số <span style="color: #962d91;">#{{$order->order_number}}</span> của {{$order->guest->gender == 'male' ? 'anh' : 'chị'}} đã được {{ config('app.name') }} tiếp nhận xử lý. Chúng tôi sẽ tiến hành xác nhận và giao hàng đến {{$order->guest->gender == 'male' ? 'anh' : 'chị'}} trong thời gian sớm nhất. Vui lòng chú ý cuộc gọi từ nhân viên giao hàng.</p>
														
														<p style="font-size: 1.0em;">Để được hỗ trợ thêm thông tin về đơn hàng của mình, {{$order->guest->gender == 'male' ? 'anh' : 'chị'}} vui lòng liên hệ số hotline <a style="color:#962d91; text-decoration: none;" href="tel:0837000247">0837.000.247</a></p>
														
														<p style="font-size: 1.0em;">OneStopShop.vn xin chân thành cảm ơn và rất mong sẽ tiếp tục nhận được sự ủng hộ của anh trong tương lai!</p>
													</div>
												</td>
											</tr>
											@endif
											<!-- end welcome -->
											
											<!-- shipment -->
											@if($order->customer_id)
											<tr>
												<td>
													<table style="background:#fff3e4; text-align: left; margin-top: 20px; padding: 10px 30px;" width="100%" cellpadding="0" cellspacing="0" border="0">
														<tbody>
															<tr>
																<td colspan="2">
																	<p style="margin: 0; padding: 10px 0; text-align: left; color: #666; border-bottom: 2px solid #ddd; font-weight: bolder;font-size: 1.0em;">Thông tin đơn hàng</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 20px 0 0 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1.0em;">Họ và tên:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 20px 0 0 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1.0em;">{{$order->customer->name}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1.0em;">Số điện thoại:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1.0em;">{{$order->customer->phone}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%" style="vertical-align: text-top;">
																	<p style="margin: 0 0 20px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1.0em;">Địa chỉ nhận hàng:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 0 0 20px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1.0em;">{{$order->shipment->address}}, {{$order->shipment->ward->name}}, {{$order->shipment->district->name}}, {{$order->shipment->city->name}}</p>
																</td>
															</tr>
															
															<tr>
																<td colspan="2">
																	<p style="margin: 0; padding: 10px 0; text-align: left; color: #666; border-top: 1px solid #ddd;font-size: 0.7em;"><strong>Lưu ý:</strong> Với những đơn hàng trả trước, xin vui lòng đảm bảo người nhận hàng đúng thông tin đã đăng.</p>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											@else
											
											<tr>
												<td>
													<table style="background:#fff3e4; text-align: left; margin-top: 20px; padding: 10px 30px;" width="100%" cellpadding="0" cellspacing="0" border="0">
														<tbody>
															<tr>
																<td colspan="2">
																	<p style="margin: 0; padding: 10px 0; text-align: left; color: #666; border-bottom: 2px solid #ddd; font-weight: bolder;font-size: 1.0em;">Thông tin đơn hàng</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 20px 0 0 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1.0em;">Họ và tên:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 20px 0 0 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1.0em;">{{$order->guest->name}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1.0em;">Số điện thoại:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1.0em;">{{$order->guest->phone}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%" style="vertical-align: text-top;">
																	<p style="margin: 0 0 20px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1.0em;">Địa chỉ nhận hàng:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 0 0 20px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1.0em;">{{$order->shipment->address}}, {{$order->shipment->ward->name}}, {{$order->shipment->district->name}}, {{$order->shipment->city->name}}</p>
																</td>
															</tr>
															
															<tr>
																<td colspan="2">
																	<p style="margin: 0; padding: 10px 0; text-align: left; color: #666; border-top: 1px solid #ddd;font-size: 0.7em;"><strong>Lưu ý:</strong> Với những đơn hàng trả trước, xin vui lòng đảm bảo người nhận hàng đúng thông tin đã đăng.</p>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											@endif
											<!-- end shipment -->
											
											<!-- VAT -->
											@if($order->is_vat)
											<tr>
												<td>
													<table style="background:transparent; text-align: left; margin-top: 20px; padding: 10px 30px; border: 1px solid #ddd;" width="100%" cellpadding="0" cellspacing="0" border="0">
														<tbody>
															<tr>
																<td colspan="2">
																	<p style="margin: 0; padding: 10px 0; text-align: left; color: #666; border-bottom: 2px solid #ddd; font-weight: bolder;font-size: 1.0em;">Thông tin xuất hoá đơn GTGT</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 20px 0 0 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1.0em;">Tên công ty</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 20px 0 0 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1.0em;">{{$order->company->name}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1.0em;">Mã số thuế:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1.0em;">{{$order->company->mst}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%" style="vertical-align: text-top;">
																	<p style="margin: 0 0 20px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1.0em;">Địa chỉ:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 0 0 20px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1.0em;">{{$order->company->address}}</p>
																</td>
															</tr>
															
															<tr>
																<td colspan="2">
																	<p style="margin: 10px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1.0em;"><strong>Ghi chú:</strong> {{$order->company->note}}</p>
																</td>
															</tr>
															
															<tr>
																<td colspan="2">
																	<p style="margin: 0; padding: 10px 0; text-align: left; color: #666; border-top: 1px solid #ddd; font-size: 0.7em;"><strong>Lưu ý:</strong> OneStopShop.vn từ chối xử lý các yêu cầu phát sinh trong việc kê khai thuế đối với những hóa đơn từ 20 triệu đồng trở lên thanh toán bằng tiền mặt.</p>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											@endif
											<!-- end VAT -->
											
											<!-- order info -->
											<tr>
												<td>
													<table style="background:white; text-align: left; margin-top: 20px; padding: 10px 30px; border: 0;" width="100%" cellpadding="0" cellspacing="0" border="0">
														<tbody>
															<tr>
																<td>
																	<p style="margin: 0; padding: 10px 0; text-align: left;   color: #666; border-bottom: 2px solid #ddd; font-weight: bolder;font-size: 1.0em;">Chi tiết đơn hàng</p>
																</td>
															</tr>
															
															<!-- begin item -->
															@foreach ($order->prds as $prd)
															<tr>
																<td>
																	<table style="padding: 10px 0; margin: 0; border-bottom: 1px dotted #ddd;" width="100%" cellpadding="0" cellspacing="0" border="0">
																		<tbody>
																			<tr>
																				<td width="60%">
																					<p style="margin: 0; padding: 5px 0 0 0; text-align: left; color: #666; font-weight: bold;font-size: 1.0em;"><a href="{{route('front.product-detail',$prd->slug)}}" style="color: #666; text-decoration: none;">{{$prd->name}}</a></p>
																				</td>
																				
																				<td width="40%">
																					<p class="price" style="margin: 0; padding: 5px 0 0 0; text-align: right; color: #666;font-size: 1.0em;">{{str_replace(".00", "", number_format($prd->pivot->total,2))}}<sup>đ</sup></p>
																				</td>
																			</tr>
																			
																			<tr>
																				<td width="50%">
																					<p style="margin: 0; padding: 5px 0 10px 0; text-align: left; color: #666;font-size: 1.0em;">Mã sản phẩm: <a href="{{route('front.product-detail',$prd->slug)}}" style="color: #962d91; text-decoration: none;">{{$prd->sku}}</a></p>
																				</td>
																				
																				<td width="40%">
																					<p style="margin: 0; padding: 5px 0 10px 0; text-align: right; color: #666;font-size: 1.0em;">x{{$prd->pivot->qty}}</p>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
															@endforeach
															<!-- end item -->
															
															<tr>
																<td colspan="2">
																	<p style="margin: 10px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1.0em;"><strong>Ghi chú:</strong> {{$order->shipment->note}}</p>
																</td>
															</tr>
															
															<tr>
																<td>
																	<table style="padding: 10px 0; margin: 0; border-top: 2px solid #ddd;" width="100%" cellpadding="0" cellspacing="0" border="0">
																		<tbody>
																			<tr>
																				<td width="60%">
																					<p style="margin: 0; padding: 5px 0; text-align: right; color: #666;font-size: 1.0em;">Phương thức thanh toán</p>
																				</td>
																				
																				<td width="40%">
																					<p style="margin: 0; padding: 5px 0; text-align: right; color: #666; font-weight: bold;font-size: 1.0em;">{{$order->payment_type == 0 ? 'COD' : 'Chuyển khoản'}}</p>
																				</td>
																			</tr>
																			
																			<tr>
																				<td width="60%">
																					<p style="margin: 0; padding: 5px 0; text-align: right; color: #666;font-size: 1.0em;">Phí vận chuyển</p>
																				</td>
																				
																				<td width="40%">
																					<p style="margin: 0; padding: 5px 0; text-align: right; color: #666; font-weight: bold;font-size: 1.0em;">Miễn phí</p>
																				</td>
																			</tr>
																			
																			<tr>
																				<td width="60%">
																					<p style="margin: 0; padding: 5px 0; text-align: right; font-size: 1.0em; color: #666;">Tổng tiền</p>
																				</td>
																				
																				<td width="40%">
																					<p class="price" style="margin: 0; padding: 5px 0; text-align: right; font-size: 1.1em; color: #666; font-weight: bold;">{{str_replace(".00", "",number_format($order->total,2))}}<sup>đ</sup></p>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<!-- end order info -->     
										</tbody>
									</table>
								</td>
							</tr>
							
							<tr>
								<td>
									<!-- footer -->
									<table style="background:#f8f9fa; border-bottom: 2px solid #ddd; border-top: 2px solid #ddd; padding: 10px 0; margin: 20px 0 0 0;" width="100%" cellpadding="0" cellspacing="0" border="0">
										<tr>
											<td width="50%">
												<p style="font-size: 0.7em; margin: 0; padding: 10px 30px; text-align: left; color: #666;"><strong>CÔNG TY TRÁCH NHIỆM HỮU HẠN DỊCH VỤ UM OneStopShop IT</strong> - Lựa chọn hàng đầu về giải pháp và thiết bị trong lĩnh vực công nghệ thông tin.
													
													<br />Khu đô thị Vinhomes Central Park, số 208 Nguyễn Hữu Cảnh, Phường 22, Q. Bình Thạnh, Tp.HCM.
												</p>
											</td>
											
											<td width="25%" style="vertical-align: text-top;">
												<p style="text-align: left; font-size: 0.7em; margin: 10px 10px 0 10px; padding: 0; color: #666;"><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/chinh-sach-doi-tra" target="_blank">Chính sách đổi trả</a>
													
													<br /><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/chinh-sach-bao-hanh" target="_blank">Chính sách bảo hành</a>
													
													<br /><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/bao-mat-thong-tin" target="_blank">Bảo mật thông tin</a>
													
												<br /><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/thong-tin-lien-he" target="_blank">Thông tin liên hệ</a></p>
											</td>
											
											<td width="25%" style="vertical-align: text-top;">
												<p style="text-align: left; font-size: 0.7em; margin: 10px 10px 0 10px; padding: 0 10px 0 0; color: #666;"><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/huong-dan-mua-hang" target="_blank">Hướng dẫn mua hàng</a>
													
													<br /><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/huong-dan-thanh-toan" target="_blank">Hướng dẫn thanh toán</a>
													
													<br /><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/phuong-thuc-van-chuyen" target="_blank">Phương thức vận chuyển</a>
													
													<br />
												</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							
							<tr>
								<td>
									<p style="text-align: center; margin: 10px; padding: 0;  color: #666; font-size: 0.7em;"><strong>Lưu ý:</strong> Giá bán và các ưu đãi, quà tặng đi kèm sản phẩm có thể thay đổi bất cứ lúc nào mà không cần báo trước.</p>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>