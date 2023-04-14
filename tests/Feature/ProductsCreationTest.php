<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsCreationTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A Test to ensure that prodcuts can be entered
     */
    public function test_that_products_can_be_entered(): void
    {
        $this->withoutExceptionHandling();

        $token = csrf_token();

        $this->post('/products',[
            '_token'      => $token,
            'name'        => 'HP ENVY',
            'description' => 'This is the fastest Envy ever',
            'quantity'    => 15,
            'price'       => '950000',
        ]);

        $this->assertDatabaseCount('products', 1);
    }

    public function test_that_all_products_fields_are_required(): void
    {
        // $this->withoutExceptionHandling();

        $token = csrf_token();

        $this->post('/products',[
            '_token'      => '',
            'name'        => '',
            'description' => '',
            'quantity'    => '',
            'price'       => '',
        ]);

        $this->assertDatabaseCount('products', 0);
    }
}
