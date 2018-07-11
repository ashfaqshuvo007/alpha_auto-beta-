<?php
$page = "";
$page = "add_client";
include_once 'partials/header.php';

if(empty($_SESSION) || empty($_SESSION['id'] || !isset($_SESSION['admin_name']))){
    header('Location: index.php');
}
?>


<?php 

if(isset($_POST['add_client'])){


    //Get user input
    $file = $_FILES['clientList']['name'];
    $errors = [];
    $msgs = [];

    //Validate
    $tmp = explode('.', $file);
    $ext = end($tmp);

    if($ext === 'pdf'){
        $file = $_FILES['clientList']['name']; 
        $dest = '../uploads/clientList/' . $file ;

        move_uploaded_file($_FILES['clientList']['tmp_name'], $dest);

    } else{
        $errors[] = 'Please Check the file type. Only PDF supported!!';
    } 
    
    //if no errors , DB UPLOAD
     if (empty($errors)) {
        $stmt = $connection->prepare("INSERT INTO `clients`(client_list) VALUES(:file)");
        $stmt->bindValue(':file',$file);
        $stmt->execute();
       
        //message the user.
        $msgs[] = "Client List Added Successfully";
    }
}

?>
<!-- Page Content -->
<div class="container py-5">
    <div class="row mb-4">
        <?php include 'partials/sidebar.php';?>   

        
        <div class="col-md-6">
            <p class="text-danger">* Only upload PDF file</p>
            <form action="" method="POST" enctype="multipart/form-data">
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
                    <label for="clientList">Add your Client List</label>
                    <input type="file" name="clientList" id="clientList" class="form-control">
                </div>
                <div class="form-group">
                    <button name="add_client" class="btn btn-outline-primary mb-4 px-5">Submit</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
<!-- /content container -->
<?php include_once 'partials/footer.php'; ?>
