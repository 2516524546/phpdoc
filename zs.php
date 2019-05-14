<?php
error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
require("data/head.php");
$act = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'agent';
 if($act == "agent"){
	 $result_str = unstrreplace($cf['agents']);
	 ////模板选择
 }
 ////ajax 查询返回
 if($act == "query"){
	$keyword = trim($_GET["keyword"]);
	$search  = $_GET['search'];
	$yzm     = trim($_GET['yzm']);
	$result  = 0;
	$msg0    = 1;
    //输入不为空
	if($keyword != ""){
	  if($cf['yzm_status'] == 1 && $yzm == ""){
		 $msg1 = "请输入验证码";
		 $msg0 = 0;
	  }
	  if($cf['yzm_status'] == 1 && $yzm != $_SESSION['authnum_session']){
		 $msg1 = "验证码输入错误";
		 $msg0 = 0;
	  }
	  if($msg0 == 1){
	   $sql="select * from tgs_agent where (weixin='$keyword' or phone='$keyword' or qq='$keyword') and shzt='1' limit 1";
     // var_dump($sql);
	   $res=mysql_query($sql);
	   if(mysql_num_rows($res)>0){
		  $arr = mysql_fetch_array($res);
		  $agentid  =  $arr["agentid"];
		   $idcard  =  $arr["idcard"];
       $header  =  $arr["header"];
		   $dengji  =  $arr["dengji"];
		  $product  =  $arr["product"];
		  $quyu     =  $arr["quyu"];
		  $shuyu    =  $arr["shuyu"];
		  $qudao    =  $arr["qudao"];
		  $url      =  $arr["url"];
		  $about    =  $arr["about"];
		  $addtime  =  $arr["addtime"];
		  $jietime  =  $arr["jietime"];
		  $name     =  $arr["name"];
		  $tel      =  $arr["tel"];
		  $fax      =  $arr["fax"];
		  $phone    =  $arr["phone"];
		  $danwei   =  $arr["danwei"];
		  $email    =  $arr["email"];
		  $qq       =  $arr["qq"];
		  $weixin   =  $arr["weixin"];
		  $wangwang =  $arr["wangwang"];
		  $paipai   =  $arr["paipai"];
		  $zip      =  $arr["zip"];
		  $dizhi    =  $arr["dizhi"];
		  $beizhu   =  $arr["beizhu"];
		  $query_time  = $arr["query_time"];
		  $hits        = $arr['hits'];
		  $hmd        = $arr['hmd'];
		  $results     = 1;
		  $msg1        = str_replace("{{weixin}}",$weixin,unstrreplace($cf['agent_1']));

		  if($_SESSION['s_query_time']==""){
			 $_SESSION['s_query_time'] = $query_time;
		   }
		   ////非第一次查询
		   if($hmd==1){
			   $results = 2;
			   $msg1    = str_replace("{{weixin}}",$weixin,unstrreplace($cf['agent_2']));

		   }
		  $msg1        = str_replace("{{agentid}}",$agentid,$msg1);
			$msg1        = str_replace("{{product}}",$product,$msg1);
			$msg1        = str_replace("{{dengji}}",$dengji,$msg1);
			$msg1        = str_replace("{{idcard}}",$idcard,$msg1);
			$msg1        = str_replace("{{quyu}}",$quyu,$msg1);
			$msg1        = str_replace("{{shuyu}}",$shuyu,$msg1);
			$msg1        = str_replace("{{qudao}}",$qudao,$msg1);
			$msg1        = str_replace("{{url}}",$url,$msg1);
			$msg1        = str_replace("{{about}}",$about,$msg1);
			$msg1        = str_replace("{{addtime}}",$addtime,$msg1);
			$msg1        = str_replace("{{jietime}}",$jietime,$msg1);
			$msg1        = str_replace("{{name}}",$name,$msg1);
			$msg1        = str_replace("{{tel}}",$tel,$msg1);
			$msg1        = str_replace("{{fax}}",$fax,$msg1);
			$msg1        = str_replace("{{phone}}",$phone,$msg1);
			$msg1        = str_replace("{{danwei}}",$danwei,$msg1);
			$msg1        = str_replace("{{email}}",$email,$msg1);
			$msg1        = str_replace("{{qq}}",$qq,$msg1);
			$msg1        = str_replace("{{weixin}}",$weixin,$msg1);
			$msg1        = str_replace("{{wangwang}}",$wangwang,$msg1);
			$msg1        = str_replace("{{paipai}}",$paipai,$msg1);
			$msg1        = str_replace("{{zip}}",$zip,$msg1);
			$msg1        = str_replace("{{dizhi}}",$dizhi,$msg1);
			$msg1        = str_replace("{{beizhu}}",$beizhu,$msg1);
			$msg1        = str_replace("{{hits}}",$hits+1,$msg1);
			$msg1        = str_replace("{{query_time}}",$_SESSION['s_query_time'],$msg1);

		  $msg0 = 1;
	   }else{
		 $results = 3;
		 $msg1   = str_replace("{{keyword}}",$weixin,unstrreplace($cf['agent_3']));

	   }
	   ///保存查询记录
	   $sql = "insert into tgs_hisagent set keyword='".$keyword."',results='".$results."',addtime='".$GLOBALS['tgs']['cur_time']."',addip='".$GLOBALS['tgs']['cur_ip']."'";
	   mysql_query($sql);
	  }
	}else{
	    $msg1 = "请输入微信号！";
	}

 }

if ( $results == 1)
{
ob_clean();

// $myImage = ImageCreate(700,990); //参数为宽度和高度
// $dst_path = './editor/attached/fw_logo.png';
// $myImage = imagecreatefrompng('zs002.png');
// $dst     = imagecreatefrompng($dst_path);
// // list($src_w, $src_h) = getimagesize($src_path);
//
//
//         // 证书模版图片文件的路径
// $white=ImageColorAllocate($myImage, 255, 255, 255);
//
//  $black=ImageColorAllocate($myImage, 0, 0, 0);
//
//  $red=ImageColorAllocate($myImage, 255, 0, 0);
//
//  $green=ImageColorAllocate($myImage, 0, 255, 0);
//
//  $blue=ImageColorAllocate($myImage, 0, 0, 255);
//
//  imagettftext($myImage, 15, 0, 100, 400, $black, "simhei.ttf",  "$msg1");
//  imagecopymerge($dst, $myImage, 10, 10, 0, 0, 10, 10, 0);
//  header("Content-type:image/png");
//
// ImagePng($myImage);
// ImageDestroy($myImage);

$dst_path = 'zs009.png';

$src_path = '.'.$header;
//创建图片的实例
$image = imagecreatetruecolor(500, 500);
$black=ImageColorAllocate($image,0,0,0);
$dst = imagecreatefromstring(file_get_contents($dst_path));


$src = imagecreatefromstring(file_get_contents($src_path));
list($src_w, $src_h) = getimagesize($src_path);
$per= 0.3;
$n_w=146;
$n_h=180;
//缩放图片
$new = imagecreatetruecolor($n_w, $n_h);

imagecopyresized($new, $src,0, 0,0, 0,$n_w, $n_h, $src_w, $src_h);
// header('Content-Type: image/png');
// imagepng($new);
//
//获取水印图片的宽高

//如果水印图片本身带透明色，则使用imagecopy方法

//生成水印图片
if ($header) {
  imagecopy($dst, $new, 482, 465, 0, 0, $n_w, $n_h);
}else {
  imagecopy($dst, $new, 482, 465, 0, 0, $n_w, $n_h,0);
}
//获取水印图片的宽高
list($dst_w, $dst_h, $dst_type) = getimagesize($dst_path);

 // $white=ImageColorAllocate($dst, 255, 255, 255);
 // $red=ImageColorAllocate($dst, 255, 0, 0);
 // $green=ImageColorAllocate($dst, 0, 255, 0);
 // $blue=ImageColorAllocate($dst, 0, 0, 255);

//文字水印
// echo "<pre>";
// print_r($msg1);die;
$alltime = $addtime.' 至 '.$jietime;
$company = "德瑞康互联生物医学科技股份有限公司 旗下微商代理";

$a = 1;

while ($a <= 1) {
  imagettftext($dst, 18, 0, 150, 370, $black, "simhei.ttf",  $name);
  imagettftext($dst, 15, 0, 120, 410, $black, "simhei.ttf",  $company);
  imagettftext($dst, 15, 0, 180, 460, $black, "simhei.ttf",  $shuyu);
  imagettftext($dst, 16, 0, 180, 505, $black, "simhei.ttf",  $weixin);
  imagettftext($dst, 15, 0, 180, 545, $black, "simhei.ttf",  $dizhi);
  imagettftext($dst, 16, 0, 180, 590, $black, "simhei.ttf",  $idcard);
  imagettftext($dst, 22, 0, 240, 653, $black, "simhei.ttf",  $agentid);
  imagettftext($dst, 14, 0, 170, 697, $black, "simhei.ttf",  $alltime);
  imagettftext($dst, 14, 0, 369, 873, $black, "simhei.ttf",  $addtime);
  $a++;
}


switch ($dst_type) {
    case 1://GIF
        header('Content-Type: image/gif');
        imagegif($dst);
        break;
    case 2://JPG
        header('Content-Type: image/jpeg');
        imagejpeg($dst);
        break;
    case 3://PNG
        header('Content-Type: image/png');
        imagepng($dst);
        break;
    default:
        break;
}

imagedestroy($dst);
imagedestroy($src);


}

?>
