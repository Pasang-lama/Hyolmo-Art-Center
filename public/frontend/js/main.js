$(document).ready(function() {
$(".side-nav-show-btn").click(function(){
  $("#mysidenav").show();
})
$(".side-nav-close-btn").click(function(){
  $("#mysidenav").hide();
})
  $('.send_message_btn').on('click',function(e) {
    e.preventDefault();
    var formaction = $('#homecontact_form').attr('action');
    var formdata = $('#homecontact_form').serialize();
    $.ajax({
      url: formaction,
      method: 'POST',
      data: formdata,
      beforeSend: function() {
        $('.send_message_btn').html("<i class='fas fa-spinner fa-pulse fa-1x'></i> Send Message").prop("disabled", false);
      },
      success: function(response) {
        if (response) {
          if (response.success) {
            showMessage(response.success, "success");
          } else {
            showMessage(response.error, "error");
          }
        }
        $('.send_message_btn').html("<i class='fas pe-3 fa-paper-plane'></i>Send Message").prop("disabled", false);
      },
      error: function(response) {
        if (typeof response.responseJSON.errors !== '' && response.responseJSON.errors) {
          $(".error").remove();
          $.each(response.responseJSON.errors, function(key, value) {
              showMessage(value,"error");
          });
          $('.send_message_btn').html("<i class='fas pe-3 fa-paper-plane'></i>Send Message").prop("disabled", false);
        }
      }
    })
  });
  if ($("#ajaxLoadedProducts").length > 0) {
    $('body').on('click', '.pagination a', function(e) {
      e.preventDefault();
      var pagination_url = $(this).attr('href');
      if (pagination_url.includes('filter=yes')) {

        productSearch(pagination_url);
      } else {
        window.location.href = pagination_url;
      }
    });
  }
  //  banner-slider
  $(".banner-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    prevArrow: " <button type='button' class='slick-prev'><i class='fas fa-angle-left'></i></button>",
    nextArrow: " <button type='button' class='slick-next'><i class='fas fa-angle-right'></i></button>",
  });
  // product-slider
  $(".product-slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: " <button type='button' class='slick-prev'><i class='fas fa-angle-left'></i></button>",
    nextArrow: " <button type='button' class='slick-next'><i class='fas fa-angle-right'></i></button>",
    responsive: [{
        breakpoint: 1170,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
  // testimonials slider
  $(".testimonials-slider").slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows:false,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }

    ]
  });
  $(".products-images-nav").slick({
    slidesToShow: 4,
    slidesToScroll: 3,
    arrows: true,
    prevArrow: " <button type='button' class='slick-prev'><i class='fas fa-angle-left'></i></button>",
    nextArrow: " <button type='button' class='slick-next'><i class='fas fa-angle-right'></i></button>",
  });
  // animation while scrolling
  $(".about-right").waypoint(
    function(direction) {
      $(".about-right").addClass("animate__animated animate__fadeInLeft ");
    }, {
      offset: "70%",
    }
  );
  $(".about-left").waypoint(
    function(direction) {
      $(".about-left").addClass("animate__animated animate__fadeInRight ");
    }, {
      offset: "70%",
    }
  );

  $(".trending-section-animated").waypoint(
    function(direction) {
      $(".trending-section-animated").addClass("animate__animated animate__zoomIn");
    }, {
      offset: "70%",
    }
  );
  $(".bag-animated").waypoint(
    function(direction) {
      $(".bag-animated").addClass("animate__animated animate__fadeInLeft ");
    }, {
      offset: "70%",
    }
  );
  $(".shoes-animated").waypoint(
    function(direction) {
      $(".shoes-animated").addClass("animate__animated animate__fadeInRight ");
    }, {
      offset: "70%",
    }
  );
  $(".highlight").waypoint(
    function(direction) {
      $(".highlight").addClass("animate__animated animate__fadeInUp ");
    }, {
      offset: "70%",
    }
  );
  $(".new-arrivals-animated").waypoint(
    function(direction) {
      $(".new-arrivals-animated").addClass("animate__animated animate__zoomIn ");
    }, {
      offset: "70%",
    }
  );
  $(".new-feature").waypoint(
    function(direction) {
      $(".new-feature").addClass("animate__animated animate__fadeInUp ");
    }, {
      offset: "70%",
    }
  );
  $(".men-section").waypoint(
    function(direction) {
      $(".men-section").addClass("animate__animated animate__fadeInTopLeft ");
    }, {
      offset: "70%",
    }
  );
  $(".kid-section").waypoint(
    function(direction) {
      $(".kid-section").addClass("animate__animated animate__fadeInTopRight");
    }, {
      offset: "70%",
    }
  );
  $(".women-section").waypoint(
    function(direction) {
      $(".women-section").addClass("animate__animated animate__fadeInBottomRight");
    }, {
      offset: "70%",
    }
  );
  $(".video-section").waypoint(
    function(direction) {
      $(".video-section").addClass("animate__animated animate__fadeInBottomRight");
    }, {
      offset: "90%",
    }
  );
  $(".testimonal-animated").waypoint(
    function(direction) {
      $(".testimonal-animated").addClass("animate__animated animate__slideInUp");
    }, {
      offset: "90%",
    }
  );
  $(".blog-animated").waypoint(
    function(direction) {
      $(".blog-animated").addClass("animate__animated animate__fadeInLeft");
    }, {
      offset: "70%",
    }
  );
});
// sticky-header
$(window).scroll(function () {
  if ($(window).scrollTop() >= 100) {
      $("header").addClass("sticky-header");
  } else {
      $("header").removeClass("sticky-header");
  }
});


function detectMob() {
  var isMobile = (/iphone|ipod|android|ie|blackberry|fennec/).test(navigator.userAgent.toLowerCase());
  return isMobile;
}


function showMessage(msg_content, msg_type) {
  if (msg_type == 'error') {
    toastr.error(msg_content, 'Error', {
      closeButton: true,
      positionClass: "toast-top-right",
      progressBar: true,
      showDuration:"3000"
    });
  }
  if (msg_type == 'success') {
    toastr.success(msg_content, 'Success', {
      closeButton: true,
      positionClass: "toast-top-right",
      progressBar: true,
      preventDuplicates: 1,
      showDuration:"3000",
    });
  }
}

function showLoggedInMenu(loggedin) {
  if (loggedin == true) {
    $('body').addClass('loggedin');
    $('.popupbtn').hide();
    $('.loggedin_menu').show();
  } else {
    if ($('body').hasClass('loggedin')) {
      $('.popupbtn').hide();
      $('.loggedin_menu').show();
    } else {
      $('.loggedin_menu').hide();
      $('.popupbtn').show();
    }
  }
}

function getDistricts() {
  var baseUrl = $("body").attr('data-siteurl');
  var provience = $('#provience').find(":selected").val();
  var getDistrictsUrl = baseUrl + "/getDistricts?state_id=" + provience;
  $.get(getDistrictsUrl, function(data) {
    $('#district').html(data.district_options);
  }, 'json');
}

function inrNumberFormat(price_string) {
  var x = price_string.toString();
  var lastThree = x.substring(x.length - 3);
  var otherNumbers = x.substring(0, x.length - 3);
  if (otherNumbers != '')
    lastThree = ',' + lastThree;
  var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
  return res;
}

function isCustomerLoggedIn() {
  if (!$('body').hasClass('loggedin')) {
    return false;
  } else {
    return true;
  }
}

//  wow js initialization
var wow = new WOW({
  boxClass: 'wow',
  animateClass: 'animated',
  offset: 0,
  mobile: true,
  live: true,
  callback: function(box) {},
  scrollContainer: null,
  resetAnimation: true,
});
new WOW().init();
