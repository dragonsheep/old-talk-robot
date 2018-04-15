<?
	//$url = 'https://zh.wikipedia.org/zh-tw/lovelive';
	//$url = 'https://zh.wikipedia.org/zh-tw/蘋果公司';
	//$data = file_get_contents("compress.zlib://".$url);
	//echo $data;
	//echo $contents = file_get_contents($url);
	//$contents=str_replace('<link','<br ',$contents);
	//echo $data=str_replace('/wiki/','https://zh.wikipedia.org/zh-tw/',$contents);
	//array_push($txt,explode('<table class="infobox bordered" style="width: 22em; font-size: small; float:right; text-align: left;" cellpadding="2">',$data));
//
echo goo(urlencode($_GET['q']));
function goo($echo){	
	$url='https://www.google.com.tw/search?hl=zh-tw&q='.$echo;
			if(isset($_GET['O'])){
					$ctx = stream_context_create(array(
							'http' => array(
									'header'=>"Cookie: PREF=ID=fef74816681e7898:U=9ea73b7f54aa9005:FF=2:LD=zh-TW:NW=1:TM=1295952619:LM=1296005167:S=Dk6Hp_5SDKZ3OhJy;",
							)
					));
					$content = file_get_contents($url, false, $ctx);
			}else{
					header('Content-Type: text/html; charset=big5');
				$content = file_get_contents($url);
			}

		 $content=str_replace('href="/','href="https://www.google.com.tw/',$content);
		 $content=str_replace('src="/','src="https://www.google.com.tw/',$content);
		$content=str_explode($content,'<td id="rhs_block" valign="top">','</td>');
		 $data=$content;
	 // $data=str_explode($content,'<li class="g">','</li>');
		 if($data==false){
			 return 'ERROR';
		 }
		 else{
			return $data;	 
		 }
		 			
}
function str_explode($str,$start,$end){
	  if(stripos($str,"hp-xpdbox")){
		  $data=explode($start,$str);
		  $data=explode($end,$data[1]);
		  return $data[0]; 	 
	  }
	  else{
		  return false;
	  }
}

?>
