<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PurchaseRequestTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_purchase_request()
    {
        $attributes = factory('App\PurchaseRequest')->raw();
        $this->post(route('public.purchase.request'), $attributes);
        $this->assertDatabaseHas('purchase_requests', $attributes);
    }

    public function test_purchase_request_requires_name()
    {
        $attributes = factory('App\PurchaseRequest')->raw(['name' => null]);
        $this->post(route('public.purchase.request'), $attributes)
            ->assertSessionHasErrors('name');
        $this->assertDatabaseMissing('purchase_requests', $attributes);
    }

    public function test_purchase_request_requires_email()
    {
        $attributes = factory('App\PurchaseRequest')->raw(['email' => null]);
        $this->post(route('public.purchase.request'), $attributes)
            ->assertSessionHasErrors('email');
        $this->assertDatabaseMissing('purchase_requests', $attributes);
    }

    public function test_purchase_request_requires_valid_email()
    {
        $attributes = factory('App\PurchaseRequest')->raw(['email' => 'jim@lameemail@ymail-bacon.co']);
        $this->post(route('public.purchase.request'), $attributes)
            ->assertSessionHasErrors('email');
        $this->assertDatabaseMissing('purchase_requests', $attributes);
    }

    public function test_purchase_request_requires_art_id()
    {
        $attributes = factory('App\PurchaseRequest')->raw(['art_id' => null]);
        $this->post(route('public.purchase.request'), $attributes)
            ->assertSessionHasErrors('art_id');
        $this->assertDatabaseMissing('purchase_requests', $attributes);
    }

    public function test_purchase_request_accepted()
    {
        $user = factory('App\User')->create();
        $art = factory('App\Art')->create(['user_id' => $user->id]);
        $purchaseRequest = factory('App\PurchaseRequest')->create(['art_id' => $art->id]);
        $date = date('Y-m-d H:i:s');

        $this->actingAs($user);
        $this->post(route('dashboard.purchase.update', $purchaseRequest->id), ['accepted_at' => $date]);
        $this->assertDatabaseHas('purchase_requests', ['id' => $purchaseRequest->id, 'accepted_at' => $date]);
    }
}
