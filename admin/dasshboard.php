<?php
$name = "Dashboard"; 
include 'include/header.php';
include '../core/dbconfig.php';
$date = "all";
if(isset($_GET['date'])){
  $date = $_GET['date'];

  if($date == 'today' || $date == 'yesterday'){
    $currDate = date('Y-m-d');
    $compareDate = date('Y-m-d');
    if($date == 'yesterday'){
      $compareDate = date('Y-m-d', strtotime($currDate. ' -1 days'));
    }
    echo $compareDate;
    $totalOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `timestamp` LIKE '$compareDate %'");
    $pendingOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `status` != '3' AND `status` != '4' AND `timestamp` LIKE '$compareDate %'");
    $completedOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `status` = '3' AND `timestamp` LIKE '$compareDate %' ");
    $earningsOrderQ = mysqli_query($conn , "SELECT SUM(paid) FROM `orders` WHERE `timestamp` LIKE '$compareDate %'");
    $totalUsersQ = mysqli_query($conn , "SELECT COUNT(id) FROM `users` WHERE `timestamp` LIKE '$compareDate %'");
  }
  if($date == 'week' || $date == 'month' || $date == 'year'){
    $currDate = date('Y-m-d');
    $t = $date;
    $t2 = '1';
    if($date == 'week'){
      $t = 'day';
      $t2 = '7';
    }
      $startDate = date('Y-m-d', strtotime($currDate. ' -'.$t2.' '.$t.'s'));
    // }
    // if($date == 'month'){
    //   $startDate = date('Y-m-d', strtotime($currDate. ' -1 months'));
    // }
    // if($date == 'year'){
    //   $startDate = date('Y-m-d', strtotime($currDate. ' -1 years'));
    // }
    echo $currDate . "<br>";
    echo $startDate . "<br>";
    $totalOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `timestamp` BETWEEN '$startDate' AND '$currDate'");
    $pendingOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `status` != '3' AND `status` != '4' AND `timestamp` BETWEEN '$startDate' AND '$currDate' ");
    $completedOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `status` = '3' AND `timestamp` BETWEEN '$startDate' AND '$currDate' ");
    $earningsOrderQ = mysqli_query($conn , "SELECT SUM(paid) FROM `orders` WHERE `timestamp` BETWEEN '$startDate' AND '$currDate'");
    $totalUsersQ = mysqli_query($conn , "SELECT COUNT(id) FROM `users` WHERE `timestamp` BETWEEN '$startDate' AND '$currDate'");
  }

}
if($date == "all"){
  $totalOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders`");
  $pendingOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `status` != '3' AND `status` != '4'");
  $completedOrderQ = mysqli_query($conn , "SELECT COUNT(id) FROM `orders` WHERE `status` = '3' ");
  $earningsOrderQ = mysqli_query($conn , "SELECT SUM(paid) FROM `orders` ");
  $totalUsersQ = mysqli_query($conn , "SELECT COUNT(id) FROM `users` ");

}


?>
<div class="m-portlet  m-portlet--unair">
  <div class="m-portlet__body  m-portlet__body--no-padding">
    <div class="row m-row--no-padding m-row--col-separator-xl">
    
    <div class="col-md-12">
        <select class="form-control" id="dateFilter">
          <option value="all" <?php if($date == 'all'){echo 'selected'; }?>>all</option>
          <option value="today" <?php if($date == 'today'){echo 'selected'; }?>>today</option>
          <option value="yesterday" <?php if($date == 'yesterday'){echo 'selected'; }?>>yesterday</option>
          <option value="week" <?php if($date == 'week'){echo 'selected'; }?>>this week</option>
          <option value="month" <?php if($date == 'month'){echo 'selected'; }?>>this month</option>
          <option value="year" <?php if($date == 'year'){echo 'selected'; }?>>this year</option>
        </select>
        <br><br>
    </div>
      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="m-widget24">
          <div class="m-widget24__item">
            <h4 class="m-widget24__title">
              Total Orders
            </h4><br>
            <span class="m-widget24__desc">
              All Order
            </span>
            <?php
              $total = mysqli_fetch_array($totalOrderQ)[0];
        
            $to= ($total/1000)*1000;
          ?>
            <span class="m-widget24__stats m--font-primary">
              <?php echo $total; ?>
            </span>
            <div class="m--space-10"></div>
            <div class="progress m-progress--sm">
              <div class="progress-bar m--bg-primary" role="progressbar" style="width: <?php echo $to; ?>%">
              </div>
            </div>
            <span class="m-widget24__change">
              Change
            </span>
            <span class="m-widget24__number">
              <?php echo $to;?>%
            </span>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="m-widget24">
          <div class="m-widget24__item">
            <h4 class="m-widget24__title">
              Pending Orders
            </h4><br>
            <span class="m-widget24__desc">
              All Pending Order
            </span>
            <?php
              $pending = mysqli_fetch_array($pendingOrderQ)[0];
            $to= ($pending/1000)*1000;
          ?>
            <span class="m-widget24__stats m--font-danger">
              <?php echo $pending; ?>
            </span>
            <div class="m--space-10"></div>
            <div class="progress m-progress--sm">
              <div class="progress-bar m--bg-danger" role="progressbar" style="width: <?php echo $to; ?>%">
              </div>
            </div>
            <span class="m-widget24__change">
              Change
            </span>
            <span class="m-widget24__number">
              <?php echo $to;?>%
            </span>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="m-widget24">
          <div class="m-widget24__item">
            <h4 class="m-widget24__title">
              Completed Orders
            </h4><br>
            <span class="m-widget24__desc">
              Order Completed
            </span>
            <?php
            $completed = mysqli_fetch_array($completedOrderQ)[0];
            $to= ($completed/1000)*1000;
          ?>
            <span class="m-widget24__stats m--font-success">
              <?php echo $completed; ?>
            </span>
            <div class="m--space-10"></div>
            <div class="progress m-progress--sm">
              <div class="progress-bar m--bg-success" role="progressbar" style="width:<?php echo $to; ?>%;"
                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="m-widget24__change">
              Change
            </span>
            <span class="m-widget24__number">
              <?php echo $to; ?>%
            </span>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="m-widget24">
          <div class="m-widget24__item">
            <h4 class="m-widget24__title">
              Earniing
            </h4><br>
            <span class="m-widget24__desc">
              Total Paid
            </span>
            <?php
            $total = 0;

            $earnings = mysqli_fetch_array($earningsOrderQ)[0];
            $to= ($earnings/10000000)*10000;
          ?>
            <span class="m-widget24__stats m--font-info">
              Rs: <?php echo $earnings; ?>
            </span>
            <div class="m--space-10"></div>
            <div class="progress m-progress--sm">
              <div class="progress-bar m--bg-info" role="progressbar" style="width:<?php echo $to; ?>%;"
                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="m-widget24__change">
              Change
            </span>
            <span class="m-widget24__number">
              <?php echo $to; ?>%
            </span>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="m-widget24">
          <div class="m-widget24__item">
            <h4 class="m-widget24__title">
              Total Users
            </h4><br>
            <span class="m-widget24__desc">
              All Users
            </span>
            <?php
             $users = mysqli_fetch_array($totalUsersQ)[0];
            $to= ($users/1000)*1000;
             ?>
            <span class="m-widget24__stats m--font-brand">
              <?php echo $users; ?>
            </span>
            <div class="m--space-10"></div>
            <div class="progress m-progress--sm">
              <div class="progress-bar m--bg-brand" role="progressbar" style="width: <?php echo $to; ?>%">
              </div>
            </div>
            <span class="m-widget24__change">
              Change
            </span>
            <span class="m-widget24__number">
              <?php echo $to;?>%
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a href="login.php"><button class="btn btn-danger mt-4" style="color:white;">Logout</button></a>
</div>
</div>




<?php include 'include/footer.php';?>
<script>
  $(function () {
    $('#dateFilter').on('change', function () {
      var value = $(this).val();
      location.replace('./dasshboard?date=' + value);
    })
  })
</script>