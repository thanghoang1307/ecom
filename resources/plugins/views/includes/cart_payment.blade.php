<div class="col-md-6">
      <section class="cart-process">
        <div class="process-list">
          <ul class="process-list-wrapper">
            <li><a href="#" class="active"><span class="d-none d-sm-block">Thông tin đặt hàng</span></a></li>
            <li><a href="#" class="active"><span>Thanh toán</span></a></li>
            <li><a href="#"><span class="d-none d-sm-block">Hoàn tất đơn hàng</span></a></li>
          </ul>
        </div>
        <form action="{{route('front.check_out_3')}}" method="POST">
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
                            <input id="radio-1" name="payment_type" type="radio" value="0" checked>
                            <label for="radio-1" class="radio-label">Thanh toán khi nhận hàng (C.O.D)</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="radio">
                            <input id="radio-2" name="payment_type" value="1" type="radio">
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
					  	<div class="row">Vui lòng chuyển khoản với nội dung, thanh toán cho đơn hàng số xxxx...</div>
					  	<div class="page-gap"></div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="process-account-detail">
                              <p class="process-account-detail-detail">Ngân hàng Argibank</p>
                              <h3 class="process-account-detail-title">0313123456789</h3>
                              <p class="process-account-detail-detail">Đỗ Nam Trung</p>
                              <hr class="d-block d-md-none">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="process-account-detail">
                              <p class="process-account-detail-detail">Ngân hàng Argibank</p>
                              <h3 class="process-account-detail-title">0313123456789</h3>
                              <p class="process-account-detail-detail">Đỗ Nam Trung</p>
                              <hr class="d-block d-md-none">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="process-account-detail">
                              <p class="process-account-detail-detail">Ngân hàng Argibank</p>
                              <h3 class="process-account-detail-title">0313123456789</h3>
                              <p class="process-account-detail-detail">Đỗ Nam Trung</p>
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
                            <input id="check-1" name="is_vat" type="checkbox" checked>
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
                                   placeholder="Tên công ty">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" class="form-control" id="inputMST" aria-describedby="inputMST" name="mst"
                                   placeholder="Mã số thuế">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <input type="text" class="form-control" id="inputAddress" aria-describedby="inputName"
                                   placeholder="Số nhà, tên đường" name="address">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"
                                      placeholder="Lời nhắn cho OneStopShop.vn"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="process-info">
            <div class="row">
              <div class="col-6">
                <div class="text-left">
                  <button class="btn-submit form-back">Trở về <i class="icon icon-arrow-left"></i></button>
                </div>
              </div>
              <div class="col-6">
                <div class="text-right">
                  <button class="btn-submit form-checkout">Tiếp theo <i class="icon icon-arrow-right"></i></button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </section>
    </div>