<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use App\Enums\PaymentType;
use App\Traits\HasMetas;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasMetas;

    protected $attributes = [
        'amount',
        'type',
        'status'
    ];

    /**
     * use to link relationship
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function payable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    /**
     * query the type
     * @param $query
     * @param string $type
     * @return mixed
     */
    public function scopeType($query, string $type = PaymentType::Default): mixed
    {
        return $query->where('type', $type);
    }

    /**
     * query by status
     * @param $query
     * @param string $status
     * @return mixed
     */
    public function scopeStatus($query, string $status = PaymentStatus::Default): mixed
    {
        return $query->where('status', $status);
    }
}
