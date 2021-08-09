<?php 
    include '../garments/core/dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garments</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <style>
        .navbar-brand {
            font-size: 2rem;
            font-weight: 350;
            letter-spacing: 3px;
            font-family: sans-serif;
            margin-left: 10px;
        }

        .navlink1 {
            letter-spacing: 5px;
        }

        .navlink2 {
            letter-spacing: 2px;
        }

        .cusp {
            padding: 15px;
            font-weight: bold;
        }

        #navbut {
            font-size: 14px;
            line-height: 26px;
            text-align: center;
            text-transform: uppercase;
            color: white;
            border-radius: 0px;
            border: 2px solid white;
            font-weight: bold;
            padding: 10px 40px;
        }

    </style>
</head>

<body style="background-color: #394249;">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#1C1A17;">
        <a class="navbar-brand">
            <h3 style="color: white;">Garments</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ml-4 ourSupplyNav">
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                </li>
            </ul>
            <a href="../estore/user/signup.php"><button class="btn btn-outline-secondary" type="button" id="navbut">Sign
                    Up</button></a>
            <a href="../estore/user/login.php"><button class="btn btn-outline-secondary" type="button"
                    id="navbut">LogIn</button></a>
        </div>
        </div>
    </nav>
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-12">
            <a href="./" class="btn btn-primary">
                All
            </a>
                <?php 
                    $sql ="SELECT * FROM categories ";
                    $query =mysqli_query($conn,$sql);
                    while ($data = mysqli_fetch_array($query)) {
                ?>
                    <a href="products.php?catId=<?php echo $data['id']; ?>" class="btn btn-danger">
                        <?php echo $data['name']; ?>
                    </a>
                <?php } ?>
            <a href="cart.php" class="pull-right">
                <button class="btn btn-warning">View Cart</button>
            </a>
            </div>
        </div>
    </div>
    