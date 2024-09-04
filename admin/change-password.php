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

# update new password
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $current_password = $_POST['CurrentPassword'];
  $new_password = $_POST['NewPassword'];
  $confirm_password = $_POST['ConfirmPassword'];
  $adminid = $_SESSION['aid'];

  if (validate($current_password) && validate($new_password) && validate($confirm_password)) {

    # selecting data
    $query = "SELECT * FROM tbladmin WHERE ID = '$adminid'";
    $result = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_array($result)) {
      $hash = $row['Pwd'];
      # check if current password's field match current password from db

      if (password_verify($current_password, $hash)) {

        # encrypt password
        $confirm_password = password_hash($confirm_password, PASSWORD_DEFAULT);

        # verify password
        if (password_verify($new_password, $confirm_password)) {

          # Upodate data to db
          $query = "UPDATE tbladmin SET Pwd = '$confirm_password' WHERE ID = '$adminid'";

          # check if data saved to db
          if (mysqli_query($conn, $query)) {
            echo "<script> alert('Password successfully changed!') </script>";
            echo "<script> document.location = 'change-password.php' </script>";
          } else {
            echo "<script> alert('Something went wrong!. Please try again.') </script>";
          }
        } else {
          echo "<script> alert('Password doesn\\'t match!') </script>";
        }
      }
      else {
        echo "<script> alert('Wrong password!') </script>";
      }


    } 

  } else {
    echo "<script> alert('Form can\\'t be empty!') </script>";
  }
} # end of post method

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
        <h3>Change Password</h3>
        </div>
        <div class="col-9 col-md-4 d-flex justify-content-end">
        <ol class="breadcrumb">
        <li class="breadcrumb-item breadcrumb-dashboard"><a href="dashboardx.php">Home</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page">Change Password</li>
        </ol>
        </div>
      </div>

      <!-- form change password -->
      <div class="subadmin-form card">
        <div class="card-header bg-primary">
          <h5 class="text-white card-title">Fill the Info</h5>
        </div>

        <form method="post">
          <div class="card-body">

            <!-- current password---->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label">Current Password</label>
              <input type="password" class="form-control" id="password" name="CurrentPassword" placeholder="Enter Current Password" autocomplete="off" required>
            </div>

            <!-- new password---->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label">New Password</label>
              <input type="password" class="form-control" id="password" name="NewPassword" placeholder="Enter New Password" autocomplete="off" required>
            </div>

            <!-- confirm password---->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="password" name="ConfirmPassword" placeholder="Enter Confirm Password" autocomplete="off" required>
            </div>

             <!-- password visibility -->
            <div class="form-check ms-1 mt-3">
              <input id="checkbox" type="checkbox" class="form-check-input" onclick="visibility()">
              <label for="checkbox" class="fw-normal">Show Password</label>
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
      let passwords = document.querySelectorAll('#password');

      passwords.forEach(password => {
        if (password.type === 'password') {
        password.type = 'text';
        } else {
          password.type = 'password';
        }        
      })

    }
  </script>

</html>