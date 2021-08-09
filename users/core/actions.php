<?php
include '../../core/dbconfig.php';


function random($strength = 16) {
    $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
if (isset($_POST['signupform'])) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $Password = $_POST['password'];
    $Email = $_POST['email'];
    $Phone = $_POST['pn'];


$sql = "INSERT into users (first_name , last_name , `password`, email , phone)VALUES('$firstname','$lastname','$Password','$Email','$Phone')";
$query = mysqli_query($conn, $sql);
if ($query == "1") {
    echo 1;
}else{
    echo mysqli_error($conn);
    echo 0;
}
}
if (isset($_POST['Loginform'])) {
    $Email = $_POST['email'];
    $Password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE email='$Email' AND `password`='$Password'";
$query = mysqli_query($conn, $sql);
$data = mysqli_num_rows($query);

if ($data == "0") {
    echo 0;
}else{
    $info = mysqli_fetch_array($query);
    $uid = $info['id'];
    setcookie ('users_id',$uid,time() + 84600*7 , '/');
    echo 1;
    echo mysqli_error($conn);
}
}

if(isset($_POST['addToCart'])){
    $prodId = $_POST['addToCart'];
    echo $prodId;
    $cart = '';
    if(isset($_COOKIE['cart'])){
        $cart = $_COOKIE['cart'];
    }
    if($cart == ""){
        setcookie('cart', $prodId, time()+86400*7, '/');
    }else{
        setcookie('cart', $cart.','.$prodId, time()+86400*7, '/');
    }
    echo 1;
}
if(isset($_POST['removeFromCart'])){
    $prodId = $_POST['removeFromCart'];
    // echo $prodId;
    $cart = $_COOKIE['cart'];
    $cartArray = explode(',', $cart);
    $index = array_search($prodId, $cartArray);
    unset($cartArray[$index]);
    $finalProds = implode(',', $cartArray);
    setcookie('cart', $finalProds, time()+86400*7, '/');
    echo 1;
}
if(isset($_POST['duplicateProd'])){
    $prodId = $_POST['duplicateProd'];
    $inv = mysqli_fetch_array(mysqli_query($conn, "SELECT inventory FROM products WHERE id = '$prodId'"))[0];
    $cart = $_COOKIE['cart'];
    $cart = explode(',', $cart);
    $cartCount = array_count_values($cart);
    $inCart = $cartCount[$prodId];
    if($inv > $inCart){
        $cartNew = $_COOKIE['cart'].','.$prodId;
        setcookie('cart', $cartNew, time()+86400*7, '/');
    }
    echo 1;
}
if(isset($_POST['addAddress'])){
    $userId = $_POST['addAddress'];
    $title = $_POST['title'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    $query =  mysqli_query($conn, "INSERT into addresses (`user_id`, title, `address`, city, `state`, country) VALUES ('$userId', '$title', '$address', '$city', '$state', '$country')");

    if($query == '1'){
        echo 1;
    }else{
        echo mysqli_error($conn);
    }

}
if(isset($_GET['checkLoginStatus'])){
    if(isset($_COOKIE['users_id'])){
        header("Location: ../../checkout.php");
    }else{
        header("Location: ../login.php");
    }
}
if(isset($_POST['placeOrder'])){
    $userId = $_POST['placeOrder'];
    $address = $_POST['address'];

    $cartIds = $_COOKIE['cart'];
    $cart = explode(',',$cartIds);
    $cartUnique = array_unique($cart);
    $cartCount = array_count_values($cart);
    $total = 0;
    $orderNo = random(12);
    foreach ($cartUnique as $value) {
        $pid = $value;
        $query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$pid'");
        $data = mysqli_fetch_array($query);
        $qty = $cartCount[$data['id']];
        $total += $data['price'] * $qty;
        $price = $data['price'] * $qty;

        // echo $data['id'];
        // echo '<br>';
        // echo $qty;
        // echo '<br>';
        // echo $price;
        // echo '<br>';
        $order = $data['id'];
        $inv = mysqli_fetch_array(mysqli_query($conn, "SELECT inventory FROM products WHERE id = '$pid'"))[0];
        $newInv = $inv - $qty;
        mysqli_query($conn,"UPDATE products SET inventory = '$newInv' WHERE id = '$pid'");
        $po = mysqli_query($conn, "INSERT INTO `orders`(`user_id`, `address_id`, `order_no`, `order`, `qty`, `price`, `discount`, `total`, `paid`, `comments`, `status`) VALUES ('$userId', '$address', '$orderNo', '$order', '$qty', '$price', '0', '$total', '$price', '', '0')");
    }
    setcookie('cart', '', time()-3600 ,'/');

}



?>