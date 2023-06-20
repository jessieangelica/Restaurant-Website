<?php 
include ('dbconnect.php');
require 'components/function.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(addProduct($_POST)) {
    header("Location: product.php");
  }  
}
?>
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title></title>
  </head>
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
             <h2>Add Product</h2>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-6">
        
        <form action="" method="POST" enctype="multipart/form-data">
        

            <div class="mb-3">
                <label for="Writer" class="form-label">Name</label>
                <input type="text" class="form-control" id="productName" name="productName" required>
            </div>
            <div class="mb-3">
                <label for="Publisher" class="form-label">Description</label>
                <input type="text" class="form-control" id="productDesc" name="productDesc" required>
            </div>
            <div class="mb-3">
                <label for="Category" class="form-label">Price</label>
                <input type="text" class="form-control" id="productPrice" name="productPrice" required>
            </div>
            <div class="mb-3">
                <label for="Category" class="form-label">Qty</label>
                <input type="text" class="form-control" id="productQty" name="productQty" required>
            </div>
            <div class="mb-3">
                <label for="productType" class="form-label">Type</label>
                <select name="productType" class="form-select">
                  <option value="food">Food</option>
                  <option value="drink">Drink</option>
              </select>
            </div>
            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <input type="file" class="form-control" id="productImage" name="Image">
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
        </div>
    </div>   
</div>

    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
  </body>
</html>