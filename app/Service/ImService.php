<?php
/**
 * Created by PhpStorm.
 * User: shenjin001
 * Date: 2019/1/6
 * Time: 0:48
 */

namespace App\Service;

use App\Models\LoginRecord;
use GatewayWorker\Lib\Gateway;
use App\Models\User;
class ImService
{
    public function __construct(LittleService $littleService)
    {
        $this->littleService = $littleService;
    }
    public function connect($clientId,$openid,$hhid)
    {
        $openid = 'openid_test';
        $userInfo = $this->littleService->getUserInfo($openid);
        if(!$userInfo){
            return false;
        }
        $uid = $userInfo['id'];
        Gateway::bindUid($clientId, $uid);

        $this->littleService->getOfflineAward($uid);
        $insertArr = [
            'user_id'=>$uid,
            'created_at'=>date('Y-m-d H:i:s',time()),
            'status'=>1,
            'session_id'=>$hhid,
        ];
        LoginRecord::insert($insertArr);

        $_SESSION['uid'] = $uid;
        $_SESSION['token'] = md5($uid.time());
        $data = [
            'level'=>$userInfo['level'],
            'cron'=>$userInfo['cron'],
            'nickname'=>$userInfo['nickname'],
            'token'=>$_SESSION['token'],
        ];
        return $data;
    }

    public function sendMessage($clientId)
    {
        $data = array(
            'type'=>'say',
            'content'=>'are you ok',
        );
        Gateway::sendToClient($clientId,json_encode($data));
    }
}