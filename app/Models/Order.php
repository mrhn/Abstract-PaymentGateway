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
 * @property string|null $transactionId
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

    public function getPaymentGatewayAttribute()
    {
        return resolve($this->gateway);
    }
}
