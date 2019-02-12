<?php

namespace Tests\Feature;

use App\Models\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testsCategoriesAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = ['name' => 'Foo'];

        $this->json('POST', '/api/categories', $payload, $headers)
            ->assertStatus(201)
            ->assertJson(['id' => 1, 'name' => 'Foo']);
    }

    public function testsCategoriesAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $category = factory(Category::class)->create(['name' => 'First Category']);

        $payload = ['name' => 'Foo'];

        $response = $this->json('PUT', '/api/categories/' . $category->id, $payload, $headers)
            ->assertStatus(204);
    }

    public function testsArtilcesAreDeletedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $category = factory(Category::class)->create(['name' => 'First Category']);

        $this->json('DELETE', '/api/categories/' . $category->id, [], $headers)
            ->assertStatus(200);
    }

    public function testCategoriesAreListedCorrectly()
    {
        factory(Category::class)->create(['name' => 'First Category']);

        factory(Category::class)->create(['name' => 'Second Category']);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/categories', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                ['name' => 'First Category'],
                ['name' => 'Second Category']
            ])
            ->assertJsonStructure(['*' => ['id', 'name']]);
    }
}
