<?php 
  include 'components/header.php';
  include 'components/function.php';
  $conn = connection();
  session_start();
  
    $id =  $_SESSION['id'];
      
      $qGet = "SELECT * FROM user WHERE id = '$id'";
      $result = mysqli_query($conn, $qGet);
      $row= mysqli_fetch_array($result);
  ?>

<aside id="sidebar" class="sidebar">
      
      <div class="row">
      <div class="col-lg-12">
          <div class="card-body text-center">
            <img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.blibli.com%2Ffriends-backend%2Fwp-content%2Fuploads%2F2020%2F11%2Fji-chang-wook.jpeg&tbnid=HbpNl8ghXUHETM&vet=12ahUKEwjQwuOI-cL_AhUI8HMBHUH5D4kQMygEegUIARDjAQ..i&imgrefurl=https%3A%2F%2Fwww.blibli.com%2Ffriends%2Fblog%2Fdrama-ji-chang-wook-00%2F&docid=_Iiz-qUY1PY_nM&w=700&h=525&q=ji%20chang%20wook&hl=en&ved=2ahUKEwjQwuOI-cL_AhUI8HMBHUH5D4kQMygEegUIARDjAQ" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
              <h5>  <?php echo $row['username'] ?> </h5>
            <p>  <?php echo $row['role'] ?> </p>
        </div>  

      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="dashboarduser.php">
              <i class="bi bi-grid"></i>
              <span>Menu</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orderuser.php">
              <i class="bi bi-grid"></i>
              <span>My Order</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="accountuser.php">
              <i class="bi bi-grid"></i>
              <span>Account</span>
            </a>
          </li>
      </ul>
      <a href="logout.php" type="button" class="btn btn-danger" data-mdb-toggle="modal"
                        data-mdb-target="#exampleModal">
                    Log Out
                  </a>
      
    </aside>