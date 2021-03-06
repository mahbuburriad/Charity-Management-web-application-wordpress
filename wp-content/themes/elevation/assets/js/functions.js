(function($){
  "use strict";

  jQuery(window).on('scroll', function () {
    "use strict";

    if (jQuery(this).scrollTop() > 100) {
      jQuery('#scroll-to-top').fadeIn('slow');
    } else {
      jQuery('#scroll-to-top').fadeOut('slow');
    }

    if (jQuery(window).scrollTop() > 150) {
      jQuery('header').addClass('is-sticky');
    }
    else {
     jQuery('header').removeClass('is-sticky');
   }


 });


  jQuery("body.logged-in.admin-bar").find("#header").css( "top", "32px" );

    //Scroll to Top
    jQuery('#scroll-to-top').on("click", function(){
      "use strict";

      jQuery("html,body").animate({ scrollTop: 0 }, 1500);
      return false;
    });



    $.fn.elevation_fancybox = function(){
      if(typeof($.fn.fancybox) == 'function'){
        var fancybox_attr = {
          nextMethod : 'resizeIn',
          nextSpeed : 250,
          prevMethod : false,
          prevSpeed : 250,  
          helpers : { media : {} }
        };

        if( typeof($.fancybox.helpers.thumbs) == 'object' ){
          fancybox_attr.helpers.thumbs = { width: 50, height: 50 };
        }

        $(this).fancybox(fancybox_attr);
      } 
    }


    jQuery(window).load(function($) {
      "use strict";
      
      /*---------- Gallery -----------*/
      var $galleryItems = jQuery('#gallery-items'),
      colWidth = function () {
        var w = $galleryItems.width(), 
        columnNum = 1,
        columnWidth = 0;
        if (w > 960) {
          columnNum  = 4;
        } 
        else if (w > 640) {
          columnNum  = 2;
        } 
        else if (w > 480) {
          columnNum  = 2;
        }  
        else if (w > 360) {
          columnNum  = 1;
        } 
        columnWidth = Math.floor(w/columnNum);
        $galleryItems.find('.item').each(function() {
          var $item = jQuery(this),
          multiplier_w = $item.attr('class').match(/item-w(\d)/),
          multiplier_h = $item.attr('class').match(/item-h(\d)/),
          width = multiplier_w ? columnWidth*multiplier_w[1] : columnWidth,
          height = multiplier_h ? columnWidth*multiplier_h[1]*.7-10 : columnWidth*.77-10;
          $item.css({
            width: width,
            height: height
          });
        });
        return columnWidth;
      },
      isotope = function () {
        $galleryItems.isotope({
          resizable: true,
          itemSelector: '.item',
          masonry: {
            columnWidth: colWidth(),
            gutterWidth: 10
          }
        });
      };
      isotope();
      jQuery(window).smartresize(isotope);

      jQuery('.itemFilter a').on("click", function(){
        jQuery('.itemFilter .current').removeClass('current');
        jQuery(this).addClass('current');

        var selector = jQuery(this).attr('data-filter');
        $galleryItems.isotope({
          filter: selector,
          animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
          }
        });
        return false;

      }); 



    });


    jQuery(document).ready(function($) {
     "use strict";

     var contentPlacement = $('#header').position().top + $('#header').height();
     $('.main-content').css('margin-top',contentPlacement);

     var contentPlacement = $('#header').position().top - $('#header').height();
     $('.rev_slider').css('margin-top',contentPlacement);


     $('.blog-post article .col-md-6, #volunteers-grid .grid-gap').matchHeight({ 
      property: 'min-height' 
    });


        // Avoid `console` errors in browsers that lack a console.
        var method;
        var noop = function () {};
        var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
        ];
        var length = methods.length;
        var console = (window.console = window.console || {});

        while (length--) {
          method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
          console[method] = noop;
        }
      }

      //Dropdown Menu
      if ($(window).width() < 768) {
        $('ul.sub-menu').addClass('dropdown-menu');
      }
      else {
        $('ul.sub-menu').removeClass('dropdown-menu');
      }

      new UISearch( document.getElementById( 'sb-search' ) );

      // Header Banner Dynamic Height

      //$('#el-slider').css({height: $(window).height(top:-100)});

      $('#el-slider').css("margin-top", Math.max(0, $(window).height()-1805)+"px");

      // $("#el-slider").css("margin-top",function () {
      //     if ($(window).height() < 805) {
      //         return "0px";  
      //     } else {
      //         return ($(window).height() + 805)+"px";
      //     }
      // });


      //Stellar Parallax

      $(window).stellar({
        responsive: true,
        horizontalScrolling: false,
        hideDistantElements: false,
        verticalOffset: 0,
        horizontalOffset: 0,
      });


      /*------------ Volunteers Slider ------------*/
      var volunteerSlider = $("#volunteers-slider");

      volunteerSlider.owlCarousel({
      	autoPlay : 3000,
      	stopOnHover : true,
      	navigation:true,
      	paginationNumbers: false,
      	navigationText: [
      	"<i class='fa fa-angle-left post-prev'></i>",
      	"<i class='fa fa-angle-right post-next'></i>"
      	],

      	itemsCustom : [
      	[0, 1],
      	[450, 2],
      	[600, 2],
      	[700, 2],
      	[800, 3],
      	[1000, 4],
      	[1200, 4]
      	],
    // Responsive 
    responsive: true,
    responsiveRefreshRate : 200,
    responsiveBaseWidth: window
  });

      var similarSlider = $("#volunteers-slider-2, #works-slider");

      similarSlider.owlCarousel({
        autoPlay : 3000,
        stopOnHover : true,
        navigation:true,
        paginationNumbers: false,
        navigationText: [
        "<i class='fa fa-angle-left post-prev'></i>",
        "<i class='fa fa-angle-right post-next'></i>"
        ],

        itemsCustom : [
        [0, 1],
        [450, 2],
        [600, 2],
        [700, 2],
        [800, 3],
        [1000, 3],
        [1200, 3]
        ],
    // Responsive 
    responsive: true,
    responsiveRefreshRate : 200,
    responsiveBaseWidth: window
  });


      /*------------ Causes Slider ------------*/
      var causesSlider = $("#causes-slider");

      causesSlider.owlCarousel({
      	// autoPlay : 3000,
      	stopOnHover : true,
      	pagination : true,
      	paginationNumbers: false,

        itemsCustom : [
        [0, 1],
        [450, 1],
        [600, 2],
        [700, 2],
        [800, 2],
        [1000, 2],
        [1200, 3]
        ],
    // Responsive 
    responsive: true,
    responsiveRefreshRate : 200,
    responsiveBaseWidth: window
  });


      /*------------ Causes Slider ------------*/
      var logoList = $("#logo-list");

      logoList.owlCarousel({
      	autoPlay : 3000,
      	stopOnHover : true,
      	pagination : true,
      	paginationNumbers: false,

        itemsCustom : [
        [0, 1],
        [450, 1],
        [600, 2],
        [700, 3],
        [800, 4],
        [1000, 5],
        [1200, 5]
        ],
    // Responsive 
    responsive: true,
    responsiveRefreshRate : 200,
    responsiveBaseWidth: window
  });







    // donate form
    $('.elevation-paypal-form').each(function(){
      $(this).find('.elevation-amount-button').on("click", function(){
        var amount = $(this).attr('data-val');
        $(this).addClass('active').siblings().removeClass('active');
        $(this).parent('.elevation-paypal-amount-wrapper').siblings('[name="a3"]').val(amount);
        $(this).parent('.elevation-paypal-amount-wrapper').siblings('[name="amount"]').val(amount);
      });
      
      $(this).find('.custom-amount').change(function(){
        var amount = parseInt($(this).val());
        $(this).siblings().removeClass('active');
        $(this).parent('.elevation-paypal-amount-wrapper').siblings('[name="a3"]').val(amount);
        $(this).parent('.elevation-paypal-amount-wrapper').siblings('[name="amount"]').val(amount);
      });
      
      $(this).submit(function(e){
        var valid = true; 
        var gdlr_form = $(this);
        
        // check require fields
        $(this).find('.elevation-require').each(function(){
          if( valid && $(this).val() == '' ){
            gdlr_form.children('.elevation-notice.require-field').slideDown(200)
            .siblings('.elevation-notice').slideUp(200);
            valid = false;
          }
        });
        
        // check email
        $(this).find('.elevation-email').each(function(){
          var re = /\S+@\S+/;
          if( valid && !re.test($(this).val()) ){
            gdlr_form.children('.elevation-notice.email-invalid').slideDown(200)
            .siblings('.elevation-notice').slideUp(200);
            valid = false;
          }
        }); 

        if( valid ){
          gdlr_form.children('.elevation-notice').slideUp(200);
          gdlr_form.children('.elevation-paypal-loader').slideDown(200);
          
          var ajax_url = gdlr_form.attr('data-ajax');
          $.ajax({
            type: 'POST',
            url: ajax_url,
            data: jQuery(this).serialize(),
            dataType: 'json',
            error: function(a, b, c){
              console.log(a, b, c);
            },
            success: function(data){
              gdlr_form.children('.elevation-notice.alert-message')
              .html(data.message).slideDown(200).addClass('elevation-' + data.status);
              gdlr_form.children('.elevation-paypal-loader').slideUp(200);
              
              if( data.status == 'success' ){
                gdlr_form.children('[name="item_number"]').val(data.item_number);
                gdlr_form[0].submit();
              }
            }
          });         
        }

        e.preventDefault();
        e.returnValue = false;
      });
    });




    /*----- Mobile Decices Detect -------*/

    var isMobile = {
     Android: function() {
      return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
      return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
      return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
      return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
      return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
      return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
  };



    // fancybox
    $('a[href$=".jpg"], a[href$=".png"], a[href$=".gif"]').not('[data-rel="fancybox"]').attr('data-rel', 'fancybox');
    $('[data-rel="fancybox"]').elevation_fancybox();


    }); //End of Document Ready


})(jQuery);