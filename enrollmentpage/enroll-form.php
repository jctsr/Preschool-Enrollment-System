<section class="container py-5">
  <div class="container">
    <div class="bg-white border border-2 rounded">
      <div class="row g-0">
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
          <div class="h-100 d-flex flex-column justify-content-center p-5">
            <h1 class="mb-4">Start your Child’s Early Education</h1>

            <form method="post">
              <div class="row g-3">

                <!-- father's name -->
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="text" class="form-control border-2" id="fathername" name="fathername" placeholder="Father Name" required>
                    <label for="gname">Father's Name</label>
                  </div>
                </div>

                <!-- mother's name -->
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="text" class="form-control border-2" id="mothername" name="mothername" placeholder="Mother Name" required>
                    <label for="gmail">Mother's Name</label>
                  </div>
                </div>

                <!-- parent's phone number -->
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="text" class="form-control border-2" id="parentmobno" name="parentmobno" placeholder="Parents Mobile No." required>
                    <label for="gname">Parents Mobile No.</label>
                  </div>
                </div>

                <!-- parent's email -->
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="email" class="form-control border-2" id="parentemail" name="parentemail" placeholder="Parents Email" required>
                    <label for="gmail">Parents Email</label>
                  </div>
                </div>

                <!-- child's name -->
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="text" class="form-control border-2" id="cname" name="cname" placeholder="Child Name" required>
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

                <!-- select program -->
                <div class="col-sm-12">
                  <div class="form-floating">
                    <select class="form-control border-2" id="enrollprogram" name="enrollprogram" required>
                      <option value="">Select a Program*</option>
                      <option value="PlayGroup-1.8 to 3 years">PlayGroup-1.8 to 3 years</option>
                      <option value="Nursery-2.5 to 4 years">Nursery-2.5 to 4 years</option>
                      <option value="Junior KG- 3.5 to 5 years">Junior KG-3.5 to 5 years</option>
                      <option value="Senior KG- 4.5 to 6 years">Senior KG- 4.5 to 6 years</option>
                    </select>
                    <label for="cage">Program Enroll For</label>
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
            <img class="position-absolute w-100 h-100 rounded" src="img/appointment.jpg" style="object-fit: cover;">
          </div>
        </div>

      </div>
    </div>
  </div>
</section>