<main id="one-stop-profile" class="main profile-page">
  <div class="container">
    <section id="profile-title">
      <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
          </ol>
        </nav>
      </div>
    </section>
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-3">
        <section id="profile-welcome">
          <div class="user-wrapper">
            <div>
              <div class="user-avatar" style="background-image: url('/assets/img/profile/avatar.png')"></div>
            </div>
            <div>
              <div class="user-greeting">
                <p>Xin chào,</p>
                <h4 class="user-name">{{auth('customer')->user()->name}}</h4>
        		<a class="logout" href="{{route('front.customer.logout')}}">Đăng xuất</a>
              </div>
        	  <div></div>
            </div>
          </div>
        </section>

        <section id="profile-info-management">
          <div class="info-management-header">
            <h4 class="info-management-label">
              <i class="icon icon-user-square"></i>
              <span>Quản lý thông tin</span>
            </h4>
          </div>
          <div class="info-management-body">
            <ul class="info-management-list">
              <li>
                <a href="{{route('front.account.index')}}" <?php echo $check == 'thong-tin' ? 'class="active"' : '';?>>Thông tin tài khoản</a>
              </li>
              <li>
                <a href="{{route('front.account.address')}}" <?php echo $check == 'address' ? 'class="active"' : '';?>>Địa chỉ của bạn</a>
              </li>
              <li>
                <a href="{{route('front.account.edit_password')}}" <?php echo $check == 'password' ? 'class="active"' : '';?>>Đổi mật khẩu</a>
              </li>
            </ul>
          </div>
        </section>
        <section id="profile-order-history">
          <a href="{{route('front.account.order_history')}}">
            <h4 class="order-history-label">
              <i class="icon icon-file"></i>
              <span>Lịch sử đơn hàng</span>
            </h4>
          </a>
        </section>
      </div>
      <div class="col-xs-12 col-sm-8 col-md-9">
        <section id="profile-dashboard">
          <div class="dashboard-header">
            <div class="dashboard-greeting">
              <p>Cảm ơn bạn đã gia nhập gia đình OneStopShop.vn.</p>
              <p>Bạn sẽ được hưởng quyền lợi giá cả, quà tặng, các dịch vụ đi kèm và nhiều hơn nữa.</p>
              <p>Bắt đầu trải nghiệm nào!</p>
            </div>
          </div>