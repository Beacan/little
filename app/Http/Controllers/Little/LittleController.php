<?php

namespace App\Http\Controllers\Little;

use App\Service\ImService;
use App\Service\LittleService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class LittleController extends BaseController
{
    public function __construct(LittleService $littleService, ImService $imService)
    {
        $this->littleService = $littleService;
        $this->imService = $imService;
    }

    public function index(Request $request)
    {
        $user_id = $request->input('user_id',1);
        $data = $this->littleService->getOfflineAward($user_id);
        return Response()->json(['data'=>$data]);
    }

    public function connect(Request $request)
    {
        $clientId = $request->input('client_id');
        $openid = $request->input('openid');
        $hhid = $request->input('hhid');

        $res = $this->imService->connect($clientId,$openid,$hhid);
        return Response()->json(['data'=>$res]);
    }

    public function getMaster(Request $request)
    {
        $level = $request->input('level');

        $res = $this->littleService->getMaster($level);
        return Response()->json(['data'=>$res]);
    }
    public function killMaster(Request $request)
    {

        $masterId = $request->input('masterId');
        $res = $this->littleService->killMaster($masterId);
        return Response()->json(['data'=>$res]);

    }
}
