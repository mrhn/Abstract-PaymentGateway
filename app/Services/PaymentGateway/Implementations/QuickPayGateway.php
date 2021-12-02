<?php


namespace App\Services\PaymentGateway\Implementations;


use App\Exceptions\PaymentGatewayException;
use App\Models\Order;

class QuickPayGateway implements PaymentGatewayImplementation
{
    /** @var string fiction key for connecting to api */
    private string $apiToken;

    /**
     * @inheritDoc
     */
    public function reserve(Order $order): string
    {
        throw new \Exception('Not implemented quickpay reserve');
    }

    /**
     * @inheritDoc
     */
    public function capture(Order $order): void
    {
        throw new \Exception('Not implemented quickpay capture');
    }

    /**
     * @inheritDoc
     */
    public function refund(Order $order): void
    {
        throw new \Exception('Not implemented quickpay refund');
    }

    /**
     * @inheritDoc
     */
    public function status(Order $order): string
    {
        throw new \Exception('Not implemented quickpay status');
    }

    public function setApiToken(string $token): self
    {
        $this->apiToken = $token;

        return $this;
    }
}
