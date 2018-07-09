<?php 
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Alpha Auto</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="DataTables/datatables.min.css" rel="stylesheet">
        <link href="DataTables/datatables.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/mycss.css" rel="stylesheet">
        
       <script src="js/jquery.min.js"></script>
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">Admin Panel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <?php if(isset($_SESSION['admin_name'])) {?>
                        <li class="nav-item <?php
                        if ($page == 'dashboard') {
                            echo 'active';
                        }
                        ?>">
                            <a class="nav-link" href="dashboard.php">Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>           
                        <li class="nav-item <?php
                        if ($page == 'add_stock') {
                            echo 'active';
                        }
                        ?>">
                            <a class="nav-link" href="add_stock.php">Add Stock</a>
                        </li>
                        <li class="nav-item <?php
                        if ($page == 'add_images') {
                            echo 'active';
                        }
                        ?>">
                            <a class="nav-link" href="add_images.php">Add Images</a>
                        </li>
                        <li class="nav-item <?php
                        if ($page == 'add_client') {
                            echo 'active';
                        }
                        ?>">
                            <a class="nav-link" href="add_client.php">Add Client</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="btn btn-danger" href="logout.php">Logout</a>
                        </li>
                    <?php } else{ ?>
<!--                        <a class="btn btn-success" href="index.php">login</a>&nbsp;
                        <a class="btn btn-danger" href="register.php">Register</a>-->
                     
                    <?php }?>
                    </ul>
                </div>
            </div>
        </nav>
