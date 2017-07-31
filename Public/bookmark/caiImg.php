<?php
header("Content-Type:text/html; charset=utf-8");
set_time_limit(0);
//抓取网址
$url="http://www.chinawinxp.com/static/php/2014/1222/75.html";
//设置图片名称
$time=time();
//设置图片输出地址
$outdir = 'E:/BaseServer2/htdocs/curlImg/'.$time.".png";
//CutyCapt绝对路径
$path = 'E:/BaseServer2/htdocs/CutyCapt.exe';
//命令
$cmd = "$path --url=$url --out=$outdir";
//执行命令
exec($cmd);
echo  "图片抓取成功！";