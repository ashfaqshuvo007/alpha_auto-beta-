<?php
$page = "";
$page = "stock_list";
include_once 'partials/header.php';
?>
<!-- Page Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <table id="data_table" class="table table-responsive-md table-bordered table-hover">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Stock No</td>
                    <td>Name</td>
                    <td>Manufacture Year</td>
                    <td>Transmission </td>
                    <td>Displacement</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
            <?php
            $stmt = $connection->prepare('SELECT * FROM `cars_stock`');
            $stmt->execute();
            $data = $stmt->fetchAll();
            ?>
            <?php foreach ($data as $d) { ?>

                        <tr>
                            <td><img width="50" src="../uploads/car_images/<?php echo $d['image']; ?>" alt="image" ></td>
                            <td><?php echo $d['stock_number']; ?></td>
                            <td><?php echo $d['model']; ?></td>
                            <td><?php echo $d['manufacture_year']; ?></td>
                            <td><?php echo $d['transmission']; ?></td>
                            <td><?php echo $d['displacement']; ?></td>
                            <td align="center">
                                <a class="btn btn-primary btn-xs" target="blank" href="add_images.php?id=<?php echo $d['car_id']?>">Add Images</a>
                            </td>
                        </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- /content container -->
<?php
include_once 'partials/footer.php';
