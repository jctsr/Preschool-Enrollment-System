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

# reset sub-admin pwd
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $subadminid = $_GET['said'];
  $password = $_POST['Password'];
  $confirm_password = $_POST['ConfirmPassword'];

  if (validate($password) && validate($confirm_password)) {

    # encrypt password
    $confirm_password = password_hash($confirm_password, PASSWORD_DEFAULT);

    # verify password
    if (password_verify($password, $confirm_password)) {

      # Update data to db
      $query = "UPDATE tbladmin SET Pwd = '$confirm_password' WHERE UserType = 0 AND ID = '$subadminid'";

      # check if data saved to db
      if (mysqli_query($conn, $query)) {
        echo "<script> alert('Sub-Admin password successfully reset!') </script>";
        echo "<script> document.location = 'manage-subadmins.php' </script>";
      } else {
        echo "<script> alert('Something went wrong!. Please try again.') </script>";
      }

    } 
    else {
      echo "<script> alert('Password doesn\\'t match!') </script>";
    }

  } 
  else {
    echo "<script> alert('Form can\\'t be empty!') </script>";
  }

} #end of post method

$query = "SELECT * FROM tbladmin WHERE UserType = 0 AND ID = '{$_GET['said']}'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
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
        <h3>Reset Password Sub-Admin</h3>
        </div>
        <div class="col-9 col-md-4 d-flex justify-content-end">
        <ol class="breadcrumb">
        <li class="breadcrumb-item breadcrumb-dashboard"><a href="dashboardx.php">Home</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page"><a href="manage-subadmins.php">Manage Sub-Admins</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page">Reset Password</li>
        </ol>
        </div>
      </div>

      <!-- form sub-admin reset password -->
      <div class="subadmin-form card">
        <div class="card-header bg-primary">
          <h5 class="text-white card-title">Reset the Password</h5>
        </div>

        <form method="post">
          <div class="card-body">

            <!-- Subadmin Username--->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="exampleInputFullname">Username (Login)</label>
              <input type="text" class="form-control" autocomplete="off" value="<?= $row['AdminUsername'] ?>" disabled>
            </div>

            <!-- Subadmin Password--->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="exampleInputFullname">New Password</label>
              <input type="password" class="form-control" id="Password" name="Password" placeholder="New Password" autocomplete="off">
            </div>

            <!-- Subadmin Confirm Password--->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="exampleInputFullname">Confirm Password</label>
              <input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password" autocomplete="off">
              <div class="form-check fw-normal mt-3">
                <input type="checkbox" class="form-check-input" onclick="visibility()">
                <label>Show Password</label>
              </div>
            </div>

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

  <!-- password visibility -->
  <script>
    const visibility = () => {
      let password = document.querySelector('#Password');
      let confirm_password = document.querySelector('#ConfirmPassword');

      if (password.type === 'password' && confirm_password.type === 'password') {
        password.type = 'text';
        confirm_password.type = 'text';
      } else {
        password.type = 'password';
        confirm_password.type = 'password';
      }
    }
  </script>

</html>