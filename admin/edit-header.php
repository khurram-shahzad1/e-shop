<?php 
$name = "Edit-header";
include 'core/dbconfig.php';
include 'include/header.php';

$headid = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM settings WHERE id='$headid'"));
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <form action="comp/actoins.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" id="fileToupload"><br><br>
                <input type="hidden" name="headid" value="<?php echo $data['id'];?>">
                <input type="hidden" name="updateheader">
                <input type="submit" value="Uplaod Image">
            </form>
        </div>
    </div>
</div>

<?php include 'include/footer.php';?>