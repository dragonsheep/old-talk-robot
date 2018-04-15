<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>talk with a robot(聊天機器人 vr0.1)</title>
<meta name="description" content="沒有字庫的機器人和LoveLive大好" />
<meta name="description" content="聊天機器人和LoveLive大好" />
<meta name="author" content="a sheep(綿羊)" />
<meta name="distribution" content="zh-tw">
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>
<?
	include('main.php');
	include('control.php');
?>
<body>
<audio id="audio1"></audio> 
<div class="form">
	<div class="main">
   		<div class="talk">
        
        </div> 
    </div>
    <div class="minor">
    	<form method="post">
        	<textarea name="str" id="str" placeholder="說出你想說的話....."></textarea>
        	<input type="button" class="start"  value="送出" />
            <input type="button" class="learn" value="學習" />
    	</form>
    </div>
     
</div>
   
</body>
<script src="js/jquery-2.1.1.js"></script>
<script>
var num=0,study=false,temp_txt=[];
$(document).ready(function(e) {
    
});
$('.learn').click(function(e) {
	
	if(study==false){
		$re='re'+Math.floor(Math.random()*9999999);
		$('.talk').append('<div class="right"><div class="me">'+$('#str').val()+'</div></div>');
		temp_txt[0]=$('#str').val();
		$('.talk').append('<div class="left"><div class="bot">學習中...</div></div>');
		study=true;
		
	}
	else if(study==true &&  $('#str').val().length>1 ){
		temp_txt[1]=$('#str').val();
		$.post('add.php',{
			Q:temp_txt[0],A:temp_txt[1]
			},function(data){
			console.log(data);
			$('.talk').append('<div class="left"><div class="bot">學習完成</div></div>');
		})
		study=false;
	}
	$('#str').val('');
	$('.talk').scrollTop( $(document).height()*2+$(document).scrollTop() );
});
$('.start').click(function(e) {

	$re='re'+Math.floor(Math.random()*9999999);
    $('.talk').append('<div class="right"><div class="me">'+$('#str').val()+'</div></div>');
	$.get('google.php?',{
		q:$('#str').val()},
		function(data){
			console.log(data=='ERROR');
			if(data=='ERROR'){
				return system();
			}
			
			$('.talk').append('<div class="left"><div class="bot">'+data+'</div></div>');
			$('.hp-xpdbox > a').attr('title','連結到google');
			$('._tXc').eq(num).append($('._tXc').children('span').eq(num).children('a'))
			if($('._tXc').eq(num).children('span').html()!=null){
				playAudio('audio1','ja',$('._tXc').eq(num).children('span').html());
				num++;
				//zh-TW
			}
			$('#str').val('');
			$('.talk').scrollTop( $(document).height()*2+$(document).scrollTop() );
		}
	);
		$('.talk').scrollTop( $(document).height()*2+$(document).scrollTop() );
});
 var system=(function(){
 	$.get('system.php',{
		Q:$('#str').val()
		},function(data){
		adata=data.split(" ||( • 8 • )|| ");
		$('.talk').append('<div class="left"><div class="bot">'+adata[0]+'</div></div>');
		playAudio('audio1',adata[1],adata[0]);
	})
 })
 function playAudio(id, tl , text) {
    var audio = document.getElementById(id); // 取得 audio 控制項
	long=text.length;
	rand_a=Math.floor(Math.random()*999999);
	rand_b=Math.floor(Math.random()*999999);
	$.get("https://translate.google.com.tw/gen204?tbphrase=length="+long,{});
	$.get("https://translate.google.com.tw/gen204?ttsstart=textlen="+long+",tl="+tl+",total=1");
    audio.src="http://translate.google.com.tw/translate_tts?ie=UTF-8&q="+encodeURI(text)+"&tl="+tl+"&total=1&textlen="+long+"&idx=0&tk="+rand_a+"."+rand_b+"&client=t&prev=input&ttsspeed=1"
	//audio.src="http://crossorigin.me/http://translate.google.com.tw/translate_tts?ie=UTF-8&q="+encodeURI(text)+"&tl=ja&total=1&idx=0&textlen="+long+"&tk="+rand_a+"."+rand_b+"&client=t&prev=input";
	//audio.src = "http://translate.google.com/translate_tts?ie=utf-8&tl="+lang+"&q="+text; // 設定語音為 google TTS。
    audio.addEventListener('ended', function(){ this.currentTime = 0; }, false); // 當播放完畢，強制回到開頭。
    // => (這在 Firefox 不需要，但在 Chrome 就需要，否則第二次播放時就會因為已到最後而播不出聲音。
    audio.play(); // 播放語音。
  }
 function translate(text){
	rand_a=Math.floor(Math.random()*999999);
	rand_b=Math.floor(Math.random()*999999);
	 url="https://translate.google.com.tw/translate_a/single?client=t&sl=zh-TW&tl=ja&hl=zh-TW&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&dt=at&ie=UTF-8&oe=UTF-8&source=btn&srcrom=1&ssel=5&tsel=5&kc=0&tk="+rand_a+"."+rand_b;
	 var txt='';
	 $.ajax({url:url,
	 data:{q:text},
	 type:'GET',
	 complete: function(data,text){
		 console.log(data.responseText);
		txt=data.responseText;
		 }})
 }
 function goo(a){
	txt='[[["えり","繪里",,,0],[,,"Eri","Huì lǐ"]],,"zh-TW",,,[["绘",1,[["えり",1000,false,false],["エリ",0,false,false],["Eriさん",0,false,false],["ERI",0,false,false],["ERIの",0,false,false]],[[0,1]],"繪里",0,1]],0.67719305,,[["zh-CN","ja"],,[0.67719305,0.32280695]]]';
	len=txt.length;
	box='';
	for(i=0;i<len;i++){
		if((txt.slice(i,i+1)!='[') && (txt.slice(i,i+1)!=']') && (txt.slice(i,i+1)!='"')){
			box=box+txt.slice(i,i+1);
		}
	}
	box=box.split(',');
	//txt=txt.replace('[',' ');
	//txt=txt.replace(']',' ');
	//d=txt.split(a);
	console.log(box[0]);
 }
  
</script>
</html>