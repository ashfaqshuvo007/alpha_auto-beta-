<?php

$page = "";
$page = "dashboard";
include_once 'partials/header.php';

if(empty($_SESSION) || empty($_SESSION['id'] || !isset($_SESSION['admin_name']))){
    header('Location: index.php');
}

?>
<!-- Page Content -->
<div class="container py-5">
    <div class="row mb-5">
        <?php include 'partials/sidebar.php';?>      
		<div class="col-md-9">
			<div class="alert alert-success">You are logged in as <?php echo $_SESSION['admin_name'];?></div>
		</div>
    </div>
</div>
<!-- /content container -->
<?php include_once 'partials/footer.php'; ?>