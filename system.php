<?
header('Content-Type: text/html; charset="utf-8"');
include('BD.php');
include('control.php');
include('main.php');

$get=gate($_GET['Q']);
	$arr=array();
	$aoo=array();
	$id=array();
	$arr=$get;
	foreach($arr as $i=>$j){
		$txt=$txt.$j;	
	}
	if(called($get)==3){
		$sql="SELECT * FROM `bioprosthetic` where `Q`='$txt'";
		
	}
	else{
		$call=called($get);
		$sql="SELECT * FROM `bioprosthetic` where called='$call' and `Q`='$txt' ";
	}
	$query=$db_dns->query($sql);
	$echo=$query->fetch();
	if($query->rowcount()!=0){
		echo $echo['A'].' ||( • 8 • )|| '.$echo['lan'];
		return ;
	}
	else{
		$aoo=restart($txt,$get);
		$aoo;
		$num=0;
		foreach($arr as $i=>$j){
			if(called($get)==3){
				$sql="SELECT * FROM `bioprosthetic` where `Q` LIKE '%$j%'";	
			}
			else{
				$call=called($get);
				$sql="SELECT * FROM `bioprosthetic` where called='$call' and `Q` LIKE '%$j%' ";
			}
			$query=$db_dns->query($sql);
			$echo=$query->fetch();
			if($echo['id']!=NULL){
				$id[$num]=$echo['id'];
				$num++;
			}
		}
	}
	
	if($id){
		$id=array_count_values($id);
		$ans=(array_search(max($id),$id));
		$sql="SELECT * FROM `bioprosthetic` where `id`=$ans ";
		$query=$db_dns->query($sql);
		$echo=$query->fetch();
		
		echo $echo['A'].' ||( • 8 • )|| '.$echo['lan'];
		return ;	
	}
	else{
		if(called($get)==3){
			$sql="SELECT * FROM `bioprosthetic` where `A`='$txt'";		
		  }
		  else{
			  $call=called($get);
			  $sql="SELECT * FROM `bioprosthetic` where called='$call' and `A`='$txt' ";
		  }
		  $query=$db_dns->query($sql);
		  $echo=$query->fetch();
		  if($query->rowcount()!=0){
			  echo $echo['Q'].' ||( • 8 • )|| '.$echo['lan'];
			  return ;
		  }
		  else{
			  echo '超出理解知識'.' ||( • 8 • )|| '.'zh-tw';
		  }
	}

?>