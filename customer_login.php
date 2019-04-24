
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
		$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
    $password_verify = password_verify($c_pass,$hash);
    $sel_c = "select * from customers where cust_pass = '$password_verify' AND cust_email = '$c_email'";
    $run_c = mysqli_query($con,$sel_c);
    $check_c = mysqli_num_rows($run_c);
    if($check_c==1){
        header('location:'.$_SERVER['PHP_SELF']);
        exit();
    }
		else {
			echo "USERNAME OR PASSWORD INVALID";
		}
    $sel_cart = "select * from cart where ip_add='$ip'";
    $run_cart = mysqli_query($con,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_c > 0 && $check_cart ==0){
        $_SESSION['customer_email'] = $c_email;
        header('location: my_account.php');
    }else{
        echo "here2";
        $_SESSION['customer_email'] = $c_email;
        header('location: checkout.php');
    }
}
?>
<div id='login'>
  <h1>Login</h1>
  <form class="signup" method="post" >
    <table>
      <tr>
        <td><label for="email">Email:</label></td>
        <td><input type="text" name="email" id="email"></td>
      </tr>
      <tr>
        <td><label for="password">Password:</label></td>
        <td><input type="password" name="pass" id="password"></td>
      </tr>
    </table>
    <tr align="center">
        <td colspan="2"><input type="submit" name="login" value="Login"></td>
    </tr>
    <h2 style="padding: 5px;float: left;">
        <a style="text-decoration: none;" href="customer_register.php">Register Here</a>
    </h2>

    </form>
</div>
