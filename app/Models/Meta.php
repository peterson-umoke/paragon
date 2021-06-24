<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Meta extends Model
{
    protected $attributes = [
        'key',
        'group',
        'value'
    ];

    /**
     * @return MorphTo
     */
    public function metaable(): MorphTo
    {
        return $this->morphTo();
    }
}
