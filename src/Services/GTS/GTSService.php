<?php

namespace Services\GTS;

use GuzzleHttp\Client as GuzzleClient;
use Services\GTS\Requests\UpdateBalanceRequest;
use Services\GTS\Requests\GetBalanceRequest;
use Services\ServiceInterface;

class GTSService implements ServiceInterface
{
    protected $url;
    protected $params;
    protected $args;
    protected $response;
    protected $client;
    protected $environment;

    public function __construct(array $params, string $environment)
    {
        $this->params = $params;
        $this->url = $params['api_url'];
        $this->environment = $environment;
        $this->client = (new Client($environment, $this->url))->getClient();
    }

    public function setArgs(array $args)
    {
        $this->args = $args;
    }

    public function updateBalance()
    {
        $this->response = new Response(
            app(UpdateBalanceRequest::class)->execute(
                $this->args,
                $this->client
            )
        );

        return $this->response;
    }

    public function getBalance()
    {
        $this->response = new Response(
            app(GetBalanceRequest::class)->execute(
                $this->args,
                $this->client
            )
        );

        return $this->response;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
