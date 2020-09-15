<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('jedi', function ($attribute, $value, $parametrs, $validator) {
            //  dd($attribute, $value, $parametrs, $validator);
            return false;
        });

        $this->app->singleton(\Faker\Generator::class, function () {
            return $faker = \Faker\Factory::create('ru_RU');
        });
    }
}
