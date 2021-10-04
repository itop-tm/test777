<?php

namespace Tests\Api\Payments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Domain\Payments\Models\Payment;
use Str;

class GTSPaymentsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withHeaders([
            'Authorization' => "Bearer {$this->clientToken}",
        ]);
    }
    
    public function test_it_can_make_gts_payment_test()
    {
        $response = $this->postJson('payments/gts', [
            'ref_uuid'          => Str::uuid(),
            'type'              => 'inet',
            'agreement_number'  => '015083',
            'money_amount'      => 100,
            'payment_type'      => 'card'
        ]);

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function test_it_can_make_gts_check_balance_test()
    {
        $response = $this->json('GET', 'payments/gts', [
            'type'          => 'inet',
            'phone_number'  => 461698,
        ]);

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
