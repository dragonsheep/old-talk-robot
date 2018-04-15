<?
function gate($str){
	global $I,$You,$Other,$None;
	global $word_called,$str_long,$aword,$temp_word,$del_word;
	$word=$str;
	if(utf8_str($word)==0){
		$aword=eng($word);
	}
	else if(utf8_str($word)==1){
		$aword=cht($word);
	}
	else{
		$aword=other($word);
	}
	//$aword=array_values($aword);
	//echo utf8_str($word);
	//var_dump($aword);
	return $aword;
}
function eng($str){
	$aword=explode(" ",$str);
	return $aword;
}
function cht($str){
	global $temp_word;
	$del_word=array();
	$str_long=mb_strlen($str);
	$word=str_replace(" ","",$str);
	$aword=utf8_str_split($str);
	foreach($aword as $i=>$j){
			if($temp_word==$j){
				array_push($del_word,$j);
				unset($aword[$i]);
			}
			
		$temp_word=$j;	
	}
		$aword=array_values($aword);
		return $aword;
}
function other($str){
	global $temp_data,$I,$You,$Other,$None,$wordo;
	$temp_data=array();
	$save=array();
	$aword=explode(" ",$str);
	foreach ($aword as $i=>$j){
		
		if(utf8_str($j)==2){
			foreach($None as $n=>$m){
				$aword[$i]=str_replace($m,"",$j);
				if(str_replace($m,"",$j)!=$m){
					break;	
				}	
			}
		}
		if(strlen($j)==0){
			unset($aword[$i]);
		}
		
	}
	foreach ($aword as $i=>$j){
		if(utf8_str($j)==1){
			foreach (utf8_str_split($j) as $o=>$p){
			 array_push($temp_data,$p);
			}
		}
		else{
			array_push($temp_data,$j);	
		}
	}
	foreach ($temp_data as $i=>$j){
		if($wordo==$j){
			unset($temp_data[$i]);
		}
		$wordo=$j;
	}
	$aword=array_values($aword);
	$temp_data=array_values($temp_data);
	return $temp_data;
}
function called($arr){
	global $I,$You,$Other,$None;
	$a=array_intersect($arr,$I);
	$b=array_intersect($arr,$You);
	$c=array_intersect($arr,$Other);
	if($a!=NULL && $b==NULL && $c==NULL){
		return 0;
	}
	else if($a==NULL && $b!=NULL && $c==NULL){
		return 1;
	}
	else if($a==NULL && $b==NULL && $c!=NULL){
		return 2;
	}
	else{
		return 3;	
	}
}
function restart($txt,$get){
	if(utf8_str($txt)==2){
		$tarr=array();
		for($i=0;$i<mb_strlen($txt);$i++){
			for($j=1;$j<mb_strlen($txt);$j++){
				if(in_array(mb_substr($txt,$i,$j+1,'utf-8'),$tarr)==false && $i+1<mb_strlen($txt)){
					array_push($tarr,mb_substr($txt,$i,$j+1,'utf-8'));	
				}
				
			}
		}
		$tmp=array(0,0);
		for($i=0;$i<count($tarr);$i++){
			$a=str_ireplace($tarr[$i],'',$txt,$many);
			if($tmp[1]<$many){
				$tmp[0]=$tarr[$i];
				$tmp[1]=$many;	
			}
		}
		if($tmp[1]!=1){
			$ue=str_ireplace($tmp[0],'',$txt,$num);
			return $tmp[0].','.$ue;
		}
		else{
			return $txt;
		}
	}
}
?>
<?php
/**
* @version $Id: str_split.php 10381 2008-06-01 03:35:53Z pasamio $
* @package utf8
* @subpackage strings
  超神的
*/
function utf8_str($str){
	$mb=mb_strlen($str,'utf-8');
	$st=strlen($str);
	 if($mb==$st){
		 return '0';//英文
	 }
	 if($st%$mb==0 && $st%3==0){
		 return '1';//中文
	 }
	 return '2';//都有
}
function utf8_str_split($str, $split_len = 1)
{
    if (!preg_match('/^[0-9]+$/', $split_len) || $split_len < 1)
        return FALSE;
 
    $len = mb_strlen($str, 'UTF-8');
    if ($len <= $split_len)
        return array($str);
 
    preg_match_all('/.{'.$split_len.'}|[^\x00]{1,'.$split_len.'}$/us', $str, $ar);
 
    return $ar[0];
}
function mostRepeatedValues($array,$length=0){  
  
    //1.計算數組的重複值  
    $array = array_count_values($array);  
    //2.根據重複值倒排序  
    arsort($array) ;  
    if($length>0){  
        //3.返回前$length重複值  
        $array = array_slice($array, 0, $length, true);  
    }  
    return $array;  
}  
?>