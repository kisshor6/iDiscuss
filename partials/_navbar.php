<?php

session_start();
  include('_dbconnect.php');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
  $loggedin = true;
}else{
  $loggedin = false;
} 
echo '
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <style>
    .hdr{
      min-height: 550px;
    </style>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum/">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categrories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

          $sql = "SELECT category_name,category_id FROM `categories`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo'<li><a class="dropdown-item" href="threads.php?catid='. $row['category_id'] .'">'.$row['category_name'].'</a></li>';
          }         
          echo'</ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contact.php">Contact</a>
        </li>
      </ul>
      <form class="d-flex" action="./search.php" method="GET" role="search">
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
      <div class="mx-2">';
      if (!$loggedin) {
        echo'<a class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
      <a class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</a>';
      }
      if ($loggedin) {   
        echo'
        <a href="#" class="text-light text-decoration-none mx-3">Welcome '.$_SESSION['username'].'</a>
         <a href="partials/_logout.php" class="btn btn-outline-success">Logout</a>
        ';
      }

      echo'</div>
    </div>
  </div>
</nav>';
include('partials/_login.php');
include('partials/_signup.php');

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'true') {
  echo'<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success !</strong> You can now logged in ! 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if (isset($_GET['error'])) {
      echo'<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Failed !</strong>'.$_GET['error'].'  
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if (isset($_GET['login']) && $_GET['login'] == 'true') {
      echo'<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success ! </strong>Login successfully   
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if (isset($_GET['msg'])) {
      echo'<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Success ! </strong>'.$_GET['msg'].'  
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>