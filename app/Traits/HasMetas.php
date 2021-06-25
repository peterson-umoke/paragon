<?php


namespace App\Traits;


use App\Models\Meta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasMetas
{
    /**
     * @return MorphOne
     */
    public function meta(): MorphOne
    {
        return $this->morphOne(Meta::class, 'metaable');
    }

    /**
     * @return MorphMany
     */
    public function metas(): MorphMany
    {
        return $this->morphMany(Meta::class, 'metaable');
    }

    /**
     * set a meta
     * @param string $key - the meta key
     * @param string $group - the meta group
     * @param string|array $value - the value to be set
     * @return Model
     */
    public function setMeta(string $key, string|array $value = "", string $group = ""): Model
    {
        if (is_array($value)) {
            $data = [];

            foreach ($value as $item) {
                $data[] = [
                    'key' => $key,
                    'value' => $value,
                    'group' => $group
                ];
            }

            $this->meta()->createMany($data);
        }

        return $this->meta()->create([
            'key' => $key,
            'value' => $value,
            'group' => $group
        ]);
    }

    /**
     * get a meta(s)
     * @param string $key - the meta key
     * @param string $group - the meta group
     * @param bool $multiple - change to true to get multiple meta data
     * @return mixed
     */
    public function getMeta(string $key, string $group = "", bool $multiple = false): mixed
    {
        return $multiple ? $this->metas()->key($key)->group($group)->get() : $this->meta()->key($key)->group($group)->first();
    }

    /**
     * delete a meta data
     * @param string $key
     * @param string $group
     */
    public function deleteMeta(string $key, string $group = ""): void
    {
        $query = $this->meta()->key($key)->group($group);
        $query->delete();
    }

    /**
     * replace a meta data
     * @param string $key
     * @param array|string $value
     * @param string $group
     */
    public function replaceMeta(string $key, array|string $value = null, string $group = ""): void
    {
        $this->deleteMeta($key, $group);
        $this->setMeta($key, $value, $group);
    }
}
