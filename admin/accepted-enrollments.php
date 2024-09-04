<?php
# validating session
require_once './php/config/sessions.php';

# db connection
require_once './php/config/db_connect.php';

$query = "SELECT * FROM tblenrollment WHERE enrollStatus = 'Accepted'";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$cnt = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
      <div class="row pt-5 pb-3 d-flex justify-content-between">
        <div class="col-9 col-md-4 d-flex">
        <h3>Accepted Enrollments</h3>
        </div>
        <div class="col-9 col-md-4 d-flex justify-content-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item breadcrumb-dashboard"><a href="dashboardx.php">Home</a></li>
          <li class="breadcrumb-item breadcrumb-dashboard active" aria-current="page">Accepted Enrollments</li>
        </ol>
        </div>
      </div>

      <!-- table -->
      <div class="row">
        <div class="col-12">
          <div class="manage-subadmin-card card">


            <div class="manage-subadmin-card card">
              <div class="card-header">
                <h6 class="card-title">Enrollment Details</h6>
              </div>
             
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Enrollment No</th>
                      <th>Father/Mother Name</th>
                      <th>Parent Mobile No/Email</th>
                      <th>Child Name</th>
                      <th>Age Group</th>
                      <th>Program Enroll</th>
                      <th>Posting Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <!-- display accepted enrollments -->
                    <?php foreach ($rows as $row) {?>
                    <tr>
                      <td><?=htmlspecialchars($cnt++)?></td>
                      <td><?=htmlspecialchars($row['enrollmentNumber'])?></td>
                      <td>
                        <?=htmlspecialchars($row['fatherName'])?> /
                        <?=htmlspecialchars($row['motherName'])?>
                      </td>
                      <td>
                        <?=htmlspecialchars($row['parentmobNo'])?> /
                        <?=htmlspecialchars($row['parentEmail'])?>
                      </td>
                      <td><?=htmlspecialchars($row['childName'])?></td>
                      <td><?=htmlspecialchars($row['childAge'])?></td>
                      <td><?=htmlspecialchars($row['enrollProgram'])?></td>
                      <td><?=htmlspecialchars($row['postingDate'])?></td>
                      <th class="text-center">
                        <a href="enrollment-details.php?enrollid=<?=htmlspecialchars($row['id'])?>" title="View Details" class="btn btn-primary">View Details</a>
                      </th>
                    </tr>
                    <?php }?>

                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
      </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../plugins/jszip/jszip.min.js"></script>
  <script src="../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

</html>