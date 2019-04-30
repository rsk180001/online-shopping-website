
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/validate.js"></script>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/validate.css">
	<title>Form Validation</title>



<?php
if(isset($_POST['login']))
{
    global $con;
    $ip = getIp();
    $c_email = $_POST['email'];
    $c_pass = $_POST['pass'];
		$sel_h = "select cust_pass from customers where cust_email = '$c_email'";
		$run_h = mysqli_query($con,$sel_h);
		$check_e = mysqli_num_rows($run_h);
		if($check_e == 1){
		$row_h = mysqli_fetch_array($run_h);
		$hash = $row_h['cust_pass'];
		$password_verify = password_verify($c_pass,$hash);
		if($password_verify== True){
			 header('location: index.php');
			// exit();
		}
		else{
			// header('location: index.php');
			header('location: '.$_SERVER['PHP_SELF']);
			exit();
		}}
    else{
				// header('location: details.php');
//        header('location:'.$_SERVER['PHP_SELF']);
        header('location:index.php');
        exit();
    }
		$sel_cart = "select * from cart where ip_add='$ip'";
    $run_cart = mysqli_query($con,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_c > 0 && $check_cart ==0){
        $_SESSION['customer_email'] = $c_email;
        header('location: my_account.php');
    }else{
        $_SESSION['customer_email'] = $c_email;
        header('location: index.php');
    }
}
?>
<div id='login'>
  <h1>Login</h1>
  <form class="signup" method="post" >
    <table>
      <tr>
        <td><label for="email">Email:</label></td>
        <td><input type="text" name="email" id="email" required></td>
      </tr>
      <tr>
        <td><label for="password">Password:</label></td>
        <td><input type="password" name="pass" id="password" required></td>
      </tr>
    </table>
    <tr align="center">
        <td colspan="2"><input type="submit" name="login" value="Login"></td>
    </tr>
    <h2 style="padding: 5px;float: left;">
        <a style="text-decoration: none;" href="customer_register.php">Register Here</a>
    </h2>
<br>    <h2 style="padding: 5px;float: left;">
        <a style="text-decoration: none;" href="admin/login.php">Admin Login</a>
    </h2>


    </form>
</div>
