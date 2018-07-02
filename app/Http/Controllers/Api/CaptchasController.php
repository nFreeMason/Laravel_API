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

        return $this->response->array($result)->setStatusCode(201);
    }
}
