jQuery(document).ready(function(e){e(".border").length&&jQuery(window).load(function(){$portfolio_selectors=e(".border>li>a"),$portfolio_selectors.on("click",function(){e(this).attr("data-filter");return!1})}),e(".slash").length&&jQuery(window).load(function(){$portfolio_selectors=e(".slash>li>a"),$portfolio_selectors.on("click",function(){e(this).attr("data-filter");return!1})}),e(".round").length&&jQuery(window).load(function(){$portfolio_selectors=e(".round>li>a"),$portfolio_selectors.on("click",function(){e(this).attr("data-filter");return!1})}),[1,2,3,4].forEach(function(t){e(".hover-"+t).length&&e(".hover-"+t).mixItUp({})}),jQuery(document).ready(function(){e("#hover-1 .portfolio-item").each(function(){e(this).hoverdir()})}),e("#tgx-hero-unit .carousel-inner .item").css({height:e(window).height()+"px"}),e(window).resize(function(){e("#tgx-hero-unit .carousel-inner .item").css({height:e(window).height()+"px"})}),e(".tgx-project").length&&jQuery(".tgx-project").addClass("owl-carousel").owlCarousel({pagination:!0,center:!0,margin:100,dots:!1,loop:!0,items:2,nav:!0,navClass:["owl-carousel-left","owl-carousel-right"],navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],autoHeight:!0,autoplay:!1,responsive:{0:{items:1},600:{items:1},1000:{items:2}}}),e(".wkfe-click-to-tweet .wkfe-tweet").on("click",function(){var t=window.location.href.split("?")[0],a=e(this).parentsUntil(".wkfe-click-to-tweet").find(".tweet-text").text().trim(),o="https://twitter.com/share?url="+encodeURIComponent(t)+"&text="+encodeURIComponent(a);window.open(o,"_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=720,height=500")}),e(".wkfe-search .wkfe-search-form-wrapper").css("display","block"),e(".wkfe-search .search-click-handler").on("click",function(t){var a=e(this).parent().attr("id");e(this).toggleClass("active"),e("#"+a).find(".wkfe-search-form-wrapper").toggleClass("active"),e(".wkfe-site-social .wkfe-site-social-platform-wrapper").hasClass("active")&&e(".wkfe-site-social .wkfe-site-social-platform-wrapper").removeClass("active"),e(".wkfe-site-social .site-social-click-handler").hasClass("active")&&e(".wkfe-site-social .site-social-click-handler").removeClass("active")}),e(".wkfe-search .wkfe-site-social-platform-wrapper").css("display","block"),e(".wkfe-site-social .site-social-click-handler").on("click",function(t){var a=e(this).parent().attr("id");e(this).toggleClass("active"),e("#"+a).find(".wkfe-site-social-platform-wrapper").toggleClass("active"),e(".wkfe-search .wkfe-search-form-wrapper").hasClass("active")&&e(".wkfe-search .wkfe-search-form-wrapper").removeClass("active"),e(".wkfe-search .search-click-handler").hasClass("active")&&e(".wkfe-search .search-click-handler").removeClass("active")})}),jQuery(window).on("elementor/frontend/init",function(){elementorFrontend.hooks.addAction("frontend/element_ready/widgetkit-for-elementor-lottie-animation.default",function(e,t){let a=e.find(".lottie-animation-wrapper");if(a.length){let e;e="autoplay"==a.data("animation-play");var o=lottie.loadAnimation({container:a[0],renderer:a.data("animation-renderer"),loop:a.data("animation-loop"),autoplay:e,path:a.data("animation-path")});if(a.on("mouseenter",function(){"onhover"==a.data("animation-play")&&o.goToAndPlay(0)}),a.on("click",function(){"onclick"==a.data("animation-play")&&o.goToAndPlay(0)}),"viewport"==a.data("animation-play")){function i(e){var a=t(window).scrollTop(),o=a+t(window).height(),i=t(e).offset().top;return i+t(e).height()<=o&&i>=a}i(a)&&o.play(),t(window).scroll(function(){i(a)&&o.play()})}a.data("animation-speed")&&o.setSpeed(parseInt(a.data("animation-speed"))),a.data("animation-reverse")&&o.setDirection(-1)}})});