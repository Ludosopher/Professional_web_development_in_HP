<?php

namespace App;

use App\Rules\Ember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    protected $fillable = ['title', 'slug'];

    public function news() {
        return $this->hasMany(News::class, 'category_id');
    }

    public static function rules()
    {
        return [
            'title' => ['required', 'min:3', 'max:100'],
            'slug' => 'required|min:3'
        ];
    }

    public static function attrNames() {
        return [
            'title' => '"Заголовок категории"',
            'slug' => '"Slug"'
        ];
    }


}
