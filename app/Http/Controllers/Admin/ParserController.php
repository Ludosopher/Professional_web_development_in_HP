<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\News;
use App\Resources;
use App\Services\XMLParserService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;
use App\Jobs\NewsParsing;

class ParserController extends Controller
{
    public function index(XMLParserService $parserService) {
        // $start = date('c');

        $resources = Resources::query()->get();
        $rssLinks = array_column($resources->toArray(), 'link');

        foreach ($rssLinks as $rssLink) {
            NewsParsing::dispatch($rssLink);
            // $parserService->saveNews($rssLink);
        }

        // return $start . ' --- ' . date('c');
        return redirect()->route('admin.index')->with('success', 'Парсинг новостей выполнен успешно!');
    }
}
