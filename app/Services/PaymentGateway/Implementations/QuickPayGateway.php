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

    public function setApiToken(string $token): self
    {
        $this->apiToken = $token;

        return $this;
    }
}
