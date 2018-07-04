<head>
    <title></title>
	<style>
		html{width:100%;}
		body{
			width:60%;
			margin: auto;
		    position: absolute;
		    top: 0;
		    left: 0;
		    right: 0;
		    bottom: 0;
		}
		blockquote,code,pre{
			width:97%;
			background:#F5F8FC;
			padding:1px 10px;
			color:#8796BB;
			font-size:16px;
			line-height:200%;
			margin-left:0px;
		}
		pre{
			padding:10px 5px;
			margin-top:-30px;
		}
	</style>
</head>

# L03 Laravel 教程 - 实战构架 API 服务器

    动作	    				URI	            				行为
    GET	   			 		/photos	            			index
    GET	    				/photos/create       			create
    POST             		/photos	            			store
    GET              		/photos/{photo}       			show
    GET	    				/photos/{photo}/edit			edit
    PUT/PATCH        		/photos/{photo}					update
    DELETE           		/photos/{photo}					destroy


# Package 包文档

1、使用 Laravel API 文档生成器扩展包自动为项目生成 API 文档

>安装： composer require mpociot/laravel-apidoc-generator
>详情：[http://laravelacademy.org/post/4578.html](http://laravelacademy.org/post/4578.html)
>github：[https://github.com/mpociot/laravel-apidoc-generator](https://github.com/mpociot/laravel-apidoc-generator)

2、代码生成器 Laravel-5-Generators-Extended

>安装：composer require laracasts/generators --dev
>详情：[https://laravel-china.org/topics/2535/extension-recommended-laravel-5-generators-extended-code-generator](https://laravel-china.org/topics/2535/extension-recommended-laravel-5-generators-extended-code-generator)
>github：[https://github.com/laracasts/Laravel-5-Generators-Extended](https://github.com/laracasts/Laravel-5-Generators-Extended)

3、Laravel 的 API 认证系统 Passport

>安装：composer require laravel/passport=~4.0
>详情：[https://laravel-china.org/docs/laravel/5.5/passport/1309](https://laravel-china.org/docs/laravel/5.5/passport/1309)

4、easy-sms 短信发送组件

    easy-sms 是安正超写的一个短信发送组件，利用这个组件，我们可以快速的实现短信发送功能

>安装：composer require "overtrue/easy-sms"
>github：[https://github.com/overtrue/easy-sms](https://github.com/overtrue/easy-sms)

5、修改数据表迁移需要doctrine/dbal组件

>安装：composer require doctrine/dbal

5、gregwar/captcha 图片验证码

    Larabbs 项目中已经安装了 mews/captcha，对于网页应用来说，这个组件使用起来十分方便，但是它依赖 session，而且没法获取和设置验证码文本，不适用于 API 的用例。在 API 的开发中，我们将选择使用 gregwar/captcha 来完成图片验证码的功能

>安装：composer require gregwar/captcha
>详情：[https://laravel-china.org/courses/laravel-advance-training-5.5/801/picture-verification-code](https://laravel-china.org/courses/laravel-advance-training-5.5/801/picture-verification-code)
>github：[https://github.com/Gregwar/Captcha](https://github.com/Gregwar/Captcha)

6、微信登录  socialiteproviders/weixin

    socialiteproviders 为 Laravel Socialite 提供了更多的第三方登录方式，基本上你需要的，都能在这里找到

>安装：composer require socialiteproviders/weixin

7、jwt_auth

>安装：composer require tymon/jwt-auth:1.0.0-rc.2
>详情：[https://laravel-china.org/courses/laravel-advance-training-5.5/793/mobile-login-api](https://laravel-china.org/courses/laravel-advance-training-5.5/793/mobile-login-api)
