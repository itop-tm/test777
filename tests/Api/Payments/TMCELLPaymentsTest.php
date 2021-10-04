<?php

namespace Tests\Api\Payments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Domain\Payments\Models\Payment;
use Str;

class TMCELLPaymentsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withHeaders([
            'Authorization' => "Bearer {$this->clientToken}",
        ]);
    }
    
    public function test_it_can_make_tmcell_payment_test()
    {
        $response = $this->postJson('payments/tmcell', [
            'ref_uuid'     => Str::uuid(),
            'phone_number' => 99362615986,
            'money_amount' => 100
        ]);

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function test_it_can_check_balance_test()
    {
        $response = $this->json('GET', 'payments/tmcell/balance');

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function test_it_can_get_tmcell_services_id_test()
    {
        $response = $this->json('GET', 'payments/tmcell/services');

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    
}
