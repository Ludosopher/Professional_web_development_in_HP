<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    // use RefreshDatabase;
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->type('title', '1')
                    ->press('Добавить')
                    ->assertSee('Количество символов в поле "Заголовок новости" должно быть не меньше 3.');

            $browser->visit('/admin/news/create')
                ->check('isPrivate')
                ->attribute('#newsCategory', 'select');

            $browser->visit('/admin/news/create')
                    ->select('#newsCategory');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->text('.form-group');
        });
    }
}
