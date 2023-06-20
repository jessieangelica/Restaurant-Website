<?php 

include 'components/header.php';
include 'components/function.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(addDiscount($_POST)) {
    header("Location: discount.php");
  }  
}



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
?>


<!doctype html>
<html lang="en">
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Pres U Cafe</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container containerr">

    <div class="row mt-3 ">
        <div class="col">
             <h2>Add Discount</h2>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-6">
        
        <form action="" method="POST" enctype="multipart/form-data">
        
            <div class="mb-3">
                <label for="Writer" class="form-label">Discount Name</label>
                <input type="text" class="form-control" id="discountName" name="discountName" required>
            </div>
            <div class="mb-3">
                <label for="Publisher" class="form-label">Discount Code</label>
                <input type="text" class="form-control" id="discountCode" name="discountCode" required>
            </div>
            <div class="mb-3">
                <label for="Publisher" class="form-label">Discount Amount (%)</label>
                <input type="text" class="form-control" id="discountAmount" name="discountAmount" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Discount</button>
        </form>
        </div>
    </div>   
</div>
<!-- footer -->
<section> 

  </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
  </body>
</html>