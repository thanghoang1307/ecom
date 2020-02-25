<section id="product-category">
          <div class="category-header">
            <h4 class="category-label">Bộ lọc danh mục</h4>
          </div>
          <div class="category-body">
            <h4 class="category-label">Thương hiệu</h4>
            <div class="category-option">
              @foreach ($brands as $brand)
              <div class="checkbox">
                <input id="os-1" name="brand_checkbox" type="checkbox" value="{{$brand->id}}">
                <label for="os-1" class="checkbox-label">
                  <img src="{{$brand->logo}}" height="20px">
                </label>
              </div>
              @endforeach
            </div>
        
            <h4 class="category-label">Giá bán</h4>
            <div class="category-option">
              <div class="checkbox">
                <input id="price-1" name="price_checkbox" type="checkbox" value="0-5000000">
                <label for="price-1" class="checkbox-label">Dưới 5 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-2" name="price_checkbox" type="checkbox" value="5000000-7000000" >
                <label for="price-2" class="checkbox-label">Từ 5 - 7 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-3" name="price_checkbox" type="checkbox" value="7000000-10000000">
                <label for="price-3" class="checkbox-label">Từ 7 - 10 triệu</label>
              </div>
              <div class="checkbox">
                <input id="price-4" name="price_checkbox" type="checkbox" value="10000000-1000000000000">
                <label for="price-4" class="checkbox-label">Trên 10 triệu</label>
              </div>
            </div>
          </div>
        </section>