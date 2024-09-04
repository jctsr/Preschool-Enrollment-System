<?php
# validating session
require_once './php/config/sessions.php';

# db connection
require_once './php/config/db_connect.php';

$vid = $_GET['vid'];
$query = "SELECT * FROM tblvisitor WHERE id = '$vid'";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

# function to check if form is not empty
function validate($data)
{
  if (!empty($data)) {
    return $data;
  }
}

# take action visitor's details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $status=$_POST['status'];
  $remark=$_POST['officialremark'];

  if (
    validate($status) &&
    validate($remark)
  ) {

    # Insert data to db
    $query = "UPDATE tblvisitor SET officialRemark = '$remark', status = '$status' WHERE id = '$vid'";

    # check if data saved to db
    if (mysqli_query($conn, $query)) {
      echo "<script>alert('Visitor Status updated successfully.')</script>";
      echo "<script> document.location = 'all-visitors.php' </script>";
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
    <div class="container-fluid">

      <!-- header -->
      <div class="pt-5 pb-3 d-flex justify-content-between">
        <h3>Visitor Details</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item breadcrumb-dashboard"><a href="dashboardx.php">Home</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page">Visitor Details</li>
        </ol>
      </div>

      <!-- table -->
      <div class="row">
        <div class="col-12">
          <div class="manage-subadmin-card card">


            <div class="manage-subadmin-card card">
              <div class="card-header">
                <h6 class="card-title">Visitor Details</h6>
              </div>
            
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <tbody>

                    <!-- display visitors details-->
                    <?php foreach ($rows as $row) { ?>
                      <tr>
                        <th>Guardian Name</th>
                        <td><?= htmlspecialchars($row['guardianName']) ?></td>
                        <th>Guardian Email</th>
                        <td><?= htmlspecialchars($row['guardianEmail']) ?></td>
                      </tr>
                      <tr>
                        <th>Child Name</th>
                        <td><?= htmlspecialchars($row['childName']) ?></td>
                        <th>Child Age</th>
                        <td><?= htmlspecialchars($row['childAge']) ?></td>
                      </tr>
                      <tr>
                        <th>Visit Time</th>
                        <td><?= htmlspecialchars($row['visitTime']) ?></td>
                        <th>Posting Date</th>
                        <td><?= htmlspecialchars($row['postingDate']) ?></td>
                      </tr>
                      <tr>
                        <th>Message</th>
                        <td colspan="3"><?= htmlspecialchars($row['message']) ?></td>
                      </tr>

                      <?php if ($row['status'] != '') { ?>
                        <tr>
                          <th>Visit Status</th>
                          <td><?= htmlspecialchars($row['status']) ?></td>
                          <th>Updation Date</th>
                          <td><?= htmlspecialchars($row['updationDate']) ?></td>
                        </tr>

                        <tr>
                          <th>Official Remark</th>
                          <td colspan="3"><?= htmlspecialchars($row['officialRemark']) ?></td>
                        </tr>
                      <?php } ?>

                      <?php if ($row['status'] == '') { ?>
                        <tr>
                          <td colspan="4" class="text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Take Action</button>
                          </td>
                        </tr>
                      <?php } ?>

                    <?php } #end of foreach 
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
      </div>
  </section>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Visitor Satus</h4>
        </div>
        <div class="modal-body">
          <form name="takeaction" method="post">

            <p><select class="form-control" name="status" required>
                <option value="">Select Visitor Status</option>
                <option value="Visited">Visited</option>
                <option value="Not-Visited">Not Visited</option>

              </select></p>
            <p><textarea class="form-control" name="officialremark" placeholder="Official Remark" rows="5" required></textarea></p>
            <input type="submit" class="btn btn-primary" name="submit" value="Update">

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>

</html>