<section class="container py-5">
  <div class="container">

    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
      <h1 class="mb-3">Teachers</h1>
    </div>

    
    <div class="row g-4">

      <?php foreach ($rows as $row) { ?>
      <!-- teachers -->
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="team-item position-relative">
          <img class="img-fluid rounded-circle w-75" src="admin/teacherspic/<?= htmlspecialchars($row['teacherPic']) ?>" alt="">
          <div class="team-text">
            <h3><?= htmlspecialchars($row['fullName']) ?></h3>
            <p><?= htmlspecialchars($row['teacherSubject']) ?></p>
          </div>
        </div>
      </div>

      <?php } ?>
      
    </div>

  </div>
</section>