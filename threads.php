      <?php include('partials/_navbar.php') ?>
      <?php include('partials/_dbconnect.php') ?>
     

      <!-- this part the heading part for for showing categorize problem  -->
      <?php 
      
      if (isset($_GET['catid'])) {
        $catid = $_GET['catid'];
      }
      
      $sql = "SELECT *FROM `categories` WHERE category_id = $catid";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
            $catname =  $row['category_name'];
            $catdesc =  $row['category_description'];
      }
      ?>
      <!-- this is for insert the problem form  -->
      <?php
      $showAlert = false;
      if (isset($_POST['submit'])) {
        $thread_title = $_POST['title'];

        $thread_title = str_replace("<", "&lt;", $thread_title);
        $thread_title = str_replace(">", "&gt;", $thread_title);

        $thread_desc = $_POST['description'];

        $thread_desc = str_replace("<", "&lt;", $thread_desc);
        $thread_desc = str_replace(">", "&gt;", $thread_desc);

        $sno = $_POST['sno'];

        $sql3 = "INSERT INTO thread SET thread_title='$thread_title', thread_desc='$thread_desc', thread_cat_id='$catid', thread_user_id='$sno'";
        $query = mysqli_query($conn, $sql3);
        $showAlert = true;
        if ($showAlert) {
          echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success </strong> Your Problem has been submitted, please wait till community respond !
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
      }
      ?>
      <!-- this is for insert the problem form  -->

      <div class="container my-4 bg-gray">
          <div class="alert alert-secondary" role="alert">
            <h1 class="display-4">Welcome to <?php echo $catname; ?></h1>
            <p class="lead"> <?php echo $catdesc; ?>  </p>
            <hr>
            <p class="my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos ut voluptates dolorum voluptas veritatis? Quam vel accusantium maiores! Iste illo est laudantium veniam, facere, blanditiis consectetur labore aut, non esse mollitia recusandae. Nulla, iusto autem! Laboriosam rem natus velit voluptatem!</p>
             <a href="#" class="btn btn-success btn-lg my-3" role="button">Learn more</a>
          </div>
      </div>

      <!-- this part the heading part for for showing categorize problem  -->



      <!-- this is for asking the form with the help of form  -->
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
          echo'<div class="container my-5">
            <h2 class="text-center">Start a Discusson</h2>
            <form method="POST" action="'.$_SERVER["REQUEST_URI"].'">  
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Ellaborate Your Concern</label>
                <textarea type="text" class="form-control" name="description" rows="3" id="description"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
              </div>
              <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </form>
          </div>';
        }else{
          echo"<div class='container'>
          <p class='lead'>You have to logged in to start a discussion</p>
          </div>";
        } 

        ?>
      <!-- this is for asking the form with the help of form  -->

          <!-- this is for showing the questions  -->
      <div class="container ">
          <h1>Browse Questions</h1>
         
            <?php 

            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            }else{
              $page = 1;
            }

            $limit = 4;
            $record_index = ($page-1)*$limit;
            
          
            $sql3 = "SELECT *FROM `thread` WHERE thread_cat_id = '$catid' LIMIT {$record_index}, {$limit}";
            $result = mysqli_query($conn, $sql3);
            $count = mysqli_num_rows($result);
            if ($count>0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $title =  $row['thread_title'];
                $desc =  $row['thread_desc'];
                $id3 = $row['thread_id'];                
                $time = $row['time'];                
                $thread_user_id = $row['thread_user_id'];                

                $sql4 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql4);
                $row2 = mysqli_fetch_assoc($result2);
                // if ($row2) {
                //   # code...
                // }
               $email =  $row2['user_email'];
                

                echo'<div class="d-flex my-4">
                  <div class="flex-shrink-0">
                      <img src="./img/user.png" width="70px" alt="...">
                  </div>
                  <div class="flex-grow-1 ms-3">

                      <h5><a class="text-dark text-decoration-none" href="threaditem.php?threadid='.$id3.'">'.$title.'</a></h5>
                      '.$desc.'
                      <h6 class="font-weight-bold mt-2 text-success"> Asked by -> '.$email.'<p class="float-end my-0 text-black-50">'.$time.'</p></h6> 
                      
                  </div>
                </div>';
                }
                $sql1 = "SELECT *FROM thread WHERE thread_cat_id='$catid'";
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1)>0) {
                    $num = mysqli_num_rows($result1);
                  
                    $total_page = ceil($num / $limit);


                    if ($page >1) {
                      echo'<a type="button" href="?catid='.$catid.'&page='.($page-1).'" class="btn btn-success btn-lg">&#129092; back</a>';
                    }
                    if ($total_page > $page) {
                      echo'<a type="button" href="?catid='.$catid.'&page='.($page+1).'" class="btn btn-success btn-lg  float-end">next &#129094;</a>';
                    }
                  }

                
                  
            }else{
            echo'<div class="alert alert-secondary" role="alert">
                  <div class="container my-4">
                    <p class="display-4">No Threads found</p>
                    <p class="lead">Be the first person to ask </p>
                  </div>
                </div>';
          }
            ?>
              
   
      </div>
      <!-- this is for showing the questions  -->
      <?php if ($count>0) {
        # code...
      } ?>
      <?php include('partials/_footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>