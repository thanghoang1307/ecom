$(document).ready(function () {
  $('input[type="radio"]').click(function () {
    if ($(this).attr("value") === "0") {
      $(".process-tab").removeClass('active');
      $(".process-note").addClass('active');
    }
    if ($(this).attr("value") === "1") {
      $(".process-tab").removeClass('active');
      $(".process-account").addClass('active');
    }
  });

  $('.category-option.checkbox').on('click', function () {
    $(this).find('input').attr("checked", !$(this).find('input').attr('checked'));
//	alert('aa');
  });
  //for mobile
  $('.screen-option.checkbox').on('click', function () {
    $(this).find('input').attr("checked", !$(this).find('input').attr('checked'));
//	alert('aa');
  });

  $('.order-option .radio').on('click', function () {
    $('.order-option .radio').find('input').removeAttr("checked");
    $(this).find('input').attr("checked", !$(this).find('input').attr('checked'));
  });

  //for mobile
  $('.screen-option .radio').on('click', function () {
    $('.screen-option .radio').find('input').removeAttr("checked");
    $(this).find('input').attr("checked", !$(this).find('input').attr('checked'));
  });

  $('.form-group .radio').on('click', function () {
    $('.form-group .radio').find('input').removeAttr("checked");
    $(this).find('input').attr("checked", !$(this).find('input').attr('checked'));
  });

  $('.process-profile-detail .radio').on('click', function () {
    $('.process-profile-detail .radio').find('input').removeAttr("checked");
    $(this).find('input').attr("checked", !$(this).find('input').attr('checked'));
  });


  $(".open-social-login").click(function () {  // opening on same line K&R style
    $('#loginModal').modal('hide');
    setTimeout(function () {
      $('#socialLoginModal').modal('show');
    }, 500);
  });

  $(".open-forget-pass").click(function () {  // opening on same line K&R style
    $('#loginModal').modal('hide');
    setTimeout(function () {
      $('#forgetPassModal').modal('show');
    }, 500);
  });

  $('.toggle-category').on('click', function (e) {
    e.stopPropagation();
    e.preventDefault();
    $('.header-category').toggleClass('active');
  });

  $('.big-banner').slick({
    dots: true,
    infinite: true,
    autoplay: true,
    arrows: false,
    autoplaySpeed: 10000,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    slidesToShow: 1,
    responsive: [
      {
        breakpoint: 1440,
        settings: {
          arrows: false,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 1100,
        settings: {
          arrows: false,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 812,
        settings: {
          arrows: false,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          dots: false,
          slidesToShow: 1
        }
      }
    ]
  });

  $('.close-banner').on('click', function (e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).parents('.header-top-banner').remove();
  });


  /* Back to Top */
  $("#BackToTop").on("click", function () {
    $("html, body").animate({
      scrollTop: 0
    }, 500);
  });

  $('.dropdown.dropdown-discount, .dropdown.dropdown-hover').hover(function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
  });

  var header = $("#Header");
  var scroll = $(window).scrollTop();
  if (scroll >= 145) {
    $('body').removeClass('clearHeader').addClass("darkHeader");
  } else {
    $('body').removeClass("darkHeader").addClass('clearHeader');
  }

  $(function () {
    //caches a jQuery object containing the header element
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 145) {
        $('body').removeClass('clearHeader').addClass("darkHeader");
      } else {
        $('body').removeClass("darkHeader").addClass('clearHeader');
      }
    });
  });

  $('.header-brand').ontouchend = (e) => {
    e.preventDefault();
  };

  var lastScrollTop = 145;
  $(window).scroll(function (event) {
    var st = $(this).scrollTop();
    if (st > lastScrollTop) {
      $('.header-category').removeClass('active');
    } else {
      $('.header-category').addClass('active');
    }
    lastScrollTop = st;
  });

  $('#recently-viewed-slider').owlCarousel({
    dots: false,
    smartSpeed: 400,
    items: 5,
    loop: false,
    margin: 15,
    autoplay: true,
    autoplayHoverPause: true,
    autoplaySpeed: 2000,
    autoplayTimeout: 4000,
    responsive: {
      0: {
        items: 2,
        nav: false,
        loop: true,
      },
      768: {
        items: 3
      },
      1024: {
        items: 5,
        nav: true,
        navText: [
          "<i class='icon icon-chevron-left'></i>",
          "<i class='icon icon-chevron-right'></i>"
        ],
      }
    }
  });

  $('#home-new-product-wrapper').owlCarousel({
    dots: false,
    smartSpeed: 400,
    items: 5,
    loop: true,
    margin: 15,
    autoplay: true,
    autoplayHoverPause: true,
    autoplaySpeed: 1000,
    autoplayTimeout: 3000,
    nav: true,
    navText: [
      "<i class='icon icon-chevron-left'></i>",
      "<i class='icon icon-chevron-right'></i>"
    ],
    responsive: {
      0: {
        items: 2,
//        dots: false,
        nav: false,
      },
      768: {
        items: 3,
        nav: false,
      },
      1024: {
        items: 5,
        nav: false,
      },
      1366: {
        items: 5,
      }
    }
  });

  $('.fix-product-wrapper').owlCarousel({
    dots: false,
    smartSpeed: 400,
    items: 5,
    loop: false,
    margin: 15,
    nav: true,
    navText: [
      "<i class='icon icon-chevron-left'></i>",
      "<i class='icon icon-chevron-right'></i>"
    ],
    autoplay: false,
    autoplayHoverPause: false,
    autoplaySpeed: 1000,
    autoplayTimeout: 3000,
    responsive: {
      0: {
        items: 2,
        nav: false,
        loop: true,
        autoplay: true,
      },
      768: {
        items: 3,
        nav: false,
        loop: true,
        autoplay: true,
      },
      1024: {
        items: 5,
        nav: false,
        loop: true,
        autoplay: true,
      },
      1366: {
        items: 5,
      }
    }
  });

  $('.news-wrapper').owlCarousel({
    dots: false,
    smartSpeed: 400,
    items: 4,
    loop: false,
    margin: 15,
    nav: false,
    autoplay: false,
    autoplayHoverPause: false,
    autoplaySpeed: 1000,
    autoplayTimeout: 3000,
    responsive: {
      0: {
        items: 2,
        arrows: false
      },
      768: {
        items: 3
      },
      1024: {
        items: 4
      }
    }
  });

  $('.top-banner-wrapper').owlCarousel({
    dots: false,
    smartSpeed: 400,
    items: 1,
    loop: true,
    margin: 15,
    nav: false,
    autoplay: true,
    autoplayHoverPause: true,
    autoplaySpeed: 2000,
    autoplayTimeout: 4000,
    responsive: {
      0: {
        items: 1,
        arrows: false,
        loop: true,
        autoplay: true,
      },
      768: {
        items: 1
      },
      1024: {
        items: 1
      }
    }
  });

  $('.home-mid-banner-wrapper').owlCarousel({
    dots: false,
    smartSpeed: 400,
    items: 2,
    loop: true,
    margin: 15,
    nav: false,
    autoplay: false,
    autoplayHoverPause: true,
    autoplaySpeed: 2000,
    autoplayTimeout: 4000,
    responsive: {
      0: {
        items: 1,
        arrows: false,
        loop: true,
        autoplay: true,
      },
      768: {
        items: 2
      },
      1024: {
        items: 2
      }
    }
  });

  $('.home-partner-list-wrapper').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: true,
    prevArrow: "<button type='button' class='slick-prev pull-left'><i class='icon icon-chevron-left'></i></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><i class='icon icon-chevron-right'></i></button>",
    slidesToShow: 8,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1366,
        settings: {
          slidesToShow: 8,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 1224,
        settings: {
          slidesToShow: 8,
          slidesToScroll: 1,
          arrows: false,
        }
      },
      {
        breakpoint: 1080,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 1,
          arrows: false,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: false,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
        }
      }
    ]
  });

  $('.slider-single').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: false,
    adaptiveHeight: true,
    infinite: true,
    useTransform: true,
    speed: 400,
    cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
    dots: false,
    responsive: [{
      breakpoint: 576,
      settings: {
        dots: true,
      }
    }]
  });

  $('.slider-nav')
    .on('init', function (event, slick) {
      $('.slider-nav .slick-slide.slick-current').addClass('is-active');
    })
    .slick({
      slidesToShow: 4,
      slidesToScroll: 4,
      dots: false,
      focusOnSelect: true,
      infinite: true,
      arrows: true,
      prevArrow: "<button type='button' class='slick-prev pull-left'><i class='icon icon-chevron-left'></i></button>",
      nextArrow: "<button type='button' class='slick-next pull-right'><i class='icon icon-chevron-right'></i></button>",
      responsive: [{
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,

        }
      }, {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
      }, {
        breakpoint: 576,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        }
      }]
    });

  $('.slider-single').on('afterChange', function (event, slick, currentSlide) {
    $('.slider-nav').slick('slickGoTo', currentSlide);
    var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
    $('.slider-nav .slick-slide.is-active').removeClass('is-active');
    $(currrentNavSlideElem).addClass('is-active');
  });

  $('.slider-nav').on('click', '.slick-slide', function (event) {
    event.preventDefault();
    var goToSingleSlide = $(this).data('slick-index');

    $('.slider-single').slick('slickGoTo', goToSingleSlide);
  });

  $('.promotion-content').niceScroll({
    autohidemode: false,
    cursorcolor: '#ccc',
  });

  var _height = document.body.getElementsByClassName('product-discount').height;
  if (_height < 1) {
    document.body.getElementsByClassName('product-item').height = 370;
  }

  $('#filtered-by').on('click', function () {
    $('#filter-screen').show();
  });

  $('#sorted-by').on('click', function () {
    $('#sort-screen').show();
  });

  $('.back-to-screen').on('click', function () {
    $('#filter-screen').hide();
    $('#sort-screen').hide();
  });

  if ($('body').hasClass('.product-cart-selected')) {
    var searchResult = new StickySidebar('.product-cart-selected', {
      topSpacing: 120,
      bottomSpacing: 50,
      containerSelector: '.product-page-wrapper',
    });
  }

  if ('ontouchstart' in window) {
    var click = 'touchstart';
  } else {
    var click = 'click';
  }

  $('div.burger').on(click, function () {
    if (!$(this).hasClass('open')) {
      openMenu();
    } else {
      closeMenu();
    }
  });

  $('.hidden-bg').on(click, function () {
    $('#collapseMenu').removeClass('show');
  });

  $('div.menu ul li a').on(click, function (e) {
    e.preventDefault();
    closeMenu();
  });

  function openMenu() {
    $('div.circle').addClass('expand');
    $('div.burger').addClass('open');
    $('div.x, div.y, div.z').addClass('collapse');
    $('.menu li').addClass('animate');

    setTimeout(function () {
      $('div.y').hide();
      $('div.x').addClass('rotate30');
      $('div.z').addClass('rotate150');
    }, 70);
    setTimeout(function () {
      $('div.x').addClass('rotate45');
      $('div.z').addClass('rotate135');
    }, 120);
  }

  function closeMenu() {
    $('div.burger').removeClass('open');
    $('div.x').removeClass('rotate45').addClass('rotate30');
    $('div.z').removeClass('rotate135').addClass('rotate150');
    $('div.circle').removeClass('expand');
    $('.menu li').removeClass('animate');

    setTimeout(function () {
      $('div.x').removeClass('rotate30');
      $('div.z').removeClass('rotate150');
    }, 50);
    setTimeout(function () {
      $('div.y').show();
      $('div.x, div.y, div.z').removeClass('collapse');
    }, 70);
  }

});
