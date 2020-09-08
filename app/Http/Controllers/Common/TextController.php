<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TextController extends Controller
{
    public function textUploadPage(){
    	$binding = [
    		'title' => '上傳文本內容圖檔',
    	];

    	return view('common.textimageupload',$binding);
    }

    public function textImportingPage(){
    	$binding = [
    		'title' => '文本輸入頁面',
    	];

    	return view('common.textimporting',$binding);
    }

    public function textImportProcess(Request $request){
    	$input = $request->all();
    	dd($input);
    }

    public function textAnalysisResult(Request $request){
    	$binding = [
    		'title' => '文本分析結果',
    	];

    	return view('common.textanalysisresult',$binding);
    }
}
