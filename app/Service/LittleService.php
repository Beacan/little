<?php
/**
 * Created by PhpStorm.
 * User: shenjin001
 * Date: 2019/1/6
 * Time: 0:48
 */

namespace App\Service;
use App\Constant;
use App\Models\LoginRecord;
use App\Models\Master;
use App\Models\User;
use DB;

use App\Models\Weapon;

class LittleService
{
    public function getWeapons($level)
    {
        $query =  Weapon::where('status',Constant::EFFECT);
        if ($level) {
            $query->where('level',$level);
        }
        $weapons = $query->get()->toArray();
        return $weapons;
    }

    public function getMaster($level)
    {

        $query = Master::where('status',Constant::EFFECT);
        if ($level) {
            $query->where('level',$level);
        }
        $masters = $query->get()->toArray();
        return $masters;
    }
    public function getUserInfo($openid)
    {
        $userInfo = User::leftJoin('user_weapon','user_weapon.user_id','=','user.id')
            ->leftJoin('weapon','user_weapon.weapon_id','=','weapon.id')
            ->where('user.openid','=',$openid)
            ->where('user.status','=',Constant::EFFECT)
            ->where('weapon.status','=',Constant::EFFECT)
            ->select(
                'user.nickname',
                'user.cron',
                'user.level',
                'weapon.name',
                'weapon.price'
            )
            ->get()->toArray();
        return $userInfo;
    }

    public function getOfflineAward($user_id)
    {
        //上线时计算离线奖励
        $loginReward = LoginRecord::where('user_id',$user_id)
            ->where('status',Constant::OFFLINE)
            ->orderBy('id','DESC')
            ->first();

        if(!$loginReward){
            return false;
        }
        $offLineAward = (time() - strtotime($loginReward->updated_at)) * Constant::OFFLINT_AWARD;
        $res = User::where('id',$user_id)->increment('cron',$offLineAward);
        if($res){
            LoginRecord::where('id','=',$loginReward->id)->update(['status'=>3]);
        }

        return $res;
    }

    public function killMaster($masterId)
    {
        $userId = $_SESSION['userId'];

        return true;
    }
}