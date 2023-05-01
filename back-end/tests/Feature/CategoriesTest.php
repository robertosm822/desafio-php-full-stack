<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;
class CategoriesTest extends TestCase
{
    /** @test */
    public function listAllCategories()
    {
        $baseUrl = Config::get('app.url');
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->json('get', $baseUrl . '/api/categories')->assertStatus(200)
        ->assertJsonStructure([
            "current_page",
            "data"=> [
            [
                "id",
                "name",
                "created_at",
                "updated_at"
            ],

            ],
            "first_page_url",
            "from",
            "last_page",
            "last_page_url",
            "links"=> [
                [
                    "url",
                    "label",
                    "active"
                ],

            ],
            "next_page_url",
            "path",
            "per_page",
            "prev_page_url",
            "to",
            "total"
        ])->content();

    }

    /** @test */
    public function getCategoryById()
    {
        $id = mt_rand(1, 5);
        $baseUrl = Config::get('app.url');
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->json('get', $baseUrl . '/api/categories/'.$id)
        ->assertStatus(200)
        ->assertJsonStructure([
            "data"=>  [
                "id",
                "name",
                "created_at",
                "updated_at"
            ]
        ]);
    }
}
