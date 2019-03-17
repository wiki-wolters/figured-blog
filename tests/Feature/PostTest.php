<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Mockery\MockInterface;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    public function testPostCreate()
    {
        $user = $this->createUser();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $user->api_token,
        ])->post('/api/post/create', [
            'title' => 'My first blog post',
            'subtitle' => 'An amazing read',
            'image_url' => 'https://picsum.photos/1200/800?image=1056',
            'body' => 'Lorem ipsum dolor sit amet'
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => 1]);

        $post = Post::whereSlug('my-first-blog-post')->first();
        $this->assertEquals('An amazing read', $post->subtitle);
        $this->assertEquals('https://picsum.photos/1200/800?image=1056', $post->image_url);
        $this->assertEquals('Lorem ipsum dolor sit amet', $post->body);
    }

    public function testPostUpdate()
    {
        $post = Post::create([
            'title' => 'My first blog post',
            'subtitle' => 'An amazing read',
            'image_url' => 'https://picsum.photos/1200/800?image=1056',
            'body' => 'Lorem ipsum dolor sit amet'
        ]);

        $response = $this->put('/api/post/'.$post->id, [
            'subtitle' => 'An incredible read'
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => 1]);

        $this->assertDatabaseHas('posts', ['subtitle' => 'An incredible read'], 'mongodb');
    }

    protected function createUser()
    {
        return factory(User::class)->create();
    }
}
