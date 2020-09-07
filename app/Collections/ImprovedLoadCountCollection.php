<?php

namespace App\Collections;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class ImprovedLoadCountCollection extends Collection
{
    /**
     * Load a set of relationship counts onto the collection.
     *
     * @param  array|string  $relations
     * @return $this
     */
    public function loadCount($relations)
    {
        if ($this->isEmpty()) {
            return $this;
        }

        $keyName = $this->first()->getKeyName();

        $models = $this->first()->newModelQuery()
            ->whereKey($this->modelKeys())
            ->select($keyName)
            ->withCount(...func_get_args())
            ->get()
            ->keyBy($keyName);

        $attributes = Arr::except(
            array_keys($models->first()->getAttributes()),
            $keyName
        );

        $this->each(function ($model) use ($models, $attributes) {
            $extraAttributes = Arr::only($models->get($model->getKey())->getAttributes(), $attributes);
            $model->forceFill($extraAttributes)->syncOriginalAttributes($attributes);
        });

        return $this;
    }
}
