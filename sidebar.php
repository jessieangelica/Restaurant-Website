<?php 
  include 'components/header.php';
  include 'components/function.php';
  $conn = connection();
  session_start();
    $conn = connection();
  
    $id =  $_SESSION['id'];
      
      $qGet = "SELECT * FROM user WHERE id = '$id'";
      $result = mysqli_query($conn, $qGet);
      $row= mysqli_fetch_array($result);
?>

<aside id="sidebar" class="sidebar">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-body text-center mx-auto">
            <div margin-left="50px" class="rounded-circle overflow-hidden d-flex align-items-center justify-content-center" style="width: 150px; height: 150px">
              <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.Jax7FGYhhHUhfpHMIbD4hgHaMR%26pid%3DApi&f=1&ipt=e32db85e6e95bf4c2b2164a86131f980e86fc41ef62f8997250b85b8eea80a90&ipo=images" alt="avatar" class="fa fa-align-center" aria-hidden="true"
                class="img-fluid" >
                </div>
                <h5 class="my-3"> <?php echo $row['username'] ?> </h5>
                <p class="text-muted mb-1" > <?php echo $row['role'] ?>  </p>
             </div>  
      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
          <a class="nav-link" href="dashboardadmin.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product.php">
            <i class="bi bi-grid"></i>
            <span>Products</span>
          </a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="usersetting.php">
            <i class="bi bi-grid"></i>
            <span>User Management</span>
          </a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="discount.php">
            <i class="bi bi-grid"></i>
            <span>Discount</span>
          </a>
        </li>
        <a href="logout.php" type="button" class="btn btn-danger" data-mdb-toggle="modal"
                        data-mdb-target="#exampleModal">
                    Log Out
        </a>
   </ul>
</aside>