<?php

namespace Domain\Payments\Actions\Telecom;

use Domain\Payments\Models\Payment;
use Domain\Payments\Enums\PaymentState as State;

class PayTelecomAction
{
    public function execute(Payment $payment)
    {
        try {
            $service = $payment->getPaymentServiceFactory();

            $response = $service->pay();

            $payment->setState(State::SUCCESS);
            $payment->captureTransaction($response->getRawResponse(), getClassName($this));

            return $payment;
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $payment->setState(State::FAILED);
            $payment->captureTransactionError($e->getResponse()->getBody(), getClassName($this), $e->getMessage());
            return $payment;
        }
    }
}
