@php
$orderby = app('request')->input('orderby');
$brand_request = explode('_',app('request')->input('brand'));
$price_request = explode('_',app('request')->input('price'));
@endphp
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
		<div class="hidden-bg back-to-screen" role="button">&nbsp;</div>
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
                <input id="brand-mobile-{{$brand->id}}" name="mb_checkbox" type="checkbox" value="{{$brand->id}}" {{in_array($brand->id,$brand_request) ? 'checked' : ''}}>
                <label for="brand-mobile-{{$brand->id}}" class="checkbox-label">
                  <img src="{{$brand->logo}}" height="20px">
                </label>
              </div>
              @endforeach
            </div>
            @endif
      
            <h4 class="screen-label">Giá bán</h4>
      
            <div class="screen-option">
              <div class="checkbox">
                <input id="price-mobile-1" name="mp_checkbox" type="checkbox" value="0-5000000" {{in_array("0-5000000",$price_request) ? 'checked' : ''}}>
                <label for="price-mobile-1" class="checkbox-label">Dưới 5 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-mobile-2" name="mp_checkbox" type="checkbox" value="5000000-7000000" {{in_array("5000000-7000000",$price_request) ? 'checked' : ''}}>
                <label for="price-mobile-2" class="checkbox-label">Từ 5 - 7 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-mobile-3" name="mp_checkbox" type="checkbox" value="7000000-10000000" {{in_array("7000000-10000000",$price_request) ? 'checked' : ''}}>
                <label for="price-mobile-3" class="checkbox-label">Từ 7 - 10 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-mobile-4" name="mp_checkbox" type="checkbox" value="10000000-1000000000000" {{in_array("10000000-1000000000000",$price_request) ? 'checked' : ''}}>
                <label for="price-mobile-4" class="checkbox-label">Trên 10 triệu</label>
              </div>
            </div>
          </div>
          <div class="screen-action">
            <div class="cart-item">
              <div class="row no-gutters align-items-center align-content-center">
                <div class="col-6">
                  <button type="button" class="btn-submit is-white clear-filter">
                    Xóa sắp xếp
                  </button>
                </div>
                <div class="col-6">
                  <button type="button" class="btn-submit d-block d-md-none apply-filter">
                    Áp dụng
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section id="sort-screen">
		<div class="hidden-bg back-to-screen" role="button">&nbsp;</div>
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
                <input id="radio-1" name="m_orderby" type="radio" value="created_at-desc" checked={{$orderby == "" || $orderby == "created_at-desc" ? "checked" : ""}}>
                <label for="radio-1" class="radio-label">Mới nhất</label>
              </div>
              <div class="radio">
                <input id="radio-2" name="m_orderby" type="radio" value="view-desc" checked={{$orderby == "view-desc" ? "checked" : ""}}>
                <label for="radio-2" class="radio-label">Xem nhiều nhất</label>
              </div>
              <div class="radio">
                <input id="radio-3" name="m_orderby" type="radio" value="price-asc" checked={{$orderby == "price-asc" ? "checked" : ""}}>
                <label for="radio-3" class="radio-label">Giá thấp đến cao</label>
              </div>
              <div class="radio">
                <input id="radio-4" name="m_orderby" type="radio" value="price-desc" checked={{$orderby == "price-desc" ? "checked" : ""}}>
                <label for="radio-4" class="radio-label">Giá cao xuống thấp</label>
              </div>
              <div class="radio">
                <input id="radio-5" name="m_orderby" type="radio" value="sale-desc" checked={{$orderby == "sale-desc" ? "checked" : ""}}>
                <label for="radio-5" class="radio-label">Bán chạy nhất</label>
              </div>
            </div>
          </div>
          <div class="screen-action">
            <div class="cart-item">
              <div class="row no-gutters align-items-center align-content-center">
                <div class="col-6">
                  <button type="button" class="btn-submit is-white clear-filter">
                    Xóa sắp xếp
                  </button>
                </div>
                <div class="col-6">
                  <button type="button" class="btn-submit d-block d-md-none apply-filter">
                    Áp dụng
                  </button>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </section>   
    </div>