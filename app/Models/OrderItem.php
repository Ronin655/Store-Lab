<?php

namespace App\Models;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\OrderItem
 *
 * @property-read Order $order
 * @property-read Product $product
 * @method static Builder|OrderItem newModelQuery()
 * @method static Builder|OrderItem newQuery()
 * @method static Builder|OrderItem query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $quantity
 * @property int $order_id
 * @property int $product_id
 * @method static Builder|OrderItem whereId($value)
 * @method static Builder|OrderItem whereOrderId($value)
 * @method static Builder|OrderItem whereProductId($value)
 * @method static Builder|OrderItem whereQuantity($value)
 * @property int $price
 * @method static Builder|OrderItem wherePrice($value)
 */
class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'quantity',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
