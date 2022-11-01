  <!-- ======= Top Bar ======= -->
  <!-- <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@example.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section> -->

  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Green</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="<?php echo BASE_URL?>">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="<?php echo BASE_URL . 'form.php' ?>">Add Email</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

          <li class="dropdown">
            <?php if (isset($_SESSION['id'])): ?>
            <a href="#"><span><?php echo $_SESSION['name']; ?></span> 
              <i class="bi bi-chevron-down"></i></a>
              <ul>
                <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2): ?>
                  <li><a href="<?php echo BASE_URL . 'admin/admin.php'?>">Admin</a></li>
                <?php endif; ?>
                <li><a href="<?php echo BASE_URL . 'app/controllers/do_logout.php'?>">Logout</a></li>
              </ul>
              <?php else: ?>
                <li><a class="getstarted scrollto" href="<?php echo BASE_URL . 'views/register.php'?>">Sign in</a></li>
              <?php endif; ?>
          </li>


          <!-- <li><a class="getstarted scrollto" href="views/register.php">Sign in</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->