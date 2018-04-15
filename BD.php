<?
/*
$db_host="localhost";
$db_user="admin";
$db_pass='1234';
$db_select='_20150916';//database name
$dbconnect="mysql:host=$db_host;dbname=$db_select";
$dbgo=new PDO($dbconnect,$db_user,$db_pass);
$dbgo->exec("set names utf8");
for($a=0;$a<=9;$a++)//新增
{
$dbgo->exec("insert into _name(_name,_acc,_ps) values('bbb".$a."','bbb".$a."','bbb".$a."')");
}
$dbgo->exec("update _name set _name='bbb10',_acc='bbb10',_ps='你好' where _id='7'");//修改
$dbgo->exec("delete from _name where _id='11'");//刪除
$sql="select * from _name";
$result=$dbgo->query($sql);
$row=$result->fetch();
echo $row['_name'].",".$row['_acc'].",".$row['_ps'];//單筆查詢
foreach($dbgo->query($sql) as $row)//多筆查詢
{
echo $row['_name'];
}
*/
error_reporting(1);
$db_host='sql210.clouds.twgogo.org';
$db_user='otgoo_16383110';
$db_pass='Icanusethis';
$db_select='otgoo_16383110_bioprosthetic';
$db_connect="mysql:host=$db_host;dbname=$db_select";
$db_dns=new PDO($db_connect,$db_user,$db_pass);
$db_dns->exec("set names utf8");
$sql="SELECT * FROM `bioprosthetic`";
/*
define('DB_NAME','admin');
define('DB_USER','admin');
define('DB_HOST','127.0.0.1');
define('DB_')
*/
?>