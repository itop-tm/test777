<?php

namespace Tests\Domain\Services;

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
    
    public function test_test()
    {
        $payment = Payment::first();

        $service = $payment->getPaymentServiceFactory();

        $response = $service->updateBalance();

        info($response->getBodyAsArray());

        $response->dump();

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
