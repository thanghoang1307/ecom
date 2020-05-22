<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<style>
		@media screen and (min-device-width:600px), screen and (min-width:600px) {
			#main {
				font-size: 14px;
				line-height: 1.2em;
				width: 600px;
			}
			#main .welcome {
				text-align: left;
			}
			#main .notice {
				text-align: left;
			}
		}
		@media (min-device-width:320px) and (max-device-width:599px), (min-width:320px) and (max-width:599px) {
			#main {
				width: 95vw;
				/*font-size: 0.7em;*/
			}
			#main .welcome {
				text-align: justify;
			}
			#main .notice {
				text-align: justify;
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
					<table id="main" style="text-align: center; margin:0 auto; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;" cellpadding="0" cellspacing="0" border="0">
						<tbody>
							<tr>
								<td>
									<!-- header -->
									<table style="background:#962d91;" width="100%" cellpadding="0" cellspacing="0" border="0">
										<tbody>
											<tr>
												<td width="60%">
													<p style="padding: 0; margin: 7px 0 3px 10px;"><a href="https://onestopshop.vn" target="_blank">
														<a href="https://onestopshop.vn" target="_blank">
															<img style="border: none;" class="CToWUd" data-image-whitelisted="" src="https://onestopshop.vn/uploads/photos/shares/logo-w.png" width="100%" alt="" />
														</a></p>
												</td>
												<td width="40%">
													<p class="hotline" style="padding: 0; margin: 5px 10px 5px 0; text-align: right;color: white; text-decoration: none; line-height: 0.9em;">
														<span style="font-size: 0.7em; margin: 0; padding: 0;">Hotline</span><br />
														<span style="font-size: 1em; margin: 0; padding: 0;"><a style="color: white; text-decoration: none; font-size: 0.9em; font-weight: bold;" href="tel:0837000247">0837.000.247</a></span>
													</p>
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
													<div style="margin: 0; padding: 10px; color: #666; background: white;">
														<p class="welcome" style="font-size: 1em;">{{$order->customer->gender == 'male' ? 'anh' : 'chị'}} {{$order->customer->name}} thân mến</p>
														
														<p class="welcome" style="font-size: 1em;">OneStopShop.vn rất lấy làm tiếc thông báo <span style="color: #962d91;">đơn hàng số #{{$order->order_number}}</span> của {{$order->customer->gender == 'male' ? 'anh' : 'chị'}} <span style="color: #962d91;">đã bị huỷ</span>.Để được hỗ trợ thông tin chi tiết về đơn hàng của mình cũng như hướng dẫn đặt đơn hàng mới, vui lòng gọi <span style="color: #962d91;">0837.000.247</span>. Chúng tôi luôn sẵn sàng và hân hạnh được phục vụ quý khách.</p>
														
                                                        <p class="welcome" style="font-size: 1em;">Xin cảm ơn và hẹn gặp lại</p>
                                                        
                                                        <p class="welcome" style="font-size: 1em;">Trân trọng</p>											
														
													</div>
												</td>
											</tr>
											@else
											
											<tr>
												<td>
                                                <div style="margin: 0; padding: 10px; color: #666; background: white;">
														<p class="welcome" style="font-size: 1em;">{{$order->guest->gender == 'male' ? 'anh' : 'chị'}} {{$order->guest->name}} thân mến</p>
														
														<p class="welcome" style="font-size: 1em;">OneStopShop.vn rất lấy làm tiếc thông báo <span style="color: #962d91;">đơn hàng số #{{$order->order_number}}</span> của {{$order->guest->gender == 'male' ? 'anh' : 'chị'}} <span style="color: #962d91;">đã bị huỷ</span>.Để được hỗ trợ thông tin chi tiết về đơn hàng của mình cũng như hướng dẫn đặt đơn hàng mới, vui lòng gọi <span style="color: #962d91;">0837.000.247</span>. Chúng tôi luôn sẵn sàng và hân hạnh được phục vụ quý khách.</p>
														
                                                        <p class="welcome" style="font-size: 1em;">Xin cảm ơn và hẹn gặp lại</p>
                                                        
                                                        <p class="welcome" style="font-size: 1em;">Trân trọng</p>											
														
													</div>
												</td>
											</tr>
											@endif
											<!-- end welcome -->
											
											<!-- shipment -->
											@if($order->customer_id)
											<tr>
												<td>
													<table style="background:#fff3e4; text-align: left; margin-top: 10px; padding: 10px;" width="100%" cellpadding="0" cellspacing="0" border="0">
														<tbody>
															<tr>
																<td colspan="2">
																	<p style="margin: 0; padding: 10px 0; text-align: left; color: #666; border-bottom: 2px solid #ddd; font-weight: bolder;font-size: 1em;">Thông tin đơn hàng</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 10px 0 0 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1em;">Họ và tên:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 10px 0 0 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1em;">{{$order->customer->name}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1em;">Số điện thoại:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1em;">{{$order->customer->phone}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%" style="vertical-align: text-top;">
																	<p style="margin: 0 0 10px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1em;">Địa chỉ nhận hàng:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 0 0 10px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1em;">{{$order->shipment->address}}, {{$order->shipment->ward->name}}, {{$order->shipment->district->name}}, {{$order->shipment->city->name}}</p>
																</td>
															</tr>
															
															<tr>
																<td colspan="2">
																	<p class="notice" style="margin: 0; padding: 10px 0; color: #666; border-top: 1px solid #ddd;font-size: 0.7em;"><strong>Lưu ý:</strong> Với những đơn hàng trả trước, xin vui lòng đảm bảo người nhận hàng đúng thông tin đã đăng.</p>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											@else
											
											<tr>
												<td>
													<table style="background:#fff3e4; text-align: left; margin-top: 10px; padding: 10px;" width="100%" cellpadding="0" cellspacing="0" border="0">
														<tbody>
															<tr>
																<td colspan="2">
																	<p style="margin: 0; padding: 10px 0; text-align: left; color: #666; border-bottom: 2px solid #ddd; font-weight: bolder;font-size: 1em;">Thông tin đơn hàng</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 10px 0 0 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1em;">Họ và tên:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 10px 0 0 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1em;">{{$order->guest->name}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1em;">Số điện thoại:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1em;">{{$order->guest->phone}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%" style="vertical-align: text-top;">
																	<p style="margin: 0 0 10px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1em;">Địa chỉ nhận hàng:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 0 0 10px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1em;">{{$order->shipment->address}}, {{$order->shipment->ward->name}}, {{$order->shipment->district->name}}, {{$order->shipment->city->name}}</p>
																</td>
															</tr>
															
															<tr>
																<td colspan="2">
																	<p class="notice" style="margin: 0; padding: 10px 0; color: #666; border-top: 1px solid #ddd;font-size: 0.7em;"><strong>Lưu ý:</strong> Với những đơn hàng trả trước, xin vui lòng đảm bảo người nhận hàng đúng thông tin đã đăng.</p>
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
													<table style="background:transparent; text-align: left; margin-top: 10px; padding: 10px; border: 1px solid #ddd;" width="100%" cellpadding="0" cellspacing="0" border="0">
														<tbody>
															<tr>
																<td colspan="2">
																	<p style="margin: 0; padding: 10px 0; text-align: left; color: #666; border-bottom: 2px solid #ddd; font-weight: bolder;font-size: 1em;">Thông tin xuất hoá đơn GTGT</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 10px 0 0 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1em;">Tên công ty</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 10px 0 0 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1em;">{{$order->company->name}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1em;">Mã số thuế:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 3px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1em;">{{$order->company->mst}}</p>
																</td>
															</tr>
															
															<tr>
																<td width="30%" style="vertical-align: text-top;">
																	<p style="margin: 0 0 10px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1em;">Địa chỉ:</p>
																</td>
																
																<td width="70%">
																	<p style="margin: 0 0 10px 0; padding: 5px 0; text-align: left;   color: #666; font-weight: bold;font-size: 1em;">{{$order->company->address}}</p>
																</td>
															</tr>
															
															<tr>
																<td colspan="2">
																	<p style="margin: 10px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1em;"><strong>Ghi chú:</strong> {{$order->company->note}}</p>
																</td>
															</tr>
															
															<tr>
																<td colspan="2">
																	<p class="notice" style="margin: 0; padding: 10px 0; color: #666; border-top: 1px solid #ddd; font-size: 0.7em;"><strong>Lưu ý:</strong> OneStopShop.vn từ chối xử lý các yêu cầu phát sinh trong việc kê khai thuế đối với những hóa đơn từ 20 triệu đồng trở lên thanh toán bằng tiền mặt.</p>
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
													<table style="background:white; text-align: left; margin-top: 10px; padding: 10px; border: 0;" width="100%" cellpadding="0" cellspacing="0" border="0">
														<tbody>
															<tr>
																<td>
																	<p style="margin: 0; padding: 10px 0; text-align: left;   color: #666; border-bottom: 2px solid #ddd; font-weight: bolder;font-size: 1em;">Chi tiết đơn hàng</p>
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
																					<p style="margin: 0; padding: 5px 0 0 0; text-align: left; color: #666; font-weight: bold;font-size: 1em;"><a href="{{route('front.product-detail',$prd->slug)}}" style="color: #666; text-decoration: none;font-size: 1em;">{{$prd->name}}</a></p>
																				</td>
																				
																				<td width="40%">
																					<p class="price" style="margin: 0; padding: 5px 0 0 0; text-align: right; color: #666;font-size: 1em;">{{str_replace(".00", "", number_format($prd->pivot->total,2))}}<sup>đ</sup></p>
																				</td>
																			</tr>
																			
																			<tr>
																				<td width="50%">
																					<p style="margin: 0; padding: 5px 0 10px 0; text-align: left; color: #666;font-size: 1em;">Mã sản phẩm: <a href="{{route('front.product-detail',$prd->slug)}}" style="color: #962d91; text-decoration: none;font-size: 1em;">{{$prd->sku}}</a></p>
																				</td>
																				
																				<td width="40%">
																					<p style="margin: 0; padding: 5px 0 10px 0; text-align: right; color: #666;font-size: 1em;">x{{$prd->pivot->qty}}</p>
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
																	<p style="margin: 10px 0; padding: 5px 0; text-align: left;   color: #666;font-size: 1em;"><strong>Ghi chú:</strong> {{$order->shipment->note}}</p>
																</td>
															</tr>
															
															<tr>
																<td>
																	<table style="padding: 10px 0; margin: 0; border-top: 2px solid #ddd;" width="100%" cellpadding="0" cellspacing="0" border="0">
																		<tbody>
																			<tr>
																				<td width="60%">
																					<p style="margin: 0; padding: 5px 0; text-align: right; color: #666;font-size: 1em;">Phương thức thanh toán</p>
																				</td>
																				
																				<td width="40%">
																					<p style="margin: 0; padding: 5px 0; text-align: right; color: #666; font-weight: bold;font-size: 1em;">{{$order->payment_type == 0 ? 'COD' : 'Chuyển khoản'}}</p>
																				</td>
																			</tr>
																			
																			<tr>
																				<td width="60%">
																					<p style="margin: 0; padding: 5px 0; text-align: right; color: #666;font-size: 1em;">Phí vận chuyển</p>
																				</td>
																				
																				<td width="40%">
																					<p style="margin: 0; padding: 5px 0; text-align: right; color: #666; font-weight: bold;font-size: 1em;">Miễn phí</p>
																				</td>
																			</tr>
																			
																			<tr>
																				<td width="60%">
																					<p style="margin: 0; padding: 5px 0; text-align: right;font-size: 1em; color: #666;">Tổng tiền</p>
																				</td>
																				
																				<td width="40%">
																					<p class="price" style="margin: 0; padding: 5px 0; text-align: right; color: #666; font-weight: bold;font-size: 1em;">{{str_replace(".00", "",number_format($order->total,2))}}<sup>đ</sup></p>
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
												<p style="font-size: 0.7em; margin: 0; padding: 10px; text-align: left; color: #666;"><strong>CÔNG TY TRÁCH NHIỆM HỮU HẠN DỊCH VỤ UM OneStopShop IT</strong> - Lựa chọn hàng đầu về giải pháp và thiết bị trong lĩnh vực công nghệ thông tin.
													
													<br />Khu đô thị Vinhomes Central Park, số 208 Nguyễn Hữu Cảnh, Phường 22, Q. Bình Thạnh, Tp.HCM.
												</p>
											</td>
											
											<td width="25%" style="vertical-align: text-top;">
												<p style="text-align: left; font-size: 0.7em; margin: 10px 6px 0 5px; padding: 0; color: #666;"><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/chinh-sach-doi-tra" target="_blank">Chính sách đổi trả</a>
													
													<br /><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/chinh-sach-bao-hanh" target="_blank">Chính sách bảo hành</a>
													
													<br /><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/bao-mat-thong-tin" target="_blank">Bảo mật thông tin</a>
													
													<br /><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/thong-tin-lien-he" target="_blank">Thông tin liên hệ</a>
												</p>
											</td>
											
											<td width="25%" style="vertical-align: text-top;">
												<p style="text-align: left; font-size: 0.7em; margin: 10px 5px 0 5px; padding: 0 10px 0 0; color: #666;"><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/huong-dan-mua-hang" target="_blank">Hướng dẫn mua hàng</a>
													
													<br /><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/huong-dan-thanh-toan" target="_blank">Hướng dẫn thanh toán</a>
													
													<br /><a style="color:#666; text-decoration: none;" href="https://onestopshop.vn/phuong-thuc-van-chuyen" target="_blank">Phương thức vận chuyển</a>
												</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							
							<tr>
								<td>
									<p class="notice" style="margin: 10px; padding: 0;  color: #666; font-size: 0.7em;"><strong>Lưu ý:</strong> Giá bán và các ưu đãi, quà tặng đi kèm sản phẩm có thể thay đổi bất cứ lúc nào mà không cần báo trước.</p>
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