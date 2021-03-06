<?php
namespace app\index\controller;
/**
 * queue 单模块 多模块
 * 执行启动队列
 * php think queue:work --daemon --queue helloJobQueue
 */
use think\Controller;
use think\Queue;
class jobTest extends controller
{
	 //单模块  延缓执行
	 // public function index(){
	 //    	//存入redis 延迟执行删除 插入数据库（及为执行任务）
	 //        Queue::later(10,'app\\job\\Task',['arg1'=>1,'arg2'=>2],'group1');
	 //    }
	//单模块
	//url http://www.web.com/index/JobTest/actionWithHelloJob
	public function actionWithHelloJob(){
			$data = [
		    	'name'=>'name',
		    	'time'=>time()
		    ];
	        // 1.当前任务将由哪个类来负责处理。
	        //   当轮到该任务时，系统将生成一个该类的实例，并调用其 fire 方法
	        $jobHandlerClassName  = 'app\job\Hello';

	        // 2.当前任务归属的队列名称，如果为新队列，会自动创建
	        $jobQueueName  	  = "helloJobQueue";

	        // 3.当前任务所需的业务数据 . 不能为 resource 类型，其他类型最终将转化为json形式的字符串
	        $jobData       	  = [ 'ts' => time(), 'bizId' => uniqid() , 'data' => $data ] ;

	        // 4.将该任务推送到消息队列，等待对应的消费者去执行

	        $isPushed = Queue::push( $jobHandlerClassName , $jobData , $jobQueueName );

	        //$isPushed = Queue::later(10,$jobHandlerClassName,$jobData,$jobQueueName); //把任务分配到队列中，延迟10s后执行

	        // database 驱动时，返回值为 1|false  ;   redis 驱动时，返回值为 随机字符串|false
	        if( $isPushed !== false ){
	            echo date('Y-m-d H:i:s') . " a new Hello Job is Pushed to the MQ"."<br>";
	        }else{
	            echo 'something went wrong.';
	        }
	}
	//多进程
	//url http://www.web.com/index/JobTest/multiTask/tasktype/taskOne
	public function multiTask() {
	    // $taskType = $_GET['tasktype'];
	    $taskType = input('param.tasktype');

	    //模拟数据
	    $data = [
	    	'name'=>'name',
	    	'time'=>time()
	    ];
	    switch ($taskType) {
	        case "taskOne":
	            $jobHandleClassName = "app\job\Multitask@taskOne";
	            $jobQueueName = "taskOneQueue";
	            $jobData = ['ts'=>time(), 'bizId'=>uniqid(), 'data'=>$data];
	            break;
	        case "taskTwo":
	            $jobHandleClassName = "app\job\Multitask@taskTwo";
	            $jobQueueName = "taskTwoQueue";
	            $jobData = ['ts'=>time(), 'bizId'=>uniqid(), 'data'=>$data];
	            break;
	        default:
	            break;
	    }
	    $isPushed = Queue::push($jobHandleClassName, $jobData, $jobQueueName);
	    // dump($isPushed);die();
	    if ($isPushed!==false) {
	        echo date('Y-m-d H:i:s')."the $taskType of multiTask job has been pushed to $jobQueueName <br>";
	    }else {
	        throw new Exception("push a new $taskType of multiTask job Failed!");
	    }
	}
	// CREATE TABLE `test` (
	// `id` int(10) NOT NULL AUTO_INCREMENT,
	// `task_type` varchar(50) DEFAULT '' COMMENT '任务类型',
	// `data` text COMMENT '数据',
	// `pdate` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
	// PRIMARY KEY (`id`)
	// ) ENGINE=InnoDB DEFAULT CHARSET=utf8

}
