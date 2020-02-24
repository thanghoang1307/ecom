@extends('layouts.front')
@section('content')
<main id="one-stop-product-list" class="main product-page">
  <div class="container">
    <section id="product-title">
      <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hệ điều hành</li>
          </ol>
        </nav>
      </div>
      <h1 class="page-heading">{{$cat->name}}</h1>
    </section>
    <div class="d-none d-lg-block">
      <section id="product-order">
        <h4 class="order-label">Sắp xếp theo</h4>
        <div class="order-option">
          <div class="radio">
            <input id="radio-1" name="orderby" type="radio" value="new" checked>
            <label for="radio-1" class="radio-label">Mới nhất</label>
          </div>
          <div class="radio">
            <input id="radio-2" name="orderby" type="radio" value="most_view">
            <label for="radio-2" class="radio-label">Xem nhiều nhất</label>
          </div>
          <div class="radio">
            <input id="radio-3" name="orderby" type="radio" value="price_asc">
            <label for="radio-3" class="radio-label">Giá thấp đến cao</label>
          </div>
          <div class="radio">
            <input id="radio-4" name="orderby" type="radio" value="price_desc">
            <label for="radio-4" class="radio-label">Giá cao xuống thấp</label>
          </div>
          <div class="radio">
            <input id="radio-5" name="orderby" type="radio" value="sale">
            <label for="radio-5" class="radio-label">Bán chạy nhất</label>
          </div>
        </div>
      </section>
    </div>

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
            <h4 class="screen-label">Thương hiệu</h4>
      
            <div class="screen-option">
              <div class="checkbox">
                <input id="os-1" name="checkbox" type="checkbox" checked>
                <label for="os-1" class="checkbox-label">
                  <img src="assets/img/product/os/microsoft.png" height="20px">
                </label>
              </div>
              <div class="checkbox">
                <input id="os-2" name="checkbox" type="checkbox">
                <label for="os-2" class="checkbox-label">
                  <img src="assets/img/product/os/mac.png" height="13px">
                </label>
              </div>
              <div class="checkbox">
                <input id="os-3" name="checkbox" type="checkbox">
                <label for="os-3" class="checkbox-label">
                  <img src="assets/img/product/os/linux.png" height="30px">
                </label>
              </div>
            </div>
      
            <h4 class="screen-label">Giá bán</h4>
      
            <div class="screen-option">
              <div class="checkbox">
                <input id="price-1" name="checkbox" type="checkbox" checked>
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

    <div class="row">
      <div class="col-lg-3 d-none d-lg-block">
        <section id="product-category">
          <div class="category-header">
            <h4 class="category-label">Bộ lọc danh mục</h4>
          </div>
          <div class="category-body">
            <h4 class="category-label">Thương hiệu</h4>
            <div class="category-option">
              <div class="checkbox">
                <input id="os-1" name="checkbox" type="checkbox" checked>
                <label for="os-1" class="checkbox-label">
                  <img src="assets/img/product/os/microsoft.png" height="20px">
                </label>
              </div>
              <div class="checkbox">
                <input id="os-2" name="checkbox" type="checkbox">
                <label for="os-2" class="checkbox-label">
                  <img src="assets/img/product/os/mac.png" height="13px">
                </label>
              </div>
              <div class="checkbox">
                <input id="os-3" name="checkbox" type="checkbox">
                <label for="os-3" class="checkbox-label">
                  <img src="assets/img/product/os/linux.png" height="30px">
                </label>
              </div>
            </div>
        
            <h4 class="category-label">Giá bán</h4>
            <div class="category-option">
              <div class="checkbox">
                <input id="price-1" name="checkbox" type="checkbox" checked>
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
        </section>
      </div>
      <div class="col-lg-9">
        <section id="product-list">
          <div class="product-list-wrapper">
            <div class="row">
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <h5 class="percentage-discount">30%</h5>
                        <h6 class="original-price">4,290,000<sup>đ</sup></h6>
                      </div>
                    </div>
                  </a>
                  <div class="product-hover">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
        
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <!--<h5 class="percentage-discount">30%</h5>-->
                        <!--<h6 class="original-price">4,290,000<sup>đ</sup></h6>-->
                      </div>
                    </div>
                  </a>
                  <div class="product-hover no-discount">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
        
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <!--<h5 class="percentage-discount">30%</h5>-->
                        <!--<h6 class="original-price">4,290,000<sup>đ</sup></h6>-->
                      </div>
                    </div>
                  </a>
                  <div class="product-hover no-discount">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
        
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <!--<h5 class="percentage-discount">30%</h5>-->
                        <!--<h6 class="original-price">4,290,000<sup>đ</sup></h6>-->
                      </div>
                    </div>
                  </a>
                  <div class="product-hover no-discount">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
        
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <!--<h5 class="percentage-discount">30%</h5>-->
                        <!--<h6 class="original-price">4,290,000<sup>đ</sup></h6>-->
                      </div>
                    </div>
                  </a>
                  <div class="product-hover no-discount">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
        
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <h5 class="percentage-discount">30%</h5>
                        <h6 class="original-price">4,290,000<sup>đ</sup></h6>
                      </div>
                    </div>
                  </a>
                  <div class="product-hover">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
        
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <h5 class="percentage-discount">30%</h5>
                        <h6 class="original-price">4,290,000<sup>đ</sup></h6>
                      </div>
                    </div>
                  </a>
                  <div class="product-hover">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
        
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <!--<h5 class="percentage-discount">30%</h5>-->
                        <!--<h6 class="original-price">4,290,000<sup>đ</sup></h6>-->
                      </div>
                    </div>
                  </a>
                  <div class="product-hover no-discount">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
        
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <!--<h5 class="percentage-discount">30%</h5>-->
                        <!--<h6 class="original-price">4,290,000<sup>đ</sup></h6>-->
                      </div>
                    </div>
                  </a>
                  <div class="product-hover no-discount">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
        
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <!--<h5 class="percentage-discount">30%</h5>-->
                        <!--<h6 class="original-price">4,290,000<sup>đ</sup></h6>-->
                      </div>
                    </div>
                  </a>
                  <div class="product-hover no-discount">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
        
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <!--<h5 class="percentage-discount">30%</h5>-->
                        <!--<h6 class="original-price">4,290,000<sup>đ</sup></h6>-->
                      </div>
                    </div>
                  </a>
                  <div class="product-hover no-discount">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
        
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="product-detail.html">
                    <div class="product-image">
                      <figure>
                        <img src="assets/img/product/item/1.jpg">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">Phần mềm bản quyền Microsoft Windows 10 Home 32/64 bit Eng Intl USB RS (HAJ-00055) - Hàng Chính Hãng</h3>
                      <h4 class="product-price">3,290,000<sup>đ</sup></h4>
                      <div class="product-discount">
                        <h5 class="percentage-discount">30%</h5>
                        <h6 class="original-price">4,290,000<sup>đ</sup></h6>
                      </div>
                    </div>
                  </a>
                  <div class="product-hover">
                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <div class="page-pagination">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#"><i class="icon icon-chevron-left"></i></a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">9</a></li>
              <li class="page-item"><a class="page-link" href="#"><i class="icon icon-chevron-right"></i></a></li>
            </ul>
          </div>
        </section>
        
      </div>
    </div>
  </div>

  <div class="page-gap"></div>

  @render(\App\ViewComponents\RecentlyViewProductComponent::class)
  

  <div class="page-gap"></div>

  <section id="news-technology-list" class="position-relative">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="page-title">Tin tức & Công nghệ</h2>
  
          <a href="news-list.html" class="view-all">Xem tất cả</a>
        </div>
      </div>
  	
  	<div class="news-wrapper owl-carousel owl-theme">
  		<div class="item">
  		  <div class="news-item">
  		    <a href="news-detail.html">
  		      <div class="news-image">
  		        <div style="background-image: url('assets/img/news/1.jpg')"></div>
  		      </div>
  		      <div class="news-text">
  		        <h3 class="news-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed..</h3>
  		        <h4 class="news-datetime">Đăng ngày 22/10/2019 09:30</h4>
  		      </div>
  		    </a>
  		  </div>
  		</div>
  		<div class="item">
  		  <div class="news-item">
  		    <a href="news-detail.html">
  		      <div class="news-image">
  		        <div style="background-image: url('assets/img/news/2.jpg')"></div>
  		      </div>
  		      <div class="news-text">
  		        <h3 class="news-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed..</h3>
  		        <h4 class="news-datetime">Đăng ngày 22/10/2019 09:30</h4>
  		      </div>
  		    </a>
  		  </div>
  		</div>
  		<div class="item">
  		  <div class="news-item">
  		    <a href="news-detail.html">
  		      <div class="news-image">
  		        <div style="background-image: url('assets/img/news/3.jpg')"></div>
  		      </div>
  		      <div class="news-text">
  		        <h3 class="news-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed..</h3>
  		        <h4 class="news-datetime">Đăng ngày 22/10/2019 09:30</h4>
  		      </div>
  		    </a>
  		  </div>
  		</div>
  		<div class="item">
  		  <div class="news-item">
  		    <a href="news-detail.html">
  		      <div class="news-image">
  		        <div style="background-image: url('assets/img/news/4.jpg')"></div>
  		      </div>
  		      <div class="news-text">
  		        <h3 class="news-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed..</h3>
  		        <h4 class="news-datetime">Đăng ngày 22/10/2019 09:30</h4>
  		      </div>
  		    </a>
  		  </div>
  		</div>
  		<div class="item">
  		  <div class="news-item">
  		    <a href="news-detail.html">
  		      <div class="news-image">
  		        <div style="background-image: url('assets/img/news/5.jpg')"></div>
  		      </div>
  		      <div class="news-text">
  		        <h3 class="news-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed..</h3>
  		        <h4 class="news-datetime">Đăng ngày 22/10/2019 09:30</h4>
  		      </div>
  		    </a>
  		  </div>
  		</div>
  	</div>
  	
      <!--<div class="row">
        <div class="col-6 col-sm-3">
          <div class="news-item">
            <a href="news-detail.html">
              <div class="news-image">
                <div style="background-image: url('assets/img/news/1.jpg')"></div>
              </div>
              <div class="news-text">
                <h3 class="news-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed..</h3>
                <h4 class="news-datetime">Đăng ngày 22/10/2019 09:30</h4>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-sm-3">
          <div class="news-item">
            <a href="news-detail.html">
              <div class="news-image">
                <div style="background-image: url('assets/img/news/2.jpg')"></div>
              </div>
              <div class="news-text">
                <h3 class="news-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed..</h3>
                <h4 class="news-datetime">Đăng ngày 22/10/2019 09:30</h4>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-sm-3">
          <div class="news-item">
            <a href="news-detail.html">
              <div class="news-image">
                <div style="background-image: url('assets/img/news/3.jpg')"></div>
              </div>
              <div class="news-text">
                <h3 class="news-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed..</h3>
                <h4 class="news-datetime">Đăng ngày 22/10/2019 09:30</h4>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-sm-3">
          <div class="news-item">
            <a href="news-detail.html">
              <div class="news-image">
                <div style="background-image: url('assets/img/news/4.jpg')"></div>
              </div>
              <div class="news-text">
                <h3 class="news-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed..</h3>
                <h4 class="news-datetime">Đăng ngày 22/10/2019 09:30</h4>
              </div>
            </a>
          </div>
        </div>
      </div>-->
    </div>
  </section>
  @endsection