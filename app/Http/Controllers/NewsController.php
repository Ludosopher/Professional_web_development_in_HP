<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {

        $news = News::query()->paginate(10);
        return view('news.index')->with('news', $news);
    }

    public function show(News $news) {
        // $news = \DB::table('news')->find($id);
        return view('news.One')->with('news', $news);
    }
}
