<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\News;
use App\Catalog;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertIsArray(News::getNews());

        $this->assertDirectoryExists('resources/views/news');

        $this->assertArrayHasKey('slug', Catalog::getCatalog()[2]);

        $this->assertClassHasAttribute('catalog', 'App\Catalog');

        $this->assertClassHasStaticAttribute('news', 'App\News');

        $this->assertContains(true, News::getNews()[1]);

        $this->assertCount(8, News::getNews());

        $this->assertTrue(true);
    }
}
