<nav class="nav-dashboard container-fluid navbar navbar-dark bg-dark fixed-top py-3">
  <div class="container-fluid justify-content-start">

    <!-- navbar button -->
    <button class="btn me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- navbar brand -->
    <a class="navbar-brand" href="">Preschool Admin</a>

    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">

      <!-- navbar title -->
      <div class="offcanvas-header pt-4">
        <div class="d-flex ps-3">
          <span><i class="fa-solid fa-user-large fa-xl me-3"></i></span>
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
            <?= htmlspecialchars($_SESSION['uname']) ?>
          </h5>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body p-4 bg-dark">
        <ul class="navbar-nav">
  
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="dashboardx.php"><i class="fa-solid fa-gauge-high me-2"></i>Dashboard</a>
          </li>
          
          <?php if ($_SESSION['utype'] == 1) { ?>

          <!--sub-admin dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-users me-2"></i>Sub-Admins</a>
            <ul class="dropdown-menu dropdown-menu">
              <li><a class="dropdown-item" href="add-subadmin.php">
                <i class="fa-solid fa-right-from-bracket me-1"></i>Add</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="manage-subadmins.php">
                <i class="fa-solid fa-right-from-bracket me-1"></i>Manage</a></li>
            </ul>
          </li>

          <?php }?>

          <!-- teachers dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-users me-2"></i>Teachers</a>
            <ul class="bg-white dropdown-menu">
              <li><a class="dropdown-item" href="add-teacher.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>Add</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="manage-teachers.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>Manage</a></li>
            </ul>
          </li>

          <!-- classes dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-table-columns me-2"></i>
              Classes
            </a>
            <ul class="bg-white dropdown-menu">
              <li><a class="dropdown-item" href="add-class.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>Add</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="manage-classes.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>Manage</a></li>
            </ul>
          </li>

          <!-- enrollment dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user-graduate me-2"></i>
              Enrollments
            </a>
            <ul class="bg-white dropdown-menu">
              <li><a class="dropdown-item" href="new-enrollments.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>New</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="accepted-enrollments.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>Accepted</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="rejected-enrollments.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>Rejected</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="all-enrollments.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>All</a></li>
            </ul>
          </li>

          <!-- visitor dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-building-user me-2"></i>
              Visitors
            </a>
            <ul class="bg-white dropdown-menu">
              <li><a class="dropdown-item" href="new-visitors.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>New</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="visited-visitors.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>Visited</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="not-visited-visitors.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>Not Visited</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="all-visitors.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>All</a></li>
            </ul>
          </li>

          <!-- pages dropdown -->
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-file-lines me-2"></i>
              Pages
            </a>
            <ul class="bg-white dropdown-menu">
              <li><a class="dropdown-item" href="edit-aboutus.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>About Us</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="edit-contactus.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>Contact Us</a></li>
            </ul>
          </li> -->

          <!-- account settings -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user-gear me-2"></i>
              Account Settings
            </a>
            <ul class="bg-white dropdown-menu">
              <li><a class="dropdown-item" href="edit-profile.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>Profile</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="change-password.php">
              <i class="fa-solid fa-right-from-bracket me-1"></i>Change Password</a></li>
              <li>
                <hr class="dropdown-divider border">
              </li>
              <li><a class="dropdown-item" href="logout.php">
              <i class="fa-solid fa-power-off me-1"></i>Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>

    </div>
  </div>
</nav>