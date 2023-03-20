      <?php include('partials/_navbar.php') ?>
      <div class="container  my-3">
        <h1 class="text-center">Contact Us</h1>
        <form method="POST">
          <div class="form-group my-3">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" >
          </div>
          <div class="form-group my-3">
            <label for="reason">Why contact us ?</label>
            <select class="form-control" name="reason" id="reason">
              <option>Report</option>
              <option>find us</option>
              <option>problem related to website</option>
              <option>User care</option>
              <option>feedback</option>
            </select>
          </div>
          <div class="form-group my-3">
            <label for="exampleFormControlSelect2">country</label>
            <select  class="form-control" id="exampleFormControlSelect2">
              <option>Nepal</option>
              <option>india</option>
              <option>bangladesh</option>
              <option>russia</option>
              <option>america</option>
              <option>philipins</option>
              <option>pakistan</option>
              <option>europena state</option>
              <option>sigarpoee</option>
              <option>mal-dives</option>
            </select>
          </div>
          <div class="hdr  form-group my-3">
            <label for="problem">Concern your problem</label>
            <textarea class="form-control" id="problem" name="problem" rows="7"></textarea>
          </div>
        </form>
      </div>
      <?php include('partials/_footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>