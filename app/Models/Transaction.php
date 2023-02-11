<?php

namespace App\Models;

use App\Helpers\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'amount',
        'type',
        'category_id',
        'user_id',
        'payment_method'
    ];

    protected $casts = [
        'amount' => 'float'
    ];

    protected $appends = [
        'formatted_amount'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedAmountAttribute(): string
    {
        return Number::format($this->amount);
    }
}
