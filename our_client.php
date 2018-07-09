<?php
$page = "";
$page = "our_client";
include_once 'partials/header.php';
?>
<?php

 $stmt = $connection->prepare('SELECT * FROM `clients`');
 $stmt->execute();
$data = $stmt->fetchAll();
?>
<!-- Page Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-12 text-center py-5">
            <h2>We Are Always There For Our Clients.</h2>
            <i class="fa fa-users  fa-5x my-4" aria-hidden="true"></i>
            <?php foreach($data as $d){?>
            <a class="nav-link btn btn-outline-primary mb-4 text_stock" href="uploads/clientList/<?php echo $d['client_list'];?>" download>Download Our Clients List<i class="fa fa-file-pdf-o ml-3" aria-hidden="true"></i></a>
            <?php }?>
        </div>
    </div>
</div>
<!-- /content container -->
<?php
include_once 'partials/footer.php';
