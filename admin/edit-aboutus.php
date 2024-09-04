<?php
# validating session
require_once './php/config/sessions.php';

# db connection
require_once './php/config/db_connect.php';

# selecting data from db
$query = "SELECT * FROM  tblpage WHERE PageType = 'aboutus'";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

# function to check if form is not empty
function validate($data) {
  if (!empty($data)) {
    return $data;
  } 
}

#update sub-admin details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $pagetitle = $_POST['pagetitle'];
  $pagedesc = $_POST['pagedesc'];

  if (
    validate($pagetitle)&&
    validate($pagedesc)
    ) {

      # Upodate data to db
      $query = "UPDATE tblpage SET PageTitle = '$pagetitle', PageDescription = '$pagedesc' WHERE PageType = 'aboutus'";

        # check if data saved to db
        if (mysqli_query($conn, $query)) {
        echo "<script> alert('About Us details successfully edited!') </script>";
        echo "<script> document.location = 'edit-aboutus.php' </script>";
      } else {
        echo "<script>alert('Something went wrong! Please try again.')</script>";
      }
    
  } else {
    echo "<script>alert('Form can\\'t be empty!')</script>";
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

  
  <section class="container py-5">
    <div class="container">

      <!-- header -->
      <div class="pt-5 pb-3 d-flex justify-content-between">
        <h3>Edit About Us</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item breadcrumb-dashboard"><a href="dashboardx.php">Home</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page">Edit About Us</li>
        </ol>
      </div>

      <!-- form edi about us page-->
      <div class="subadmin-form card">
        <div class="card-header bg-primary">
          <h5 class="text-white card-title">Fill the Info</h5>
        </div>

        <form method="post">
          <div class="card-body">
            
            <?php foreach ($rows as $row) { ?>
            <!-- page title---->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="exampleInputEmail1">Page Title</label>
              <input type="text" class="form-control" name="pagetitle" placeholder="Enter Page Title" autocomplete="off" value="<?= htmlspecialchars($row['PageTitle']) ?>" required>
            </div>

            <!-- Page Description---->
            <div class="form-group mb-3 fw-medium">
              <label class="form-label" for="exampleInputEmail1">Page Description</label>
              <textarea class="form-control" name="pagedesc" placeholder="Enter Page Description" style="height: 160px"><?= htmlspecialchars($row['PageDescription']) ?></textarea>
            </div>
            <?php } ?>

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