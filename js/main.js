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

  // Chapters carousel
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

  // teams carousel
  $(".teams-carousel").owlCarousel({
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

  // event carousel
  $(".event-carousel").owlCarousel({
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
        items: 1,
      },
      992: {
        items: 1,
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

/* ================= Toggle dark/night mode ============== */
function toggleDarkMode() {
  const body = document.body;
  const isDarkMode = !body.classList.contains("dark-mode");
  body.classList.toggle("dark-mode", isDarkMode);
  updateTextColors(isDarkMode);
  updateIcon(isDarkMode);
  localStorage.setItem("darkMode", isDarkMode);
  const changeModeAnimationContainer = document.querySelector(
    ".change-mode-animation-container"
  );
  changeModeAnimationContainer.classList.remove("d-none");
  setTimeout(() => {
    changeModeAnimationContainer.classList.add("d-none");
  }, 2000);
}
function updateTextColors(isDarkMode) {
  const textElements = document.querySelectorAll(".text-dark, .text-light");
  textElements.forEach((element) => {
    if (isDarkMode) {
      element.classList.replace("text-dark", "text-light");
    } else {
      element.classList.replace("text-light", "text-dark");
    }
  });
}
function updateIcon(isDarkMode) {
  const icon = document.getElementById("darkModeIcon");
  if (isDarkMode) {
    icon.classList.remove("fa-moon");
    icon.classList.add("fa-sun");
  } else {
    icon.classList.remove("fa-sun");
    icon.classList.add("fa-moon");
  }
}

const savedDarkMode = localStorage.getItem("darkMode");
if (savedDarkMode) {
  const isDarkMode = savedDarkMode === "true";
  document.body.classList.toggle("dark-mode", isDarkMode);
  updateTextColors(isDarkMode);
  updateIcon(isDarkMode);
}

// countdown

// Function to calculate and update countdown
function updateCountdown(targetDate) {
  // Get the target date
  var targetTime = new Date(targetDate).getTime();

  // Update the countdown every second
  var countdownInterval = setInterval(function () {
    // Get the current date and time
    var currentTime = new Date().getTime();

    // Calculate the difference in milliseconds
    var difference = targetTime - currentTime;

    // Check if the target date has passed
    if (difference <= 0) {
      clearInterval(countdownInterval); // Clear the interval
      document.getElementById("countdown").innerHTML = "Event has passed"; // Update the message
      return;
    }

    // Calculate days, hours, minutes, and seconds
    var days = Math.floor(difference / (1000 * 60 * 60 * 24));
    var hours = Math.floor(
      (difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((difference % (1000 * 60)) / 1000);

    // Update the countdown display
    document.getElementById("countdown").innerHTML =
      days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
  }, 1000); // Update every second
}
