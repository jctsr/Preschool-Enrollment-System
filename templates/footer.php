<section class="container bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container py-5">
    <div class="row g-5">

        <div class="col-lg-4 col-md-6">
        <?php foreach ($contactInfo as $contact) { ?>
          <h3 class="text-white mb-4">Get In Touch</h3>
          <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>
          <?=htmlspecialchars($contact['PageDescription']) ?>
          </p>
          <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>
          <?=htmlspecialchars($contact['MobileNumber']) ?>
          </p>
          <p class="mb-2"><i class="fa fa-envelope me-3"></i>
          <?=htmlspecialchars($contact['Email']) ?>
          </p>
        <?php }?>
          <div class="d-flex pt-2">
            <a class="btn btn-outline-light btn-social me-2" href=""><i class="fab fa-twitter"></i></a>
            <a class="btn btn-outline-light btn-social me-2" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-social me-2" href=""><i class="fab fa-youtube"></i></a>
            <a class="btn btn-outline-light btn-social me-2" href=""><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
  
      <div class="col-lg-3 col-md-6">
        <h3 class="text-white mb-4">Quick Links</h3>
        <a class="btn btn-link text-white-50" href="about.php">About Us</a>
        <a class="btn btn-link text-white-50" href="contact.php">Contact Us</a>
        <a class="btn btn-link text-white-50" href="classes.php">Classes</a>
        <a class="btn btn-link text-white-50" href="visit.php">Schedule a Visit</a>
        <a class="btn btn-link text-white-50" href="enrollment.php">Enroll Now</a>
        <a class="btn btn-link text-white-50" href="admin/">Admin Login</a>
      </div>

      <div class="col-lg-5 col-md-6">
        <h3 class="text-white mb-4">Photo Gallery</h3>
        <div class="row g-2 pt-2">
          <div class="col-4">
            <img class="img-fluid rounded bg-light p-1" src="img/classes-1.jpg" alt="">
          </div>
          <div class="col-4">
            <img class="img-fluid rounded bg-light p-1" src="img/classes-2.jpg" alt="">
          </div>
          <div class="col-4">
            <img class="img-fluid rounded bg-light p-1" src="img/classes-3.jpg" alt="">
          </div>
          <div class="col-4">
            <img class="img-fluid rounded bg-light p-1" src="img/classes-4.jpg" alt="">
          </div>
          <div class="col-4">
            <img class="img-fluid rounded bg-light p-1" src="img/classes-5.jpg" alt="">
          </div>
          <div class="col-4">
            <img class="img-fluid rounded bg-light p-1" src="img/classes-6.jpg" alt="">
          </div>
        </div>
      </div>

    </div>
  </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
</body>