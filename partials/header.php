<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> Alpha Auto</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
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
                <a class="navbar-brand" href="index.php">ALPHA AUTO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?php
                        if ($page == 'home') {
                            echo 'active';
                        }
                        ?>">
                            <a class="nav-link" href="index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>           
                        <li class="nav-item <?php
                        if ($page == 'stock_list') {
                            echo 'active';
                        }
                        ?>">
                            <a class="nav-link" href="stock_list.php">Stock List</a>
                        </li>
                        <li class="nav-item <?php
                        if ($page == 'our_client') {
                            echo 'active';
                        }
                        ?>">
                            <a class="nav-link" href="our_client.php">Our Client</a>
                        </li>
                        <li class="nav-item <?php
                        if ($page == 'contact') {
                            echo 'active';
                        }
                        ?>">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
