<?php
include_once 'partials/header.php';

if (isset($_POST['resgister'])) {
    //get the data input by user
    $email = trim($_POST['email']);
    $admin_name = trim($_POST['admin_name']);
    $password = trim($_POST['password']);
    $errors = [];
    $msgs = [];

    
      
    //validattion
    if (strlen($admin_name) < 6) {
        $errors[] = "Username must be at least 6 characters";
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $errors[] = "Invalid Email Format";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    //if no errors

    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare('INSERT INTO `admins`(`admin_name`,`email`,`password`) VALUES(:admin_name,:email,:password)');
        $query->bindValue('admin_name', strtolower($admin_name));
        $query->bindValue('email', strtolower($email));
        $query->bindValue('password', $password);
        $query->execute();

        $msgs[] = "Registration done successfully! ";
    }

}
?>



<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="offset-md-4 col-md-4 offset-md-4 my-4" >
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
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="admin_name">Username</label>
                    <input type="text" name="admin_name" id="admin_name" class="form-control">

                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <button name="resgister" class="btn btn-xs btn-success">Register</button>
                    <a href="index.php" class="btn btn-info" >Login</a>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /content container -->

<?php include_once 'partials/footer.php'; ?>