<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CaptchaRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;

class CaptchasController extends Controller
{
    //
    public function store(CaptchaRequest $request, CaptchaBuilder $captchaBuilder)
    {
        $key = 'images/captchas/captcha-'.str_random(15).'.jpg';
        $phone = $request->phone;

        $captcha = $captchaBuilder->build();
        $expireAt = now()->addMinutes(2);

        $captcha->save($key);
        cache()->put(str_finish(config('app.url'),'/').$key,['phone'=>$phone,'code'=>$captcha->getPhrase()],$expireAt);

        $result = [
            'captcha_url' => str_finish(config('app.url'),'/').$key,
            'expired_at' => $expireAt->toDateTimeString(),
            'code' => $captcha->getPhrase(),
            'cache' => cache(str_finish(config('app.url'),'/').$key)
        ];
        $accessToken = '11_LzOCjoVQpGg_wDU6zKhm4Tsx6AOJx0uM7Mx7hmJ44mcDCJKEVy4kopQSLcYy31PEvgkJ_icmBnosXI5c7kyq4w';
        $openID = 'o7rf11cthXcw4u1si';
        $driver = Socialite::driver('weixin');
        $driver->setOpenId($openID);
        $oauthUser = $driver->userFromToken($accessToken);

        $code = 'CODE';
        $driver = Socialite::driver('weixin');
        $response = $driver->getAccessTokenResponse($code);
        $driver->setOpenId($response['openid']);
        $oauthUser = $driver->userFromToken($response['access_token']);
        return $this->response->array($result)->setStatusCode(201);
    }
}
