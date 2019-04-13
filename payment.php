<div>

        
    <?php 
    $email=$_SESSION['customer_email']
    ?>
    
    
    <br>
    <br>
    <br>
    <h2 align="center">You Order is on its way. Thank you for shopping with us.</h2>
<!--        <b><?php cart(); ?></b>-->
<!--        <b><?php total_items(); ?></b>-->
        <br>
    <br>
    <?php
        $con = mysqli_connect("localhost","root","","store_db");
                                $total = 0;
                                $sel_price = "select * from cart";
                                $run_price = mysqli_query($con,$sel_price);
                                while($cart_row = mysqli_fetch_array($run_price)){
                                    $pro_id = $cart_row['p_id'];
                                    $pro_qty = $cart_row['qty'];
                                    $pro_price = "select * from products where pro_id = '$pro_id'";
                                    $run_pro_price = mysqli_query($con, $pro_price);
                                    while ($pro_row = mysqli_fetch_array($run_pro_price)){
                                        $pro_title = $pro_row['pro_title'];
                                        $pro_image = $pro_row['pro_image'];
                                        $pro_price = $pro_row['pro_price'];
                                        $historyQuery = "Insert into history values('$email','$pro_title','$pro_image','$pro_price','$pro_qty')";
                                        $run_hist = mysqli_query($con,$historyQuery);
                                        
                                        $remove_cart = "delete from cart where p_id='$pro_id'";
                                        $run_rmv=mysqli_query($con,$remove_cart);
                                    }
                                }
    ?>    
   </div>