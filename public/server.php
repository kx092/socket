<?php
// [ 应用入口文件 ] websocket 启动
namespace think;

// 加载基础文件
require __DIR__ . '/../thinkphp/base.php';

// 执行应用并响应（绑定）
Container::get('app')->bind('socket/Server')->run()->send();