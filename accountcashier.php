<?php
 include ('components/header.php');
 include ('components/sidebarcashier.php');
 
 session_start();

  $qGet = "SELECT * FROM user WHERE id = '$id'";
  $result = mysqli_query($conn, $qGet);
  $u=mysqli_fetch_array($result);
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
          <h3>Account</h3>
        </div>
                <form action="updateaccount.php">
                    <div >
                    <input type="hidden" value="<?php echo $u['id'] ?>" name="id"></input>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $u['username'] ?>" id="productQty" name="username" required>
                        </div>
                      </div>
                    <div >
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Phone Number</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $u['nohp'] ?>" id="phoneNum" placeholder="08xxxxxxxxxx" name="phoneNum" >  
                      
                      </div>
                    </div>
                    <div >
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Change Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" value="<?php echo $u['password'] ?>" id="productQty" name="password" required>
                        </div>
                      </div>
            
                    <div class="form-group row">
                      <div class="col-sm-10"> <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div> 
                    </div> 
                    <tr> 
                 </tr>
                  </form>   
                    </div>
                  </div>
                </div>
      <script src="assets/js/main.js"></script>
      <script src="assets/js/mdb.min.js.map"></script>
      <script src="assets/js/mdb.min"></script>
    </body>
  </html>
  
 

