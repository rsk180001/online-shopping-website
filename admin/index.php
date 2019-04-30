<?php
session_start();
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
            <div id="content">
                <div class="container">
                    <h2 class="text-center text-primary"><?php echo @$_GET['logged_in']?></h2>
                    <?php
                        if(isset($_GET['insert_product'])){
                            include ('insert_product.php');
                        }
                        else if(isset($_GET['edit_pro'])){
                            include ('edit_pro.php');
                        }
                        else if(isset($_GET['del_pro'])){
                            include ('del_pro.php');
                        }
                        else {
                          include('../index.php');
                        }

                        ?>
                </div>
            </div>
        </div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function () {

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });

            });
        </script>
    </body>
</html>
