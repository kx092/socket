<?php
namespace app\socket\controller;

use app\socketio\model\Msg;
use think\Controller;
use think\facade\Request;
class Index extends controller
{
    /**
     * [index description]
     * @return [type] [description] 公共聊天
     * url:http://www.web.com/socket/index
     */
    public function index()
    {

        return $this->fetch();
    }
    /**
     * [chat description]
     * @return [type] [description] 私聊
     * url:http://www.web.com/socket/index/chat/username/user
     */
    public function chat()
    {

        $username = input('param.username');
        $this->assign("to",$username);
        return $this->fetch();
    }
    public function system()
    {
        $data = Request::param();
        $to = $data['to'] ?? '';
        $content = $data['content'] ?? '';
        $res = Msg::send($to, $content);
        return $res == 'ok' ? '系统消息推送成功' : '系统消息推送失败';
    }
}