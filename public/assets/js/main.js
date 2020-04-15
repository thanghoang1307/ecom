=require ../../node_modules/jquery/dist/jquery.min.js
=require ../../node_modules/bootstrap/dist/js/bootstrap.min.js
=require ../../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js
=require ../../node_modules/bootstrap-autohidingnavbar/dist/jquery.bootstrap-autohidingnavbar.min.js
=require ../../node_modules/bootstrap-select/dist/js/bootstrap-select.min.js
=require ../../node_modules/parsleyjs/dist/parsley.min.js
=require ../../node_modules/slick-carousel/slick/slick.min.js
=require ../../node_modules/owl.carousel2/dist/owl.carousel.min.js
=require ../../node_modules/jquery-parallax.js/parallax.min.js
=require ../../node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js
=require ../../node_modules/sticky-sidebar/dist/sticky-sidebar.min.js
=require ../../node_modules/bootstrap-multiselect/dist/js/bootstrap-multiselect.min.js

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


  $(".open-social-login").click( function() {  // opening on same line K&R style
    $('#loginModal').modal('hide');
    setTimeout(function(){
      $('#socialLoginModal').modal('show');
    }, 500);
  });

  $(".open-forget-pass").click( function() {  // opening on same line K&R style
    $('#loginModal').modal('hide');
    setTimeout(function(){
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

  if($('body').hasClass('.product-cart-selected')){
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

!function(a) {
	"use strict";
	var n = {
		initialize: function () {
			this.event(), this.hoverDropdown(), this.navbarSticky(), this.navbarScrollspy()
		},
			event: function () {
			var n = a("nav.navbar.bootsnav");
			if (n.hasClass("navbar-sticky") && n.wrap("<div class='wrap-sticky'></div>"), n.hasClass("brand-center")) {
				var o = new Array,
					s = a("nav.brand-center"),
					e = s.find("ul.navbar-nav");
				s.prepend("<span class='storage-name' style='display:none;'></span>"), s.find("ul.navbar-nav > li").each(function() {
					if (a(this).hasClass("active")) {
						var n = a("a", this).eq(0).text();
						a(".storage-name").html(n)
					}
					
					o.push(a(this).html())
				});
				var t = o.splice(0, Math.round(o.length / 2)),
					i = o,
					l = "",
					r = function (a) {
					l = "";
					for (var n = 0;
					n < a.length;
					n++)l += "<li>" + a[n] + "</li>"
				};
				
				r(t), e.html(l), s.find("ul.nav").first().addClass("navbar-left"), r(i), e.after('<ul class="nav navbar-nav"></ul>').next().html(l), s.find("ul.nav").last().addClass("navbar-right"), s.find("ul.nav.navbar-left").wrap("<div class='col-half left'></div>"), s.find("ul.nav.navbar-right").wrap("<div class='col-half right'></div>"), s.find("ul.navbar-nav > li").each(function() {
					var n = a("ul.dropdown-menu", this),
						o = a("ul.megamenu-content", this);
					n.closest("li").addClass("dropdown"), o.closest("li").addClass("megamenu-fw")
				});
				var d = a(".storage-name").html();
				"" == !d && a("ul.navbar-nav > li:contains('" +d + "')").addClass("active")
			}
			
			n.hasClass("navbar-sidebar")?(a("body").addClass("wrap-nav-sidebar"), n.wrapInner("<div class='scroller'></div>")):a(".bootsnav").addClass("on"), n.find("ul.nav").hasClass("navbar-center") && n.addClass("menu-center"), n.hasClass("navbar-full")?(a("nav.navbar.bootsnav").find("ul.nav").wrap("<div class='wrap-full-menu'></div>"), a(".wrap-full-menu").wrap("<div class='nav-full'></div>"), a("ul.nav.navbar-nav").prepend("<li class='close-full-menu'><a href='#'><i class='fa fa-times'></i></a></li>")):n.hasClass("navbar-mobile")?n.removeClass("no-full"):n.addClass("no-full"), n.hasClass("navbar-mobile") && (a(".navbar-collapse").on("shown.bs.collapse", function() {
				a("body").addClass("side-right")
			}), a(".navbar-collapse").on("hide.bs.collapse", function() {
				a("body").removeClass("side-right")
			}), a(window).on("resize", function() {
				a("body").removeClass("side-right")
			})), n.hasClass("no-background") && a(window).on("scroll", function() {
				a(window).scrollTop() > 34?a(".navbar-fixed").removeClass("no-background"):a(".navbar-fixed").addClass("no-background")
			}), n.hasClass("navbar-transparent") && a(window).on("scroll", function() {
				a(window).scrollTop() > 34?a(".navbar-fixed").removeClass("navbar-transparent"):a(".navbar-fixed").addClass("navbar-transparent")
			}), a(".btn-cart").on("click", function(a) {
				a.stopPropagation()
			}), a("nav.navbar.bootsnav .attr-nav").each(function() {
				a("li.search > a", this).on("click", function(n) {
					n.preventDefault(), a(".top-search").slideToggle()
				})
			}), a(".input-group-addon.close-search").on("click", function() {
				a(".top-search").slideUp()
			}), a("nav.navbar.bootsnav .attr-nav").each(function() {
				a("li.side-menu > a", this).on("click", function(n) {
					n.preventDefault(), a("nav.navbar.bootsnav > .side").toggleClass("on"), a("body").toggleClass("on-side")
				})
			}), a(".side .close-side").on("click", function(n) {
				n.preventDefault(), a("nav.navbar.bootsnav > .side").removeClass("on"), a("body").removeClass("on-side")
			}), a("body").wrapInner("<div class='wrapper'></div>")
		},
			hoverDropdown: function () {
			var n = a("nav.navbar.bootsnav"),
				o = a(window).width(),
				s = a(window).height(),
				e = n.find("ul.nav").data("in"),
				t = n.find("ul.nav").data("out");
			if (o < 991) {
				a(".scroller").css("height", "auto"), a("nav.navbar.bootsnav ul.nav").find("li.dropdown").off("mouseenter"), a("nav.navbar.bootsnav ul.nav").find("li.dropdown").off("mouseleave"), a("nav.navbar.bootsnav ul.nav").find(".title").off("mouseenter"), a("nav.navbar.bootsnav ul.nav").off("mouseleave"), a(".navbar-collapse").removeClass("animated"), a("nav.navbar.bootsnav ul.nav").each(function() {
					a(".dropdown-menu", this).addClass("animated"), a(".dropdown-menu", this).removeClass(t), a("a.dropdown-toggle", this).off("click"), a("a.dropdown-toggle", this).on("click", function(n) {
						return n.stopPropagation(), a(this).closest("li.dropdown").find(".dropdown-menu").first().stop().fadeToggle().toggleClass(e), a(this).closest("li.dropdown").first().toggleClass("on"), !1
					}), a("li.dropdown", this).each(function() {
						return a(this).find(".dropdown-menu").stop().fadeOut(), a(this).on("hidden.bs.dropdown", function() {
							a(this).find(".dropdown-menu").stop().fadeOut()
						}), !1
					}), a(".megamenu-fw", this).each(function() {
						a(".col-menu", this).each(function() {
							a(".content", this).addClass("animated"), a(".content", this).stop().fadeOut(), a(".title", this).off("click"), a(".title", this).on("click", function() {
								return a(this).closest(".col-menu").find(".content").stop().fadeToggle().addClass(e), a(this).closest(".col-menu").toggleClass("on"), !1
							}), a(".content", this).on("click", function(a) {
								a.stopPropagation()
							})
						})
					})
				});
				var i = function () {
					a("li.dropdown", this).removeClass("on"), a(".dropdown-menu", this).stop().fadeOut(), a(".dropdown-menu", this).removeClass(e), a(".col-menu", this).removeClass("on"), a(".col-menu .content", this).stop().fadeOut(), a(".col-menu .content", this).removeClass(e)
				};
				
				a("nav.navbar.bootsnav").on("mouseleave", function() {
					i()
				}), a("nav.navbar.bootsnav .attr-nav").each(function() {
					a(".dropdown-menu", this).removeClass("animated"), a("li.dropdown", this).off("mouseenter"), a("li.dropdown", this).off("mouseleave"), a("a.dropdown-toggle", this).off("click"), a("a.dropdown-toggle", this).on("click", function(n) {
						n.stopPropagation(), a(this).closest("li.dropdown").find(".dropdown-menu").first().stop().fadeToggle(), a(".navbar-toggle").each(function() {
							a(".fa", this).removeClass("fa-times"), a(".fa", this).addClass("fa-bars"), a(".navbar-collapse").removeClass("in"), a(".navbar-collapse").removeClass("on")
						})
					}), a(this).on("mouseleave", function() {
						return a(".dropdown-menu", this).stop().fadeOut(), a("li.dropdown", this).removeClass("on"), !1
					})
				}), a(".navbar-toggle").each(function() {
					a(this).off("click"), a(this).on("click", function() {
						a(".fa", this).toggleClass("fa-bars"), a(".fa", this).toggleClass("fa-times"), i()
					})
				})
			} else o > 991 && (a(".scroller").css("height", s + "px"), n.hasClass("navbar-sidebar")?a("nav.navbar.bootsnav ul.nav").each(function() {
				a("a.dropdown-toggle", this).off("click"), a("a.dropdown-toggle", this).on("click", function(a) {
					a.stopPropagation()
				}), a(".dropdown-menu", this).addClass("animated"), a("li.dropdown", this).on("mouseenter", function() {
					return a(".dropdown-menu", this).eq(0).removeClass(t), a(".dropdown-menu", this).eq(0).stop().fadeIn().addClass(e), a(this).addClass("on"), !1
				}), a(".col-menu").each(function() {
					a(".content", this).addClass("animated"), a(".title", this).on("mouseenter", function() {
						return a(this).closest(".col-menu").find(".content").stop().fadeIn().addClass(e), a(this).closest(".col-menu").addClass("on"), !1
					})
				}), a(this).on("mouseleave", function() {
					return a(".dropdown-menu", this).stop().removeClass(e), a(".dropdown-menu", this).stop().addClass(t).fadeOut(), a(".col-menu", this).find(".content").stop().fadeOut().removeClass(e), a(".col-menu", this).removeClass("on"), a("li.dropdown", this).removeClass("on"), !1
				})
			}):a("nav.navbar.bootsnav ul.nav").each(function() {
				a("a.dropdown-toggle", this).off("click"), a("a.dropdown-toggle", this).on("click", function(a) {
					a.stopPropagation()
				}), a(".megamenu-fw", this).each(function() {
					a(".title", this).off("click"), a("a.dropdown-toggle", this).off("click"), a(".content").removeClass("animated")
				}), a(".dropdown-menu", this).addClass("animated"), a("li.dropdown", this).on("mouseenter", function() {
					return a(".dropdown-menu", this).eq(0).removeClass(t), a(".dropdown-menu", this).eq(0).stop().fadeIn().addClass(e), a(this).addClass("on"), !1
				}), a("li.dropdown", this).on("mouseleave", function() {
					a(".dropdown-menu", this).eq(0).removeClass(e), a(".dropdown-menu", this).eq(0).stop().fadeOut().addClass(t), a(this).removeClass("on")
				}), a(this).on("mouseleave", function() {
					return a(".dropdown-menu", this).removeClass(e), a(".dropdown-menu", this).eq(0).stop().fadeOut().addClass(t), a("li.dropdown", this).removeClass("on"), !1
				})
			}), a("nav.navbar.bootsnav .attr-nav").each(function() {
				a("a.dropdown-toggle", this).off("click"), a("a.dropdown-toggle", this).on("click", function(a) {
					a.stopPropagation()
				}), a(".dropdown-menu", this).addClass("animated"), a("li.dropdown", this).on("mouseenter", function() {
					return a(".dropdown-menu", this).eq(0).removeClass(t), a(".dropdown-menu", this).eq(0).stop().fadeIn().addClass(e), a(this).addClass("on"), !1
				}), a("li.dropdown", this).on("mouseleave", function() {
					a(".dropdown-menu", this).eq(0).removeClass(e), a(".dropdown-menu", this).eq(0).stop().fadeOut().addClass(t), a(this).removeClass("on")
				}), a(this).on("mouseleave", function() {
					return a(".dropdown-menu", this).removeClass(e), a(".dropdown-menu", this).eq(0).stop().fadeOut().addClass(t), a("li.dropdown", this).removeClass("on"), !1
				})
			}));
			if (n.hasClass("navbar-full")) {
				var l = a(window).height(),
					r = a(window).width();
				a(".nav-full").css("height", l + "px"), a(".wrap-full-menu").css("height", l + "px"), a(".wrap-full-menu").css("width", r + "px"), a(".navbar-collapse").addClass("animated"), a(".navbar-toggle").each(function() {
					var n = a(this).data("target");
					a(this).off("click"), a(this).on("click", function(o) {
						return o.preventDefault(), a(n).removeClass(t), a(n).addClass("in"), a(n).addClass(e), !1
					}), a("li.close-full-menu").on("click", function(o) {
						return o.preventDefault(), a(n).addClass(t), setTimeout(function() {
							a(n).removeClass("in"), a(n).removeClass(e)
						}, 500), !1
					})
				})
			}
		},
			navbarSticky: function () {
			var n = a("nav.navbar.bootsnav");
			if (n.hasClass("navbar-sticky")) {
				var o = n.height();
				a(".wrap-sticky").height(o);
				var s = a(".wrap-sticky").offset().top;
				a(window).on("scroll", function() {
					a(window).scrollTop() > s?n.addClass("sticked"):n.removeClass("sticked")
				})
			}
		},
			navbarScrollspy: function () {
			var n = a(".navbar-scrollspy"),
				o = a("body"),
				s = a("nav.navbar.bootsnav"),
				e = s.outerHeight();
			if (n.length) {
				o.scrollspy({
					target: ".navbar",
					offset: e
				}), a(".scroll").on("click", function(n) {
					n.preventDefault(), a(".scroll").removeClass("active"), a(this).addClass("active"), a(".navbar-collapse").removeClass("in"), a(".navbar-toggle").each(function() {
						a(".fa", this).removeClass("fa-times"), a(".fa", this).addClass("fa-bars")
					});
					a(window).scrollTop();
					var o = a(this).find("a"),
						e = a(o.attr("href")).offset().top,
						t = a(window).width(),
						i = s.data("minus-value-desktop"),
						l = s.data("minus-value-mobile"),
						r = s.data("speed");
					if (t > 992)var d = e - i;
					else d = e - l;
					a("html, body").stop().animate({
						scrollTop: d
					},
					r)
				});
				var t = function () {
					var a = o.data("bs.scrollspy");
					a && (e = s.outerHeight(),
						a.options.offset = e, o.data("bs.scrollspy", a), o.scrollspy("refresh"))
				};
				
				a(window).on("resize", function() {
					clearTimeout(a);
					var a = setTimeout(t, 200)
				})
			}
		}
	};
	
	a(document).ready(function() {
		n.initialize()
	}), a(window).on("resize", function() {
		n.hoverDropdown(), setTimeout(function() {
			n.navbarSticky()
		}, 500), a(".navbar-toggle").each(function() {
			a(".fa", this).removeClass("fa-times"), a(".fa", this).addClass("fa-bars"), a(this).removeClass("fixed")
		}), a(".navbar-collapse").removeClass("in"), a(".navbar-collapse").removeClass("on"), a(".navbar-collapse").removeClass("bounceIn")
	})
}

(jQuery);
