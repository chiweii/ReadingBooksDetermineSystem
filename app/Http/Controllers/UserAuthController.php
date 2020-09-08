<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use App\Datasheet\Users;
use Alert;
class UserAuthController extends Controller
{
    public function LoginPage(){
    	$binding = [
    		'title' => '兒童文本判別及分類系統 - 登入頁面',
    	];

    	return view('auth.login',$binding);
    }

    public function LoginProcess(Request $request){
    	$input = $request->all();

        $rules = [
            'mem_email' => 'required|email|max:150',
            'mem_password' => 'required|min:8',
        ];

        //檢查登入的資料
        $login_valid = Validator::make($input, $rules);

        if($login_valid->fails()){
            return redirect('/login')->withErrors($login_valid)->withInput();
        }

        $user = Users::where('user_email',$input['mem_email'])->where([['user_pass', md5($input['mem_password'])]])->first();
    	if(isset($user) && gettype($user) == 'object'){
    		// 登入成功
            if($user->user_valid == 1){
                Auth::login($user);
                $user->update(['recent_visit_ip' => $request->ip(), 'updated_at' => date("Y-m-d H:i:s")]);
                $user = Auth::user();

                session()->put('user',$user);
                return redirect()->intended('/dashboard');
            }else{
                Alert::error('此帳號已停用，請聯繫管理者。', '登入錯誤')->autoclose(2000);
                return Redirect::to('/login');
            }
        }else{
            Alert::error('帳號或密碼有誤', '登入錯誤')->autoclose(2000);
            return Redirect::to('/login');
        }
    }

    public function LogoutProcess(){
        if (Auth::check()) {
            Auth::logout();
            Alert::success('祝您有美好的一天', '登出成功')->autoclose(2000);
            return Redirect::to('/');
        }else{
            return redirect('/');
        }
    }
}
