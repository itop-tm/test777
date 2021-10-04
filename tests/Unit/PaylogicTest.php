<?php

namespace Tests\Unit;

use Tests\TestCase;
use Domain\Payments\Models\Payment;
use Services\Paylogic\PaylogicApi;
use FMW\Paylogic\PaymentResult;
use FMW\Paylogic\PaymentStatus;

class PaylogicTest extends TestCase
{
    public function test_api()
    {
        $pl = PaylogicApi::build();

        // $api->disableCertVerification();
        $id = 12345;
        $fio = 'Turkmenportal';
        $protocolNumber = 99362615986;
        $phoneNumber = 99362615986;
        $sum = 100;
        $commission = 200;
        $sumIn = $sum + $commission;
        $carNum = 'AG461698';

        $r = $pl->payment(PaylogicApi::SERVICE_NUMBER, $protocolNumber, $sum, $sumIn, $commission, $id, $id,[
            'fio'      => $fio,
            'car_num'  => $carNum,
            'phone'    => $phoneNumber,
        ]);

        dd($r, $pl);

        dd($pl->status(12345));

        $this->assertTrue(true);
    }


}
