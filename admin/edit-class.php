<?php
# validating session
require_once './php/config/sessions.php';

# db connection
require_once './php/config/db_connect.php';

# function to check if form is not empty
function validate($data)
{
  if (!empty($data)) {
    return $data;
  }
}

# update class details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $tid = $_POST['teacher'];
  $cname = $_POST['classname'];
  $agegroup = $_POST['agegroup'];
  $classtiming = $_POST['classtiming'];
  $capacity = $_POST['capacity'];
  $classid = $_GET['cid'];

  #class profile pic
  $currentpic = $_POST['currentprofilepic'];
  $oldprofilepic = "classpic/" . $currentpic;
  $profilepic = $_FILES["profilepic"]["name"];

  #get the image extension
  $extension = substr($profilepic, strlen($profilepic) - 4, strlen($profilepic));

  #allowed extensions
  $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");




  if (
    validate($tid) &&
    validate($cname) &&
    validate($agegroup) &&
    validate($classtiming) &&
    validate($capacity)
  ) {

    # check if image inserted
    if (!empty($profilepic)) {

      # update class profile pic
      if (in_array($extension, $allowed_extensions)) {
        # rename the image file
        $newprofilepic = md5($profilepic) . time() . $extension;

        # Code for move image into directory
        move_uploaded_file($_FILES["profilepic"]["tmp_name"], "classpic/" . $newprofilepic);
        $queryUpdate = "UPDATE tblclasses SET classPic ='$newprofilepic' WHERE id = '$classid'";

        #check if pic updated to db
        if (mysqli_query($conn, $queryUpdate)) {
          unlink($oldprofilepic);
        } else {
          echo "<script>alert('Error updating profile picture.')</script>";
        }
      } else {
        echo "<script>alert('Error uploading profile picture.')</script>";
      }
    }

    # Update data to db
    $query = "UPDATE tblclasses SET teacherId = '$tid', className = '$cname', ageGroup = '$agegroup',classTiming = '$classtiming', capacity = '$capacity' WHERE id='$classid'";

    # check if data update &  saved to db
    if (mysqli_query($conn, $query)) {
      echo "<script> alert('Class details successfully edited!') </script>";
      echo "<script> document.location = 'manage-classes.php' </script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again.')</script>";
    }
  } else {
    echo "<script>alert('Form can\\'t be empty!')</script>";
  }
} # end of post method

# joining tblteachers & tblclasses
$cid = $_GET['cid'];
$queryJoin = "SELECT tblteachers.fullName AS teachername, tblteachers.id AS tid, tblclasses.*, tblclasses.id AS classid FROM tblclasses JOIN tblteachers ON tblteachers.id = tblclasses.teacherId 
WHERE tblclasses.id = '$cid'";
$result = mysqli_query($conn, $queryJoin);
$rows =  mysqli_fetch_all($result, MYSQLI_ASSOC);

# selecting data from tblteachers
$query = "SELECT id, fullName, teacherSubject FROM tblteachers";
$results = mysqli_query($conn, $query);
$teachers = mysqli_fetch_all($results, MYSQLI_ASSOC);
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
      <div class="row pt-5 pb-3 d-flex justify-content-between">
        <div class="col-9 col-md-4 d-flex">
          <h3>Edit Class Details</h3>
        </div>
        <div class="col-9 col-md-4 d-flex justify-content-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-dashboard"><a href="dashboardx.php">Home</a></li>
            <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page"><a href="manage-classes.php">Manage Classes</a></li>
            <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page">Edit Class Details</li>
          </ol>
        </div>
      </div>

      <!-- form edit class-->
      <div class="subadmin-form card">
        <div class="card-header bg-primary">
          <h5 class="text-white card-title">Edit the Info</h5>
        </div>

        <form method="post" enctype="multipart/form-data">
          <div class="card-body">

            <?php foreach ($rows as $row) { ?>

              <!-- select teacher--->
              <div class="form-group mb-3 fw-medium">
                <label class="form-label">Teacher</label>
                <select class="form-select" id="teacher" name="teacher" required>
                  <option value="<?= $row['tid'] ?>"><?= $row['teachername'] ?></option>
                  <?php foreach ($teachers as $teacher) { ?>
                    <option value="<?= htmlspecialchars($teacher['id']) ?>"><?= htmlspecialchars($teacher['fullName']) ?>-(<?= htmlspecialchars($teacher['teacherSubject']) ?>)
                    </option>
                  <?php } ?>
                </select>
              </div>

              <!-- class name---->
              <div class="form-group mb-3 fw-medium">
                <label class="form-label">Class Name</label>
                <input type="text" class="form-control" id="classname" name="classname" placeholder="Class name e.g: Drawing, Dance, English" value="<?= htmlspecialchars($row['className']) ?>" autocomplete="off" required>
              </div>

              <!-- select age--->
              <div class="form-group mb-3 fw-medium">
                <label class="form-label">Age Group</label>
                <select class="form-select" id="agegroup" name="agegroup" required>
                  <option value="<?php echo $row['ageGroup']; ?>"><?php echo $row['ageGroup']; ?></option>
                  <option value="18 Month-3 Year">18 Month-2 Year</option>
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
                  <option value="<?= $row['classTiming'] ?>"><?= $row['classTiming'] ?></option>
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
                  <option value="<?= $row['capacity'] ?>"><?= $row['capacity'] ?></option>
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

              <!-- teacher profile pic -->
              <div class="form-group fw-medium">
                <label class="form-label" for="exampleInputFile">Profile Pic </label>
                <div class="mb-3">
                  <img src="classpic/<?php echo $row['classPic'] ?>" width="120">
                </div>
              </div>

              <!-- profile pic -->
              <div class="form-group">
                <p class="form-text text-danger">(Only jpg / jpeg/ png /gif format allowed)</p>
                <div>
                  <input type="hidden" name="currentprofilepic" value="<?php echo $row['classPic']; ?>">
                  <input type="file" class="form-control" id="profilepic" name="profilepic">
                </div>
              </div>

            <?php } ?>

          </div>

          <!-- submit button -->
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