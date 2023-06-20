<?php 
  include ('components/header.php');
  include ('components/sidebaruser.php');

      $products= query("SELECT * FROM product");
      $conn = connection();
      $id =  $_SESSION['id'];
      $Get = isset($_GET['discountCode']) ? $_GET['discountCode'] : '';
      $getDiscount = query("SELECT * FROM discount WHERE discountCode = '$Get'");
  ?>

<!DOCTYPE html>
<html lang="en">

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="" />
          <span class="d-none d-lg-block">PRES U Caffe</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <!-- End Search Bar -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle" href="#">
              <i class="bi bi-search"></i>
            </a>
          </li>
          <!--End Search Icon-->
 
          <!-- End Profile Nav -->
        </ul>
      </nav>
      <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
   <?php

   ?>
    <!-- End Sidebar-->
 
    <main id="main" class="main">
      <div class="pagetitle">
        <h3>My Order</h3>
      </div>
        <div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>Rp. <?php echo $values["item_price"]; ?></td>
						<td>Rp. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="dashboarduser.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">Rp. <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>	
          
          </table>
      </div>
                <div >
                 <form method="post" action="orderuser.php">
                 <label for="Voucher" class="col-form-label">Discount Code</label>
                  <div class="col-sm-10 d-flex">
                    <input type="text" name="voucher" class="form-control mx-2" id="Voucher">
                    <input type="submit" class="btn btn-success"></input>
                  </div>     
                 </form>             
                </div>
                <div>
                  <label for="Method" class="col-form-label">Payment Method</label>
                  <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                      <label class="form-check-label" for="inlineRadio1">OVO</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2">ShopeePay</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                      <label class="form-check-label" for="inlineRadio2">Cash</label>
                 </div>
                
                  </div>
                </div> 
                <div>
                <?php
              if(isset($_POST['voucher'])){
                $voucher = $_POST['voucher'];
                $query = mysqli_query($conn, "SELECT * FROM discount WHERE discountCode = '$voucher'");
                if(mysqli_num_rows($query) == 0){
                  echo "<script>alert('Voucher not found!')</script>";
                  echo "<script>window.location.href='orderuser.php'</script>";
                }
                $getDiscount = mysqli_fetch_assoc($query);
                $total = $total - $total / 100 * $getDiscount['discountAmount'];
              
              ?>
                  <div class="form-group
                  row">
                    <div class="col-sm-10">
                      <label for="Total" class="col-form-label">Total</label>
                      <p>Discount Code: <?php echo $voucher ?> </p>
                      <p>Discount Amount: <?php echo $getDiscount['discountAmount'] ?>%</p>
                      <p class='h4'>Total: Rp. <?php echo number_format($total, 2); ?> </p>
                      <p></p>
                    </div>
                  </div>

               <?php } ?>   
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popup">
   Order
</button>
			</div>
		</div>


    <!-- ======= Footer ======= -->
    
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