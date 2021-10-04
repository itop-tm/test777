<?php

namespace Tests\Unit;

use Tests\TestCase;

use Domain\Payments\Models\Payment;
use Domain\Payments\Actions\PYGG\CreatePYGGPaymentAction;
use Domain\Payments\Actions\PYGG\MakePYGGPaylogicPaymentAction;
use Domain\Payments\Actions\PYGG\CheckPYGGPaylopgicPaymentStatusAction;

class PaymentActionsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }
}
