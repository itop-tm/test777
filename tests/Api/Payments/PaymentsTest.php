<?php

namespace Tests\Api\Payments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Domain\Payments\Models\Payment;
use Str;

class PaymentsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withHeaders([
            'Authorization' => "Bearer {$this->clientToken}",
        ]);
    }
    
    public function test_it_can_get_a_list_of_payments_test()
    {
        $response = $this->json('GET', 'client/payments');

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function test_it_can_fetch_a_payment_by_ref_uuid_test()
    {
        $response = $this->json('GET', 'client/payment', [
            'ref_uuid'  => '4be39f3c-00e0-4df6-b37f-896e7ae7c109',
        ]);

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
