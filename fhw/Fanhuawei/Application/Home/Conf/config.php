<?php
return array(
	//'配置项'=>'配置值'

	//用户登录后需要保存的信息的变量
	"USER_ID"=>'id', //保存用户id
	"USER_INFO"=>'user_info',//保存用户信息

	//缓存方式
	'DATA_CACHE_TYPE' => 'Memcache', 
	//v\ 缓存服务器地址
	'MEMCACHE_HOST'   => 'tcp://127.0.0.1:11211',  
	//指定默认的缓存时长为3600 秒,没有会出错
	// 'DATA_CACHE_TIME' => '3600',
);