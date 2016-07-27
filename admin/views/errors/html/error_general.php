<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>系统错误</title>
	<link href="/admin/views/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/admin/views/js/jquery.js"></script>

	<script language="javascript">
		$(function(){
			$('.error').css({'position':'absolute','left':($(window).width()-490)/2});
			$(window).resize(function(){
				$('.error').css({'position':'absolute','left':($(window).width()-490)/2});
			})
			countDown(3);
		});
		function countDown(secs){
			tiao.innerText=secs;
			if(--secs>0){
				setTimeout("countDown("+secs+")",1000);
			}else{
				history.go(-1);
			}
		}
	</script>
	<style>
		.error{padding-top: 10px;}
		.error h2 p{padding-left: 0;font-size: 26px;font-weight: 800;font-family: '仿宋', '宋体';}
		#tiao{display: inline;color: #f0580c;font-size: 16px;font-weight: 800;}
		.error p a{font-size: 14px;color: #307fb1;}
	</style>
</head>

<body style="background:#FFF8ED;">

<div class="error" style="top: 30%;">
	<h2><?php echo $message; ?></h2>
	<p><span id="tiao">3</span> 秒后返回上一页…… <a href="javascript:void(0)" onclick="javascript:history.go(-1);" >点击这里</a></p>
	<div class="reindex"><a href="/admin" >返回首页</a></div>
</div>


</body>

</html>
