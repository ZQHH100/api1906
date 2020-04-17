<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class LoginController extends Controller
{
    //登录接口
    public function login(Request $request)
    {
        //echo '<pre>';print_r($request->input());echo '</pre>';
        //echo '<pre>';print_r($_POST);echo '</pre>';

        //将用户名 密码 传递给passport
        $user = $request->input('user_name');
        $pass = $request->input('pass');
       // echo 'user: '.$user;echo '</br>';
       // echo 'pass: '. $pass;echo '</br>';

        // 发送HTTP请求
        $client = new Client();

        $uri = 'http://' .env('PASSPORT_HOST') . '/api/login'; // http[s]://passport.1906.com/api/login
        $response = $client->request('POST',$uri,[
            'form_params'   => [
                'user_name'  => $user,
                'pass'  => $pass
            ]
        ]);
        //  echo 'passport 的响应数据: ';echo '</br>';
          echo $response->getBody();

     }
    //注册接口
    public function reg(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $mibble = $request->input('mibble');
        $pass = $request->input('pass');
        $passs = $request->input('passs');
       // 发送HTTP请求
       $client = new Client();

       $uri = 'http://' .env('PASSPORT_HOST') . '/api/reg';
       $response = $client->request('POST',$uri,[
        'form_params'   => [
            'name'  => $name,
            'email' => $email,
            'mibble' => $mibble,
            'pass'  => $pass,
            'passs'  => $passs
        ]
    ]);
    echo 'passport 的响应数据: ';echo '</br>';
    echo $response->getBody();
    }
}
