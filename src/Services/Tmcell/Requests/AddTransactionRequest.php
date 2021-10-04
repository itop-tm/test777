<?php

namespace Services\Tmcell\Requests;

use GuzzleHttp\Client;

class AddTransactionRequest
{
    public function execute(
        array $args,
        array $params,
        Client $client
    ) {
        // msg = <local-id>:<service>:<amount>:<destination>:<txn-ts>:<ts>:<username>
        $hmac = hash_hmac('sha1', implode(':', $args), base64_decode($params['sign_token'], true), true);

        $args = array_merge($args, ['hmac' => base64_encode($hmac)]);

        return $client->request('POST', "{$params['username']}/{$params['server']}/txn/add", $args);
    }
}
