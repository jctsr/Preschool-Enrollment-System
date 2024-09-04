<section class="container-xxl py-5">
  <div class="container">

    <?php foreach ($contactInfo as $contact) { ?>
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
      <h1 class="mb-3"><?= htmlspecialchars($contact['PageTitle']) ?></h1>
    </div>

    <div class="row g-4 mb-5">
      <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.1s">
        <div class="bg-white border border-2 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
          <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
        </div>
        <h6><?= htmlspecialchars($contact['PageDescription']) ?></h6>
      </div>

      <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.3s">
        <div class="bg-white border border-2 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
          <i class="fa fa-envelope-open fa-2x text-primary"></i>
        </div>
        <h6><?= htmlspecialchars($contact['Email']) ?></h6>
      </div>

      <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.5s">
        <div class="bg-white border border-2 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
          <i class="fa fa-phone-alt fa-2x text-primary"></i>
        </div>
        <h6><?= htmlspecialchars($contact['MobileNumber']) ?></h6>
      </div>
    </div>
    <?php } ?>

  </div>
</section>