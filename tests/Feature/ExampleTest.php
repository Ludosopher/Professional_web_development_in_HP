<?php

namespace Tests\Feature;

use App\Catalog;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText('Добро пожаловать!');

        $newsAll = $this->get('/news/all');
        $newsAll->assertSee('News 8');

        $catalog = $this->get('/news/catalog');
        $catalog->assertOk();

        $newsOne = $this->get('/admin/create');
        $newsOne->assertSuccessful();
         



    }
}
