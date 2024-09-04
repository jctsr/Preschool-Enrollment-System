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

# add new sub-admin
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = $_POST['sadminusername'];
  $fname = $_POST['fullname'];
  $email = $_POST['email'];
  $mobileno = $_POST['mobilenumber'];
  $password = $_POST['inputpwd'];
  $usertype = 0;

  $postData = [$username, $fname, $email, $mobileno, $password];

  $isValid = true;

  foreach ($postData as $data) {
    if (!validate($data)) {
      $isValid = false;
      break;
    }
  }


  if ($isValid) {

    # encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);
    # Insert data to db
    $query = "INSERT INTO tbladmin (AdminUserName,AdminName,MobileNumber,Email,Pwd,UserType ) VALUES('$username','$fname','$mobileno','$email','$password','$usertype')";

    # check if data saved to db
    if (mysqli_query($conn, $query)) {
      echo "<script> alert('Sub-Admin successfully created!') </script>";
      echo "<script> document.location = 'manage-subadmins.php' </script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again.')</script>";
    }
  } else {
    echo "<script>alert('Form can\\'t be empty!')</script>";
  }
}

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
        <h3>Add Sub-Admin</h3>
        </div>
        <div class="col-9 col-md-4 d-flex justify-content-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item breadcrumb-dashboard"><a href="dashboardx.php">Home</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page">Add Sub-Admin</li>
        </ol>
        </div>
      </div>

      <!-- form create sub-admin-->
      <div class="subadmin-form card">
        <div class="card-header bg-primary">
          <h5 class="text-white card-title">Fill the Info</h5>
        </div>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="card-body">

            <!-- Subadmin Username-->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="exampleInputusername">Username (Login)</label>
              <input type="text" placeholder="Enter Sub-Admin Username" name="sadminusername" id="sadminusername" class="form-control" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="Username must be alphanumeric 6 to 12 chars" onBlur="checkAvailability()" autocomplete="off" value="<?= htmlspecialchars($username ?? '') ?>">
              <span id="user-availability-status" style="font-size:14px;"></span>
            </div>

            <!-- Subadmin Full Name--->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="exampleInputFullname">Full Name</label>
              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Sub-Admin Full Name" autocomplete="off" value="<?= htmlspecialchars($fname ?? '') ?>">
            </div>

            <!-- Sub admin Email---->
            <div class="form-group mb-3 fw-medium">
              <labe class="form-label" for="exampleInputEmail1">Email Address</labe>
              <input type="email" class="form-control" id="emailid" name="email" placeholder="Enter Sub-Admin Email" autocomplete="off" value="<?= htmlspecialchars($email ?? '') ?>">
            </div>

            <!-- Sub admin Contact Number---->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="text">Mobile Number</label>
              <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Sub-Admin Mobile Number" pattern="[0-9]{10}" title="10 numeric characters only" autocomplete="off" value="<?= htmlspecialchars($mobileno ?? '') ?>">
            </div>

            <!---Subadmin Password--->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="Password" name="inputpwd" placeholder="Password">
              <div class="form-check fw-normal mt-3">
                <input type="checkbox" class="form-check-input" onclick="visibility()">
                <label>Show Password</label>
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

  <!-- password visibility -->
  <script>
    const visibility = () => {
      let password = document.querySelector('#Password');

      if (password.type === 'password') {
        password.type = 'text';
      } else {
        password.type = 'password';
      }
    }
  </script>

</html>