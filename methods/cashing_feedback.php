<!--
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>結帳結果頁</title>
-->
<?php
include('AllPay.Payment.Integration1.php');
include("mysql_connect.php");

/*
* get feedback from AllPay
*/
try
{
	$obj = new AllInOne();
 	//AllPay Service Parameter
 	$obj->HashKey     = '5294y06JbISpM5x9'; 
    $obj->HashIV      = 'v77hoKGq4kWxNNIS';
    $obj->MerchantID  = '2000132'; 
	//FeedBack Parameter
 	$arFeedback = $obj->CheckOutFeedback();
 	/* 檢核與變更訂單狀態 */
 	if(sizeof($arFeedback) > 0){
 		foreach ($arFeedback as $key => $value){
 			switch ($key)
 			{
	 			/* 支付後的回傳的基本參數 */
	 			case "MerchantID": $szMerchantID = $value; break;
				case "MerchantTradeNo": $szMerchantTradeNo = $value; break;
				case "PaymentDate": $szPaymentDate = $value; break;
				case "PaymentType": $szPaymentType = $value; break;
				case "PaymentTypeChargeFee": $szPaymentTypeChargeFee = $value; break;
				case "RtnCode": $szRtnCode = $value; break;
				case "RtnMsg": $szRtnMsg = $value; break;
				case "SimulatePaid": $szSimulatePaid = $value; break;
				case "TradeAmt": $szTradeAmt = $value; break;
				case "TradeDate": $szTradeDate = $value; break;
				case "TradeNo": $szTradeNo = $value; break;
				case "PayAmt": $szPayAmt = $value; break;
				case "RedeemAmt": $szRedeemAmt = $value; break;
				default: break;
			}
 		}

 		$F_TradeNo = $szMerchantTradeNo;
 		//determine feedback content
 		if($szRtnCode == 1){
 			$sql = "UPDATE ORDMAS SET PAYSTAT='1' WHERE MerchantTradeNo = '$F_TradeNo'";
 			mysql_query($sql);
 		}
 		else{
 			$sql = "UPDATE ORDMAS SET PAYSTAT='0' WHERE MerchantTradeNo = '$F_TradeNo'";  //not necessary
 			mysql_query($sql);
 		}
 		print '1|OK';	//tell AllPay that we get the feedback
 	} 
 	else{
 		print '0|Fail';
 	}
}

catch (Exception $e){
	print '0|' . $e->getMessage();
}

?>