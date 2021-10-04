<?php

namespace Tests\Api\Payments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Domain\Payments\Models\Payment;
use Str;

class TelecomPaymentsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withHeaders([
            'Authorization' => "Bearer {$this->clientToken}",
        ]);
    }
    
    public function test_it_can_make_telecom_payment_test()
    {
        $response = $this->postJson('payments/telecom', [
            'ref_uuid'     => Str::uuid(),
            'account'      => 12931888,
            'money_amount' => 1.00
        ]);

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function test_it_can_telecom_check_balance_test()
    {
        $response = $this->json('GET', 'payments/telecom', [
            'account'      => 12931888,
            'money_amount' => 1.00
        ]);

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
