<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public function index()
//    {
//        $sms = app('easysms');
//        try {
//            $sms->send(17602118840, [
//                'content'  => '6666',
//                'template' => 'SMS_135765597',
//                'data' => [
//                    'code' => 8888
//                ]
//            ]);
//        } catch (\GuzzleHttp\Exception\ClientException $exception) {
//            $response = $exception->getResponse();
//            $result = json_decode($response->getBody()->getContents(), true);
//            dd($result);
//        }
//    }
}
