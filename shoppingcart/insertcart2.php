<?php
	session_start();
	require_once 'listproduct.php';

	$idProduct = $_GET['id'];
	$newProduct = array();
	foreach ($product as $val) {
		$newProduct[$val['id']] = $val;
	}
//$_SESSION['cart'][$idProduct][];


echo "<pre>";

if(!isset($_SESSION['cart']) || $_SESSION['cart'] == null){
	//Thêm phần tử vào mảng
	$newProduct[$idProduct]['qty'] = 1;
	$_SESSION['cart'][$idProduct] = $newProduct[$idProduct];
} else {
	if(array_key_exists($idProduct,$_SESSION['cart'])){
		$_SESSION['cart'][$idProduct]['qty'] += 1;
	} else {	
		$newProduct[$idProduct]['qty'] = 1;
		$_SESSION['cart'][$idProduct] = $newProduct[$idProduct];
	}
}
print_r($_SESSION['cart']);
//header("location:index.php");