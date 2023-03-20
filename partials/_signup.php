<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">signup to iDiscuss</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="partials/_handleSignup.php" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label"> Username</label>
          <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="signpassword">
        </div>
        <div class="mb-3">
          <label for="cpassword" class="form-label">Conform Password</label>
          <input type="password" class="form-control" id="password" name="signcpassword">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">SignUp</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>