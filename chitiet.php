<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Chi tiet</title>
<link href="static/css/style.css" rel="stylesheet" />
<script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
</head>
<body>

	<!-- PHP -->
	<?php 
		require_once "layouts/menutop.php"; 
		$idProduct = $_GET['id'];
		$Product = $dao->getById("product",$idProduct);
		$htmlSPCT = ""; $htmlTitle = "";
		foreach ($Product as $row => $value) {
			$htmlSPCT.=
			"<div id='img-product'><img src='static/images/".$value['img']."'/></div>
			<div id='noi-dung-chi-tiet'>
				<p class='id-product' style='display: none;'>".$value['id']."</p>
				<h4 class='name-product'>Tên : ".$value['namePro']."</h4>
				<p class='gia-product'>Giá : ".$value['gia']."</p>
				<h5>Hãng SX : ".$value['hangSX']."</h5>
				<p></p>
				<p class='add-to-cart-2'><a class='add-to-cart' href='#'>Add to Cart</a></p>
				<p><a href='#'>Mua ngay</a></p>
			</div>";
			$htmlTitle.=
			"<p><a href='".$urlHomeShop."'>HOME</a>/
			<a class='link-danh-muc' href='".$url."product.php?hangSX=".$value['hangSX']."'>
			<span class='danh-muc-product'>".$value['hangSX']."</span></a>/
			<span class='name-product'>".$value['namePro']."</span></p>";
		}
	?>
	<!-- END PHP -->

	<div id="s-title">
		<?php echo "$htmlTitle"; ?>
		<h1>Chi tiết</h1>
		<p>
			<a href="#">&larr; Back to Home</a>
		</p>
	</div>
	<div id="chi-tiet">
		<div id="chi-tiet-product">
			<?php echo "$htmlSPCT"; ?>
		</div>
	</div>
	<?php require_once "layouts/footer.php" ?>
</body>
</html>