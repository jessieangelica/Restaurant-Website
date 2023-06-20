<?php 
include 'components/header.php';
include 'components/sidebarcashier.php'; 

if (!isset($_SESSION['username'])){
 header("Location: login.php");

 } elseif(isset($_SESSION['username'])){
  if($_SESSION['role'] === 'admin'){
    header("Location: dashboardadmin.php");
   }  elseif ($_SESSION['role'] === 'customer'){
    header("Location: dashboarduser.php");
   };

} 

 $products= query("SELECT * FROM productorder");
 foreach ($products as $p);
  ?>


<!DOCTYPE html>
<html lang="en">
   <?php include 'components/header.php';   ?>

   <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
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
<body>

<main id="main" class="main">
        <div class="pagetitle">
          <h3>Order</h3>
        </div>
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
                        <?php foreach( $products as $p) : ?>
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
                      <nav  aria-label="Page navigation example">
                        <ul  class="pagination">
                          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
  </main>
      <script src="assets/js/main.js"></script>
      <script src="assets/js/mdb.min.js.map"></script>
      <script src="assets/js/mdb.min"></script>
    </body>
  </html>