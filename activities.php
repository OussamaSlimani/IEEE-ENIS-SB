<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>IEEE ENIS Student Branch</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="IEEE, ieee enis, National School of Engineers in Sfax, engineering, creativity, association, communication, training, competitions" name="keywords" />

  <meta content="Established in 2009, the IEEE branch at the National School of Engineers in Sfax fosters student motivation, creativity, association, and communication skills. It offers training sessions and competitions across various engineering disciplines." name="description" />

  <!-- Favicon -->
  <link href="img/favicon.png" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Meow+Script&display=swap" rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link href="lib/animate/animate.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner"></div>
  </div>
  <!-- Spinner End -->

  <!-- ==================== WEBSITE CONTENT START ==================== -->

  <!-- ==========  Navbar Start ========== -->
  <div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark py-3 py-lg-0">
      <a href="index.html" class="navbar-brand p-0">
        <img id="main" src="img/Logo/enis-sb-light.png" alt="Logo" style="height: 42px" />
        <img id="second" src="img/Logo/enis-sb.png" alt="logo-white" style="height: 42px; display: none" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
      </button>

      <!-- links -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
          <a href="index.html" class="nav-item nav-link">Home</a>
          <a href="about.html" class="nav-item nav-link">About</a>
          <a href="chapters.html" class="nav-item nav-link">Chapters</a>
          <a href="activities.html" class="nav-item nav-link active">Activities & Awards</a>
          <a href="upcoming.html" class="nav-item nav-link">Our upcoming</a>
          <a href="contact.html" class="nav-item nav-link">Contact</a>
        </div>

        <div class="col-lg-3 text-center text-lg-end">
          <div class="d-inline-flex align-items-center">
            <!-- Login Button -->
            <button href="#" class="btn btn-primary py-2 px-4 m-3">
              Login
            </button>
            <!-- Dark Mode Toggle Button -->
            <button id="darkModeToggleBtn" onclick="toggleDarkMode()" class="btn btn-outline-light btn-square rounded-circle me-2 dark-mode-toggle">
              <i id="darkModeIcon" class="fas"></i>
            </button>
          </div>
        </div>
      </div>
    </nav>
    <!-- banner start -->
    <div class="container-fluid bg-primary py-5 bg-dark" style="margin-bottom: 90px">
      <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
          <h1 class="display-4 text-white animated zoomIn">
            Activities & Awards
          </h1>
          <a href="" class="h5 text-white">Take a look at what we've achieved so far!</a>
        </div>
      </div>
    </div>
    <!-- banner end -->
  </div>
  <!-- ==========  Navbar End ========== -->

  <!-- ==========  Animation toggle the mode  ========== -->
  <div class="change-mode-animation-container d-none animated fadeIn">
    <div class="change-mode-animation"></div>
  </div>
  <!-- ========== Animation toggle the mode ========== -->

  <?php
  // API URL
  $url = "https://events.vtools.ieee.org/RST/events/api/public/v4/events/list?limit=3000&?delta=now-6.months&category_id=2,3&span=now-6.months~&sort=-created-on";
  // List of spoids to filter events
  $chapters = array(
    "STB03301" => array(
      "name" => "ENIS SB",
      "sm_logo_path" => "img\logo-sm\sb.png",
    ),
    "SBA03301" => array(
      "name" => "WIE ENIS SAG",
      "sm_logo_path" => "img\logo-sm\wie.png",
    ),
    "SBC03301A" => array(
      "name" => "AESS ENIS SBC",
      "sm_logo_path" => "img\logo-sm\aess.png",
    ),
    "SBC03301B" => array(
      "name" => "CS ENIS SBC",
      "sm_logo_path" => "img\logo-sm\cs.png",
      "border1" => "border-orange-radius-2",
    ),
    "SBC03301H" => array(
      "name" => "IAS ENIS SBC",
      "sm_logo_path" => "img\logo-sm\ias.png",
    ),
    "SBC03301L" => array(
      "name" => "SSCS ENIS SBC",
      "sm_logo_path" => "img\logo-sm\sscs.png",
    ),
    "SBC03301E" => array(
      "name" => "RAS ENIS SBC",
      "sm_logo_path" => "img/logo-sm/ras.png"
    ),
    "SBC03301G" => array(
      "name" => "CIS ENIS SBC",
      "sm_logo_path" => "img\logo-sm\cis.png",
    ),
    "SBC03301J" => array(
      "name" => "PES ENIS SBC",
      "sm_logo_path" => "img\logo-sm\pes.png",
    ),
    "SBC03301D" => array(
      "name" => "EMBS ENIS SBC",
      "sm_logo_path" => "img/logo-sm/embs.png",
    )
  );

  $categories = array(
    "1" => "Professional",
    "2" => "Technical",
    "3" => "Nontechnical",
    "4" => "Administrative",
    "5" => "Humanitarian",
    "6" => "Pre-U STEM Program"
  );

  // Fetch data from the API
  $response = file_get_contents($url);
  if ($response !== false) {
    $data = json_decode($response, true);
  } else {
    $data = null;
  }

  function extract_clean_text($html)
  {
    // Create a DOMDocument object
    $dom = new DOMDocument();

    // Load HTML content
    $dom->loadHTML($html);

    // Create a DOMXPath object
    $xpath = new DOMXPath($dom);

    // Remove all script tags
    $scripts = $xpath->query('//script');
    foreach ($scripts as $script) {
      $script->parentNode->removeChild($script);
    }

    // Remove all style tags
    $styles = $xpath->query('//style');
    foreach ($styles as $style) {
      $style->parentNode->removeChild($style);
    }

    // Remove all image tags
    $images = $xpath->query('//img');
    foreach ($images as $image) {
      $image->parentNode->removeChild($image);
    }

    // Extract text content
    $text = $dom->textContent;

    // Clean up extra whitespaces and newlines
    $text = preg_replace('/\s+/', ' ', $text);
    $text = trim($text);

    return substr($text, 0, 200) . "...";
  }



  $current_date = date('Y-m-d');
  ?>
  <!-- ======= Activities Start ======= -->
  <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-3">
      <div class="row g-5">
        <?php
        if ($data !== null && isset($data['data'])) :
          foreach ($data['data'] as $event) :
            if (isset($event['attributes']['primary-host']['spoid']) && array_key_exists($event['attributes']['primary-host']['spoid'], $chapters) &&  $current_date > substr($event['attributes']['start-time'], 0, 10)) :
        ?>
              <!-- ========== -->
              <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="container p-4  border border-primary-radius-2">
                  <div class="border-bottom border-primary p-1 mb-4 d-flex justify-content-between align-items-center">
                    <div style="max-width: 80%;">
                      <h4 class="text-dark"><?php echo $event['attributes']['title']; ?></h4>
                      <p class="text-dark">By <?php echo $chapters[$event['attributes']['primary-host']['spoid']]['name'] ?> </p>
                    </div>
                    <div class="circle d-flex justify-content-center align-items-center">
                      <img src="<?php echo $chapters[$event['attributes']['primary-host']['spoid']]['sm_logo_path'] ?>" alt="" />
                    </div>
                  </div>
                  <p class="act-description text-dark">
                    <?php echo extract_clean_text($event['attributes']['description']); ?>
                  </p>
                  <div class="d-flex justify-content-between">
                    <p class="text-dark">
                      <i class="fa fa-folder me-2"></i>Category
                    </p>
                    <p class="text-dark"><?php echo $categories[$event['relationships']['category']['data']['id']]; ?></p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-dark"><i class="fa fa-calendar me-2"></i>Date</p>
                    <p class="text-dark"><?php echo substr($event['attributes']['start-time'], 0, 10); ?></p>
                  </div>
                  <div class="d-flex justify-content-between mb-2">
                    <p class="text-dark">
                      <i class="fa fa-map-marker-alt me-2"></i>Location Type
                    </p>
                    <p class="text-dark">
                      <?php
                      if ($event['attributes']['location-type'] === "virtual") {
                        echo "Virtual";
                      } else {

                        echo "Physical";
                      }
                      ?>
                    </p>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="<?php echo $event['attributes']['link']; ?> " target="_blank" class="btn btn-primary mt-1">Vtools Link</a>
                  </div>
                </div>
              </div>
              <!-- ========== -->
        <?php
            endif;
          endforeach;
        endif;
        ?>
      </div>
    </div>
  </div>
  <!-- ======= Activities End  =======-->



  <!-- ========== Footer Start ========== -->
  <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp border-footer" data-wow-delay="0.1s">
    <div class="container">
      <div class="row gx-5">
        <div class="col-lg-4 col-md-6 footer-about">
          <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
            <a href="index.html" class="navbar-brand">
              <img src="img/Logo/enis-sb-light.png" alt="logo-white" style="width: 150px" />
            </a>
            <p class="mt-3 mb-4 text-white">
              Since 2009, the IEEE branch has been founded at the National
              School of Engineers in Sfax. Its main aim is to motivate
              students, inspire them to support their creativity, foster their
              associative spirit, and communication skills, as well as to
              attend training sessions and competitions in various engineering
              fields.
            </p>
          </div>
        </div>
        <div class="col-lg-8 col-md-6">
          <div class="row gx-5">
            <div class="col-lg-5 col-md-12 pt-5 mb-5">
              <div class="section-title section-title-sm position-relative pb-3 mb-4">
                <h3 class="text-white mb-0">Get In Touch</h3>
              </div>
              <div class="d-flex mb-2">
                <i class="bi bi-geo-alt text-primary me-2"></i>
                <p class="mb-0 text-white">
                  ENIS, Soukra Road km 3, BP 1173, Sfax, Tunisia.
                </p>
              </div>
              <div class="d-flex mb-2">
                <i class="bi bi-envelope-open text-primary me-2"></i>
                <p class="mb-0 text-white">sb.enis@ieee.org</p>
              </div>
              <div class="d-flex mb-2">
                <i class="bi bi-telephone text-primary me-2"></i>
                <p class="mb-0 text-white">+216 26 589 540</p>
              </div>
              <div class="d-flex mt-4">
                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-md-12 pt-0 pt-lg-5 mb-5">
              <div class="section-title section-title-sm position-relative pb-3 mb-4">
                <h3 class="text-white mb-0">Quick Links</h3>
              </div>
              <div class="link-animated d-flex flex-column justify-content-start">
                <a class="text-white mb-2" href="index.html"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                <a class="text-white mb-2" href="about.html"><i class="bi bi-arrow-right text-primary me-2"></i>About</a>
                <a class="text-white mb-2" href="chapters.html"><i class="bi bi-arrow-right text-primary me-2"></i>Chapters</a>
                <a class="text-white mb-2" href="activities.html"><i class="bi bi-arrow-right text-primary me-2"></i>Activities & Awards</a>
                <a class="text-white mb-2" href="upcoming.html"><i class="bi bi-arrow-right text-primary me-2"></i>Our
                  Upcoming</a>
                <a class="text-white mb-2" href="contact.html"><i class="bi bi-arrow-right text-primary me-2"></i>Our
                  Contact</a>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
              <div class="section-title section-title-sm position-relative pb-3 mb-4">
                <h3 class="text-white mb-0">Other Links</h3>
              </div>
              <div class="link-animated d-flex flex-column justify-content-start">
                <a class="text-white mb-2" href="about.html#team"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The
                  Team</a>
                <a class="text-white mb-2" href="index.html#register"><i class="bi bi-arrow-right text-primary me-2"></i>Resgister Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid text-white" style="background: #061429">
    <div class="container text-center">
      <div class="row justify-content-end">
        <div class="col-lg-8 col-md-6">
          <div class="d-flex align-items-center justify-content-center text-white mt-1" style="height: 75px">
            <p class="px-2">
              Copyright &copy; All Rights Reserved. Developed and designed by
              <a href="https://www.linkedin.com/in/oussama-slimani/" target="_blank">Oussama SLIMANI</a>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ========== Footer End ========== -->

  <!-- ==================== WEBSITE CONTENT END ==================== -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
    <div class="p-1"></div>
    <i class="bi bi-arrow-up"></i>
  </a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>