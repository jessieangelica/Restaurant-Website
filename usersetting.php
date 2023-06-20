<!DOCTYPE html>
<html lang="en">

  <?php 
    include ('components/header.php');
    include ('components/sidebar.php');
    $admin = query("SELECT * FROM user WHERE role = 'admin'");
    $cashier = query("SELECT * FROM user WHERE role = 'cashier'");
    $customer = query("SELECT * FROM user WHERE role = 'customer'");
    
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
        } elseif(isset($_SESSION['username'])){
         if($_SESSION['role'] === 'customer'){
           header("Location: dashboarduser.php");
          }  elseif ($_SESSION['role'] === 'cashier'){
            header("Location: dashboardcashier.php");
          }
       }
       $user = query("SELECT * FROM user");

    if(isset($_GET['page']))
        {
            $page = $_GET['page'];
        }
        else
        {
            $page = 1;
        }
        $num_per_page = 04;
        $start_from = ($page-1)*04;
         
            
        $user= query("SELECT * FROM user LIMIT $start_from,$num_per_page");
        $admin= query("SELECT * FROM user WHERE role = 'admin' LIMIT $start_from,$num_per_page");
        $cashier= query("SELECT * FROM user WHERE role = 'cashier' LIMIT $start_from,$num_per_page");
        $customer= query("SELECT * FROM user WHERE role = 'customer' LIMIT $start_from,$num_per_page");
        $q= query("SELECT * FROM user LIMIT $start_from,$num_per_page");
        
        $pr_query = "select * from user ";
        $pr_result = mysqli_query($conn,$pr_query);
        $total_record = mysqli_num_rows($pr_result );
        $total_page = ceil($total_record/$num_per_page);
?>
    <!-- End Sidebar-->
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
      </ul>
    </nav>

    <!-- End Icons Navigation -->
    </header>
    <main id="main" class="main">
    <div class="pagetitle">
        <h3>User Setting</h3>
    </div>

    <!-- End Page Titsle -->
    <a href="adduser.php"  type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
        ADD
    </a>

    <!-- Recent Sales -->
    <h4>Admin</h4>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Action</th>

            </tr>
        </thead>

        <!-- Modal -->
        <tbody>
        <?php foreach( $admin as $a) : ?>
            <?php static $adminNum = 0; $adminNum++; ?>
            <tr>
                <th scope="row"><a href="#"> <?php echo $adminNum ?> </a></th>
                <td> <?php echo $a['name'] ?></td>
                <td> <?php echo $a['nohp'] ?></td>
                <td>
                    <a href="edituser.php?id=<?php echo $a['id'] ?>">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <a href="deleteuser.php?id=<?php echo $a['id'] ?>">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; 
        ?>
        </tbody>
    </table>

    <h4>Worker</h4>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Password</th>
                <th scope="col">Job</th>
                <th scope="col">Action</th>

            </tr>
        </thead>

        <!-- Modal -->
        <tbody>
            <?php foreach( $cashier as $a) : ?>
            <?php static $workerNum = 0; $workerNum++; ?>
            <tr>
                <th scope="row"><a href="#"> <?php echo $workerNum ?> </a></th>
                <td> <?php echo $a['name'] ?></td>
                <td> <?php echo $a['nohp'] ?></td>
                <td> <?php echo $a['role'] ?></td>
                <td>
                    <a href="edituser.php?id=<?php echo $a['id'] ?>">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <a href="deleteuser.php?id=<?php echo $a['id'] ?>">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Customer</h4>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <!-- Modal -->
        <tbody>
            <?php foreach( $customer as $a) : ?>
            <?php static $customerNum = 0; $customerNum++; ?>
            <tr>
                <th scope="row"><a href="#"> <?php echo $customerNum ?> </a></th>
                <td> <?php echo $a['name'] ?></td>
                <td> <?php echo $a['nohp'] ?></td>
                <td>
                    <a href="edituser.php?id=<?php echo $a['id'] ?>">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <a href="deleteuser.php?id=<?php echo $a['id'] ?>">
                        <button type="button" class="btn btn-danger">Delete</button>
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
            echo "<a href='usersetting.php?page=".($page-1)."' class='page-link'>Previous</a>";
        }
        for($i=1;$i<$total_page;$i++)
        {
            echo "<a href='usersetting.php?page=".$i."' class='page-link'>$i</a>";
        }
    
        if($i>$page)
        {
            echo "<a href='usersetting.php?page=".($page+1)."' class='page-link'>Next</a>";
        }
      ?>
      </ul>    

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/mdb.min.js.map"></script>
    <script src="assets/js/mdb.min"></script>
    </body>
</html>