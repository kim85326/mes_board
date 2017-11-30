<?php include_once "database.php";
    session_start();
    $sql = "SELECT * FROM `mes`";
	$result = mysqli_query($con , $sql) or die('MySQL query error');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="container">
		<h1>留言板</h1>
		<span>
			<?php if(isset($_SESSION["id"])){?>
				<a href="config.php?method=logout">登出</a>
				<a href="add_mes.php">新增留言</a>
			<?php }else{?>
				<a href="login.php">登入</a>
				<a href="signup.php">註冊</a>
			<?php }?>
		</span>

		<?php 
		    while($row = mysqli_fetch_array($result)){ 
		?>
			<div class="card">
				<h4 class="card-header">標題：<?php echo $row['title'];?>
				<?php if(@$_SESSION["id"]===$row["uid"]){?>
					<a href="mes.php?method=del&id=<?php echo $row["id"]?>" class="btn btn-danger mybtn">刪除</a>
					<a href="update_mes.php?id=<?php echo $row["id"]?>" class="btn btn-primary mybtn">編輯</a>
				<?php }?>
				</h4>
				<div class="card-body">
					<h5 class="card-title">作者：<?php echo $row["uid"];?></h5>
					<p class="card-text">
						<?php echo $row["content"];?>
					</p>
				</div>
			</div>		 
		<?php 
		   	}
		?>
	</div>
	     
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>