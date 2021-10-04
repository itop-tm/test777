<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $clientToken;

    protected function setUp(): void
    {
        parent::setUp();

        $appUrl = env('app_url');
        \URL::forceRootUrl("{$appUrl}/api/v1/");

        $client = \Domain\Clients\Models\Client::first();
        
        $this->clientToken = $client ? $client->token : null;
    }
}
