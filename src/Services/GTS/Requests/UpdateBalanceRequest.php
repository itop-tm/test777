<?php

namespace Services\GTS\Requests;

use GuzzleHttp\Client;

class UpdateBalanceRequest
{
    public function execute(
        array $args,
        Client $client
    ) {
        $args = [
            'updatebalance/217.174.227.30',
            $args['agrm_num'],
            $args['receipt_num'],
            $args['receipt_date'],
            $args['amount'],
        ];

        return $client->request('GET', implode('/', $args));
    }
}
