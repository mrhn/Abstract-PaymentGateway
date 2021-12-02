<?php


namespace App\Services\PaymentGateway;


use App\Exceptions\MissingTransactionIdException;
use App\Exceptions\PaymentGatewayException;
use App\Models\Order;
use App\Services\PaymentGateway\Implementations\PaymentGatewayImplementation;

class PaymentGatewayService
{
    private PaymentGatewayImplementation $gateway;

    public function __construct(PaymentGatewayImplementation $gateway)
    {
        $this->gateway = $gateway;
    }

    public function reserve(Order $order): void
    {
        try {
            $transactionId = $this->gateway->reserve($order);
        } catch (PaymentGatewayException $exception) {
            $this->markOrderFailed($order);
            return ;
        }

        $order->transactionId = $transactionId;
        $order->status = Order::STATUS_RESERVED;
        $order->save();
    }

    public function capture(Order $order): void
    {
        $this->checkTransactionId($order);

        try {
            $this->gateway->capture($order);
        } catch (PaymentGatewayException $exception) {
            $this->markOrderFailed($order);
            return ;
        }

        $order->status = Order::STATUS_CAPTURED;
        $order->save();
    }

    public function refund(Order $order): void
    {
        $this->checkTransactionId($order);

        try {
            $this->gateway->capture($order);
        } catch (PaymentGatewayException $exception) {
            $this->markOrderFailed($order);
            return ;
        }

        $order->status = Order::STATUS_REFUNDED;
        $order->save();
    }

    public function status(Order $order): void
    {
        $this->checkTransactionId($order);

        try {
            $status = $this->gateway->status($order);
        } catch (PaymentGatewayException $exception) {
            // fetch another time
            return ;
        }

        $order->status = $status;
        $order->save();
    }

    private function markOrderFailed(Order $order): void
    {
        $order->status = Order::STATUS_ERROR;
        $order->save();
    }

    private function checkTransactionId(Order $order): void
    {
        if (! $order->transactionId) {
            throw new MissingTransactionIdException();
        }
    }


}
