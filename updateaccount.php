<?php

include 'components/function.php';
$conn = connection();

if(isset($_POST['id']) || isset($_POST['name']) || isset($_POST['username']) || isset($_POST['phoneNum']) || isset($_POST['password']) || isset($_POST['role'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phoneNum = $_POST['phoneNum'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    $no="";
    $qUpdate = "UPDATE user SET name = '$name', username = '$username', password = '$password', nohp = '$phoneNum', role = '$role' WHERE Id = '$id'";
    $update = mysqli_query($conn, $qUpdate);

    if($update){
        echo "<script>
        alert('Data updated');
        document.location.href = 'accountuser.php';
        </script>";
    }else{
        echo "<script>
        alert('Data not updated');
        document.location.href = 'accountuser.php';
        </script>";
    }
}
?>


