@php
$orderby = app('request')->input('orderby');
@endphp
<!-- Desktop -->
    <div class="d-none d-lg-block">
      <section id="product-order">
        <h4 class="order-label">Sắp xếp theo</h4>
        <div class="order-option">
          <div class="radio">
            <input id="radio-order-desktop-1" name="d_orderby" type="radio" value="created_at-desc" {{$orderby == "" || $orderby == "created_at-desc" ? "checked" : ""}}>
            <label for="radio-order-desktop-1" class="radio-label">Mới nhất</label>
          </div>
          <div class="radio">
            <input id="radio-order-desktop-2" name="d_orderby" type="radio" value="view-desc" {{$orderby == "view-desc" ? "checked" : ""}}>
            <label for="radio-order-desktop-2" class="radio-label">Xem nhiều nhất</label>
          </div>
          <div class="radio">
            <input id="radio-order-desktop-3" name="d_orderby" type="radio" value="price-asc" {{$orderby == "price-asc" ? "checked" : ""}}>
            <label for="radio-order-desktop-3" class="radio-label">Giá thấp đến cao</label>
          </div>
          <div class="radio">
            <input id="radio-order-desktop-4" name="d_orderby" type="radio" value="price-desc" {{$orderby == "price-desc" ? "checked" : ""}}>
            <label for="radio-order-desktop-4" class="radio-label">Giá cao xuống thấp</label>
          </div>
          <div class="radio">
            <input id="radio-order-desktop-5" name="d_orderby" type="radio" value="sale-desc" {{$orderby == "sale-desc" ? "checked" : ""}}>
            <label for="radio-order-desktop-5" class="radio-label">Bán chạy nhất</label>
          </div>
        </div>
      </section>
    </div>