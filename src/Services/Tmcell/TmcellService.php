<?php

namespace Services\Tmcell;

use GuzzleHttp\Client as GuzzleClient;
use Services\Tmcell\Requests\CheckRequest;
use Services\Tmcell\Requests\AddTransactionRequest;
use Services\Tmcell\Requests\InfoTransactionRequest;
use Services\Tmcell\Requests\RetryTransactionRequest;
use Services\Tmcell\Requests\GetServicesRequest;
use Services\Tmcell\Requests\GetBalanceRequest;
use Services\ServiceInterface;

class TmcellService implements ServiceInterface
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

    public function addTransaction()
    {
        $this->response = new Response(
            app(AddTransactionRequest::class)->execute(
                $this->args,
                $this->params,
                $this->client
            )
        );

        return $this->response;
    }

    public function infoTransaction()
    {
        $this->response = new Response(
            app(InfoTransactionRequest::class)->execute(
                $this->args,
                $this->params,
                $this->client
            )
        );

        return $this->response;
    }

    public function retryTransaction()
    {
        $this->response = new Response(
            app(RetryTransactionRequest::class)->execute(
                $this->args,
                $this->params,
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
                $this->params,
                $this->client
            )
        );

        return $this->response;
    }


    public function getServices()
    {
        $this->response = new Response(
            app(GetServicesRequest::class)->execute(
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
