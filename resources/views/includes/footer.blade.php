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
								<li><a rel="nofollow" href="{{$settings->find('facebook')->value}}"><i class="icon icon-facebook-square"></i></a></li>
								<li><a rel="nofollow" href="{{$settings->find('youtube')->value}}"><i class="icon icon-youtube"></i></a></li>
								<li><a rel="nofollow" href="{{$settings->find('instagram')->value}}"><i class="icon icon-instagram"></i></a></li>
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
										<li><a rel="nofollow" href="{{$settings->find('facebook')->value}}"><i class="icon icon-facebook-square"></i></a></li>
										<li><a rel="nofollow" href="{{$settings->find('youtube')->value}}"><i class="icon icon-youtube"></i></a></li>
										<li><a rel="nofollow" href="{{$settings->find('instagram')->value}}"><i class="icon icon-instagram"></i></a></li>
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
														<input type="email" class="form-control" placeholder="Email của bạn" aria-label="Email của bạn" id="subscriberEmail" name="email" data-parsley-type="email" data-parsley-type-message="Email chưa đúng định dạng" data-parsley-required-message="Hãy nhập Email" data-parsley-required='true' aria-describedby="subscriberEmail">
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
					<div class="col-md-8 order-1 order-md-0">
						<div class="footer-bottom-detail">
							<h3 class="footer-bottom-detail-title">OneStopShop IT - Lựa chọn hàng đầu về giải pháp và thiết bị trong
								lĩnh vực công nghệ thông tin</h3>

							<p class="footer-bottom-detail-content">Giấy chứng nhận ĐKDN số: 0313503636 do Sở KH &amp; ĐT TP.HCM cấp lần đầu ngày 23/10/2015.<br />Địa chỉ: Khu đô thị Vinhomes Central Park, số 208 Nguyễn Hữu Cảnh, Phường 22, Q. Bình Thạnh, TP.HCM.
							</p>

							<p class="footer-bottom-detail-content">Hotline <a href="tel:0837.000.247">0837.000.247</a> - Email <a href="mailto:cskh@onestopshop.vn">cskh@onestopshop.vn</a>. Copyright © <span id="currentyear">0</span> CÔNG TY TNHH DỊCH VỤ UM.</p>
						</div>
					</div>

					<div class="col-md-2 order-2 order-md-1 col-6">
						<div class="image-check" style="padding: 10px 0;">
							<!-- SSL -->
							<script language="JavaScript" type="text/javascript">
								TrustLogo("https://onestopshop.vn/assets/img/positivessl_trust_seal_md_167x42.png", "CL1", "none");
							</script>
						</div>
					</div>

					<div class="col-md-2 order-2 order-md-1 col-6">
						<div class="image-check">
							<a href="http://online.gov.vn/Home/WebDetails/65479" target="_blank" rel="nofollow"><img alt="" title="" src="/assets/img/logoSaleNoti.png" class="img-fluid" /></a>
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

<!-- Site JS -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/jquery.bootstrap-autohidingnavbar.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/js/parsley.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/parallax.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/js/sticky-sidebar.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-multiselect.min.js')}}"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<!--<script>
$(function() {
	let myScript = document.createElement("script");
	myScript.src = "{{asset('assets/js/main.js')}}";
	document.body.appendChild(myScript);
})
</script>-->

<script>
	// window.onpageshow = function(event) {
	// 	var url = window.location.href;
	// 	if (url.indexOf("/san-pham/") > 0) {
	// 		window.sessionStorage.setItem("product-page", url);
	// 	}
	// 	//force repload on mobile
	// 	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
	//     || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {

	// 		var sp = sessionStorage.getItem("product-page");
	// 		var cart = sessionStorage.getItem("cart-page");
	// 		//alert('c:'+cart+'-sp:'+sp);

	// 		if (url.indexOf("/san-pham/") > -1) {
	// 			if (cart != null && cart.length > 0) {
	// 				//alert('xoá cart trong trang product');
	// 				sessionStorage.removeItem("cart-page");
	// 				window.location.reload(true);
	// 			}
	// 		}
	// 		else {
	// 			if (sp != null && sp.length > 0) {
	// 				//alert('xoá product');
	// 				sessionStorage.removeItem("product-page");
	// 				//sessionStorage.removeItem("cart-page");
	// 				window.location.reload(true);
	// 			}
	// 			if (cart != null && cart.length > 0) {
	// 				//alert('xoá cart');
	// 				sessionStorage.removeItem("cart-page");
	// 				//sessionStorage.removeItem("cart-page");
	// 				window.location.reload(true);
	// 			}
	// 		}
	// 	}
	// 	else {
	// 		//force reload on desktop
	// 		if (event.persisted || window.location.hash != "undefined") {
	// 			if (window.performance.navigation.type == 2) {
	// 				window.location.reload(true);
	// 			}
	// 		}
	// 	}
	// };

	$('#toast-container').delay(3000).fadeOut('fast');
	// update quick cart info
	window.onpageshow = function() {
		setTimeout(function() {
			$('#cart').load(document.URL + " #cart>*");
		}, 100);
	}
	$(document).ready(function() {
		//show image when finish load
		$('img').removeClass("d-none");
		//show current Year
		var d = new Date();
		var n = d.getFullYear();
		document.getElementById("currentyear").innerHTML = n;
	});
</script>