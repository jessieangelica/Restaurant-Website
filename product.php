<?php
 include 'components/header.php';
 include ('components/sidebar.php');

 session_start();
 if (!isset($_SESSION['username'])){
  header("Location: login.php");

  } elseif(isset($_SESSION['username'])){
   if($_SESSION['role'] === 'customer'){
     header("Location: dashboarduser.php");
    }  elseif ($_SESSION['role'] === 'cashier'){
      header("Location: dashboardcashier.php");
    }
 } 

 $product = query("SELECT * FROM product");

?>

<!DOCTYPE html>
<html lang="en">
 <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="usersetting.html" class="logo d-flex align-items-center">
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
   
      <main id="main" class="main">
    <div class="pagetitle">
        <h3>Product</h3>
    </div>

    <a href="addproduct.php"  type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
        ADD
    </a>

                            
    <table class="table table-borderless datatable">
        <thead>
            <tr>
              <th scope="col">No</th>
               <th scope="col">Product Name</th>             
               <th scope="col">Description</th>             
               <th scope="col">Type</th>
               <th scope="col">Qty</th>    
               <th scope="col">Price</th>            
               <th scope="col">Action</th>                          
            </tr>
        </thead>

        <tbody>
            <?php foreach( $product as $p) : ?>
            <?php static $productNum = 0; $productNum++; ?>
            <tr>
                <th scope="row"><a href="#"> <?php echo $productNum ?> </a></th>
                <td> <?php echo $p['productName'] ?></td>
                <td> <?php echo $p['productDesc'] ?></td>
                <td> <?php echo $p['productType'] ?></td>
                <td> <?php echo $p['productQty'] ?></td>
                <td> <?php echo $p['productPrice'] ?></td>

                <td>
                  <a href="editproduct.php?productId=<?php echo $p['productId']?>" type="button" class="btn btn-primary" data-mdb-toggle="modal"
                        data-mdb-target="#exampleModal">
                        Edit
                  </a>
                  <a href="deleteProduct.php?id=<?php echo $p['productId']?>" type="button" class="btn btn-danger" data-mdb-toggle="modal"
                        data-mdb-target="#exampleModal">
                        Delete
                  </a>
                </td>
    

            <?php endforeach; ?>
        </tbody>
    </table>
                      
                <!-- End Recent Sales -->

      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
      <script src="assets/js/mdb.min.js.map"></script>
      <script src="assets/js/mdb.min"></script>
    </body>
  </html>
  
 