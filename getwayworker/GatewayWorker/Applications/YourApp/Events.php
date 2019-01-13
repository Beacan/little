<?php
/**
 * This file is part of workerman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link http://www.workerman.net/
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * 用于检测业务代码死循环或者长时间阻塞等问题
 * 如果发现业务卡死，可以将下面declare打开（去掉//注释），并执行php start.php reload
 * 然后观察一段时间workerman.log看是否有process_timeout异常
 */
//declare(ticks=1);

use \GatewayWorker\Lib\Gateway;
use GatewayWorker\Lib\Db;
/**
 * 主逻辑
 * 主要是处理 onConnect onMessage onClose 三个方法
 * onConnect 和 onClose 如果不需要可以不用实现并删除
 */
class Events
{
    /**
     * 当客户端连接时触发
     * 如果业务不需此回调可以删除onConnect
     * 
     * @param int $client_id 连接id
     */
    public static function onConnect($client_id)
    {
//        $rt = Db::instance('db')->query('select * from user');
        $now = date('Y-m-d H:i:s',time());
        $user_id = 2;
        $session_id = md5($user_id.time());
        $_SESSION['hhid'] = $session_id;
        $rt = Db::instance('db')->query("
            insert into login_record(user_id,created_at,status,session_id) 
            values('{$user_id}','{$now}',1,'{$session_id}') ");
        $data = array(
            'type'=>'login',
            'client_id'=>$client_id,
            'sss'=>$rt
        );
        Gateway::sendToAll(json_encode($data));
        // 向所有人发送
    }
    public static function onMessage($client_id, $message)
    {
        
    }

    /**
     * 当用户断开连接时触发
     * @param int $client_id 连接id
     */
    public static function onClose($client_id)
    {
        $data = array(
            'type'=>'say',
            'client_id'=>$client_id.' close',
        );
        $now = date('Y-m-d H:i:s',time());
        $session_id = $_SESSION['hhid'];
        $rs = Db::instance('db')->query("
            update login_record set updated_at = '{$now}',status = 2 where session_id = '{$session_id}'");
        Gateway::sendToAll($data);
    }
}
