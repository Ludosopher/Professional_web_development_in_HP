<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $fillable = ['title', 'link'];

    public static function rules()
    {
        return [
            'title' => ['required', 'min:2', 'max:70'],
            'link' => ['required', 'min:9', 'max:100'],
        ];
    }

    public static function attrNames() {
        return [
            'title' => '"Название ресурса"',
            'link' => '"Ссылка"',
        ];
    }
}
