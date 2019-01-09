<?php
/**
 * Created by PhpStorm.
 * User: shenjin001
 * Date: 2019/1/6
 * Time: 0:48
 */

namespace App\Service;

use GatewayWorker\Lib\Gateway;

class ImService
{
    public function connect($clientId)
    {
        $data = array(
            'type'=>'say',
            'client_id'=>$clientId,
        );
        Gateway::sendToAll(json_encode($data));

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