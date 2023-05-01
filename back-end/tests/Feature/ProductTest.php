<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /** @test @return void */
    public function listAllProducts()
    {
        $baseUrl = Config::get('app.url');
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->json('get', $baseUrl . '/api/products')->assertStatus(200)
        ->assertJsonStructure([
            "data"=> [
                "current_page",
                "data"=> [
                [
                    "id",
                    "name",
                    "category_id",
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
            ]
        ])->content();

    }

    /** @test @return void */
    public function getProductById()
    {
        $id = mt_rand(1, 5);
        $baseUrl = Config::get('app.url');
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->json('get', $baseUrl . '/api/products/'.$id)
        ->assertStatus(200)
        ->assertJsonStructure([
            "data"=>  [
                "id",
                "name",
                "created_at",
                "updated_at",
                "categories"=> [
                    "id",
                    "name",
                    "created_at",
                    "updated_at"
                ]
            ]
        ]);
    }
}
