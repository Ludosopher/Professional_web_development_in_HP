<?php

namespace App\Http\Controllers;
use App\Categories;
use App\News;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index() {
        $catalog = Categories::query()->paginate(12);
        return view('news.catalog')->with('catalog', $catalog);
    }

    public function show($name) {

        $news = Categories::query()->where('slug', $name)->first()->news;
        $categoryTitle = Categories::query()->where('slug', $name)->first()->title;

        return view('news.categoryOne')->with([
            'news' => $news,
            'title' => $categoryTitle
        ]);
    }

}
