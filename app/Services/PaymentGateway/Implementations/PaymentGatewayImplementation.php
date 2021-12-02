<?php

namespace App\Services\PaymentGateway\Implementations;

use App\Exceptions\PaymentGatewayException;
use App\Models\Order;

interface PaymentGatewayImplementation
{
    /**
     * @param Order $order
     * @return string transactionId
     * @throws PaymentGatewayException
     */
    public function reserve(Order $order): string;

    /**
     * @param Order $order
     */
    public function capture(Order $order): void;

    /**
     * @param Order $order
     */
    public function refund(Order $order): void;

    /**
     * @param Order $order
     * @return string
     */
    public function status(Order $order): string;
}
