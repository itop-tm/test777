<?php

namespace Domain\Payments\Actions\GTS;

use Domain\Clients\Models\Client;
use Services\ServicesEnum as Service;
use Services\ServicesTypeEnum as Type;
use Services\Money\Money;

class CreateGTSPaymentAction
{
    public function execute(Client $client, array $args)
    {
        $payment = $client->payment()->create([
            'action'   => 'App\\Jobs\\GTS\\UpdateBalanceJob',
            'service'  => Service::GTS,
            'type'     => Type::get(Service::GTS, $args['type']),
            'ref_uuid' => $args['ref_uuid'],
            'amount'   => $args['money_amount']
        ]);

        $payment->setMeta([
            'request' => [
            //   'type'         => $args['type'],
              'agrm_num'     => $this->buildAgreementNumber($args['type'], $args['agreement_number']),
              'receipt_num'  => $payment->uuid,
              'receipt_date' => now()->format('Ymdhms'),
              'amount'       => Money::format($args['money_amount']),
            ]
        ]);

        $payment->dispatchPayableProccess();

        return $payment;
    }


    public function buildAgreementNumber($type, $number)
    {
        return $type == 'phone' ? "{$number}-12" : "{$type}-{$number}";
    }
}
