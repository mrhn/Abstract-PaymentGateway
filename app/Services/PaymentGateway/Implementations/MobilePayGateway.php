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
        throw new \Exception('Not implemented mobilepay reserve');
    }

    /**
     * @inheritDoc
     */
    public function capture(Order $order): void
    {
        throw new \Exception('Not implemented mobilepay capture');
    }

    /**
     * @inheritDoc
     */
    public function refund(Order $order): void
    {
        throw new \Exception('Not implemented mobilepay refund');
    }

    /**
     * @inheritDoc
     */
    public function status(Order $order): string
    {
        throw new \Exception('Not implemented mobilepay status');
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
