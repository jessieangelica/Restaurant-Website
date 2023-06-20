<?php
 include ('components/sidebar.php');

 if (!isset($_SESSION['username'])){
  header("Location: login.php");

  } elseif(isset($_SESSION['username'])){
   if($_SESSION['role'] === 'customer'){
     header("Location: dashboarduser.php");
    }  elseif ($_SESSION['role'] === 'cashier'){
      header("Location: dashboardcashier.php");
    }
 } 

 $discount = query("SELECT * FROM discount");

 if(isset($_GET['page']))
      {
          $page = $_GET['page'];
      }
      else
      {
          $page = 1;
      }
      $num_per_page = 02;
      $start_from = ($page-1)*02;
   
      
      $discount= query("SELECT * FROM discount LIMIT $start_from,$num_per_page");
      // foreach ($products as $product);

      $q= query("SELECT * FROM discount LIMIT $start_from,$num_per_page");
     
  
  $pr_query = "select * from discount ";
  $pr_result = mysqli_query($conn,$pr_query);
  $total_record = mysqli_num_rows($pr_result );
  
  $total_page = ceil($total_record/$num_per_page);
          
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

   
      <main id="main" class="main">
    <div class="pagetitle">
        <h3>Discount</h3>
    </div>
    <!-- End Page Titsle -->
    <a href="adddiscount.php"  type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
        ADD
    </a>
        
        <!-- End Page Title -->
  
                <!-- Recent Sales -->
     
                      <table class="table table-borderless datatable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Discount Name</th>
                            <th scope="col">Discount Code</th>
                            <th scope="col">Discount Amount</th>
                            <th scope="col">Action</th>
                           
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <?php foreach( $discount as $a) : ?>
                            <?php static $discountNum = 0; $discountNum++; ?>
                            <th scope="row"><a href="#"><?php echo $discountNum ?></a></th>
                            <td><?php echo $a['discountName'] ?></td>
                            <td><?php echo $a['discountCode'] ?></td>
                            <td><?php echo $a['discountAmount' ]?>% </td>
                          
                            <td><a href="editdiscount.php?discountId=<?php echo $a['discountId'] ?>" type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                             Edit
                            <a href="deleteDiscount.php?discountId=<?php echo $a['discountId']?>" type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        Delete
                  </a>
                          </td>
                          </tr>
                          <?php endforeach; ?>
                            
                        </tbody>
                      </table>
                     
                    </div>
                  </div>
                </div>
                <!-- End Recent Sales -->
                
      <ul align="center" class="pagination">
      <?php 
        if($page>1)
        {
            echo "<a href='discount.php?page=".($page-1)."' class='page-link'>Previous</a>";
        }
        for($i=1;$i<$total_page;$i++)
        {
            echo "<a href='discount.php?page=".$i."' class='page-link'>$i</a>";
        }
    
        if($i>$page)
        {
            echo "<a href='discount.php?page=".($page+1)."' class='page-link'>Next</a>";
        }
      
      ?>
      </ul>          
  
  
 
  
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
      <script src="assets/js/mdb.min.js.map"></script>
      <script src="assets/js/mdb.min"></script>
    </body>
  </html>
  
 