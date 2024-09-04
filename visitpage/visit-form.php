<section class="container py-5">
  <div class="container">
    <div class="bg-white border border-2 rounded">
      <div class="row g-0">
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
          <div class="h-100 d-flex flex-column justify-content-center p-5">
            <h1 class="mb-4 text-center">Schedule a Visit</h1>

            <form method="post">
              <div class="row g-3">

                <!-- guardian's name -->
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="text" class="form-control border-2" id="gname" name="gname" placeholder="Gurdian Name" autocomplete="off" required>
                    <label for="gname">Guardian Name</label>
                  </div>
                </div>

                <!-- guardian's email -->
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="email" class="form-control border-2" id="emailid" name="emailid" placeholder="Gurdian Email" autocomplete="off" required>
                    <label for="gmail">Guardian Email</label>
                  </div>
                </div>

                <!-- child's name -->
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="text" class="form-control border-2" id="cname" name="cname" placeholder="Child Name" autocomplete="off" required>
                    <label for="cname">Child Name</label>
                  </div>
                </div>

                <!-- age group -->
                <div class="col-sm-6">
                  <div class="form-floating">
                    <select class="form-control border-2" id="agegroup" name="agegroup" required>
                      <option value="">Select</option>
                      <option value="18 Month-3 Year">18 Month-2 Year</option>
                      <option value="2-3 Year">2-3 Year</option>
                      <option value="3-4 Year">3-4 Year</option>
                      <option value="4-5 Year">4-5 Year</option>
                      <option value="5-6 Year">5-6 Year</option>
                    </select>
                    <label for="cage">Child Age</label>
                  </div>
                </div>

                <!-- visit time -->
                <div class="col-sm-6 ps-2">
                  <label for="cage">Visit Time</label>
                </div>
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="datetime-local" id="visittime" name="visittime" required>
                  </div>
                </div>

                <!-- message -->
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control border-2" placeholder="Leave a message here" id="message" style="height: 100px" name="message" required></textarea>
                    <label for="message">Message</label>
                  </div>
                </div>

                <!-- submit button -->
                <div class="col-12">
                  <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Submit</button>
                </div>

              </div>
            </form>

          </div>
        </div>

        <!-- image -->
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
          <div class="position-relative h-100">
            <img class="position-absolute w-100 h-100 rounded" src="./img/appointment.jpg" style="object-fit: cover;">
          </div>
        </div>

      </div>
    </div>
  </div>
</section>