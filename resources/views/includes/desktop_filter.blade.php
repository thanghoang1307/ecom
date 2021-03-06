@php
$brand_request = explode('_',app('request')->input('brand'));
$price_request = explode('_',app('request')->input('price'));
@endphp
<section id="product-category">
          <div class="category-header">
            <h4 class="category-label">Bộ lọc danh mục</h4>
          </div>
          <div class="category-body">
            @if ($brands)
            <h4 class="category-label">Thương hiệu</h4>
            <div class="category-option">
              @foreach ($brands as $brand)
              <div class="checkbox">
                <input id="brand-desktop-{{$brand->id}}" name="brand_checkbox" type="checkbox" value="{{$brand->id}}" {{in_array($brand->id,$brand_request) ? 'checked' : ''}}>
                <label for="brand-desktop-{{$brand->id}}" class="checkbox-label">
                  <img src="{{$brand->logo}}" height="20px">
                </label>
              </div>
              @endforeach
            </div>
            @endif
        
            <h4 class="category-label">Giá bán</h4>
            <div class="category-option">
              <div class="checkbox">
                <input id="price-desktop-1" name="price_checkbox" type="checkbox" value="0-5000000" {{in_array("0-5000000",$price_request) ? 'checked' : ''}}>
                <label for="price-desktop-1" class="checkbox-label">Dưới 5 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-desktop-2" name="price_checkbox" type="checkbox" value="5000000-7000000" {{in_array("5000000-7000000",$price_request) ? 'checked' : ''}}>
                <label for="price-desktop-2" class="checkbox-label">Từ 5 - 7 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-desktop-3" name="price_checkbox" type="checkbox" value="7000000-10000000" {{in_array("7000000-10000000",$price_request) ? 'checked' : ''}}>
                <label for="price-desktop-3" class="checkbox-label">Từ 7 - 10 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-desktop-4" name="price_checkbox" type="checkbox" value="10000000-1000000000000" {{in_array("10000000-1000000000000",$price_request) ? 'checked' : ''}}>
                <label for="price-desktop-4" class="checkbox-label">Trên 10 triệu</label>
              </div>
            </div>
          </div>
        </section>