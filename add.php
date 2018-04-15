<?
include('BD.php');
include('control.php');
include('main.php');
$word=$_POST['Q'];
$Q=$_POST['Q'];
if(utf8_str($word)==0){
	$aword=eng($word);
}
else if(utf8_str($word)==1){
	$aword=cht($word);
	$Q='';
	foreach($aword as $i=>$j){
		$Q=$Q.$j;
	}
}
else{
	$aword=other($word);
}
$A=called($aword);
$B=txt($_POST['A']);
$T=time();
echo $db_dns->exec("INSERT INTO `otgoo_16383110_bioprosthetic`.`bioprosthetic` (`A`, `Q`, `view`, `time`, `modify`, `called`, `lan`) VALUES ( '$_POST[A]', '$Q', 0, '$T', CURRENT_TIMESTAMP, '$A', '$B')");
function txt($str){
	$aword=other($str);
	global $txtx;
	foreach ($aword as $i=>$j){
		$txtx=$txtx.$j;
	}
	if(utf8_str($txtx)==0){
		return 'en';
	}
	else if(utf8_str($txtx)==1){
		return 'zh-tw';
	}
	return 'ja';
	
}
?>