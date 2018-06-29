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

