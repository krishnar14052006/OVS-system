<?php
include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if($password==$cpassword){
move_uploaded_file($tmp_name, "../uploads/$image ");
$insert = mysqli_query($connect,"INSERT INTO user (name, mobile, address, password, photo, role, status, votes) VALUES ('$name','$mobile', '$address','$password','$image','$role',0,0)");
if($insert){
    echo '<script>
    alert("regestration successfull ");
    window.location = "../uploads/index.html";
    </script>
    ';
}
else{
    echo '<script>
    alert("some error occured ");
    window.location ="../routes/regester.html";
    </script>
    ';
}

}

else{
    echo '<script>
    alert("password and confirm password doesent match ");
    window.location ="../routes/register.html";
    </script>
    ';
}
