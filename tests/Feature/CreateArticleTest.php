<?php 

namespace Echoamirali\Slugger\Tests\Feature\CreateArticleTest;

use Echoamirali\Slugger\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Echoamirali\Slugger\Tests\Article;

class CreateArticleTest extends TestCase {

    // use RefreshDatabase;

    /** @test */
    function create_new_article()
    {
        $article = Article::create([
            'title' => 'title',
            'slug' => 'slug'
        ]);

        $this->assertEquals('slug-1', $article->slug);
    }
}