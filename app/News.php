<?php

namespace App;

use App\Rules\Ember;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'category_id', 'isPrivate', 'image'];

    public function category() {
        return $this->belongsTo(Categories::class, 'category_id')->first();
    }

    public static function rules()
    {
        $tableNameCategory = (new Categories())->getTable();
        return [
            'title' => ['required', 'min:3', 'max:100', new Ember()],
            'text' => 'required|min:3',
            'image' => 'mimes:jpeg,jpg,bmp,png|max:1000',
            'isPrivate' => 'sometimes|in:on',
            'category_id' => "required|exists:{$tableNameCategory},id"
        ];
    }

    public static function attrNames() {
        return [
            'title' => '"Заголовок новости"',
            'text' => '"Текст новости"',
            'category_id' => '"Категория новости"',
            'image' => '"Изображение"'
        ];
    }
}
