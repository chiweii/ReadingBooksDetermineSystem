<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
        set_time_limit(0);
    	$input = $request->all();
        $replace_arr = array(
            "\r\n" => '',
            " " => '',
            "\t" => '',
            "\t" => '',
            "</p>" => '',
            "<p>" => '',
            "&rdquo;" => '',
            "&ldquo;" => '',
            "&hellip;" => '',
            "<br/>" => '',
            "&nbsp;" => '',
            "<strong>" => '',
            "</strong>" => '',
            "<br" => '',
            "/>" => '',
        );
        $analysis_writing = strtr(trim($input['analysis_writing']),$replace_arr);

        // 將文本寫入test.tsv
        $file=fopen('/var/www/html/analysis/project/bert-master/input/textual/test.tsv','w');
        $wrtietotsv_content = "0\t".$analysis_writing;
        fwrite($file, $wrtietotsv_content);
        fclose($file);

        // dd(file_get_contents('/var/www/html/analysis/project/bert-master/input/textual/test.tsv'));
        // $process = new Process(['python', '/var/www/html/analysis/project/BertTraining.py']);
        $process = new Process(['python', '/var/www/html/analysis/project/TextualAnalysis.py']);
        // $process = new Process(['python', '/var/www/html/analysis/project/TextualAnalysis_test.py']);
        $process->setTimeout(7200);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            dd($exception->getMessage());
        }

        $python_result = $process->getOutput();
        // dd($python_result);
        $result = json_decode(str_replace("\n", '',$python_result), true);

        $replace_arr = array(
            "[" => '',
            "]" => '',
            "  " => ',',
            " " => ',',
        );
        
        $recommand = strtr($result['recommand'],$replace_arr); //推薦年段 0:低年段,1:中年段,2:高年段
        $accuracy = explode(",",strtr($result['accuracy'],$replace_arr)); //推薦準確率 0:低年段準確率,1:中年段準確率,2:高年段準確率
        
        // dd($python_result, $result['recommand'],$recommand,$accuracy);
        foreach ($accuracy as $key => $value) {
            $accuracy[$key] = number_format($value, 15)*100;
        }
        // dd($accuracy, $recommand);
        switch ($recommand) {
            case 0:
                $recommand_block = '低年段';
                break;
            case 1:
                $recommand_block = '中年段';
                break;
            case 2:
                $recommand_block = '高年段';
                break;    
            default:
                break;
        }
        $binding = [
            'title' => '文本分析結果',
            'recommand_block' => $recommand_block,
            'accuracy' => $accuracy,
        ];

        return view('common.textanalysisresult',$binding);
        // dd($python_result, str_replace("\n", '',$python_result), $result, $accuracy, $recommand);
    }

    public function textAnalysisResult(Request $request){
    	$binding = [
    		'title' => '文本分析結果',
    	];

    	return view('common.textanalysisresult',$binding);
    }
}
