<!--//=include includes/_hotline.html-->
<div class="hotline-wrapper">
  <div class="social-action">
    <a id="BackToTop" href="#"><img src="/assets/img/svg/hotline-up.svg"></img></a>
  </div>
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
                <li><a href="#">Hướng dẫn mua hàng</a></li>
                <li><a href="#">Hưỡng dẫn thanh toán</a></li>
                <li><a href="#">Phương thức vận chuyển</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="d-block d-lg-none footer-top border-bottom-footer">
        <div class="row">
          <div class="col-12">
            <div class="footer-block footer-toggle">
              <a class="footer-block-title" data-toggle="collapse" href="#collapseExample" role="link" aria-expanded="false" aria-controls="collapseExample">
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
				<li><h3 class="footer-block-title">Kết nối</h3></li>
			    <li><a href="{{$settings->find('facebook')->value}}"><i class="icon icon-facebook-square"></i></a></li>
			    <li><a href="{{$settings->find('youtube')->value}}"><i class="icon icon-youtube"></i></a></li>
			    <li><a href="{{$settings->find('instagram')->value}}"><i class="icon icon-instagram"></i></a></li>
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
                    <li><a href="{{$settings->find('facebook')->value}}"><i class="icon icon-facebook-square"></i></a></li>
                    <li><a href="{{$settings->find('youtube')->value}}"><i class="icon icon-youtube"></i></a></li>
                    <li><a href="{{$settings->find('instagram')->value}}"><i class="icon icon-instagram"></i></a></li>
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
                          <h3 class="footer-contact-detail-title">
                            Tổng đài hỗ trợ
                          </h3>
                          <p>(8h00 - 22h00)</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="footer-contact-phone">
                    <a href="tel:{{$settings->find('phone')->value}}" class="text-center">{{$settings->find('phone')->value}}</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="footer-subscriber">
                  <div class="footer-subscriber-detail">
                    <h3 class="footer-subscriber-detail-title">
                      Đăng ký <br> nhận bản tin
                    </h3>
                    <p class="footer-subscriber-detail-content">Đừng bỏ lỡ các thông tin sản phẩm
                      và chương trình siêu hấp dẫn</p>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Email của bạn"
                             aria-label="Email của bạn">
                      <div class="input-group-prepend">
                        <a class="btn-subscriber">Đăng ký</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="row">
          <div class="col-md-10 order-1 order-md-0">
            <div class="footer-bottom-detail">
              <h3 class="footer-bottom-detail-title">Công ty TNHH Dịch Vụ UM - </h3>
              <p class="footer-bottom-detail-content">OneStopShop IT - Lựa chọn hàng đầu về giải pháp và thiết bị trong
                lĩnh vực công nghệ thông tin</p>
              <p class="footer-bottom-detail-content">Số giấy chứng nhận ĐKDN: ???. Đăng ký lần đầu: ???. Cơ quan
                cấp:???, Sở kế hoạch và đầu tư thành phố Hồ Chí Minh.</p>
            </div>
          </div>
          <div class="col-md-2 order-0 order-md-1">
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