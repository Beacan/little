<?php

namespace App\Http\Controllers\Little;

use App\Service\LittleService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class LittleController extends BaseController
{
    public function __construct(LittleService $littleService)
    {
        $this->littleService = $littleService;
    }

    public function index(Request $request)
    {
        $user_id = $request->input('user_id',1);
        $data = $this->littleService->getOfflineAward($user_id);
        return Response()->json(['data'=>$data]);
    }
}
