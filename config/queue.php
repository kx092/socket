<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

// return [
//     // 'connector' => 'Sync'
//     'connector' => 'Database',  //使用数据库驱动
//     'expire'    => 60,          //任务默认过期时间60s,若禁用设为null
//     'default'   => 'default',   //默认队列名称
//     'table'     => 'job',      //存储队列任务的表名(不含前缀)
//     'dsn'       => []
// ];
 return [
        'connector'  => 'Redis',		    // 可选驱动类型：sync(默认)、Redis、database、topthink等其他自定义类型
        'expire'     => 60,				    // 任务的过期时间，默认为60秒; 若要禁用，则设置为 null
        'default'    => 'default',		    // 默认的队列名称
        'host'       => '127.0.0.1',	    // redis 主机ip
        'port'       => 6379,			    // redis 端口
        'password'   => '',                 // redis 连接密码
        'select'     => 0,				    // 使用哪一个 db，默认为 db0
        'timeout'    => 0,				    // redis连接的超时时间
        'persistent' => false,			    // 是否是长连接
    ]; 
