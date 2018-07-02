<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\VerificationCodeRequest;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;

class VerificationCodesController extends Controller
{
    //
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {

        $captchaData = cache($request->captcha_url);

        if ( ! $captchaData ) {
            return $this->response->error('图片验证码已失效',422);
        }

        if ( ! hash_equals($captchaData['code'],$request->captcha_code) ) {
            cache()->forget($request->captcha_url);
            return $this->response->errorUnauthorized('验证码错误');
        }

        $phone = $request->phone;

        // 随机生成 4 位随机数，左补 0
        $code = str_pad(random_int(1,9999),4,0,STR_PAD_LEFT);

        try {
            if ( app()->environment('production') ) {
                $result = $easySms->send($phone,[
                    'content' => "【larabbs社区】您的验证码是{$code}。如非本人操作，请忽略本短信",
                    'template' => 'SMS_135755558',
                    'data' => [
                        'code' => $code
                    ]
                ]);
            }else{
                $code = '1234';
            }
        }catch (ClientException $exception) {
            $response = $exception->getResponse();
            $result = json_decode($response->getBody()->getContents(),true);
            return $this->response->errorInternal($result['msg']??'短信发送异常');
        }

        $key = 'verificationCode_'.str_random(15);
        $expiredAT = now()->addMinutes(10);
        // 缓存验证码 10 分钟
        cache()->put($key,['phone'=>$phone,'code'=>$code],$expiredAT);
        cache()->forget($request->captcha_url);

        return $this->response->array([
            'key' => $key,
            'expired_at' => $expiredAT->toDateTimeString()
        ])->setStatusCode(201);
    }
}
