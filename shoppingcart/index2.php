<?php
session_start();
 ?>
<meta charset="utf-8">
<h2>Danh sách sản phẩm </h2>
<style>
	ul {
		margin: 0px;
		padding: 0px;
		list-style: none;
	}
	ul li {
		width: 400px;
		border-bottom: 1px solid green;
		padding: 5px;
	}
	ul li h3 {
		font-size: 18px;
	}
	ul li a {
		text-decoration: none;
		color: red;
	}
	ul li a:hover {
		color: orange;
	}
</style>
<?php 
	$total = 0;
	if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
		foreach ($_SESSION['cart'] as $list) {
			$total += $list['qty'];
		}
	}
?>
<p>Đang có <a href='viewcart.php'> <?php echo $total; ?> </a>sản phẩm trong giỏ hàng</p>
<?php
require_once 'listproduct.php';
//number_format
	echo "<ul>";
	foreach ($product as $listproduct) {
		echo "<li><h3>".$listproduct['name']."</h3>
			<p>Giá bán:".number_format($listproduct['price'],0)."</p>
			<p><a href =insertcart.php?id=".$listproduct['id'].">Mua ngay</a></p>
		</li>";

	}
	echo "</ul>";
?>
