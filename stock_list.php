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
                            <td><img width="50" src="uploads/car_images/<?php echo $d['image']; ?>"></td>
                            <td><?php echo $d['stock_number']; ?></td>
                            <td><?php echo $d['model']; ?></td>
                            <td><?php echo $d['manufacture_year']; ?></td>
                            <td><?php echo $d['transmission']; ?></td>
                            <td><?php echo $d['displacement']; ?></td>
                            <td align="center">
                                <a class="btn btn-primary btn-xs" target="blank" href="car_details.php?id=<?php echo $d['car_id']?>">View Details</a>
                            </td>
                        </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!--<script type="text/javascript">
    var table = '';
    function loadData() {
        $('#data_table').DataTable({
            "processing": true,
            destroy: true,
            "serverSide": true,

            "ajax": "http://",

            columns: [
                {data: "image"},
                {data: "stock_number"},
                {data: "model"},
                {data: "manufacture_year"},
                {data: "transmission"},
                {data: "displacement"},
                {
                    data: null,
                    "width": "50px",
                    "render": function (item) {
                        return '<a href="#" onclick="row_edit(' + item.id + ')">Edit</a>';
                    }
                }
            ]
        });

    }

    $(document).ready(function () {

        loadData();
        $('.editor_edit').on('click', function () {
            alert('sdfdsf');
            var selected = $(this).parent('td').parent('tr');
            console.log(selected);
        });

    });
    
    
</script>-->

<!-- /content container -->
<?php
include_once 'partials/footer.php';
