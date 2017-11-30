<?php
	include_once "database.php";
	session_start();
	$id = $_GET["id"];
    $sql="SELECT * FROM `mes` WHERE id = '$id'";
	$result = mysqli_query($con , $sql) or die('MySQL query error');
   	$row = mysqli_fetch_array($result);
	if($_SESSION["id"]!=$row["uid"]){
    	header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板 - 編輯留言</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="container">
		<h1>編輯留言</h1>
		<span>
			<a href="index.php">首頁</a>
		</span>
		<form role="form" action="mes.php?method=update&id=<?php echo $row["id"]?>" method="post">
            <div class="form-group">
                <label for="title">標題</label>
                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="<?php echo $row["title"]?>">
            </div>
            <div class="form-group">
                <label for="content">文章內容</label>
                <input type="text" class="form-control" id="content" placeholder="content" name="content" value="<?php echo $row["content"]?>">
            </div>
            <button type="submit" class="btn btn-primary">修改</button>
        </form>
	</div>
	    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>