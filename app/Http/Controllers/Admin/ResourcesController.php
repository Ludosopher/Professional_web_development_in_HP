<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Resources;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourcesController extends Controller
{
    public function index()
    {
        $resources = Resources::query()->paginate(10);
        return view('admin.resources.index')->with('resources', $resources);
    }

    public function create()
    {
        $resource = new Resources();
        return view ('admin.resources.create', [
            'resource' => $resource,
        ]);
    }

    public function store(Request $request)
    {
        ///dd($request->all());
        $resources = new Resources();
        $this->validate($request, Resources::rules(), [], Resources::attrNames());

        $result = $resources->fill($request->all())->save();

        if ($result) {
            return redirect()->route ('admin.resources.create')->with('success', 'Ресурс добавлен успешно!');
        } else {
            return redirect()->route ('admin.resources.create')->with('error', 'Ошибка добавления ресурса!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Resources $resource)
    {
        return view('admin.resources.create', [
            'resource' => $resource,
        ]);
    }

    public function update(Request $request, Resources $resource)
    {
        $this->validate($request, Resources::rules(), [], Resources::attrNames());

        $result = $resource->fill($request->all())->save();

        if ($result) {
            return redirect()->route ('admin.resources.create')->with('success', 'Ресурс изменён успешно!');
        } else {
            return redirect()->route ('admin.resources.create')->with('error', 'Ошибка изменения ресурса!');
        }
    }

    public function destroy(Resources $resource)
    {
        $resource->delete();
        return redirect()->route ('admin.resources.index')->with('success', 'Источник успешно удалён');
    }
}
