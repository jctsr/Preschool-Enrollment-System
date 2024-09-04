<?php
#db connection
require_once './admin/php/config/db_connect.php';

#select data from db & display page contact details
$queryContact = "SELECT * FROM tblpage WHERE PageType = 'contactus'";
$queryResult = mysqli_query($conn, $queryContact);
$contactInfo = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);

# function to check if form is not empty
function validate($data)
{
  if (!empty($data)) {
    return $data;
  }
}

# schedule a visit form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $gname = $_POST['gname'];
  $emailid = $_POST['emailid'];
  $cname = $_POST['cname'];
  $cage = $_POST['agegroup'];
  $vtime = $_POST['visittime'];
  $message = $_POST['message'];

  if (
    validate($gname) &&
    validate($emailid) &&
    validate($cname) &&
    validate($cage) &&
    validate($vtime) &&
    validate($message)
  ) {

    # Insert data to db
    $query = "INSERT INTO tblvisitor (guardianName, guardianEmail, childName, childAge, message,visitTime) VALUES('$gname', '$emailid', '$cname', '$cage', '$message', '$vtime')";

    # check if data saved to db
    if (mysqli_query($conn, $query)) {
      echo "<script> alert('Details sent successfully!') </script>";
      echo "<script> document.location = 'visit.php' </script>";
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
  <link rel="stylesheet" href="styles/style.css">
  <title>Preschool Enrollment System</title>
  <link rel="icon" type="image/x-icon" href="img/preschool.ico">
</head>

<body class="bg-light">

  <!-- navbar -->
  <?php include './templates/navbar.php' ?>

  <!-- header -->
  <?php include './visitpage/header.php' ?>

  <!-- visit form -->
  <?php include './visitpage/visit-form.php' ?>

  <!-- footer -->
  <?php include './templates/footer.php' ?>

</html>