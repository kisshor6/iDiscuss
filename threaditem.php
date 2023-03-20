      <?php include('partials/_navbar.php') ?>
      <?php include('partials/_dbconnect.php') ?>

      <?php 
      $id = $_GET['threadid'];
      $sql = "SELECT *FROM `thread` WHERE thread_id = $id";
      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result);
      if ($count>0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $title =  $row['thread_title'];
          $desc =  $row['thread_desc'];
          $thread_user_id = $row['thread_user_id'];
          
          $sql1 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
          $result1 = mysqli_query($conn, $sql1);
          $row1 = mysqli_fetch_assoc($result1);
          $user_email =  $row1['user_email'];
        }
      }else{
        echo'<div class="alert alert-secondary" role="alert">
          <div class="container my-4">
            <p class="display-4">No Threads found</p>
            <p class="lead">Be the first person to comment </p>
          </div>
        </div>';
      }
      ?>
      <!-- this is for submitting comments by using form    -->
      <?php
        $showAlert = false;
        if (isset($_POST['submit'])) {
          $comment = $_POST['comment'];
          $comment = str_replace("<", "&lt;", $comment);
          $comment = str_replace(">", "&gt;", $comment);
          $sno = $_POST['sno'];

          $sql3 = "INSERT INTO comment SET comment_content='$comment', thread_id='$id', comment_by='$sno'";
          $query = mysqli_query($conn, $sql3);
          $showAlert = true;
          if ($showAlert) {
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success </strong> Your comment has been added !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
        }
      ?>
      <!-- this is for submitting comments by using form    -->


      <div class="container my-4 bg-gray">
          <div class="alert alert-secondary" role="alert">
            <h1 class="display-4"><?php echo $title; ?></h1>
            <p class="lead"> <?php echo $desc; ?>  </p>
            <hr>
            <p class="my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos ut voluptates dolorum voluptas veritatis? Quam vel accusantium maiores! Iste illo est laudantium veniam, facere, blanditiis consectetur labore aut, non esse mollitia recusandae. Nulla, iusto autem! Laboriosam rem natus velit voluptatem!</p>
             <p><b>Posted by -<em> <?php echo $user_email; ?></b></em></p> 
          </div>
          
      </div>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
          echo'<div class="container my-5">
            <h2>Post your comment</h2>
            <form method="POST" action="'.$_SERVER["REQUEST_URI"].'">  
              <div class="mb-3">
                <label for="description" class="form-label">Type Your comment</label>
                <textarea type="text" class="form-control" name="comment" rows="3" id="description"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
              </div>
              <button type="submit" name="submit" class="btn btn-success">Post comment</button>
            </form>
          </div>';
        }else{
          echo"<div class='container'>
          <p class='lead'>You have to logged to post a comment</p>
          </div>";
        }
          ?>

      <div class="container hdr">
          <h1>Discusson</h1>
          <?php 
            $id = $_GET['threadid'];
            $sql3 = "SELECT *FROM `comment` WHERE thread_id = $id";
            $result = mysqli_query($conn, $sql3);
            $count = mysqli_num_rows($result);
            if ($count>0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $content =  $row['comment_content'];
                $comment_time = $row['comment_time'];
              
                $comment_by = $row['comment_by'];                

                $sql4 = "SELECT user_email FROM `users` WHERE sno='$comment_by'";
                $result4 = mysqli_query($conn, $sql4);
                $row4 = mysqli_fetch_assoc($result4);
                $user_email =  $row4['user_email'];

                echo'<div class="d-flex my-4">
                  <div class="flex-shrink-0">
                      <img src="./img/user.png" width="70px" alt="...">
                  </div>
                  <div class="flex-grow-1 ms-3">
                   '.$content.' 
                    <h6 class="font-weight-bold mt-2 text-success"> commented by -> '.$user_email.' <p class="float-end my-0 text-black-50">'.$comment_time.'</p></h6> 
                  </div>
                </div>';

                }
            }else{
            echo'<div class="alert alert-secondary" role="alert">
                  <div class="container my-4">
                    <p class="display-4">No Threads found</p>
                    <p class="lead">Be the first person to Comment </p>
                  </div>
                </div>';
          }
          ?>

      </div>
      <?php include('partials/_footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>