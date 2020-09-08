<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Datasheet\ReadingCertificate;

class BooksSearchController extends Controller
{
    public function BooksSearchPage(){

    	$booksList = ReadingCertificate::where('attest','可認證')->whereNotNull('url')->orderBy('block', 'ASC')->paginate(20);

    	$binding = [
    		'title' => '書籍年段分類查詢',
    		'booksList' => $booksList,
    	];

    	return view('common.bookssearch',$binding);
    }

    public function BooksQueryProcess(Request $request){
    	$input = $request->all();

    	if($request->ajax()){
		    $output = '';
		    $query = $input['query'];
		    if($query != ''){
		       	$booksList = ReadingCertificate::where('attest','可認證')->whereNotNull('url')->where(function ($q) use ($query) {
				    $q->where('book_name', 'like', '%'.$query.'%');
				    $q->orWhere('author', 'like', '%'.$query.'%');
					$q->orWhere('publisher', 'like', '%'.$query.'%');
					$q->orWhere('block', 'like', '%'.$query.'%');
				})->orderBy('block', 'ASC')->paginate(20);
      		}else{
      			$booksList = ReadingCertificate::where('attest','可認證')->whereNotNull('url')->orderBy('block', 'ASC')->paginate(20);
      		}

      		$datas = $booksList->toArray();

      		return view('common.bookslistpaginate', compact('booksList'))->render();
      	}
    }
}
