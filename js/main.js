(function ($) {
  "use strict";

  // Spinner
  var spinner = function () {
    setTimeout(function () {
      if ($("#spinner").length > 0) {
        $("#spinner").removeClass("show");
      }
    }, 1);
  };
  spinner();

  // Initiate the wowjs
  new WOW().init();

  // Sticky Navbar
  function handleScroll() {
    const isWideScreen = window.innerWidth < 991;
    const isScrolled = $(window).scrollTop() > 45;

    if (isScrolled) {
      $(".navbar").addClass("sticky-top shadow-sm");
      if (!isWideScreen) {
        $(".btn-outline-light").toggleClass(
          "btn-outline-light btn-outline-dark"
        );
      } else {
        $(".btn-outline-light").toggleClass(
          "btn-outline-light btn-outline-dark"
        );
      }
      $("#main").hide();
      $("#second").show();
    } else {
      $(".navbar").removeClass("sticky-top shadow-sm");
      if (!isWideScreen) {
        $(".btn-outline-dark").toggleClass(
          "btn-outline-dark btn-outline-light"
        );
      } else {
        $(".btn-outline-light").toggleClass(
          "btn-outline-light btn-outline-dark"
        );
      }
      $("#main").toggle(!isWideScreen);
      $("#second").toggle(isWideScreen);
    }
  }

  $(document).ready(handleScroll);
  $(window).scroll(handleScroll);

  // Facts counter
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 2000,
  });

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 250) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 20, "easeInOutExpo");
    return false;
  });

  // Testimonials carousel
  $(".testimonial-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1500,
    dots: true,
    loop: true,
    center: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 3,
      },
    },
  });
})(jQuery);
