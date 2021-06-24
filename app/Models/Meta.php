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

    /**
     * @param $query
     * @param string $key
     * @return mixed
     */
    public function scopeKey($query, string $key = ""): mixed
    {
        return $query->where('key', $key);
    }

    /**
     * @param $query
     * @param string $group
     * @return mixed
     */
    public function scopeGroup($query, string $group = ""): mixed
    {
        return $query->where('group', $group);
    }

    /**
     * @param $query
     * @param string $value
     * @return mixed
     */
    public function scopeValue($query, string $value = ""): mixed
    {
        return $query->where('value', 'like', sprintf("%%%s%%", $value));
    }
}
