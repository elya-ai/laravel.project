<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNews()
    {
    	$news = News::get();
    	return response()->json($news);
    }
    public function postNews(Request $fuck)
    {
    	$news = new News;
    	$news->hui = $fuck->hui;
    	$news->huinya = $fuck->huinya;
    	$news->ok = $fuck->ok;
    	$news->save();
    }
    public function putNews(Request $req)
    {
    	$news = News::where('ok', $req->ok)->first();
    	$news->ok = 'nct in the house';
    	$news->save();
    }
}
