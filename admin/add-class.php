<?php
# validating session
require_once './php/config/sessions.php';

# db connection
require_once './php/config/db_connect.php';

# add class
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $tid = $_POST['teacher'];
  $cname = $_POST['classname'];
  $agegroup = $_POST['agegroup'];
  $classtiming = $_POST['classtiming'];
  $capacity = $_POST['capacity'];
  $addedby = $_SESSION['uname'];
  $profilepic = $_FILES["profilepic"]["name"];

  # get the image extension
  $extension = substr($profilepic, strlen($profilepic) - 4, strlen($profilepic));

  # allowed extensions
  $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

  # validation for allowed extensions .in_array() function searches an array for a specific value.
  if (!in_array($extension, $allowed_extensions)) {
    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed')</script>";
  } else {
    # rename the image file
    $newprofilepic = md5($profilepic) . time() . $extension;

    # move image into directory
    move_uploaded_file($_FILES["profilepic"]["tmp_name"], "classpic/" . $newprofilepic);

    $query = mysqli_query($conn, "INSERT INTO tblclasses (teacherId,className,ageGroup,classTiming,capacity,classPic,AddedBy) VALUES ('$tid','$cname','$agegroup','$classtiming','$capacity','$newprofilepic','$addedby')");

    # check if data saved to db
    if ($query) {
      echo "<script>alert('Class added successfully!')</script>";
      echo "<script> document.location = 'add-class.php'</script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again.')</script>";
    }
  }
} # end of post method

# query & display teacher's details
$query = mysqli_query($conn, "SELECT id,fullName,teacherSubject FROM tblteachers");

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

  <section class="container py-5">
    <div class="container">

      <!-- header -->
      <div class="pt-5 pb-3 d-flex justify-content-between">
        <h3>Add Class</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item breadcrumb-dashboard"><a href="dashboardx.php">Home</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page">Add Class</li>
        </ol>
      </div>

      <!-- form add class -->
      <div class="subadmin-form card">
        <div class="card-header bg-primary">
          <h5 class="text-white card-title">Fill the Info</h5>
        </div>

        <form method="post" enctype="multipart/form-data">
          <div class="card-body">

            <!-- select teacher--->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label">Teacher</label>
              <select class="form-select" id="teacher" name="teacher" required>
                <option value="">Select Teacher</option>
                <?php while ($row = mysqli_fetch_array($query)) { ?>
                  <option value="<?= $row['id'] ?>">
                    <?= $row['fullName'] ?>-(<?= $row['teacherSubject'] ?>)
                  </option>
                <?php } ?>
              </select>
            </div>

            <!-- class name---->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label">Class Name</label>
              <input type="text" class="form-control" id="classname" name="classname" placeholder="Class name e.g: Drawing, Dance, English" value="<?= htmlspecialchars($cname ?? '')?>" autocomplete="off" required>
            </div>

            <!-- select age--->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label">Age Group</label>
              <select class="form-select" id="agegroup" name="agegroup" required>
                <option value="">Select Age</option>
                <option value="18 Month - 2 Year">18 Month - 2 Year</option>
                <option value="2-3 Year">2-3 Year</option>
                <option value="3-4 Year">3-4 Year</option>
                <option value="4-5 Year">4-5 Year</option>
                <option value="5-6 Year">5-6 Year</option>
              </select>
            </div>

            <!-- select class timing -->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label">Class Timing</label>
              <select class="form-select" id="classtiming" name="classtiming" required>
                <option value="">Select Class Timing</option>
                <option value="8-9 AM">8-9 AM</option>
                <option value="9-10 AM">9-10 AM</option>
                <option value="10-11 AM">10-11 AM</option>
                <option value="11-12 PM">11-12 PM</option>
                <option value="12-1 PM">12-1 PM</option>
                <option value="1-2 PM">1-2 PM</option>
                <option value="2-3 PM">2-3 PM</option>
                <option value="3-4 PM">3-4 PM</option>
                <option value="4-5 PM">4-5 PM</option>
              </select>
            </div>

             <!-- select class capacity -->
             <div class="form-group mb-3 fw-medium">
              <label class="form-label">Class Capacity</label>
              <select class="form-select" id="capacity" name="capacity" required>
                <option value="">Select Class Capacity</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="35">35</option>
                <option value="40">40</option>
                <option value="45">45</option>
                <option value="50">50</option>
              </select>
            </div>

            <!-- class pic -->
            <div class="form-group">
              <label class="form-label fw-medium" for="exampleInputFile">Class Pic</label>
              <p class="form-text text-danger">(Only jpg / jpeg/ png /gif format allowed)</p>
              <div>
                <input type="file" class="form-control" id="profilepic" name="profilepic" required="true">
              </div>
            </div>


          </div>

          <!-- submit button -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
          </div>
          
        </form>
      </div>

    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>

</html>