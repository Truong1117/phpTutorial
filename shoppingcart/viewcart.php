<?php
	session_start();
	error_reporting(0);
?>
<meta charset="utf-8">
<h3>Thông tin giỏ hàng</h3>
<?php 
	//session_destroy();
	if(isset($_SESSION['cart']) && $_SESSION['cart'] != null){
//Tạo form cho bảng
		echo "<form action='updatecart.php' method='POST'>";
		echo "<table border = '1' width='600'>";
		echo "<tr>";
		echo "<td>Tên sản phẩm </td>";
		echo "<td> Số lượng </td>";
		echo "<td>Giá</td>";
		echo "<td>Thành tiền </td>";
		echo "<td> Xóa </td>";
		echo "</tr>";
		foreach ($_SESSION['cart'] as $list) {
			echo "<tr>";
			echo "<td>".$list['name']."</td>";
//Lưu ý dòng này
			echo "<td><input type ='text' name='qty[".$list['id']."]' value='".$list['qty']."' /></td>";
			echo "<td>".$list['price']."</td>";
			echo "<td>".($list['qty']*$list['price'])."</td>";
			echo "<td><a href='delete.php?id=".$list['id']."'>Xóa</a></td>";
			echo "</tr>";
		}
		echo "</table>
			<p align='right' style='width:600'>
			<input type='submit' value='Update' name='btnupdate' />
			</p>
		";
		echo "</form>";
	} else {
		echo "chưa có sản phẩm nào";
	}