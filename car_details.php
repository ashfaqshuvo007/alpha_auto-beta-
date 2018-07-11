<?php
include_once 'partials/header.php';

if (isset($_GET['id'])) {
    $stmt = $connection->prepare('SELECT * FROM `cars_stock` WHERE `car_id` = :car_id');
    $stmt->bindValue('car_id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch();
}
?>
<!-- Page Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-7 col-12 view_car_img mb-2">
            <h1><?php echo $data['model']; ?></h1>

            <a href="uploads/car_images/<?php echo $data['image'] ?>" target="_blank">
                <img src="uploads/car_images/<?php echo $data['image'] ?>" class="img-fluid w-100" alt="Responsive image" title="" />
            </a>
            <?php
            $stmt = $connection->prepare('SELECT * FROM `images` WHERE `car_id` = :car_id');
            $stmt->bindValue('car_id', $data['car_id']);
            $stmt->execute();
            $image = $stmt->fetchAll();
            ?>
            <?php foreach ($image as $v) { ?> 
            <a href="uploads/car_images/<?php echo $v['name']; ?>" target="_blank" >
                    <img src="uploads/car_images/<?php echo $v['name']; ?>" class="img-fluid w-25" data-toggle="modal" data-target="#imageModal" alt="Responsive image" title="" />
                </a>
            <?php } ?>

        </div>
       
        <div class="col-md-5 col-12 view_car_table mb-2">
            <div class="">
                <a class="nav-link btn btn-outline-primary mb-2" href="" onclick="myfunc();">Print Details &nbsp;<i class="fa fa-print"></i></a>
                
            </div>
            <div class="">
                <table class="table table-responsive-sm table-hover table-bordered ">
                    <thead>
                    <th colspan="2" class="text-center">Specifications</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Stock No.</th>
                            <td><?php echo $data['stock_number'] ?></td>
                        </tr>
                        <tr>
                            <th>Chassis Code</th>
                            <td><?php echo $data['chassis_code'] ?></td>
                        </tr>
                        <tr>
                            <th>Manufacturer</th>
                            <td><?php echo $data['manufacturer'] ?></td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td><?php echo $data['model'] ?></td>
                        </tr>
                        <tr>
                            <th>Manufacture Year</th>
                            <td><?php echo $data['manufacture_year'] ?></td>
                        </tr>
                        <tr>
                            <th>Displacement</th>
                            <td><?php echo $data['displacement'] ?></td>
                        </tr>
                        <tr>
                            <th>Transmission</th>
                            <td><?php echo $data['transmission'] ?></td>
                        </tr>
                        <tr>
                            <th>Fuel Type</th>
                            <td><?php echo $data['fuel_type'] ?></td>
                        </tr>
                        <tr>
                            <th>Exterior Color</th>
                            <td><?php echo $data['exterior_color'] ?></td>
                        </tr>
                        <tr>
                            <th>Interior Color</th>
                            <td><?php echo $data['interior_color'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- /content container -->
<?php
include_once 'partials/footer.php';

