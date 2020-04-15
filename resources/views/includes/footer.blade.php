<!--//=include includes/_hotline.html-->
<div class="hotline-wrapper">
	<div class="social-action"><a id="BackToTop" href="#">
		<img src="/assets/img/svg/hotline-up.svg">
		</img>
	</a></div>
</div>
<!--FOOTER-->
<footer id="Footer">
	<div class="container">
		<div class="footer-wrapper">
			<div class="d-block d-lg-none footer-top border-bottom-footer">
				<div class="row">
					<div class="col-12">
						<div class="footer-block">
							<h3 class="footer-block-title">CÁCH THỨC MUA HÀNG</h3>
							
							<ul class="footer-block-list">
								<li>Tổng đài hỗ trợ <a href="tel:0989-123-456" class="main-color">0837 000 247</a></li>
								<li><a href="{{url('/huong-dan-mua-hang')}}">Hướng dẫn mua hàng</a></li>
								<li><a href="{{url('/huong-dan-thanh-toan')}}">Hưỡng dẫn thanh toán</a></li>
								<li><a href="{{url('/phuong-thuc-van-chuyen')}}">Phương thức vận chuyển</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="d-block d-lg-none footer-top border-bottom-footer">
				<div class="row">
					<div class="col-12">
						<div class="footer-block footer-toggle"><a class="footer-block-title" data-toggle="collapse" href="#collapseExample" role="link" aria-expanded="false" aria-controls="collapseExample">
				                Các thông tin khác
				              </a>
							
							<div class="collapse" id="collapseExample">
								<ul class="footer-block-list">
									<li><a href="{{url('/chinh-sach-doi-tra')}}">Chính sách đổi trả</a></li>
									<li><a href="{{url('/chinh-sach-bao-hanh')}}">Chính sách bảo hành</a></li>
									<li><a href="{{url('/bao-mat-thong-tin')}}">Bảo mật thông tin</a></li>
									<li><a href="{{url('/thong-tin-lien-he')}}">Thông tin liên hệ</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="d-block d-lg-none footer-top border-bottom-footer">
				<div class="row">
					<div class="col-12">
						<div class="footer-block">
							<ul class="footer-block-social">
								<li>
									<h3 class="footer-block-title">Kết nối</h3>
								</li>
								<li><a rel ="nofollow" href="{{$settings->find('facebook')->value}}"><i class="icon icon-facebook-square"></i></a></li>
								<li><a rel ="nofollow" href="{{$settings->find('youtube')->value}}"><i class="icon icon-youtube"></i></a></li>
								<li><a rel ="nofollow" href="{{$settings->find('instagram')->value}}"><i class="icon icon-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="footer-top d-none d-lg-block">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-4">
								<div class="footer-block">
									<h3 class="footer-block-title">CHÍNH SÁCH</h3>
									
									<ul class="footer-block-list">
										<li><a href="{{url('/chinh-sach-doi-tra')}}">Chính sách đổi trả</a></li>
										<li><a href="{{url('/chinh-sach-bao-hanh')}}">Chính sách bảo hành</a></li>
										<li><a href="{{url('/bao-mat-thong-tin')}}">Bảo mật thông tin</a></li>
										<li><a href="{{url('/thong-tin-lien-he')}}">Thông tin liên hệ</a></li>
									</ul>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="footer-block">
									<h3 class="footer-block-title">HƯỚNG DẪN KHÁCH HÀNG</h3>
									
									<ul class="footer-block-list">
										<li><a href="{{url('/huong-dan-mua-hang')}}">Hướng dẫn mua hàng</a></li>
										<li><a href="{{url('/huong-dan-thanh-toan')}}">Hướng dẫn thanh toán</a></li>
										<li><a href="{{url('/phuong-thuc-van-chuyen')}}">Phương thức vận chuyển</a></li>
									</ul>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="footer-block d-none d-md-block">
									<h3 class="footer-block-title">HỖ TRỢ</h3>
									
									<ul class="footer-block-list">
										<li><a href="mailto:{{$settings->find('email')->value}}" target="_top">{{$settings->find('email')->value}}</a></li>
									</ul>
								</div>
								
								<div class="footer-block mt-4">
									<h3 class="footer-block-title">KẾT NỐI</h3>
									
									<ul class="footer-block-social">
										<li><a rel ="nofollow" href="{{$settings->find('facebook')->value}}"><i class="icon icon-facebook-square"></i></a></li>
										<li><a rel ="nofollow" href="{{$settings->find('youtube')->value}}"><i class="icon icon-youtube"></i></a></li>
										<li><a rel ="nofollow" href="{{$settings->find('instagram')->value}}"><i class="icon icon-instagram"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="footer-contact">
									<div class="footer-contact-top">
										<div class="row align-items-center">
											<div class="col-5">
												<div class="text-center">
													<img src="/assets/img/icon/contact.png" class="img-fluid" alt="">
												</div>
											</div>
											
											<div class="col-7">
												<div class="footer-contact-detail">
													<h3 class="footer-contact-detail-title">Tổng đài hỗ trợ</h3>
													
													<p>(8h00 - 22h00)</p>
												</div>
											</div>
										</div>
									</div>
									
									<div class="footer-contact-phone"><a href="tel:{{$settings->find('phone')->value}}" class="text-center">{{$settings->find('phone')->value}}</a></div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="footer-subscriber">
									<div class="footer-subscriber-detail">
										<h3 class="footer-subscriber-detail-title">Đăng ký
											<br>nhận bản tin
										</h3>
										
										<p class="footer-subscriber-detail-content">Đừng bỏ lỡ các thông tin sản phẩm
						                      và chương trình siêu hấp dẫn</p>
										
										<form action="{{route('front.subscribe')}}" method="POST" data-parsley-validate>
						                    @csrf
											<div class="row">
												<div class="col-9">
													<div class="form-group">
														<input type="email" class="form-control" placeholder="Email của bạn" aria-label="Email của bạn" id="subscriberEmail" name="email"
														data-parsley-type="email"
														data-parsley-type-message="Email chưa đúng định dạng"
														data-parsley-required-message="Hãy nhập Email"
														data-parsley-required='true'
														aria-describedby="subscriberEmail">
													</div>
												</div>
												
												<div class="col-3">
													<div class="input-group-prepend form-group">
														<button type="submit" class="btn-subscriber">gửi</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="footer-bottom">
				<div class="row">
					<div class="col-md-8 order-2 order-md-0">
						<div class="footer-bottom-detail">
							<h3 class="footer-bottom-detail-title">OneStopShop IT - Lựa chọn hàng đầu về giải pháp và thiết bị trong
				                lĩnh vực công nghệ thông tin</h3>
							
							<p class="footer-bottom-detail-content">Giấy chứng nhận ĐKDN số: 0313503636 do Sở KH &amp; ĐT TP.HCM cấp lần đầu ngày 23/10/2015.<br />Địa chỉ: Khu đô thị Vinhomes Central Park, số 208 Nguyễn Hữu Cảnh, Phường 22, Q. Bình Thạnh, TP.HCM.
							</p>
							
							<p class="footer-bottom-detail-content">Hotline <a href="tel:0837.000.247">0837.000.247</a> - Email <a href="mailto:cskh@onestopshop.vn">cskh@onestopshop.vn</a>. Copyright © <span id="currentyear">0</span> CÔNG TY TNHH DỊCH VỤ UM.</p>
						</div>
					</div>
					
					<div class="col-md-2 order-1 order-md-1">
						<div class="image-check"><a style="color: #999; text-decoration: none;" rel ="nofollow" href="https://comodosslstore.com" target="_blank">
							<img style="width: 50%; height: 50%;" src="/assets/img/trusted-site-seal.png" class="img-fluid"
							alt="Comodo Trusted Site Seal" style="border: 0px;">
							<br><span style="font-weight:bold; font-size:7pt; font-weight: normal; position: relative; top: -5px;">
							Secured By Comodo</span></a></div>
					</div>
					
					<div class="col-md-2 order-2 order-md-2">
						<div class="image-check">
							<img src="/assets/img/icon/checked.png" class="img-fluid" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!--END FOOTER-->
</body>
</html>

@if(Session::has('success'))

<div id="toast-container" class="toast-top-right">
	<div class="toast toast-success" aria-live="polite" style="">
		<div class="toast-message">{{session('success')}}</div>
	</div>
</div>
@elseif(Session::has('error'))

<div id="toast-container" class="toast-top-right">
	<div class="toast toast-error" aria-live="assertive" style="">
		<div class="toast-message">{{session('error')}}</div>
	</div>
</div>
@else
<div id="toast-container" class="toast-top-right" style="display: none;"></div>
@endif

<!-- Load Default JS -->        
<!--<script src="{{asset('bower_components/admin-lte/plugins/jquery/jquery.min.js')}}"></script>-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
<!--<script src="https://getbootstrap.com/docs/4.1//assets/js/vendor/popper.min.js"></script>-->
<!-- Site JS -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/jquery.bootstrap-autohidingnavbar.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/parsley.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/parallax.min.js"></script>
<script src="assets/js/jquery.nicescroll.min.js"></script>
<script src="assets/js/sticky-sidebar.min.js"></script>
<script src="assets/js/bootstrap-multiselect.min.js"></script>
<!--<script src="assets/js/main.js"></script>-->
<script>
$(function() {
	let myScript = document.createElement("script");
	myScript.src = "{{asset('assets/js/main.js')}}";
	document.body.appendChild(myScript);
})
</script>

<script>
$('#toast-container').delay(3000).fadeOut('fast');
$(document).ready(function() {
	var d = new Date();
	var n = d.getFullYear();
	document.getElementById("currentyear").innerHTML = n;
});
</script>
