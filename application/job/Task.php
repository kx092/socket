<?php
/**
 * 单模块queue
 */
namespace app\job;
    
use think\queue\Job;
    
class Task{
        
    public function fire(Job $job,$data){
        
        //任务失败（重复）3次以上，删除该任务
        if($job->attempts() > 3){
            //TODO
            //....
            //删除
            // dump(111);exit;
            $job->delete();
        }else{
             //写入数据库
            $res = db('test')->insert(['data'=>json_encode($data)]);

            if(!$res){
                $delay = 1;//$delay为延迟时间
                //重新发布该任务
                $job->release($delay);
            }else{
                //成功之后
                $job->delete();
            }
        }
    }
}
