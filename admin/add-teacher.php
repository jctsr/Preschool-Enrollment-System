<?php 
# validating session
require_once './php/config/sessions.php';

# db connection
require_once './php/config/db_connect.php';

# add new teacher
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $fname = $_POST['fullname'];
  $email = $_POST['email'];
  $mobileno = $_POST['mobilenumber'];
  $tsubject = $_POST['tsubject'];
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
    move_uploaded_file($_FILES["profilepic"]["tmp_name"], "teacherspic/" . $newprofilepic);

    $query = mysqli_query($conn, "INSERT INTO tblteachers (fullName,teacherEmail,teacherMobileNo,teacherSubject,teacherPic,AddedBy) VALUES ('$fname','$email','$mobileno','$tsubject','$newprofilepic','$addedby')");

    # check if data saved to db
    if ($query) {
      echo "<script>alert('Teacher added successfully.')</script>";
      echo "<script> document.location = 'add-teacher.php'</script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again.')</script>";
    }

  }

}# end of post method

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

  <!-- form create sub-admin -->
  <section class="container py-5">
    <div class="container">

      <!-- header -->
      <div class="pt-5 pb-3 d-flex justify-content-between">
        <h3>Add Teacher</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item breadcrumb-dashboard"><a href="dashboardx.php">Home</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page">Add Teacher</li>
        </ol>
      </div>

      <!-- form add teacher-->
      <div class="subadmin-form card">
        <div class="card-header bg-primary">
          <h5 class="text-white card-title">Fill the Info</h5>
        </div>

        <form method="post" enctype="multipart/form-data">
          <div class="card-body">

            <!-- Teacher Full Name--->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="exampleInputFullname">Full Name</label>
              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Teacher Full Name" autocomplete="off" required>
            </div>

            <!-- Teacher Email---->
            <div class="form-group mb-3 fw-medium">
              <labe class="form-label" for="exampleInputEmail1">Email Address</labe>
              <input type="email" class="form-control" id="emailid" name="email" placeholder="Enter Email" autocomplete="off" required>
            </div>

            <!-- Teacher Contact Number---->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="text">Mobile Number</label>
              <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" pattern="[0-9]{10}" title="10 numeric characters only" autocomplete="off" required>
            </div>

            <!---Teacher Subject--->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="exampleInputPassword1">Subject</label>
              <input type="text" class="form-control" id="tsubject" name="tsubject" placeholder="Enter Subject" required>
            </div>

            <!-- Teacher profile pic -->
            <div class="form-group">
              <label class="form-label fw-medium" for="exampleInputFile">Profile Pic</label>
              <p class="form-text text-danger">(Only jpg / jpeg/ png /gif format allowed)</p>
              <p class="form-text text-danger">(Picture size: 400x700 recommended)</p>
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