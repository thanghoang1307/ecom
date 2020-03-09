 <div class="d-block d-lg-none">
      <section id="product-filter">
        <div>
          <a id="filtered-by" class="filter-button">
            Lọc theo
            <i class="icon icon-caret-down"></i>
          </a>
        </div>
        <div>
          <a id="sorted-by" class="filter-button">
            Sắp xếp theo
            <i class="icon icon-caret-down"></i>
          </a>
        </div>
      </section>  
      <section id="filter-screen">
        <div class="filter-screen-wrapper">
          <div class="screen-header">
            <a class="back-to-screen">
              <i class="icon icon-arrow-left"></i>
            </a>
            Lọc theo
          </div>
          <div class="screen-body">
            @if ($brands)
            <h4 class="screen-label">Thương hiệu</h4>
      
            <div class="screen-option">
            @foreach ($brands as $brand)
              <div class="checkbox">
                <input id="os-1" name="checkbox" type="checkbox">
                <label for="os-1" class="checkbox-label">
                  <img src="{{$brand->logo}}" height="20px">
                </label>
              </div>
              @endforeach
            </div>
            @endif
      
            <h4 class="screen-label">Giá bán</h4>
      
            <div class="screen-option">
              <div class="checkbox">
                <input id="price-1" name="checkbox" type="checkbox">
                <label for="price-1" class="checkbox-label">Dưới 5 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-2" name="checkbox" type="checkbox">
                <label for="price-2" class="checkbox-label">Từ 5 - 7 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-3" name="checkbox" type="checkbox">
                <label for="price-3" class="checkbox-label">Từ 7 - 10 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-4" name="checkbox" type="checkbox">
                <label for="price-4" class="checkbox-label">Trên 10 triệu</label>
              </div>
            </div>
          </div>
          <div class="screen-action">
            <div class="cart-item">
              <div class="row no-gutters align-items-center align-content-center">
                <div class="col-6">
                  <a href="#" class="btn-submit is-white">
                    Xóa sắp xếp
                  </a>
                </div>
                <div class="col-6">
                  <a href="#" class="btn-submit d-block d-md-none">
                    Áp dụng
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section id="sort-screen">
        <div class="sort-screen-wrapper">
          <div class="screen-header">
            <a class="back-to-screen">
              <i class="icon icon-arrow-left"></i>
            </a>
            Sắp xếp theo
          </div>
          <div class="screen-body">
            <div class="screen-option">
              <div class="radio">
                <input id="radio-1" name="radio" type="radio" checked>
                <label for="radio-1" class="radio-label">Mới nhất</label>
              </div>
              <div class="radio">
                <input id="radio-2" name="radio" type="radio">
                <label for="radio-2" class="radio-label">Xem nhiều nhất</label>
              </div>
              <div class="radio">
                <input id="radio-3" name="radio" type="radio">
                <label for="radio-3" class="radio-label">Giá thấp đến cao</label>
              </div>
              <div class="radio">
                <input id="radio-4" name="radio" type="radio">
                <label for="radio-4" class="radio-label">Giá cao xuống thấp</label>
              </div>
              <div class="radio">
                <input id="radio-5" name="radio" type="radio">
                <label for="radio-5" class="radio-label">Bán chạy nhất</label>
              </div>
            </div>
          </div>
          <div class="screen-action">
            <div class="cart-item">
              <div class="row no-gutters align-items-center align-content-center">
                <div class="col-6">
                  <a href="#" class="btn-submit is-white">
                    Xóa sắp xếp
                  </a>
                </div>
                <div class="col-6">
                  <a href="#" class="btn-submit d-block d-md-none">
                    Áp dụng
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>   
    </div>