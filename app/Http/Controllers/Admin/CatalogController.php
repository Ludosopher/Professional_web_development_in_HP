<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Categories::query()->paginate(5);
        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create(Request $request)
    {
        $categories = new Categories();
        return view ('admin.categories.create')->with('categories', $categories);
    }

    public function update(Request $request, Categories $categories)
    {
        $this->validate($request, Categories::rules(), [], Categories::attrNames());

        $result = $categories->fill($request->all())->save();

        if ($result) {
            return redirect()->route ('admin.catalog.create')->with('success', 'Категория добавлена успешно!');
        } else {
            return redirect()->route ('admin.catalog.create')->with('error', 'Ошибка добавления категории!');
        }
    }

    public function destroy(Categories $categories)
    {
        News::query()->where('category_id', $categories->getKey())->delete();
        $categories->delete();
        return redirect()->route ('admin.catalog.index')->with('success', 'Удалены категория и все её новости!');
    }

    public function edit(Categories $category)
    {
        // dd($category->getKey());
        return view('admin.categories.create')->with('categories', $category);
    }

    public function store(Request $request)
    {
        $categories = new Categories();
        $this->validate($request, Categories::rules(), [], Categories::attrNames());

        $result = $categories->fill($request->all())->save();

        if ($result) {
            return redirect()->route ('admin.catalog.create')->with('success', 'Категория добавлена успешно!');
        } else {
            return redirect()->route ('admin.catalog.create')->with('error', 'Ошибка добавления категории!');
        }
    }
}
