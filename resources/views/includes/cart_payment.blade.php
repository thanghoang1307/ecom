@if(session()->get('cart.items'))
<div class="col-md-6">
	<section class="cart-process">
		<div class="process-list d-none d-md-block">
			<ul class="process-list-wrapper">
				<li><a class="active"><span class="d-none d-sm-block">Thông tin đặt hàng</span></a></li>
				<li><a class="active"><span>Thanh toán</span></a></li>
				<li><a =><span class="d-none d-sm-block">Hoàn tất đơn hàng</span></a></li>
			</ul>
		</div>
		
		<form action="{{route('front.check_out_3',$order_number)}}" method="POST" data-parsley-validate>
	          @csrf
			<div class="process-info">
				<h2 class="process-info-title">Hình thức nhận hàng</h2>
				
				<div class="process-profile">
					<div class="row no-gutters">
						<div class="col-12">
							<div class="process-profile-detail">
								<div class="process-profile-block-head">
									<div class="row">
										<div class="col-md-6">
											<div class="radio">
												<!--<input id="radio-1" name="radio" type="radio" value="0" checked>-->
												<input id="radio-1" name="payment_type" type="radio" value="0" checked='{{(old('payment_type') == 0 || !old('payment_type')) ? "checked" : "" }}'>
												
												<label for="radio-1" class="radio-label">Thanh toán khi nhận hàng (C.O.D)</label>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="radio">
												<!--<input id="radio-2" name="radio" type="radio" value="1" checked>-->
												<input id="radio-2" name="payment_type" value="1" type="radio" checked='{{old('payment_type') == 1 ? "checked" : "" }}'>
												
												<label for="radio-2" class="radio-label">Chuyển khoản</label>
											</div>
										</div>
									</div>
								</div>
								
								<div class="process-profile-block-body">
									<div class="process-tab process-note active">
										<h3 class="process-note-title">Giao hàng tiêu chuẩn</h3>
										
										<p class="process-note-detail">Thời gian giao hàng trung bình dự kiện từ 3 - 5 ngày làm việc</p>
									</div>
									
									<div class="process-tab process-account">
										<div class="row">
											<div class="col-md-12">
												<p>Vui lòng ghi<strong class="important"> đầy đủ và chính xác</strong> để đảm bảo giao dịch thành công:</p>
												
												<p class="transfer-note">Thanh toán cho đơn hàng số<strong class="order-code"> #{{$order_number}}</strong>, OneStopShop</p>
											</div>
										</div>
										
										<div class="page-gap"></div>
										
										<div class="row">
											<div class="col-md-12">
												<div class="process-account-detail">
													<p class="process-account-detail-title">Và gửi về tài khoản:</p>
													
													<p class="process-account-detail-detail">Số tài khoản: <strong class="bank-acc">206259009</strong></p>
													
													<p class="process-account-detail-detail">Tên công ty: <strong>CÔNG TY TNHH DỊCH VỤ UM</strong></p>
													
													<p class="process-account-detail-detail"><strong>Ngân hàng Thương Mại Cổ Phần Á Châu (ACB), Chi nhánh Bình Thạnh -Tp.HCM</strong></p>
													
													<hr class="d-block d-md-none">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="process-profile">
					<div class="row no-gutters">
						<div class="col-12">
							<div class="process-profile-detail">
								<div class="process-profile-block-head">
									<div class="row">
										<div class="col-12">
											<div class="checkbox">
												<input id="check-1" name="is_vat" type="checkbox" checked='{{old('is_vat') ? "checked" : ""}}'>
												
												<label for="check-1" class="checkbox-label">Yêu cầu xuất hóa đơn GTGT cho đơn hàng
						                              này</label>
											</div>
										</div>
									</div>
								</div>
								
								<div class="process-profile-block-sub">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" name="name" id="inputCompany" aria-describedby="inputCompany"
				                                   placeholder="Tên công ty" value="{{old('name')}}">
												   @error('name')
												
												<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<input type="number" class="form-control" id="inputMST" aria-describedby="inputMST" name="mst"
				                                   placeholder="Mã số thuế" value="{{old('mst')}}">
												   @error('mst')
												
												<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group">
												<input type="text" class="form-control" id="inputAddress" aria-describedby="inputAddress"
				                                   placeholder="Số nhà, tên đường" name="address" value="{{old('address')}}">
				                                   @error('address')
												
												<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group">
												<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"
			                                      placeholder="Lời nhắn cho OneStopShop.vn">{{old('note')}}</textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="process-info action">
				<div class="row">
					<div class="col-6">
						<div class="text-left">
			                  <!--<button type="button" onclick="history.go(-1);" class="btn-submit form-back">Trở về <i class="icon icon-arrow-left"></i></button>-->
							  <a href="{{route('front.check_out_1')}}" class="btn-submit form-back">Trở về <i class="icon icon-arrow-left"></i></a></div>
					</div>
					
					<div class="col-6">
						<div class="text-right">
							<button type="submit" class="btn-submit form-checkout">Tiếp theo <i class="icon icon-arrow-right"></i></button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
@endif