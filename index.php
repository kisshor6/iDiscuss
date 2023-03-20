<?php include('partials/_dbconnect.php') ?>
<?php include('partials/_navbar.php') ?>

      <!-- sliders of home page !-->

      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://source.unsplash.com/1600x500/?technology,mobile" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1600x500/?coding,python" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1600x500/?nature,water" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>

      <!-- sliders of home page !-->

      <div class="container my-4">
          <h2 class="text-center">Welcome to iDiscuss - Categories</h2>
          <div class="row">

          <?php 
          $sql = 'SELECT *FROM `categories`';
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $id =  $row['category_id'];
            $cat =  $row['category_name'];
            $desc =  $row['category_description']; 

            echo'<div class="col-md-4 ">
                <div class="card my-2" style="width: 18rem;">
                <img src="https://source.unsplash.com/500x500/?'.$cat.'" class="card-img-top" alt="...">
                <div class="card-body my-2">
                    <h5 class="card-title">'.$cat.'</h5>  
                    <p class="card-text"> '.substr($desc, 0, 130).'...</p>
                    <a href="threads.php?catid='.$id.'" class="btn btn-primary">View Threads </a>
                </div>
                </div>
              </div>';
          }
           ?>
          </div>
      </div>
      <?php include('partials/_footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>