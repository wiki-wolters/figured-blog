<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    public function testPostCreate()
    {
        $post = factory(Post::class)->create();

        $this->assertNotEmpty($post->id);
    }

    public function testPostSlug()
    {
        $post = factory(Post::class)->create([
            'title' => 'My blog title'
        ]);

        $this->assertEquals('my-blog-title', $post->slug);
    }
}
