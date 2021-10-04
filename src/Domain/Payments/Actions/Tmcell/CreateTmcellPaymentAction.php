<?php

namespace Domain\Payments\Actions\Tmcell;

use Domain\Clients\Models\Client;
use Services\ServicesEnum as Service;
use Services\ServicesTypeEnum as Type;

class CreateTmcellPaymentAction
{
    public function execute(Client $client, array $args)
    {
        $payment = $client->payment()->create([
            'action'   => 'App\\Jobs\\Tmcell\\AddTransactionJob',
            'service'  => Service::TMCELL,
            'type'     => Type::get(Service::TMCELL, 'PHONE'),
            'ref_uuid' => $args['ref_uuid'],
            'amount'   => $args['money_amount'],
        ]);

        $payment->setMeta([
            'request' => [
                'local-id'    => $payment->id,
                'service'     => 'tmcell',
                'amount'      => $args['money_amount'],
                'destination' => $args['phone_number'],
                'txn-ts'      => now()->timestamp,
                'ts'          => now()->timestamp,
                // 'hmac'        => hmac with access token
            ],
        ]);


        $payment->dispatchPayableProccess();

        return $payment;
    }
}
