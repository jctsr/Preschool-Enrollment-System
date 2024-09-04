<?php

session_start();

require_once './php/config/db_connect.php';

#function to check if form is not empty
function validate($data) {
  if (!empty($data)) {
    return $data;
  } 
}

#login-form validation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = $_POST['username'];
  $mobileno = $_POST['mobileno'];
  $newPassword = $_POST['pwd'];
  $confirmPassword = $_POST['confirmpwd'];

  $postData = [$username, $mobileno, $newPassword, $confirmPassword];

  $isValid = true;

  foreach ($postData as $data) {
    if (!validate($data)) {
      $isValid = false;
      break;
    }
  }

  #check if form is not empty
  if ($isValid) {
    #check details from db
    $query = "SELECT ID FROM tbladmin WHERE AdminUsername = '$username' AND MobileNumber = '$mobileno'";

    #result from d
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    #check if user is exist
    if ($row) {

      #encrypt passworrd
      $hash = password_hash($confirmPassword, PASSWORD_DEFAULT);

      #check if password match
      if (password_verify($newPassword, $hash)) {
        $queryUpdatePwd = "UPDATE tbladmin SET Pwd = '$hash' WHERE AdminUsername = '$username'";
        $result = mysqli_query($conn, $queryUpdatePwd);

        if ($result) {
          echo "<script>alert('Your Password succesfully changed')</script>";
          echo "<script> document.location = 'index.php' </script>";
        }
        
      } else {
        $err = "Password doesn't match!";
      }
    } else {
      $err = 'User does not exist!';
    }
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
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="styles/style.css">
  <title>Preschool Enrollment System</title>
  <link rel="icon" type="image/x-icon" href="../img/preschool.ico">
</head>

<body class="hold-transition login-page bg-light">

  <!-- login  -->
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center py-4">
        <a href="../index.php" class="h1"><b>Admin</b> Preschool</a>
      </div>

      <div class="card-body">
        <p class="login-box-msg">Reset your password</p>
        <p class="form-text text-danger"><?= htmlspecialchars($err ?? '') ?></p>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

          <!-- username -->
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

           <!-- mobile number -->
           <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Mobile Number" name="mobileno" pattern="[0-9]{10}" title="10 numeric characters only"  required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>

          <!-- password -->
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="Password" placeholder="New Password" name="pwd" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <!--confirm password -->
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="Password" placeholder="Confrim Password" name="confirmpwd" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <!-- password visibility -->
          <div class="form-check ms-1 mt-3">
            <input id="checkbox" type="checkbox" class="form-check-input" onclick="visibility()">
            <label for="checkbox" class="fw-normal">Show Password</label>
          </div>


          <!-- sign in button -->
          <div class="container d-flex justify-content-center mt-4 mb-3">
            <button type="submit" class="btn btn-primary btn-block" name="login">Reset</button>
          </div>

        </form>

        <!-- forgot password -->
        <p class="mb-1">
          <a href="index.php">Sign In</a>
        </p>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <script src="../dist/js/adminlte.min.js"></script>

  <!-- password visibility -->
  <script>
    const visibility = () => {
      let password = document.querySelectorAll('#Password');

      password.forEach(password => {
        if (password.type === 'password') {
        password.type = 'text';
      } else {
        password.type = 'password';
      }
      });
     
    }
  </script>

</html>