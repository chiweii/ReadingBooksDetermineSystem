<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
class IntroduceController extends Controller
{
    public function IntroPage(){
    	$binding = [
    		'title' => '兒童文本自動分級系統',
    	];

    	return view('Intro.IntroducePage', $binding);
    }
    public function ErrorPageRedirect(){
    	return Redirect::to('/');
    }
}
