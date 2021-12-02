<?php


namespace App\Services\PaymentGateway\Implementations;


use App\Exceptions\PaymentGatewayException;
use App\Models\Order;

class MobilePayGateway implements PaymentGatewayImplementation
{
    /** @var string fiction key for connecting to api */
    private string $apiKey;

    /** @var string fiction key for connecting to api */
    private string $apiSecret;

    /**
     * @inheritDoc
     */
    public function reserve(Order $order): string
    {
        // TODO: Implement reserve() method.
    }

    /**
     * @inheritDoc
     */
    public function capture(Order $order): void
    {
        // TODO: Implement capture() method.
    }

    /**
     * @inheritDoc
     */
    public function refund(Order $order): void
    {
        // TODO: Implement refund() method.
    }

    /**
     * @inheritDoc
     */
    public function status(Order $order): string
    {
        // TODO: Implement status() method.
    }

    public function setApiKey(string $key): self
    {
        $this->apiKey = $key;

        return $this;
    }

    public function setApiSecret(string $secret): self
    {
        $this->apiSecret = $secret;

        return $this;
    }
}
