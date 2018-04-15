<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<?
	
	$url = 'https://zh.wikipedia.org/w/api.php?action=query&prop=revisions&rvprop=content&format=json&titles=LoveLive!&converttitles=zh-tw';
	//$url='https://zh.wikipedia.org/w/api.php?action=query&prop=revisions&rvprop=content&format=json&titles=蘋果公司&converttitles=zh-tw';
	$contents = file_get_contents($url);
	$data=json_decode($contents,true);
	print_r($data);
	//print_r($data['query']['pages']['3059376']['pageid']);
	//print_r($data['query']['pages']['3059376']['title']);
	//$txt=($data['query']['pages']['19450']['revisions'][0]['*']);
	$txt=($data['query']['pages']['3059376']['revisions'][0]['*']);
	$o=str_replace("{{","<div>",$txt);
	$o=str_replace("}}","</div><br>",$o);
	$o=str_replace("[[","",$o);
	$o=str_replace("]]","",$o);
	
	//$p=explode("}}",$o);
	//print_r($p);
	//echo $o;
?>
<body>
</body>
</html>