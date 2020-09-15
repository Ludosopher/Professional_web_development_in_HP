<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


// phpinfo();

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(5);
        return view('admin.news.index')->with('news', $news);
    }

    public function create()
    {
        $news = new News();

        return view ('admin.news.create', [
            'news' => $news,
            'categories' => Categories::all()
        ]);
    }

    public function saveImage(Request $request) {
        $name = null;
        if ($request->file('image')) {
            $path = \Storage::putFile('public/images', $request->file('image'));
            $name = \Storage::url($path);
        }
        return $name;
    }

    public function update(Request $request, News $news)
    {
        $data = $request->all(); //получаем массив данных из формы в т.ч. и о файле
        $data['image'] = $this->saveImage($request); //корректируем имя файла

        $this->validate($request, News::rules(), [], News::attrNames());

        $result = $news->fill($data)->save();
        if ($result) {
            return redirect()->route ('news.newsOne', $news->id)->with('success', 'Новость изменена успешно!');
        } else {
            return redirect()->route ('admin.news.create')->with('error', 'Ошибка изменения новости!');
        }
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route ('admin.news.index')->with('success', 'Новость удалена!');
    }

    public function edit(News $news)
    {
        // dd($news);
        return view('admin.news.create', [
            'news' => $news,
            'categories' => Categories::all()
        ]);
    }

    public function store(Request $request)
    {
        $news = new News();

        $data = $request->all(); //получаем массив данных из формы в т.ч. и о файле
        $data['image'] = $this->saveImage($request); //корректируем имя файла

        $this->validate($request, News::rules(), [], News::attrNames());

        $result = $news->fill($data)->save();

        if ($result) {
            return redirect()->route ('news.newsOne', $news->id)->with('success', 'Новость добавлена успешно!');
        } else {
            return redirect()->route ('admin.news.create')->with('error', 'Ошибка добавления новости!');
        }
    }
}
