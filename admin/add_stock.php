<?php
$page = "";
$page = "add_stock";
include_once 'partials/header.php';

if (empty($_SESSION) || empty($_SESSION['id'] || !isset($_SESSION['admin_name']))) {
    header('Location: index.php');
}


if (isset($_POST['add_stock'])) {
    $model = trim($_POST['model']);
    $stock_number = trim($_POST['stock_number']);
    $manufacturer = trim($_POST['manufacturer']);
    $chassis_code = trim($_POST['chassis_code']);
    $manufacture_year = trim($_POST['manufacture_year']);
    $transmission = trim($_POST['transmission']);
    $displacement = trim($_POST['displacement']);
    $fuel_type = trim($_POST['fuel_type']);
    $exterior_color = trim($_POST['exterior_color']);
    $interior_color = trim($_POST['interior_color']);
    $bannerImage = '';
    $errors = [];
    $msgs = [];

    if (!empty($_FILES['bannerImage']['tmp_name'])) {
        $bannerImage = time() . $_FILES['bannerImage']['name'];
        $dest = '../uploads/car_images/' . $bannerImage;
        move_uploaded_file($_FILES['bannerImage']['tmp_name'], $dest);
    }




    if (empty($errors)) {
        $query = $connection->prepare("INSERT INTO `cars_stock`(image,model,stock_number,manufacturer,chassis_code,manufacture_year,    displacement,transmission,fuel_type,exterior_color,interior_color) VALUES(:image,:model,:stock_number,:manufacturer,:chassis_code,:manufacture_year,:displacement,:transmission,:fuel_type,:exterior_color,:interior_color)");
         $query->bindValue(':image', $bannerImage);
        $query->bindValue(':model', $model);
        $query->bindValue(':stock_number', $stock_number);
        $query->bindValue(':manufacturer', $manufacturer);
        $query->bindValue(':chassis_code', $chassis_code);
        $query->bindValue(':manufacture_year', $manufacture_year);
        $query->bindValue(':displacement', $displacement);
        $query->bindValue(':transmission', $transmission);
        $query->bindValue(':fuel_type', $fuel_type);
        $query->bindValue(':exterior_color', $exterior_color);
        $query->bindValue(':interior_color', $interior_color);
        $query->execute();
        $car_id = $connection->lastInsertId();

        $msgs[] = "Car added to Stock Successfully";
    }
}
?>



<!-- Page Content -->
<div class="container py-5">
    <div class="row">
        <?php include 'partials/sidebar.php'; ?>   
        <div class="col-md-9 ">
            <h2>Add Stock</h2>
            <form action="" method="post"  enctype="multipart/form-data">
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="model">Model&nbsp;<i class="text-danger">*</i></label>
                            <input type="text" name="model" id="model" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="stock_number">Stock Number&nbsp;<i class="text-danger">*</i></label>
                            <input type="text" name="stock_number" id="stock_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="manufacturer">Manufacturer&nbsp;<i class="text-danger">*</i></label>
                            <input type="text" name="manufacturer" id="manufacturer" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="chassis_code">Chassis Code&nbsp;<i class="text-danger">*</i></label>
                            <input type="text" name="chassis_code" id="chassis_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="manufacture_year">Manufacture Year&nbsp;<i class="text-danger">*</i></label>
                            <input type="text" name="manufacture_year" id="manufacture_year" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="displacement">Displacement&nbsp;<i class="text-danger">*</i></label>
                            <input type="text" name="displacement" id="displacement" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="transmission">Transmission&nbsp;<i class="text-danger">*</i></label>
                            <input type="text" name="transmission" id="transmission" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fuel_type">Fuel Type&nbsp;<i class="text-danger">*</i></label>
                            <input type="text" name="fuel_type" id="fuel_type" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exterior_color">Exterior Color&nbsp;<i class="text-danger">*</i></label>
                            <input type="text" name="exterior_color" id="exterior_color" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="interior_color">Interior Color&nbsp;<i class="text-danger">*</i></label>
                            <input type="text" name="interior_color" id="interior_color" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="bannerImage">Car Images</label>
                            <input type="file" name="bannerImage" id="bannerImage" class="form-control" required>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <button name="add_stock" class="btn btn-outline-info btn-lg px-5 btn_stock">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- /content container -->
<?php include_once 'partials/footer.php'; ?>
