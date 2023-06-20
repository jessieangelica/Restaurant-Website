<?php 

include 'components/header.php';
include 'components/function.php';

session_start();
if (!isset($_SESSION['username'])){
 header("Location: login.php");

 } elseif(isset($_SESSION['username'])){
  if($_SESSION['role'] === 'customer'){
    header("Location: dashboarduser.php");
   }  elseif ($_SESSION['role'] === 'cashier'){
     header("Location: dashboardcashier.php");
    };

} 

 $Id = $_GET['discountId'];
 $conn = connection();

  $qGet = "SELECT * FROM discount WHERE discountId = '$Id'";
  $result = mysqli_query($conn, $qGet);
  $u=mysqli_fetch_array($result);
  ?>

<div class="container containerr">

<div class="row mt-3 ">
    <div class="col">
         <h2>Add Discount</h2>
    </div> 
</div>

<div class="row">
    <div class="col-md-6">
    
    <form action="updatediscount.php" method="POST" enctype="multipart/form-data">
    
        <div class="mb-3">
        <input type="hidden" class="form-control" value="<?php echo $u['discountId'] ?>" id="discountId" name="discountId" >
            <label for="Name" class="form-label">Discount Name </label>
            <input type="text" class="form-control" value="<?php echo $u['discountName'] ?>" id="discountName" name="discountName" >
        </div>
        <div class="mb-3">
            <label for="Code" class="form-label">Discount Code</label>
            <input type="text" value="<?php echo $u['discountCode'] ?>" class="form-control" id="discountCode" name="discountCode" >
        </div>
        <div class="mb-3">
            <label for="Amount" class="form-label">Discount Amount (%)</label>
            <input type="text" value="<?php echo $u['discountAmount'] ?>"" class="form-control" id="discountAmount" name="discountAmount" >
        </div>

        <button type="submit" class="btn btn-primary">Update Discount</button>
    </form>
    </div>
</div>   
</div>