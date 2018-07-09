<?php
$page = '';
$page = 'add_images';
include 'partials/header.php';
?>
<?php
$stmt = $connection->prepare("SELECT `car_id`,`model` FROM `cars_stock`");
$stmt->execute();
$udata = $stmt->fetchAll();

if (isset($_POST['add_images'])) {
    $car_id = $_POST['car_id'];
    $image = '';
    $errors = [];
    $msgs = [];
    
    if (!empty($_FILES['car_photo']['tmp_name'])) {
        $car_photo = time() . $_FILES['car_photo']['name'];
        $dest = '../uploads/car_images/' . $car_photo;
        move_uploaded_file($_FILES['car_photo']['tmp_name'], $dest);
    }
    if(empty($errors)){
        $stmt = $connection->prepare("INSERT INTO `images`(car_id,image) VALUES(:car_id,:image)");
        $stmt->bindValue(':car_id',$car_id);
        $stmt->bindValue(':image',$car_photo);
        $stmt->execute();
        $msgs[] = "File upload successfully";
        
    }
}
?>
<!-- Page Content -->
<div class="container">
    <div class="row">
<?php include 'partials/sidebar.php' ?>
        <div class="col-md-8 mt-4 mb-5">
            <p class="h2">Add Images</p>
            <form action="add_images.php" method="post" enctype="multipart/form-data">
<?php if (!empty($errors)) { ?>
                    <div class="alert alert-danger">
                    <?php foreach ($errors as $error) { ?>
                            <p><?php echo $error ?></p>  
                        <?php } ?>
                    </div>   
                    <?php } ?>
                    <?php if (!empty($msgs)) { ?>
                    <div class="alert alert-success">
                    <?php foreach ($msgs as $msg) { ?>
                            <p><?php echo $msg ?></p>  
                        <?php } ?>
                    </div>   
                    <?php } ?>
                <div class="form-group">
                    <label for="car_name">Car Name</label>
                    <select class="custom-select form-control" name="car_id" required>
                        <option selected>Select Car Model</option>
<?php foreach ($udata as $d) { ?>
                            <option value="<?php echo $d['car_id'] ?>"><?php echo $d['model'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="car_photo">Car Images &nbsp;<i class="text-danger">* only jpg,png,jpeg files</i></label>
                    <input type="file" name="car_photo" id="car_photo" class="form-control" required>
                </div>
                <div class="form-group">
                    <button name="add_images" class="btn btn-success">Add Images</button>
                    <!-- <a href="categories.php" class="btn btn-danger">Cancel</a> -->
                </div>
            </form>


        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /content container -->

<?php include_once 'partials/footer.php'; ?>




