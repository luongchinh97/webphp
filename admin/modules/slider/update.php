<?php  
	require_once ("../../../controller/dao/database.php");
	$dao = new dao;
	$id = $_GET['id'];
	$slider = $dao->getById("slider",$id);
	if(isset($_POST['submit'])){
		$data=array();
		move_uploaded_file($_FILES['file-img']['tmp_name'],"../../../static/images/".$_FILES['file-img']['name']);
		$IMG = $_FILES['file-img']['name'];
		if($IMG==""){
			$data=array("url"=>$_POST['url']);
		}else{
			$data=array("img"=>$_FILES['file-img']['name'],"url"=>$_POST['url']);
		}
		$dao->update("slider",$data,$id);
		header("location:slider.php");
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title></title>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  	<link rel="stylesheet" href="http://localhost:81/webbandienthoai/static/css/styleAdmin.css">
	<script type="text/javascript" charset="utf8" src="../../../static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php include_once ("../../layouts/left-panel.php"); ?>
	<div id="right-panel" class="right-panel">
		<?php include_once ("../../layouts/Header.php"); ?>
		<div class="content">
	        <div class="animated fadeIn">
	          <div class="row">
	            <div class="col-lg-12">
	                <div class="card">
	                    <div class="card-header">
	                        <strong class="card-title" >Update slider</strong>
	                    </div>
	                    <div class="card-body card-block">
							<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
								<div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label">ID</label>
									</div>
									<div class="col-12 col-md-2">
										<p class="form-control-static"><?php echo $slider['id'] ?></p>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label">File ảnh:</label>
									</div>
									<div class="col-12 col-md-10">
										<input type="file" name="file-img" class="form-control-file" accept="image/png, image/jpg">
										<img style="margin-top: 15px;" src="../../../static/images/<?php echo $slider['img']; ?>"/>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label">URL:</label>
									</div>
									<div class="col-12 col-md-6">
										<input type="text" name="url" class="form-control" value="<?php echo $slider['url'] ?>" required>
									</div>
								</div>
								<div>
									<input type="submit" name="submit" value="Update" class="btn btn-outline-secondary">
								</div>
							</form>
	                    </div>
		            </div>
		        </div>
		      </div>
		    </div>
		</div>
		<div class="clearfix"></div>
	</div>
</body>
</html>