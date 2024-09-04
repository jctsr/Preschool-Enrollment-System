<?php
# validating session
require_once './php/config/sessions.php';

#db connection
require_once './php/config/db_connect.php';

#function to check if form is not empty
function validate($data)
{
  if (!empty($data)) {
    return $data;
  }
}

#update teacher details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $fname = $_POST['fullname'];
  $email = $_POST['email'];
  $mobileno = $_POST['mobilenumber'];
  $tsubject = $_POST['tsubject'];
  $teacherid = $_GET['tid'];

  if (
    validate($fname) &&
    validate($email) &&
    validate($mobileno) &&
    validate($$tsubject)
  ) {

    #Upodate data to db
    $query = "UPDATE tblteachers SET fullName = '$fname', teacherEmail = '$email', teacherMobileNo = '$mobileno', teacherSubject='$tsubject' WHERE id = '$teacherid'";

    #check if data saved to db
    if (mysqli_query($conn, $query)) {
      echo "<script> alert('Teacher details successfully edited!') </script>";
      echo "<script> document.location = 'manage-teachers.php' </script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again.')</script>";
    }
  } else {
    echo "<script>alert('Form can\\'t be empty!')</script>";
  }

} #end of post method

$teacherid = $_GET['tid'];
$query = "SELECT * FROM tblteachers WHERE id = '$teacherid'";
$result = mysqli_query($conn, $query);
$rows =  mysqli_fetch_all($result, MYSQLI_ASSOC);
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
</head>

<body class="bg-light">

  <!-- navbar -->
  <?php include './templates/navbarx.php' ?>

  <!-- form create sub-admin -->
  <section class="container py-5">
    <div class="container">

      <!-- header -->
      <div class="pt-5 pb-3 d-flex justify-content-between">
        <h3>Edit Teacher Details</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item breadcrumb-dashboard"><a href="dashboardx.php">Home</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page"><a href="manage-teachers.php">Manage Teachers</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page">Edit Teacher Details</li>
        </ol>
      </div>

      <!-- form -->
      <div class="subadmin-form card">
        <div class="card-header bg-primary">
          <h5 class="text-white card-title">Edit the Info</h5>
        </div>

        <form method="post">
          <div class="card-body">

            <?php foreach ($rows as $row) { ?>

              <!-- Teacher Full Name--->
              <div class="form-group mb-3 fw-medium">
                <label class="form-label" for="exampleInputFullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Sub-Admin Full Name" autocomplete="off" value="<?= htmlspecialchars($row['fullName']) ?>">
              </div>

              <!-- Teacher Email---->
              <div class="form-group mb-3 fw-medium">
                <label class="form-label" for="exampleInputEmail1">Email Address</label>
                <input type="email" class="form-control" id="emailid" name="email" placeholder="Enter Email" autocomplete="off" value="<?= htmlspecialchars($row['teacherEmail']) ?>">
              </div>

              <!-- Sub admin Contact Number---->
              <div class="form-group mb-3 fw-medium">
                <label class="form-label" for="text">Mobile Number</label>
                <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" pattern="[0-9]{10}" title="10 numeric characters only" autocomplete="off" value="<?= htmlspecialchars($row['teacherMobileNo']) ?>">
              </div>

              <!-- Teacher Subject--->
              <div class="form-group mb-3 fw-medium">
                <label class="form-label" for="exampleInputFullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Sub-Admin Full Name" autocomplete="off" value="<?= htmlspecialchars($row['teacherSubject']) ?>">
              </div>

              <!-- teacher profile pic -->
              <div class="form-group fw-medium">
                <label class="form-label" for="exampleInputFile">Profile Pic </label>
                <div class="mb-3">
                  <img src="teacherspic/<?php echo $row['teacherPic'] ?>" width="120">
                </div>
                  <!-- <a class="btn btn-primary" href="update-teacher-pic.php?tid=<?php echo $row['id']; ?>">Change Profile Pic</a> -->
              </div>

              <!-- profile pic -->
            <div class="form-group">
              <p class="form-text text-danger">(Only jpg / jpeg/ png /gif format allowed)</p>
              <div>
                <input type="file" class="form-control" id="profilepic" name="profilepic">
              </div>
            </div>

            <?php } ?>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button>
          </div>
        </form>
      </div>

    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>

</html>