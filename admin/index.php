<?php
session_start();
include ('functions/db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <title>E-commerce Admin Panel</title>
        <title>Admin Panel</title>
    </head>
    <body>
        <div class="wrapper">

                <div class="container">
                    <h2 class="text-center text-primary"><?php echo @$_GET['logged_in']?></h2>
                    <?php
                        if(isset($_GET['insert_product'])){
                            include ('insert_product.php');
                        }
                        // else if(isset($_GET['view_products'])){
                        //     include ('view_products.php');
                        // }
                        else if(isset($_GET['edit_pro'])){
                            include ('edit_pro.php');
                        }
                        else if(isset($_GET['del_pro'])){
                            include ('del_pro.php');
                        }
                        // else if(isset($_GET['view_categories'])){
                        //     include ('view_categories.php');
                        // }
                        // else if(isset($_GET['insert_category'])){
                        //     include ('insert_category.php');
                        // }
                        // else if(isset($_GET['edit_cat'])){
                        //     include ('edit_cat.php');
                        // }
                        // else if(isset($_GET['del_cat'])){
                        //     include ('del_cat.php');
                        // }
                        // else if(isset($_GET['view_brands'])) {
                        //     include('view_brands.php');
                        // }
                        // else if(isset($_GET['insert_brand'])) {
                        //     include('insert_brand.php');
                        // }
                        // else if(isset($_GET['edit_brand'])) {
                        //     include('edit_brand.php');
                        // }
                        // else if(isset($_GET['del_brand'])) {
                        //     include('del_brand.php');
                        // }
                        // else if(isset($_GET['view_customers'])){
                        //     include ('view_customers.php');
                        // }
                        // else if(isset($_GET['del_customer'])){
                        //     include ('del_customer.php');
                        // }
                        else {
                          include('../index.php');
                        }

                        ?>
                </div>
            </div>
        </div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
