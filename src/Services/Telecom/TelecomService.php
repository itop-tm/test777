<?php

namespace Services\Telecom;

use GuzzleHttp\Client as GuzzleClient;
use Services\Telecom\Requests\CheckRequest;
use Services\Telecom\Requests\PayRequest;
use Services\ServiceInterface;

class TelecomService implements ServiceInterface
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

    public function pay()
    {
        $this->response = new Response(
            app(PayRequest::class)->execute(
                $this->args,
                $this->params,
                $this->client
            )
        );

        return $this->response;
    }

    public function check()
    {
        $this->response = new Response(
            app(CheckRequest::class)->execute(
                $this->args,
                $this->params,
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
