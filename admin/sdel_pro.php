<?php
if(isset($_GET['sdel_pro'])){
    $sdel_id = $_GET['sdel_pro'];
    $sdel_pro = "update products set sflag = 1 where pro_id='$sdel_id'";
    $run_sdel = mysqli_query($con,$sdel_pro);
    if($run_sdel){
        header('location: ../index.php');
    }
    else {
      header('location: ../all_products.php');
    }
}
