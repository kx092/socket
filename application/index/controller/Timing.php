<?php
namespace app\index\controller;
use think\Controller;
use Db;
/**
 * 定时任务
 */
class Timing extends controller
{
	
	function __construct()
	{
		# code...
	}
	public function index()
	{
		ignore_user_abort();//关掉浏览器，PHP脚本也可以继续执行.
        set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
        $interval=15;// 每隔10秒运行
        do{
            $run = include 'Config.php';//
            if(!$run) die('process abort');//停止执行
            sleep($interval);// 等待10秒
            $this->add();
        }
        while(true);
	}
	public function add()
    {
        // $time = date('Y-m-d H:i:s',time());
        // $arr = ['addtime'=>$time];
        // //插入数据库
        // db("ceshi")->insert($arr);
        $result = Db::query('DESCRIBE tp5_goods');//table_name 换成你对应的表名
        
        $column=array();
        foreach ($result as $key => $value) 
        {
            if ($key !=0 ) {
                $column[] = $result[$key]['Field'];
            }
            
        }
        $column = implode(',', $column);
        // echo '<pre>';
        // dump($column);die();
        $arr =  Db::name('goods')
        // ->where($map)
        ->field($column)
        ->limit(0,200)
        ->select();
        Db::name("goods")->insertAll($arr);
    }
}