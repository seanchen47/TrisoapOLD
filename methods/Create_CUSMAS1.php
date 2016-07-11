<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>三三社企-註冊</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<!--
			<h1 id="title" class="hidden"><span id="logo">Daily <span>UI</span></span></h1>
			-->
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>註冊</h2>
			</div>
			<form name="form" method="post" action="Create_CUSMAS_finish.php">
				<?php session_start();
				$CUSNM = $_SESSION['CUSNM'];
		        $CUSADD = $_SESSION['CUSADD'];
		        $CUSTYPE = $_SESSION['CUSTYPE'];
		        $CUSBIRTHY = $_SESSION['CUSBIRTHY'];
		        $CUSBIRTHM = $_SESSION['CUSBIRTHM'];
		        $CUSBIRTHD = $_SESSION['CUSBIRTHD'];
		        $TEL = $_SESSION['TEL'];
		        $EMAIL = $_SESSION['EMAIL'];
		        $TAXID = $_SESSION['TAXID'];
		        $KNOWTYPE = $_SESSION['KNOWTYPE'];
		        $SPEINS = $_SESSION['SPEINS'];
		        ?>
				<label for="username">電子信箱*<input type="text" name="EMAIL" value="<?echo $EMAIL;?>"/>  您的姓名*<input type="text" name="CUSNM" value="<?echo $CUSNM;?>"/></label><br>
				<label for="username">密碼限定使用英數字，長度上限為15字元</label><br>
				<label for="password">設定密碼*<input type="password" name="CUSPW1" />  再次輸入*<input type="password" name="CUSPW2" /></label><br>		
					<label for="username">
						<div class="styled-select">您的生日* 年<select name="CUSBIRTHY">
							<option value="<? echo $CUSBIRTHY;?>"></option>
						  	<option value="1940">1940</option>	<option value="1941">1941</option>
						  	<option value="1942">1942</option>	<option value="1943">1943</option>
						  	<option value="1944">1944</option>	<option value="1945">1945</option>
						  	<option value="1946">1946</option>	<option value="1947">1947</option>
						  	<option value="1948">1948</option>	<option value="1949">1949</option>
						  	<option value="1950">1950</option>	<option value="1951">1951</option>
						  	<option value="1952">1952</option>	<option value="1953">1953</option>
						  	<option value="1954">1954</option>	<option value="1955">1955</option>
						  	<option value="1956">1956</option>	<option value="1957">1957</option>
						  	<option value="1958">1958</option>	<option value="1959">1959</option>
						  	<option value="1960">1960</option>	<option value="1961">1961</option>
						  	<option value="1962">1962</option>	<option value="1963">1963</option>
						  	<option value="1964">1964</option>	<option value="1965">1965</option>
						  	<option value="1966">1966</option>	<option value="1967">1967</option>
						  	<option value="1968">1968</option>	<option value="1969">1969</option>
						  	<option value="1970">1970</option>	<option value="1971">1971</option>
						  	<option value="1972">1972</option>	<option value="1973">1973</option>
						  	<option value="1974">1974</option>	<option value="1975">1975</option>
						  	<option value="1976">1976</option>	<option value="1977">1977</option>
						  	<option value="1978">1978</option>	<option value="1979">1979</option>
						  	<option value="1980">1980</option>	<option value="1981">1981</option>
						  	<option value="1982">1982</option>	<option value="1983">1983</option>
						  	<option value="1984">1984</option>	<option value="1985">1985</option>
						  	<option value="1986">1986</option>	<option value="1987">1987</option>
						  	<option value="1988">1988</option>	<option value="1989">1989</option>
						  	<option value="1990">1990</option>	<option value="1991">1991</option>
						  	<option value="1992">1992</option>	<option value="1993">1993</option>
						  	<option value="1994">1994</option>	<option value="1995">1995</option>
						  	<option value="1996">1996</option>	<option value="1997">1997</option>
						  	<option value="1998">1998</option>	<option value="1999">1999</option>
						  	<option value="2000">2000</option>	<option value="2001">2001</option>
						</select>  
						月*<select name="CUSBIRTHM">
							<option value="<?php echo $CUSBIRTHM;?>"></option>
							<option value="1">1</option>   <option value="2">2</option>
							<option value="3">3</option>   <option value="4">4</option>
							<option value="5">5</option>   <option value="6">6</option>
							<option value="7">7</option>   <option value="8">8</option>
							<option value="9">9</option>   <option value="10">10</option>
							<option value="11">11</option> <option value="12">12</option>
						</select>
						日*<select name="CUSBIRTHD">
							<option value="<?php echo $CUSBIRTHD;?>"></option>
							<option value="1">1</option>   <option value="2">2</option>
							<option value="3">3</option>   <option value="4">4</option>
							<option value="5">5</option>   <option value="6">6</option>
							<option value="7">7</option>   <option value="8">8</option>
							<option value="9">9</option>   <option value="10">10</option>
							<option value="11">11</option> <option value="12">12</option>
							<option value="13">13</option> <option value="14">14</option>
							<option value="15">15</option> <option value="16">16</option>
							<option value="17">17</option> <option value="18">18</option>
							<option value="19">19</option> <option value="20">20</option>
							<option value="21">21</option> <option value="22">22</option>
							<option value="23">23</option> <option value="24">24</option>
							<option value="25">25</option> <option value="26">26</option>
							<option value="27">27</option> <option value="28">28</option>
							<?
							if($_POST['CUSBIRTHM'] == 2){
								if($_POST['CUSBIRTHY'] % 4 == 0){
									?>
									<option value="29">29</option>
									<?
								}
							}
							elseif(($_POST['CUSBIRTHM'] == 4) || ($_POST['CUSBIRTHM'] == 6) || ($_POST['CUSBIRTHM'] == 9) || ($_POST['CUSBIRTHM'] == 11)){
								?>
								<option value="29">29</option>
								<option value="30">30</option>
								<?
							}
							else{
								?>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
								<?
							}
							?>
						</select>
						</div>
					</label>
				<label for="username">所屬國家<input type="text" name="CUSBIRTHD" value="Taiwan"/>  您的電話<input type="text" name="TEL" value="<?php echo $TEL;?>"/></label><br>
				<label for="username">您的地址<input type="text" name="CUSADD" value="<?php echo $CUSADD;?>"/>  統一編號<input type="text" name="TAXID" value="<?php echo $TAXID;?>"/></label><br>
				<label for="username">
					<div class="styled-select">您的膚質*<select name="CUSTYPE">
						<option value="<?php echo $CUSTYPE;?>"></option>
					  	<option value="A">乾性</option>
					  	<option value="B">中性</option>
					  	<option value="C">油性</option>
					  	<option value="D">混和性</option>
					</select>  
					如何認識三三*<select name="KNOWTYPE">
						<option value="<?php echo $KNOWTYPE;?>"></option>
						<option value="A">粉絲專頁</option>
						<option value="B">親友介紹</option>
						<option value="C">媒體宣傳</option>
						<option value="D">實體攤位</option>
						<option value="E">其它</option>
					</select>
					</div>
				</label>
				<label for="username">特殊要求<textarea name="SPEINS" cols="33" rows="3" value="<?php echo $SPEINS;?>"></textarea></label><br>
				<!--
				<input type="submit" name="button" value="註冊" />
				-->
				
			<!--
				<label for="username">Username</label>
				<br/>
				<input type="text" id="username">
				<br/>
				<label for="password">Password</label>
				<br/>
				<input type="password" id="password">
				<br/>
			-->
				<button type="submit">確定</button>
			<!--
				<br/>
				<a href="#"><p class="small">Forgot your password?</p></a>
			-->
			</form>
			<button type="button"></buttom><a href="../Homepages/index.php">取消</a>
		</div>
	</div>
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