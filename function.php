<?php 

// connect to db
function connection(){
$conn = mysqli_connect('localhost', 'root', '', 'ssip2') or die('Connection to database failure!');
return $conn;
}

function query($query){
    $conn = connection();
    $result = mysqli_query($conn, $query) or die('Query Failure'. mysqli_error($conn) );
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
    }

    return $rows;
}



function register($data){
    $conn = connection();
    $name = $data['name'];
    $username = $data['username'];
    $role = 'customer';
    $password = $data['password'];
    $nohp = $data['phoneNum'];

    // query insert data
    $query = "INSERT INTO user (id, name, username, role, password, nohp)
                VALUES(null, '$name', '$username', '$role', '$password',  '$nohp')";

    // insert data to user table
    mysqli_query($conn, $query) or die('Query Failure'.mysqli_error($conn));

    // return result
    return mysqli_affected_rows($conn);

} //end of add data func

function addProduct($data){
    $conn = connection();


    $productName = $data['productName'];
    $productDesc = $data['productDesc'];
    $productPrice = $data['productPrice'];
    $productType = $data['productType'];
    $productQty = $data['productQty'];


    //upload iamge, sanitation
    $productImage = upload();
    if(!$productImage){
        return false;
    }
    
    // query insert data
    $query = "INSERT INTO product (productId, productName, productDesc, productPrice, productQty, productImage, productType)
                VALUES(null, '$productName', '$productDesc', '$productPrice', '$productQty', '$productImage', '$productType')";
    
    // insert data to book table
    mysqli_query($conn, $query) or die('Query Failure'.mysqli_error($conn));

    // return result
    return mysqli_affected_rows($conn);
}

function addUser($data){
    $conn = connection();
    $name = $data['name'];
    $username = $data['username'];
    $password = $data['password'];
    $role = $data['role'];
    $phoneNum = $data['phoneNum'];
    $userImage = upload();

    // query insert data
    $query = "INSERT INTO user (id, name, username, password, role, userImage, nohp)
                VALUES(null, '$name', '$username', '$password', '$role', '$userImage', '$phoneNum')";

    // insert data to book table
    mysqli_query($conn, $query) or die('Query Failure'.mysqli_error($conn));

    // return result
    return mysqli_affected_rows($conn);
}

function addDiscount($data){
    $conn = connection();
    $discountName = $data['discountName'];
    $discountCode = $data['discountCode'];
    $discountAmount = $data['discountAmount'];

    // query insert data
    $query = "INSERT INTO discount (discountId, discountName, discountCode, discountAmount)
                VALUES(null, '$discountName', '$discountCode', '$discountAmount')";
    
    // insert data to book table
    mysqli_query($conn, $query) or die('Query Failure'.mysqli_error($conn));
    
    // return result
    return mysqli_affected_rows($conn);
}

// add data
function add($data){
    $conn = connection();
    // data sanitation
    $Title =mysqli_real_escape_string($conn, htmlspecialchars($data['Title']));
    $Writer =mysqli_real_escape_string($conn, htmlspecialchars($data['Writer']));
    $Publisher =mysqli_real_escape_string($conn, htmlspecialchars($data['Publisher']));
    $Category =mysqli_real_escape_string($conn, htmlspecialchars($data['Category']));

    //upload image, sanitation
    $Image = upload();
    if(!$Image){
        return false;
    }

    // query insert data
    $query = "INSERT INTO book
                VALUES(null, '$Title', '$Writer', '$Publisher', '$Category', '$Image' )";
    
    // insert data to book table
    mysqli_query($conn, $query) or die('Query Failure'.mysqli_error($conn));
    
    // return result
    return mysqli_affected_rows($conn);

} //end of add data func



function deleteUser($Id){
    $conn = connection();
     mysqli_query($conn, "DELETE FROM user WHERE Id = $Id") or die('Query Failure'. mysqli_error($conn) );

    return mysqli_affected_rows($conn);
}

function deleteProduct($Id){
    $conn = connection();

     mysqli_query($conn, "DELETE FROM product WHERE productId = $Id") or die('Query Failure'. mysqli_error($conn) );

    return mysqli_affected_rows($conn);
}

function deleteDiscount($Id){
    $conn = connection();

     mysqli_query($conn, "DELETE FROM discount WHERE discountId = $Id") or die('Query Failure'. mysqli_error($conn) );

    return mysqli_affected_rows($conn);
}



function editProduct($data){
    $conn = connection();

    // data sanitation
    $Id = $data['productId'];
    $Name = $data['productName'];
    $Desc = $data['productDesc'];
    $Type = $data['productType'];
    $Qty = $data['productQty'];
    $Price = $data['productPrice'];
   
    
 
    // query update data
    $query = "UPDATE product
            SET 
            productId = '$Id' ,
            productName = '$Name',
          	productDesc = '$Desc',  
            productPrice = '$Price',
            productQty   = '$Qty',
            productType = '$Type',
                WHERE productId = $Id
            ";

    
    // update data from table
    mysqli_query($conn, $query) or die('Query Failure'.mysqli_error($conn));
    return mysqli_affected_rows($conn);
}



function editUser($data){
    $conn = connection();

    // data sanitation
    $Id = $data['id'];
    $name = $data['name'];
    $username = $data['username'];
$password = $data['password'];
    $nohp = $data['phoneNum'];
    $role = $data['role'];
   
    
 
    // query update data
    $query = "UPDATE user 
    SET name = '$name', 
    username = '$username', 
    password = '$password', 
    nohp = '$nohp',
    role = '$role', 
    where Id = '$Id' "
            ;

    
    // update data from table
    mysqli_query($conn, $query) or die('Query Failure'.mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function editDiscount($data){
    $conn = connection();

    // data sanitation
    $Id = $data['discountId'];
    $Name = $data['discountName'];
    $Code = $data['discountCode'];
    $Amount = $data['discountAmount'];
   
    // query update data
    $query = "UPDATE discount
            SET 
            discountId = '$Id',
            discountName = '$Name',
            discountCode = '$Code',  
            discountAmount = '$Amount',
                WHERE discountId = $Id
            ";
            mysqli_query($conn, $query) or die('Query Failure'.mysqli_error($conn));
            return mysqli_affected_rows($conn);

}

// upload function
function upload(){


    $fileName = $_FILES['Image']['name'];
    $fileType = $_FILES['Image']['type'];
    $fileSize= $_FILES['Image']['size'];
    $error = $_FILES['Image']['error'];
    $tmpName = $_FILES['Image']['tmp_name'];
    $fileExtention = pathinfo($fileName, PATHINFO_EXTENSION);

    
    //check if there any image uploaded
    if($error === 4){
        return 'default.jpg';
    }
    
    // check if the uploaded file is image (jpg, jpeg,png)
    $imageValidType = ['image/jpg', 'image/jpeg', 'image/png'];
    if(!in_array($fileType, $imageValidType)) {
        echo "<script>
                alert('File that you uploaded is not an image');  
              </script>";

            return false;
    }

    // check size of image
    if($fileSize> 2000000){
        echo "<script>
                alert('Image size is too large');   
              </script>";
    }  

    // Image ready to upload (no error)
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $fileExtention;

    // // upload Image
    move_uploaded_file($tmpName, 'img/' . $newFileName);
    return $newFileName;
}

?>