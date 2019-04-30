<!DOCTYPE html>
<?php
require "functions/functions.php";
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Online Shop</title>
    <link rel="stylesheet" type="text/css" href="css/newstyle.css">
    <link rel="adminStyle" type="text/css" href="admin/";
</head>
<body>
    <div class="main_wrapper">
        <div class="header_wrapper">
            <img id="banner" src="images/banner.jpg">
        </div>
        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
                <li><a href="my_account.php">My Account</a></li>
                
                <li><a href="cart.php">Cart</a></li>
                <?php
                if(isset($_SESSION['isAdmin'])){
                    echo "<li><a href='admin/index.php?insert_product'>Insert Product</a></li>";
                }
                ?>
                
            </ul>
            <div id="form">
                <form method="get" action="results.php">
                    <input type="text" name="user_query" placeholder="Search products">
                    <input type="submit" name="search" value="Search">
                </form>
            </div>
        </div>
        <div class="content_wrapper">
            <div id="sidebar">
                <div class="sidebar_title">Categories </div>
                <ul class="cats">
                    <?php getCats(); ?>
                </ul>
                <div class="sidebar_title">Brands </div>
                <ul class="cats">
                    <?php getBrands(); ?>
                </ul>
            </div>
            <div id="content_area">
                <div class="shopping_cart">
                    <span style="float: left;
                    font-size: 18px; padding: 5px;line-height: 40px;">
                        Welcome guest! <b>
                        Shopping Cart - </b>
                        Total Items: <?php total_items(); ?>
                        Total Price: <?php total_price(); ?>
                    </span>

                </div>
                <div class="products_box">
                    <?php
                    if(isset($_GET['pro_id'])) {
                        $product_id = $_GET['pro_id'];
                        $_SESSION['product_id']=$product_id;
                        global $con;
                        $get_pro = "select * from products where pro_id='$product_id'";
                        $run_pro = mysqli_query($con, $get_pro);
                        while ($row_pro = mysqli_fetch_array($run_pro)) {
                            $pro_id = $row_pro['pro_id'];
                            $pro_title = $row_pro['pro_title'];
                            $pro_price = $row_pro['pro_price'];
                            $pro_image = $row_pro['pro_image'];
                            $pro_desc = $row_pro['pro_desc'];
                            echo "
                                <div class='single_product'>
                                    <h3>$pro_title</h3>
                                    <img src='admin/product_images/$pro_image' width='400' height='300'>
                                    <p> <b> $ $pro_price/-  </b> </p>
                                    <p>$pro_desc</p> 
                                    <a href='index.php' style='float: left'>Go Back</a>
                                    <a href='details.php?wish=true'><button style='float: center;'> Wishlist</button></a> 
                                    <a href='index.php?pro_id=$pro_id'><button style='float: right;'>Add to Cart</button></a>
                                    </div>
                        ";
                            
                            
                                     
                    
                        
                    }

                        }
                    
                    if(isset($_SESSION['isAdmin'])){
                        
                            echo "
                            
                            <a href='admin/index.php?edit_pro=$pro_id' class='btn btn-primary'>
                                <button> Edit </button>
                            </a>
                            <br>
                            <br>
                            <a href='admin/index.php?del_pro=$pro_id'>
                                <button> Delete</button>
                            </a>
                            <br>
                            <br>
                            <a href='admin/index.php?sdel_pro=$pro_id'>
                                <button> Soft Delete</button>
                            </a>
                            
                            ";

                    }
                    
                    function addWish(){
                    
                        
                        if(isset($_SESSION['customer_email'])){
                        $pro_id= $_SESSION['product_id'];   
                        $email_id=$_SESSION['customer_email'];
                        global $con;
                        $get_pro = "insert into favlist values('$pro_id','$email_id')";
                        $run_pro = mysqli_query($con, $get_pro);
                        header('location:index.php?');    
                        }else{
                            include ("customer_login.php");
                        }
                    
                    }
                    
                    if(isset($_GET['wish'])){
                        addWish();
                        
                    }
                    
                    ?>
                </div>

            </div>
        </div>
    </div>
</body>
</html>