<?php

namespace Domain\Payments\Actions\Telecom;

use Domain\Clients\Models\Client;
use Services\ServicesEnum as Service;
use Services\ServicesTypeEnum as Type;
use Services\Money\Money;

class CreateTelecomPaymentAction
{
    public function execute(Client $client, array $args)
    {
        $payment = $client->payment()->create([
            'action'   => 'App\\Jobs\\Telecom\\PayTelecomJob',
            'service'  => Service::TELECOM,
            'type'     => Type::get(Service::TELECOM, 'INET'),
            'ref_uuid' => $args['ref_uuid'],
            'amount'   => $args['money_amount'],
        ]);

        $payment->setMeta([
            'request' => [
                'command'  => 'pay',
                'txn_id'   => $payment->id,
                'txn_date' => now()->format('Ymdhms'),
                'account'  => $args['account'],
                'sum'      => Money::format($args['money_amount']),
                'curr'     => 'TMT',
            ],
        ]);

        $payment->dispatchPayableProccess();

        return $payment;
    }
}
