<?php

namespace Services\GTS;

class Response
{
    protected $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getBody()
    {
        return json_decode($this->response->getBody(), false, 512, JSON_BIGINT_AS_STRING);
    }

    public function getBalance()
    {
        return $this->getBody()->balance;
    }

    public function getAgreementNumber()
    {
        return $this->getBody()->number;
    }

    public function hasError()
    {
        return $this->getBody()->result !== 'action_success';
    }

    public function getError()
    {
        return $this->getBody()->result;
    }
}
