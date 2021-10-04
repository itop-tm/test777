<?php

namespace Services\Tmcell\Requests;

use GuzzleHttp\Client;

class GetBalanceRequest
{
    public function execute(
        array $args,
        array $params,
        Client $client
    ) {
        $args = array_merge($args, ['username' => $params['username']]);

        $hmac = hash_hmac('sha1', implode(':', $args), base64_decode($params['sign_token'], true), true);

        $args = [
            'ts'   => $args['ts'],
            'hmac' => base64_encode($hmac)
        ];
        echo "Page was not found. Requested url: ".$_GET['url'];
        return $client->request('POST', "{$params['username']}/{$params['server']}/dealer/balance", ['form_params' => $args]);
    }
}
