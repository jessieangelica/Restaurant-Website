<?php
 include ('components/sidebarcashier.php');
 
 session_start();
 if (!isset($_SESSION['username'])){
  header("Location: login.php");

  } elseif(isset($_SESSION['username'])){
   if($_SESSION['role'] === 'admin'){
     header("Location: dashboardadmin.php");
    }  elseif ($_SESSION['role'] === 'customer'){
     header("Location: dashboarduser.php");
    };
 } 

 $productorder= query("SELECT * FROM productorder");
 foreach ($productorder as $p);

 $user = query('SELECT * FROM user');
$products = query('SELECT * FROM product');
?>

<!DOCTYPE html>
<html lang="en">
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="" />
          <span class="d-none d-lg-block">PRES U Caffe</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle" href="#">
              <i class="bi bi-search"></i>
            </a>
          </li>
        </ul>
      </nav>
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->

    <main id="main" class="main">
      <div class="pagetitle">
        <h2 class="text-primary">Dashboard</h2>
      </div>

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-xxl-4 col-md-4">
                <div class="card-pu info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Your Product</h5>
                    <div class="d-flex align-items-start">
                      <div class="ps-3">
                        <h1><?php 
                        echo count($products);
                        ?></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Sales Card -->

              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-4">
                <div class="card-pu info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Sales Made</h5>
                    <div class="d-flex align-items-start">
                      <div class="ps-3">
                        <h1><?php 
                        echo count($productorder);
                        ?></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Sales Card -->
              <!-- Customers Card -->
              <div class="col-xxl-4 col-xl-4">
                <div class="card-pu info-card customers-card">
      
                  <div class="card-body">
                    <h5 class="card-title">Employee</h5>

                    <div class="d-flex align-items-center">
                      <div class="ps-3">
                        <h1><?php 
                        echo count($products);
                        ?></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Customers Card -->


              <!-- Recent Sales -->
            
              <h4>Transactions</h4>
              <table class="table table-borderless datatable">
                        <thead>
                          <tr>
                          <th width="10%">No</th>
                          <th width="20%">Item Name</th>
                          <th width="20%">Item List</th>
						              <th width="10%">Quantity</th>
						              <th width="20%">Total Price</th>
						              <th width="20%">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php foreach( $productorder as $p) : ?>
                          <tr>
                            <td><?php static $orderNum = 1; echo $orderNum++; ?></td>
                            <td><?php echo $p['userName'] ?></td>
                            <td><?php echo $p['orderList'] ?></td>
                            <td><?php echo $p['orderQty'] ?></td>
                            <td><?php echo $p['price'] ?></td>
                            <td><button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                Accept
                               </button>
                               <button type="bustton" class="btn btn-danger">Deny</button>
                               <a href="detailorder.php" type="button" class="btn btn-warning">View</a>
                              </td>
                          </tr>
                          
                          <?php endforeach ?>
                        </tbody>
                      </table>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>
