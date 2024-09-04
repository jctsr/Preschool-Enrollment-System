<?php
# validating session
require_once './php/config/sessions.php';

#db connection
require_once './php/config/db_connect.php';

# Function to get the total count from a table
function getTotalCount($conn, $table, $condition = null) {
  $query = "SELECT COUNT(*) as total FROM $table";
  if (!empty($condition)) {
      $query .= " WHERE $condition";
  }

  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  return $row['total'];
}

# Example usage
$subAdminTotal = getTotalCount($conn, 'tbladmin', 'UserType = 0');
$teacherTotal = getTotalCount($conn, 'tblteachers');
$classTotal = getTotalCount($conn, 'tblclasses');
$enrollTotal = getTotalCount($conn, 'tblenrollment');
$newEnrollTotal = getTotalCount($conn, 'tblenrollment', "(enrollStatus='' OR enrollStatus IS NULL)");
$acceptedEnrollTotal = getTotalCount($conn, 'tblenrollment', "enrollStatus = 'Accepted'");
$rejectedEnrollTotal = getTotalCount($conn, 'tblenrollment', "enrollStatus = 'Rejected'");
$visitorTotal = getTotalCount($conn, 'tblvisitor');
$newVisitorTotal = getTotalCount($conn, 'tblvisitor', "(status='' OR status IS NULL)");
$visitedVisitorTotal = getTotalCount($conn, 'tblvisitor', "status = 'Visited'");
$notVisitedTotal = getTotalCount($conn, 'tblvisitor', "status = 'Not-Visited'");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../styles/style.css">
  <title>Preschool Enrollment System</title>
  <link rel="icon" type="image/x-icon" href="../img/preschool.ico">
</head>

<body class="bg-light">

  <!-- navbar -->
  <?php include './templates/navbarx.php' ?>

  <!-- dashboard display -->
  <section class="container py-5">
    <div class="container">

      <!-- header -->
      <div class="pt-5 pb-3 d-flex justify-content-between">
        <h3>Dashboard</h3>  
        <ol class="breadcrumb">
          <li class="breadcrumb-item breadcrumb-dashboard"><a href="dashboardx.php">Home</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page">Dashboard</li>
        </ol>
      </div>

      <div class="row g-4">

        <?php if ($_SESSION['utype'] == 1) { ?>
        <!-- total sub admins -->
        <div class="col-6 col-md-4">
          <div class="card d-flex justify-content-center wow bounceInUp">
            <div class="card-header text-center fw-medium">Sub Admins</div>
            <div class="text-white card-body d-grid bg-primary">
              <h1 class="card-title text-center mt-4 mb-4"><b><?= htmlspecialchars($subAdminTotal) ?></b>
                <i class="fa-solid fa-user ms-2"></i>
              </h1>
            </div>
            <div class="btn card-footer fw-medium">
              <a class="link-dark link-underline link-underline-opacity-0" href="manage-subadmins.php">More info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <?php } ?>

        <!-- total teachers -->
        <div class="col-6 col-md-4">
          <div class="card d-flex justify-content-center wow bounceInUp">
            <div class="card-header text-center fw-medium">Teachers</div>
            <div class="text-white bg-success card-body d-grid">
              <h1 class="card-title text-center mt-4 mb-4"><b><?= htmlspecialchars($teacherTotal) ?></b>
                <i class="fa-solid fa-user ms-2"></i>
              </h1>
            </div>
            <div class="btn card-footer fw-medium">
              <a class="link-dark link-underline link-underline-opacity-0" href="manage-teachers.php">More info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- total classes -->
        <div class="col-6 col-md-4">
          <div class="card d-flex justify-content-center wow bounceInUp">
            <div class="card-header text-center fw-medium">Classes</div>
            <div class="text-white bg-warning card-body d-grid">
              <h1 class="card-title text-center mt-4 mb-4"><b><?= htmlspecialchars($classTotal) ?></b>
                <i class="fa-solid fa-user ms-2"></i>
              </h1>
            </div>
            <div class="btn card-footer fw-medium">
              <a class="link-dark link-underline link-underline-opacity-0" href="manage-classes.php">More info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- total enrollments -->
        <div class="col-6 col-md-3">
          <div class="card d-flex justify-content-center wow bounceInUp">
            <div class="card-header text-center fw-medium">Total Enrollments</div>
            <div class="text-white bg-primary card-body d-grid">
              <h1 class="card-title text-center mt-4 mb-4"><b><?= htmlspecialchars($enrollTotal) ?></b>
                <i class="fa-solid fa-user ms-2"></i>
              </h1>
            </div>
            <div class="btn card-footer fw-medium">
              <a class="link-dark link-underline link-underline-opacity-0" href="all-enrollments.php">More info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- new enrollments  -->
        <div class="col-6 col-md-3">
          <div class="card d-flex justify-content-center wow bounceInUp">
            <div class="card-header text-center fw-medium">New Enrollments</div>
            <div class="text-white bg-warning card-body d-grid">
              <h1 class="card-title text-center mt-4 mb-4"><b><?= htmlspecialchars($newEnrollTotal) ?></b>
                <i class="fa-solid fa-user ms-2"></i>
              </h1>
            </div>
            <div class="btn card-footer fw-medium">
              <a class="link-dark link-underline link-underline-opacity-0" href="new-enrollments.php">More info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- accepted enrollments  -->
        <div class="col-6 col-md-3">
          <div class="card d-flex justify-content-center wow bounceInUp">
            <div class="card-header text-center fw-medium">Accepted Enrollments</div>
            <div class="text-white bg-success card-body d-grid">
              <h1 class="card-title text-center mt-4 mb-4"><b><?= htmlspecialchars($acceptedEnrollTotal) ?></b>
                <i class="fa-solid fa-user ms-2"></i>
              </h1>
            </div>
            <div class="btn card-footer fw-medium">
              <a class="link-dark link-underline link-underline-opacity-0" href="accepted-enrollments.php">More info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- rejected enrollments  -->
        <div class="col-6 col-md-3">
          <div class="card d-flex justify-content-center wow bounceInUp">
            <div class="card-header text-center fw-medium">Rejected Enrollments</div>
            <div class="text-white bg-danger card-body d-grid">
              <h1 class="card-title text-center mt-4 mb-4"><b><?= htmlspecialchars($rejectedEnrollTotal) ?></b>
                <i class="fa-solid fa-user ms-2"></i>
              </h1>
            </div>
            <div class="btn card-footer fw-medium">
              <a class="link-dark link-underline link-underline-opacity-0" href="rejected-enrollments.php">More info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- total visitors  -->
        <div class="col-6 col-md-3">
          <div class="card d-flex justify-content-center wow bounceInUp">
            <div class="card-header text-center fw-medium">Total Visitors</div>
            <div class="text-white bg-secondary card-body d-grid">
              <h1 class="card-title text-center mt-4 mb-4"><b><?= htmlspecialchars($visitorTotal) ?></b>
                <i class="fa-solid fa-user ms-2"></i>
              </h1>
            </div>
            <div class="btn card-footer fw-medium">
              <a class="link-dark link-underline link-underline-opacity-0" href="all-visitors.php">More info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- new visitors  -->
        <div class="col-6 col-md-3">
          <div class="card d-flex justify-content-center wow bounceInUp">
            <div class="card-header text-center fw-medium">New Visitors</div>
            <div class="text-white bg-warning card-body d-grid">
              <h1 class="card-title text-center mt-4 mb-4"><b><?= htmlspecialchars($newVisitorTotal) ?></b>
                <i class="fa-solid fa-user ms-2"></i>
              </h1>
            </div>
            <div class="btn card-footer fw-medium">
              <a class="link-dark link-underline link-underline-opacity-0" href="new-visitors.php">More info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- visited visitors  -->
        <div class="col-6 col-md-3">
          <div class="card d-flex justify-content-center wow bounceInUp">
            <div class="card-header text-center fw-medium">Visited Visitors</div>
            <div class="text-white bg-success card-body d-grid">
              <h1 class="card-title text-center mt-4 mb-4"><b><?= htmlspecialchars($visitedVisitorTotal) ?></b>
                <i class="fa-solid fa-user ms-2"></i>
              </h1>
            </div>
            <div class="btn card-footer fw-medium">
              <a class="link-dark link-underline link-underline-opacity-0" href="visited-visitors.php">More info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- not visited visitors  -->
        <div class="col-12 col-md-3">
          <div class="card d-flex justify-content-center wow bounceInUp">
            <div class="card-header text-center fw-medium">Not Visited Visitors</div>
            <div class="text-white bg-danger card-body d-grid">
              <h1 class="card-title text-center mt-4 mb-4"><b><?= htmlspecialchars($notVisitedTotal) ?></b>
                <i class="fa-solid fa-user ms-2"></i>
              </h1>
            </div>
            <div class="btn card-footer fw-medium">
              <a class="link-dark link-underline link-underline-opacity-0" href="not-visited-visitors.php">More info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>


      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>

</html>