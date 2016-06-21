<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>三三社企-修改資料</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<?php
	include("mysql_connect.php");
	$EMAIL = $_SESSION['EMAIL'];
	$CUSIDT = $_SESSION['CUSIDT'];

	if($EMAIL != null){
        $sql = "SELECT * FROM CUSMAS where EMAIL='$EMAIL'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
    ?>
	<div class="container">
		<div class="top">
			<!--
			<h1 id="title" class="hidden"><span id="logo">Daily <span>UI</span></span></h1>
			-->
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>修改資料</h2>
			</div>
			<?php
			echo "<form name=\"form\" method=\"post\" action=\"Update_CUSMAS_finish.php\">";
			?>
			<label for="username">
			<?php
				echo "電子信箱：$EMAIL <p>";
			?>
			<label for="username">姓名
	        <?php
	        echo "<input type=\"text\" name=\"CUSNM\" value=\"$row[2]\" />";
	        ?>
	        地址
	        <?php
	        echo "<input type=\"text\" name=\"CUSADD\" value=\"$row[4]\" /> <br>";
	        ?>
	    	</label><br>
	    	<label for="username">電話
	        <?php
	        echo "<input type=\"text\" name=\"TEL\" value=\"$row[10]\" />";
	        ?>
	        統編
	        <?php
	        echo "<input type=\"text\" name=\"TAXID\" value=\"$row[14]\" />";
	        ?>
	    	</label><br>
	        <label for="username">
					<div class="styled-select">您的膚質*<select name="CUSTYPE"
						<?php
							echo "$row[11]";
						?>
						></option>
					  	<option value="A">乾性</option>
					  	<option value="B">中性</option>
					  	<option value="C">油性</option>
					  	<option value="D">混和性</option>
					</select></div>
				</label>
	        <label for="username">特殊要求
	        	<?php
	        	echo "<textarea name=\"SPEINS\" cols=\"45\" rows=\"5\">$row[21]</textarea>";
	        	?>
	        </label><br>
	        
	        <button type="submit">確定</button>
	        <?php
	        echo "</form>";
        	?>
			
			<?php
			if($CUSIDT == 'A'){
			?>
				<button type="button"></buttom><a href="../Homepages/index_manager.php">取消</a>
			<?php
			}
			else{
			?>
				<button type="button"></buttom><a href="../Homepages/index_customer.php">取消</a>
		</div>
	</div>
	<?php
        }
	}
	else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
	}
	?>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>