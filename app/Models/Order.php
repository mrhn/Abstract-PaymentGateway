<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 *
 * @property string $gateway
 * @property string|null $transactionId
 * @property string $status
 */
class Order extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_DECLINED = 'declined';
    const STATUS_CAPTURED = 'captured';
    const STATUS_REFUND = 'refund';

    protected $fillable = [
        'gateway',
        'transactionId',
        'status',
        'price',
    ];
}
