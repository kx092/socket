<?php

namespace app\index\controller;
use think\Controller;
use Cache;
use Db;
class Index extends controller{
	  
    public function index()
    {
    	$redis = new \Redis();
        $result = $redis->connect('127.0.0.1', 6379, 2.5);
    	$data = json_encode([
    		'id'=>1,
    		'name'=>"三s",
    		'age' =>"23",
    	]);
    	$redis->set("key",$data);
    	$res = $redis->get("key");
    	$datas = [
    		'id'=>1,
    		'name'=>"三",
    		'age' =>"23",
    	];
        $cache = Cache::store('redis')->set('test','yan');
    	$cache = Cache::store('redis')->set('test2','yans');
        $info = Cache::store('redis')->get('test');
    	var_dump($info);
    }
    public function columns()
    {
        
        $map[] = ['name','like','%高清流畅电视神器%'];
        // $title = Db::name("goods")->fetch_assoc();
        // $arr =  Db::name('user')
        // // ->where($map)
        // ->field("")
        // ->select();
        // Db::name("user")->insertAll($arr);
        // dump($title);

        // $result = Db::query('SHOW TABLES');//执行查询语句
        // dump($result);exit;
        
        // $result = Db::query('DESCRIBE tp5_goods');//table_name 换成你对应的表名
        
        // $column=array();
        // foreach ($result as $key => $value) 
        // {
        //     if ($key !=0 ) {
        //         $column[] = $result[$key]['Field'];
        //     }
            
        // }
        // $column = implode(',', $column);
  
        $arr =  Db::name('goods')
        ->where($map)
        // ->field($column)
        // ->limit(0,200)
        ->select();
        // Db::name("goods")->insertAll($arr);
        dump($arr);exit;

    }
   
}


