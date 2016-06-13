<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 更新資料</title>
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        $sql = "SELECT * FROM CUSMAS where EMAIL='$EMAIL'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
    
        echo "<form name=\"form\" method=\"post\" action=\"Update_CUSMAS_finish.php\">";
        echo "電子信箱：$EMAIL <br>";
        echo "姓名：<input type=\"text\" name=\"CUSNM\" value=\"$row[1]\" /> <br>";
        echo "地址：<input type=\"text\" name=\"CUSADD\" value=\"$row[2]\" /> <br>";
        echo "膚質：<select name=\"CUSTYPE\" value=\"$row[3]\" /> ";
        echo "<option value=\"A\">乾性</option>";
        echo "<option value=\"B\">中性</option>";
        echo "<option value=\"C\">油性</option>";
        echo "<option value=\"D\">混和性</option> </select> <br>";
        echo "電話：<input type=\"text\" name=\"TEL\" value=\"$row[9]\" /> <br>";
        echo "特殊要求：<textarea name=\"SPEINS\" cols=\"45\" rows=\"5\">$row[11]</textarea> <br>";
        echo "統一編號：<input type=\"text\" name=\"TAXID\" value=\"$row[12]\" /> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
        echo "</form>";
        if($CUSIDT == 'A'){
?>
<a href="../HomePages/index_manager.php">取消</a>
<?php
        }
    else{
?>
<a href="../HomePages/index_customer.php">取消</a>
<?php
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
?>