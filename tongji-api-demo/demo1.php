<?php
class getinfo{
 public $cookie_abcd9_com,$content; 
 public function post($post_url,$param) {  
 $ch = curl_init(); 
 curl_setopt($ch, CURLOPT_URL,$post_url); //设定远程抓取网址
 curl_setopt($ch, CURLOPT_POST, 1); //设置为POST提交模式
 curl_setopt($ch, CURLOPT_POSTFIELDS, $param); //提交参数
 curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_abcd9_com);
 //把返回的cookie保存到$this->cookie_abcd9_com文件中
 curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_abcd9_com);
 //读取cookie
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 //返回获取的输出文本流，而不自动显示
 $this->content = curl_exec($ch); 
 curl_close($ch); 
 } 
}

// 调用代码：

$info = new getinfo(); //创建实例$info
$info->cookie_abcd9_com=tempnam("","cookie"); //设置cookie临时文件
$info->post('https://tongji.baidu.com/web/welcome/ico?s=2c52d20a483071b260800d4e2f5544a2','passwd=sundy123');
// $info->post('http://tongji.baidu.com/web/welcome/ico?s=f265eac6e83d5c33da59b31b26da94fd','passwd=abcd9.com');
//模拟登陆。其中淡蓝色字符串为目标网站的查看地址，红色字符串为查看密码

// $info->post('http://tongji.baidu.com/web/3827653/ajax/post','indicators=ip_count&method=visit/district/f&siteId=1351465');
$info->post('http://tongji.baidu.com/web/3827653/ajax/post','indicators=pv_count&method=source/all/a&siteId=12231084');

//获取数据。其中淡蓝色字符串为ajax处理url，三个红色字符串为传递参数
$data=json_decode($info->content,true); //获取到的数据为json格式，转换为数组
// echo "<pre>";
// print_r($data); //输出，或进行其他操作
var_dump($data);


// phpinfo();