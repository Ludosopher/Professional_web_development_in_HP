<?php


namespace App\Services;

use App\Categories;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class XMLParserService
{
    public function saveNews($link) {
        $xml = XmlParser::load($link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[guid,title,link,description,category,pubDate,enclosure::url,category]']
        ]);

        if ($data['title']) {
            $split = explode(" ", $data['title']);

            foreach ($data['news'] as $news) {

                    $category = Categories::query()->firstOrCreate([
                        'title' => $news['category'] ?? $split[count($split)-1],
                        'slug' => $news['category'] ? Str::slug($news['category']): Str::slug($split[count($split)-1])
                    ]);

                    News::query()->firstOrCreate([
                        'title' => $news['title'] ?? '',
                        'text' => $news['description'] ?? '',
                        'isPrivate' => false,
                        'image' => $news['enclosure::url'] ?? $data['image'],
                        'category_id' => $category->id,
                    ]);

            }
        }

    }
}
