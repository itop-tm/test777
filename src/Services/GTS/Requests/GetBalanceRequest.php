<?php

namespace Services\GTS\Requests;

use GuzzleHttp\Client;

class GetBalanceRequest
{
    public function execute(
        array $args,
        Client $client
    ) {
        $urlParams = [
            'getbalance/217.174.227.30',
            $this->buildPhoneNumber($args['type'], $args['phone_number']),
        ];

        return $client->request('GET', implode('/', $urlParams));
    }

    public function buildPhoneNumber($type, $number)
    {
        return $type == 'phone' ? "{$number}-12" : "{$type}-{$number}";
    }
}
