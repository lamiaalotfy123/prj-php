
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary sticky-top">
  <div class="container-fluid ">
    <a class="navbar-brand font-monospace" href="#">
      <img src="admin/generalimg/OIG2ff.jpg" width="55" height="50" class="d-inline-block align-text-center  " style="border-radius: 100%;">
      lamia's schools
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
      </ul>
      <?php


session_start();


     if (isset($_SESSION['user_id'])) {
     ?>
     <a class="nav-link" href="logout.php">
         <button class="btn btn-secondary btn-outline-warning rounded-pill" type="button">Logout</button>
     </a>
     <?php } ?>
     

    </div>
  </div>
</nav>
