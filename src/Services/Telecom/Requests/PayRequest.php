<?php

namespace Services\Telecom\Requests;

use GuzzleHttp\Client;

class PayRequest
{
    public function execute(
        array $args,
        array $params,
        Client $client
    ) {
        // md5(command;account;txn_id;secret_key)
        $md5 = md5("{$args['command']};{$args['account']};{$args['txn_id']};{$params['secret_key']}");

        $args = array_merge($args, ['md5' => $md5]);

        return $client->request('GET', 'tmpochta_kod', ['query' => $args]);
    }
}
