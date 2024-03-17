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
      $(".navbar").addClass("sticky-top shadow-sm  animated slideInDown");
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
      $(".navbar").removeClass("sticky-top shadow-sm  animated slideInDown");
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

  // Vendor carousel
  $(".chapters-carousel").owlCarousel({
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 1000,
    dots: true,
    loop: true,
    center: true,
    responsive: {
      0: {
        items: 2,
      },
      576: {
        items: 2,
      },
      768: {
        items: 3,
      },
      992: {
        items: 5,
      },
    },
  });

  // Testimonials carousel
  $(".testimonial-carousel").owlCarousel({
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 1000,
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

// Function to toggle dark mode
function toggleDarkMode() {
  const body = document.body;
  const darkModeIcon = document.getElementById("darkModeIcon");

  // Check the current mode
  const isDarkMode = body.classList.contains("dark-mode");

  // Toggle the dark mode class on the body
  body.classList.replace("light-mode", "dark-mode");

  // Update the Font Awesome icon and body class based on the current mode
  if (isDarkMode) {
    darkModeIcon.className = "fas fa-sun animated bounceIn";
    body.classList.replace("dark-mode", "light-mode");
  } else {
    darkModeIcon.className = "fas fa-moon animated bounceIn";
    body.classList.replace("light-mode", "dark-mode");
  }

  // Remove the bounceIn class after the animation completes
  darkModeIcon.addEventListener(
    "animationend",
    () => {
      darkModeIcon.classList.remove("animated", "bounceIn");
    },
    { once: true }
  );

  // Store the user's preference in localStorage
  localStorage.setItem("darkMode", !isDarkMode);
}

// Check user's preference from localStorage on page load
const savedDarkMode = localStorage.getItem("darkMode");
if (savedDarkMode) {
  document.body.classList.toggle("dark-mode", savedDarkMode === "true");

  // Update the Font Awesome icon based on the saved mode
  const darkModeIcon = document.getElementById("darkModeIcon");
  darkModeIcon.className =
    savedDarkMode === "true" ? "fas fa-moon" : "fas fa-sun";
}
