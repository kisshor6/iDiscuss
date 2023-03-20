<?php include('partials/_dbconnect.php') ?>
<?php include('partials/_navbar.php') ?>

    <!-- results of search page !-->

<div class="container hdr">
    <h1 class="text-center mt-5">Seach Results for<em> "<?php echo $_GET['search']; ?>"</em></h1>

    <?php
    $query = $_GET['search'];
      $sql = "SELECT *FROM `thread` WHERE CONCAT(thread_title, thread_desc) LIKE'%$query%'";
      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result);
      if ($count>0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $title =  $row['thread_title'];
          $desc =  $row['thread_desc'];
          $id =  $row['thread_id'];
          $url = "threaditem.php?threadid=". $id;

          echo'<div class="results  my-5">
            <h4><a class="text-dark text-decoration-none" href="'.$url.'">'.$title.'</a></h4>
            <p>'.$desc.'</p>
            </div>';
        }
      }else{
        echo'<div class="alert alert-secondary mt-5" role="alert">
              <div class="container my-4">
                <p class="display-4">No Results found</p>
                <p class="lead">suggestions: <ul>
                <li>Make sure that all words are spelled correctly</li>
                <li>Try different Keywords</li>
                <li>Try more general Keywords</li>
                </ul></p>
              </div>
            </div>';
      }
    ?>
  </div>

      <!-- results of search page !-->

      <?php include('partials/_footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>

