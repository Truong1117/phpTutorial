<?php
	session_start();
	$_SESSION['cart'];
	if(isset($_POST['btnupdate'])){
		foreach ($_POST['qty'] as $key => $value) {
			if($value <= 0 ){
				unset($_SESSION['cart'][$key]);
			}else {
				$_SESSION['cart'][$key]['qty'] = $value; 
			}
		}
	}
	header("Location: viewcart.php");
 ?>