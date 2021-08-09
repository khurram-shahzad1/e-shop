<?php
require '../../core/dbconfig.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE email='$email' AND `password`='$password'";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_num_rows($query);

    if ($data == "0") {
        echo 0;
    
    }else{
        echo 1;
        $info = mysqli_fetch_array($query);
        $uid = $info['id'];
        setcookie ('admin_id',$uid,time() + 84600*7 , '/');
    }
}


if(isset($_POST['newCategory'])) {
    $name = $_POST['name'];
    $sql = "INSERT into categories (`name`) VALUES ('$name')";
    $query = mysqli_query($conn, $sql);

    if($query == "1") {
        echo 1;
    }else{
        echo 0;
    }

}


if(isset($_POST['delcat'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM categories WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if($query == "1"){
        echo 1;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }
}
if(isset($_POST['deluser'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if($query == "1"){
        echo 1;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }
}

if (isset($_POST['updateCat'])) {
    $id = $_POST['catid'];
    $cname = $_POST['name'];

    $sql = "UPDATE categories SET `name`='$cname' WHERE id='$id'";
    $query = mysqli_query($conn,$sql);
    if ($query == "1") {
        echo 1;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }
}
if (isset($_POST['updateProdCat'])) {
    $pid = $_POST['updateProdCat'];
    $newCat = $_POST['newCat'];

    $sql = "UPDATE products SET `cat_id`='$newCat' WHERE id='$pid'";
    $query = mysqli_query($conn,$sql);
    if ($query == "1") {
        $catName = mysqli_fetch_array(mysqli_query($conn, "SELECT `name` FROM categories WHERE id = '$newCat'"))[0];
        echo $catName;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }
}

if(isset($_POST['newProduct'])) {
    $cat = $_POST['catId'];
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $target_dir = "../assets/uploads/";
    $target_file = basename($_FILES["productImage"]["name"]);

    $path = $target_dir . $target_file;
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $path)) {
        $insert = mysqli_query($conn, "INSERT into products (cat_id, `name`, `description`, price, `image`) VALUES ('$cat', '$name', '$description', '$price', '$target_file') ");
        if($insert){
            echo 1;
        }else{
            echo mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



if (isset($_POST['delProduct'])) {
    $id = $_POST['id'];

    $image = mysqli_fetch_array(mysqli_query($conn, "SELECT `image` FROM products WHERE id = '$id'"))[0];

    unlink("../../assets/uploads/$image");

    $sql = "DELETE  FROM products WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if ($query == "1") {
        echo 1;
    }else{
        echo 0;
        mysqli_error($conn);
    }
}

if (isset($_POST['formpro'])) {
    $id = $_POST['proid'];
    $cat = $_POST['catId'];
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if($_FILES['productImage']['name'] != ""){
        $target_dir = "../assets/uploads/";
        $target_file = basename($_FILES["productImage"]["name"]);
    
        $path = $target_dir . $target_file;
        
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $path)) {
            $update = mysqli_query($conn, "UPDATE products SET  cat_id ='$cat', `name`='$name' , `description`='$description' , price='$price', `image` = '$target_file' WHERE id='$id'");
            if($update == '1'){
                echo '1';
            }else{
                echo mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }else{
        $update = mysqli_query($conn, "UPDATE products SET  cat_id ='$cat', `name`='$name' , `description`='$description' , price='$price' WHERE id='$id'");
        if($update == '1'){
            echo '1';
        }else{
            echo mysqli_error($conn);
        }
    }
}

if(isset($_POST['acceptOrder'])){
    $oid = $_POST['acceptOrder'];

    echo mysqli_query($conn,"UPDATE orders SET `status` = '1' WHERE id = '$oid'");

}
if(isset($_POST['rejectOrder'])){
    $oid = $_POST['rejectOrder'];

    echo mysqli_query($conn,"UPDATE orders SET `status` = '4' WHERE id = '$oid'");
}
if(isset($_POST['processOrder'])){
    $oid = $_POST['processOrder'];

    echo mysqli_query($conn,"UPDATE orders SET `status` = '2' WHERE id = '$oid'");
}


if(isset($_POST['changeOrderStatus'])){
    $oid = $_POST['changeOrderStatus'];
    $status = $_POST['status'];

    echo mysqli_query($conn,"UPDATE orders SET `status` = '$status' WHERE id = '$oid'");
}

if(isset($_POST['addInventory'])){
    $pid = $_POST['addInventory'];
    $value = $_POST['value'];

    $preInv = mysqli_fetch_array(mysqli_query($conn, "SELECT inventory FROM products WHERE id = '$pid'"))[0];
    $newInv = $preInv + $value;
    echo mysqli_query($conn,"UPDATE products SET `inventory` = '$newInv' WHERE id = '$pid'");

}
if(isset($_POST['delInventory'])){
    $pid = $_POST['delInventory'];
    $value = $_POST['value'];

    $preInv = mysqli_fetch_array(mysqli_query($conn, "SELECT inventory FROM products WHERE id = '$pid'"))[0];
    if($preInv < $value){
        $newInv = 0;
    }else{
        $newInv = $preInv - $value;
    }
    if($value > 0){
        echo mysqli_query($conn,"UPDATE products SET `inventory` = '$newInv' WHERE id = '$pid'");
    }


}
if(isset($_POST['updateProdName'])){
    $pid = $_POST['updateProdName'];
    $newName = $_POST['newName'];
    echo mysqli_query($conn,"UPDATE products SET `name` = '$newName', price = '$newName', `description` = '$newName' WHERE id = '$pid'");


}
?>