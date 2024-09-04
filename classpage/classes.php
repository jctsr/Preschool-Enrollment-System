<section class="container py-5">

  <div class="container mb-5">
    <h1 class="text-center mb-3">School Classes</h1>
  </div>


  <div class="row g-4">

    <?php foreach ($rows as $row) { ?>
      <!-- school classes 1 -->
      <div class="classes col-lg-4 col-sm-6">
        <div class="card d-flex justify-content-center pt-3">

          <!-- header image -->
          <div class="container d-flex justify-content-center">
            <img src="admin/classpic/<?= htmlspecialchars($row['classPic']) ?>" class="card-img-top" style="height:300px;" alt="Teacher">
          </div>

          <div class="card-body d-grid">
            <h3 class="card-title text-center mt-1 mb-4"><?= htmlspecialchars($row['className']) ?></h3>

            <!-- teacher info -->
            <div class="container d-flex">
              <img src="admin/teacherspic/<?= htmlspecialchars($row['teacherPic']) ?>" class="card-img-top rounded-circle" style="width: 100px; height:85px;" alt="Teacher">
              <div class="container">
                <h5 class=""><?= htmlspecialchars($row['fullName']) ?></h5>
                <h6 class="">Teacher</h6>
              </div>
            </div>

            <!-- class info -->
            <div class="mt-4 row g-1">
              <div class="col-4">
                <div class="border-top border-4 border-danger pt-2">
                  <h6 class="text-danger mb-1">Age:</h6>
                  <small><?php echo $row['ageGroup'] ?></small>
                </div>
              </div>
              <div class="col-4">
                <div class="border-top border-4 border-success pt-2">
                  <h6 class="text-success mb-1">Time:</h6>
                  <small><?php echo $row['classTiming'] ?></small>
                </div>
              </div>
              <div class="col-4">
                <div class="border-top border-4 border-warning pt-2">
                  <h6 class="text-warning mb-1">Capacity:</h6>
                  <small class="text-body"><?php echo $row['capacity'] ?> Kids</small>
                </div>
              </div>
            </div>


          </div>

        </div>
      </div>

    <?php } ?>

  </div>

</section>