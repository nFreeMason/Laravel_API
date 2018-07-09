<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Auth;
use Elasticsearch\ClientBuilder;

class Test extends Controller
{

    public function __construct()
    {

    }

    //
    public function index()
    {
        dd(User::search('In magnam consequuntur blanditiis amet minima dolores')->paginate());
        $client = ClientBuilder::create()->setHosts(["localhost:9200"])->build();
        $response = '';
        try{
            $params = [
                'index' => 'my_index',
                'master_timeout' => 'my_type',
                'human' => 'my_id',
                'body' => ['testField' => 'abc']
            ];
            $response = $client->indices()->create($params);
        }catch(\Exception $e){
            dd($e);
        }
        dd($response);
        $redis_key = 'ip';
        Redis::zAdd($redis_key,20,'#bj');
        Redis::zAdd($redis_key,30,'bj');
        dd(Redis::zRange($redis_key,0,-1));
        dd(\App\Models\Test::where('id','>','0')->update(['created_at'=>now()->toDateTimeString()]));
        dd(
            \App\Models\Test::where('username','tests')
                ->orWhere(['created_at'=>'2018-07-05 08:52:52','created_sat'=>'2018-07-04 08:52:52'])
                ->get()

        );
        dd(\App\Models\Test::whereDay('created_at','4')->get());
        dd(\App\Models\Test::whereUsername('tests')->get(),\App\Models\Test::firstOrCreate(['username'=>'tests']));
        dd(Agent::platform(),Agent::device());
        dd(request()->server('HTTP_UNIEKEID'));
    }
}
