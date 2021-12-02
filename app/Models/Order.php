<?php

namespace App\Models;

use App\Services\PaymentGateway\PaymentGatewayService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 *
 * @property string $gateway
 * @property string|null $transaction_id
 * @property string $status
 * @property PaymentGatewayService $payment_gateway
 */
class Order extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_RESERVED = 'reserved';
    const STATUS_CAPTURED = 'captured';
    const STATUS_REFUNDED = 'refunded';
    const STATUS_DECLINED = 'declined';
    const STATUS_ERROR = 'error';

    const GATEWAY_MOBILEPAY = 'mobilepay';
    const GATEWAY_QUICKPAY = 'quickpay';

    protected $fillable = [
        'gateway',
        'transactionId',
        'status',
        'price',
    ];

    /**
     * Attributes
     */

    public function getPaymentGatewayAttribute(): PaymentGatewayService
    {
        return resolve($this->gateway);
    }

    /**
     * Scopes
     */

    public function scopePending($query)
    {
        $query->where('status', self::STATUS_PENDING);
    }

    /**
     * PaymentGateway Helpers
     */

    public function reserve(): void
    {
        $this->payment_gateway->reserve($this);
    }

    public function capture(): void
    {
        $this->payment_gateway->capture($this);
    }

    public function refund(): void
    {
        $this->payment_gateway->refund($this);
    }

    public function status(): void
    {
        $this->payment_gateway->status($this);
    }
}
